<?php defined('BASEPATH') or exit('No direct script access allowed');

class Training extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->loggedIn) {
			$this->session->set_userdata('requested_page', $this->uri->uri_string());
			$this->sma->md('login');
		}
		$this->lang->admin_load('manpower', $this->Settings->user_language);
		$this->load->library('form_validation');
		$this->load->helper('report');
		$this->load->admin_model('training_model');
		$this->digital_upload_path = 'files/';
		$this->upload_path = 'assets/uploads/';
		$this->thumbs_path = 'assets/uploads/thumbs/';
		$this->image_types = 'gif|jpg|jpeg|png|tif';
		$this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
		$this->allowed_file_size = '1024';
		$this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
	}








	function index($branch_id = NULL)
	{
		$this->sma->checkPermissions();


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/' . $this->session->userdata('branch_id'));
		}



		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;



		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');




		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$this->data['trainings'] = $this->training_model->getAllTraining();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfo($report_type_get, $this->data['trainings'], $branch_id);
		} else
			$this->data['detailinfo'] = '';




		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['training_summary'] = $this->gettraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		// $this->sma->print_arrays($this->data['org_summary']);



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Training'));
		$meta = array('page_title' => 'training', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('training/training_entry', $meta, $this->data, 'leftmenu/training');
		} else
			$this->page_construct('training/training', $meta, $this->data, 'leftmenu/training');
	}


	function export($branch_id = NULL)
	{
		$this->sma->checkPermissions();


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/' . $this->session->userdata('branch_id'));
		}



		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$report_info = $report_type_get;



		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');




		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$branch_id = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$trainings = $this->training_model->getAllTraining();


		if ($branch_id) {
			$detailinfo = $this->getEntryInfo($report_type_get, $this->data['trainings'], $branch_id);
		} else
			$detailinfo = '';




		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$training_summary = $this->gettraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		if ($trainings) {
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('BM');




			$this->excel->getActiveSheet()->mergeCells('A1:I1');
			$this->excel->getActiveSheet()->mergeCells('A2:I2');
			$this->excel->getActiveSheet()->mergeCells('A3:I3');
			$this->excel->getActiveSheet()->mergeCells('A4:I4');
			$this->excel->getActiveSheet()->mergeCells('A5:I5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:J4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:J4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'শাখা প্রশিক্ষণ ' . strtoupper($report_type['type']) . ' Report: from ' . $report_type_get['start'] . ' to ' . $report_type_get['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




			$this->excel->getActiveSheet()->getStyle('A7:J7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'প্রশিক্ষণ');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D7', 'গড়');

			$this->excel->getActiveSheet()->SetCellValue('F7', 'বিষয়');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H7', 'ডেলিগেট');
			$this->excel->getActiveSheet()->SetCellValue('I7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('J7', 'গড়');




			$row = 8;

			foreach ($trainings as $training) if ($training->type == 1) {

				$row_info = record_row($training_summary, 'training_id', $training->id);

				$number = $row_info['number'];
				$total_presence = $row_info['total_presence'];

				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

				$row++;
			}
			$left_max_row = $row;

			$row = 8;
			foreach ($trainings as $training) if ($training->type == 2) {
				$row_info = record_row($training_summary, 'training_id', $training->id);

				$number = $row_info['number'];
				$total_presence = $row_info['total_presence'];
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['delegate_number']);
				$this->excel->getActiveSheet()->SetCellValue('I' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('J' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

				$row++;
			}



			$this->excel->getActiveSheet()->getStyle('F' . $row . ':I' . $row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('F' . $row, 'ক্লাশ');
			$this->excel->getActiveSheet()->SetCellValue('G' . $row, 'গ্রুপ সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H' . $row, 'প্রোগ্রাম সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('I' . $row, 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('J' . $row, 'গড়');

			$row++;

			foreach ($trainings as $training) if ($training->type == 3) {
				$row_info = record_row($training_summary, 'training_id', $training->id);

				$delegate_number = $row_info['delegate_number'];
				$total_presence = $row_info['total_presence'];
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['delegate_number']);
				$this->excel->getActiveSheet()->SetCellValue('I' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('J' . $row, ($delegate_number > 0) ? round($total_presence / $delegate_number, 2) : 0);
				$row++;
			}
			$right_max_row = $row;


			

			$row = $right_max_row > $left_max_row ? $right_max_row + 1 : $left_max_row + 1;


			$this->excel->getActiveSheet()->getStyle('A' . $row . ':F' . $row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A' . $row, 'পাঠচক্র');
			$this->excel->getActiveSheet()->SetCellValue('B' . $row, 'গ্রুপ সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C' . $row, 'ডেলিগেট সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('D' . $row, 'অধিবেশন');
			$this->excel->getActiveSheet()->SetCellValue('E' . $row, 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('F' . $row, 'গড়');

			$row++;
			foreach ($trainings as $training) if ($training->type == 4) {
				$row_info = record_row($training_summary, 'training_id', $training->id);

				$total_presence = $row_info['total_presence'];
				$session_number = $row_info['session_number'];
				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['delegate_number']);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, $row_info['session_number']);
				$this->excel->getActiveSheet()->SetCellValue('E' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, ($session_number > 0) ? $total_presence / $session_number : 0);

				$row++;
			}



			$this->excel->getActiveSheet()->getStyle('A' . $row . ':F' . $row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A' . $row, 'ওয়ার্কশপ');
			$this->excel->getActiveSheet()->SetCellValue('B' . $row, 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C' . $row, 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D' . $row, 'গড়');

			$row++;
			foreach ($trainings as $training) if ($training->type == 5) {
				$row_info = record_row($training_summary, 'training_id', $training->id);

				$total_presence = $row_info['total_presence'];
				$number = $row_info['number'];
				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('E' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, ($number > 0) ? $total_presence / $number : 0);

				$row++;
			}

			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);



			$filename = 'branch_training_' . $branch->name . '_' . $this->input->get('year');

			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}

		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}

	function get_no_org($branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org WHERE   branch_id = ?  GROUP BY institution_type_id ", array($branch_id));

		else
			$result =  $this->site->query("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org GROUP BY institution_type_id");



		return $result;
	}


	function gettraining_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{

		$last_half = $reportinfo['last_half'];

		if ($branch_id) {
			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_training_record WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($this->input->get('type') && ($this->input->get('type') == 'annual'))
				$result =  $this->site->query_binding("SELECT `training_id`, SUM(`number`) number, SUM(`delegate_number`) delegate_number,SUM(`session_number`) session_number,SUM(`total_presence`) total_presence, SUM(id) id from sma_training_record WHERE   branch_id = ? AND date BETWEEN ? AND ?  GROUP BY training_id", array($branch_id, $start_date, $end_date));
		} else {
			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_training_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));

			else if ($this->input->get('type') && ($this->input->get('type') == 'annual'))
				$result =  $this->site->query_binding("SELECT `training_id`, SUM(`number`) number, SUM(`delegate_number`) delegate_number,SUM(`session_number`) session_number,SUM(`total_presence`) total_presence, SUM(id) id from sma_training_record WHERE    date BETWEEN ? AND ?  GROUP BY training_id", array($start_date, $end_date));
		}


		return $result;
	}



	function getorg_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));

		else
			$result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}



















	function getEntryInfo($report_type_get, $trainings, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';

			$training_recordinfo = $this->site->getOneRecord('training_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$training_recordinfo) {

				foreach ($trainings as $training)
					$this->site->insertData('training_record', array('training_id' => $training->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}






		$training_recordinfo = $this->site->getOneRecord('training_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		return array(
			'training_recordinfo' => $training_recordinfo
		);
	}









	/* --------------------------------------------------------------------------------------------- */

	function modal_view($id = NULL, $status = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);

		$pr_details = $this->site->getManpowerByID($id);
		if (!$id || !$pr_details) {
			$this->session->set_flashdata('error', lang('manpower_not_found'));
			$this->sma->md();
		}

		$this->data['manpower'] = $pr_details;
		if ($status == 1) {
			$this->data['member'] = $this->manpower_model->getMemberByID($id);
			$this->data['status'] =  'Member';
		}
		$this->load->view($this->theme . 'manpower/modal_view', $this->data);
	}






	function detailupdate()
	{
		$this->sma->checkPermissions('index', TRUE);
		$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));

		$flag = 1;
		$msg = "done";

		if ($is_changeable) {
			$flag = 100;
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
		} else {
			$msg = "failed";
		}
		echo json_encode(array('flag' => $flag, 'msg' => $msg));


		exit;
	}




	function library($branch_id = NULL)
	{



		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		}

		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;

		//$this->sma->print_arrays($report_type_get['last_year']);


		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];
		$prev = $report_type_get['last_year'];


		// $this->sma->print_arrays($report_type_get);


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoLibrary($report_type_get, $branch_id);

			// $this->sma->print_arrays($this->data['detailinfo']);

			$totalreader = $this->gettotalreader($report_start, $report_end, $prev, $branch_id);

			$this->data['totalreader'] = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoLibrarySUM($report_type_get, $branch_id);
			$totalreader = $this->gettotalreader($report_start, $report_end, $prev);

			//echo $totalreader[0]['current_manpower'];

			$this->data['totalreader'] = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		}




		//$this->sma->print_arrays($this->data['totalreader']);





		$this->data['prev'] = $this->getPrev('annual', $report_type_get['last_year'], $branch_id);







		//$this->data['current_worker'] = $this->current_worker($report_type, $report_start, $report_end, $report_year, $branch_id);





		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Library'));
		$meta = array('page_title' => 'Library', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/library_entry', $meta, $this->data, 'leftmenu/training');
		else
			$this->page_construct('training/library', $meta, $this->data, 'leftmenu/training');
	}



	function library_export($branch_id = NULL)
	{



		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		}

		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$report_info = $report_type_get;

		//$this->sma->print_arrays($report_type_get['last_year']);


		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			 $branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			 $branch_id = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];
		$prev = $report_type_get['last_year'];


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$detailinfo = $this->getEntryInfoLibrary($report_type_get, $branch_id);
			$totalreader = $this->gettotalreader($report_start, $report_end, $prev, $branch_id);
			$totalreader = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		} else {
			$detailinfo = $this->getEntryInfoLibrarySUM($report_type_get, $branch_id);
			$totalreader = $this->gettotalreader($report_start, $report_end, $prev);
			$totalreader = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		}
 
		$prev = $this->getPrev('annual', $report_type_get['last_year'], $branch_id);


		if (!empty($detailinfo)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Libraby');




			$this->excel->getActiveSheet()->mergeCells('A1:F1');
			$this->excel->getActiveSheet()->mergeCells('A2:F2');
			$this->excel->getActiveSheet()->mergeCells('A3:F3');
			$this->excel->getActiveSheet()->mergeCells('A4:F4');
			$this->excel->getActiveSheet()->mergeCells('A5:F5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:I4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:I4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type_get['type']) . ' Library  রিপোর্ট: from ' . $report_type_get['start'] . ' to ' . $report_type_get['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




 


			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




			$this->excel->getActiveSheet()->getStyle('A6:I6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A6', 'পাঠাগার');
			$this->excel->getActiveSheet()->SetCellValue('B6', 'পূর্বসংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C6', 'বর্তমান');
			$this->excel->getActiveSheet()->SetCellValue('D6', 'বৃদ্ধি');
			$this->excel->getActiveSheet()->SetCellValue('E6', 'ঘাটতি');
			$this->excel->getActiveSheet()->SetCellValue('F6', 'জনশক্তি');
			$this->excel->getActiveSheet()->SetCellValue('G6', $totalreader);
			$this->excel->getActiveSheet()->SetCellValue('H6', 'অনলাইন পাঠক');
			$this->excel->getActiveSheet()->SetCellValue('I6', $detailinfo['libraryinfo']->online_reader);

			 

			$this->excel->getActiveSheet()->SetCellValue('A7', 'সংখ্যা');
			$prev_library =  isset($prev[0]['library_number'])? $prev[0]['library_number'] : '';
			$this->excel->getActiveSheet()->SetCellValue('B7', $prev_library);
			$this->excel->getActiveSheet()->SetCellValue('C7', $prev_library +$detailinfo['libraryinfo']->library_increase - $detailinfo['libraryinfo']->library_decrease);
			$this->excel->getActiveSheet()->SetCellValue('D7', $detailinfo['libraryinfo']->library_increase);
			$this->excel->getActiveSheet()->SetCellValue('E7', $detailinfo['libraryinfo']->library_decrease);
			$this->excel->getActiveSheet()->SetCellValue('F7', 'পাঠক');
			$this->excel->getActiveSheet()->SetCellValue('G7', $detailinfo['libraryinfo']->reader);
			$this->excel->getActiveSheet()->SetCellValue('H7', 'অনলাইনে পঠিত বই');
			$this->excel->getActiveSheet()->SetCellValue('I7', $detailinfo['libraryinfo']->online_read_book);



			$this->excel->getActiveSheet()->SetCellValue('A8', 'বই সংখ্যা');
			$prev_book =  isset($prev[0]['book_number'])? $prev[0]['book_number'] : ''; 
			$this->excel->getActiveSheet()->SetCellValue('B8', $prev_book);
			$this->excel->getActiveSheet()->SetCellValue('C8', $prev_book +$detailinfo['libraryinfo']->book_increase - $detailinfo['libraryinfo']->book_decrease);
			$this->excel->getActiveSheet()->SetCellValue('D8', $detailinfo['libraryinfo']->book_increase);
			$this->excel->getActiveSheet()->SetCellValue('E8', $detailinfo['libraryinfo']->book_decrease);
			$this->excel->getActiveSheet()->SetCellValue('F8', 'ইস্যুকৃত বই');
			$this->excel->getActiveSheet()->SetCellValue('G8', $detailinfo['libraryinfo']->issued_book);
			$this->excel->getActiveSheet()->SetCellValue('H8', 'অনলাইনে প্রেরিত বই');
			$this->excel->getActiveSheet()->SetCellValue('I8', $detailinfo['libraryinfo']->online_sent_book);


			$this->excel->getActiveSheet()->SetCellValue('A9', 'ব্যক্তিগত');
			$prev_personal =  isset($prev[0]['personal'])? $prev[0]['personal'] : ''; 
			$this->excel->getActiveSheet()->SetCellValue('B9', $prev_personal);
			$this->excel->getActiveSheet()->SetCellValue('C9', $prev_personal + $detailinfo['libraryinfo']->personal_increase - $detailinfo['libraryinfo']->personal_decrease);
			$this->excel->getActiveSheet()->SetCellValue('D9', $detailinfo['libraryinfo']->personal_increase);
			$this->excel->getActiveSheet()->SetCellValue('E9', $detailinfo['libraryinfo']->personal_decrease);
			$this->excel->getActiveSheet()->SetCellValue('F9', 'পঠিত বই');
			$this->excel->getActiveSheet()->SetCellValue('G9', $detailinfo['libraryinfo']->read_book);
			$this->excel->getActiveSheet()->SetCellValue('H9', 'অনলাইনে আপলোড');
			$this->excel->getActiveSheet()->SetCellValue('I9', $detailinfo['libraryinfo']->online_book_upload);






		 
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);




			$filename = 'library_' . $branch->name . '_' . $this->input->get('year');

			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}




		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
		 
		 
	}





	function current_worker($type, $start, $end, $year, $branch_id = null)
	{

		$total = 0;

		$this->db
			->select("COUNT(id) as associate_number", FALSE)
			->from('associatelog');
		$this->db->where('process_id', 2);
		$this->db->where('in_out', 1);
		$this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');

		if ($branch_id)
			$this->db->where('branch', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();

			$total = $total - (isset($rt[0]->associate_number) ? $rt[0]->associate_number : 0);

			//		 echo 'Asso improvement: '.( isset($rt[0]->associate_number) ? $rt[0]->associate_number : 0 ).'<br/>';
		}



		$this->db
			->select("COUNT(id) as worker_number", FALSE)
			->from('worker_decrease');

		$this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total - (isset($rt[0]->worker_number) ? $rt[0]->worker_number : 0);

			//		 	 echo 'worker_decrease: '.( isset($rt[0]->worker_number) ? $rt[0]->worker_number : 0 ).'<br/>';
		}






		$this->db
			->select("SUM(worker_improvement+ worker_arrival -worker_demotion - worker_endstd  - worker_transfer  - worker_cancel) as worker_cal_number", FALSE)
			->from('manpower_record');
		$this->db->where('report_type', $type);
		$this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');

		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total + (isset($rt[0]->worker_cal_number) ? $rt[0]->worker_cal_number : 0);

			//		   echo 'manpower_record: '.( isset($rt[0]->worker_cal_number) ? $rt[0]->worker_cal_number : 0 ).'<br/>';
		}


		//	 echo 'last: '.($year-1).'<br/>';

		$this->db
			->select("SUM(`worker`) as worker", FALSE)
			->from('calculated_mapower');
		$this->db->where('report_type', 'annual');
		$this->db->where('calculated_year', $year - 1);

		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total + (isset($rt[0]->worker) ? $rt[0]->worker : 0);

			//		    echo 'calculated_mapower: '.( isset($rt[0]->worker) ? $rt[0]->worker : 0 ).'<br/>';
		}

		return $total;
	}



 

	function getPrev($report_type, $last_year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(`library_number`) as  library_number,   SUM(`personal`) as  personal, SUM(`book_number`) as  book_number          
FROM `sma_library_calculated` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

		else
			$result =  $this->site->query_binding("SELECT SUM(`library_number`) as  library_number,   SUM(`personal`) as  personal, SUM(`book_number`) as  book_number          
FROM `sma_library_calculated` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));


		return $result;
	}


	function gettotalreader($start, $end, $prev, $branch_id = NULL)
	{


		 
		if ($branch_id)
			return $this->site->query_binding("SELECT  `v3_worker_increase_decrease`(?,?,?,?) current_manpower  ", array($start, $end, $branch_id, $prev));

		else
			return $this->site->query_binding("SELECT  `v3_worker_increase_decrease_all`(?,?,?) current_manpower  ", array($start, $end,  $prev));
	}



	function gettotalreaderOLD($branch_id = NULL)
	{

		if ($branch_id)
			return $this->site->query_binding("SELECT COUNT(id) reader FROM `sma_manpower` WHERE `orgstatus_id` IN (1,2,12) AND branch = ? ", array($branch_id));

		else
			return $this->site->query("SELECT COUNT(id) reader FROM `sma_manpower` WHERE `orgstatus_id` IN (1,2,12)");
	}

	function getEntryInfoLibrary($report_type_get, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$libraryinfo = $this->site->getOneRecord('library', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$libraryinfo) {
				$this->site->insertData('library', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}


		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$libraryinfo = $this->site->getOneRecord('library', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		else if ($report_type == 'annual') {
			$library_info1 = $this->site->query_binding('SELECT SUM(id) id, SUM(`library_increase`) library_increase,  SUM(`library_decrease`) library_decrease, SUM(`book_increase`) book_increase, SUM(`book_decrease`) book_decrease,
 SUM(`personal_increase`) personal_increase, SUM(`personal_decrease`) personal_decrease, SUM(`issued_book`) issued_book, SUM(`read_book`) read_book,  SUM(`online_read_book`) online_read_book, SUM(`online_sent_book`) online_sent_book, SUM(`online_book_upload`) online_book_upload
 FROM sma_library WHERE branch_id = ? AND  DATE(date) between  ? AND ? ', array($branch_id, $report_start, $report_end));

			// last half
			$library_info2 = $this->site->query_binding('SELECT   SUM(id) id,  SUM(`reader`) reader, 
 SUM(`online_reader`) online_reader 
 FROM sma_library WHERE branch_id = ? AND  DATE(date) between  ? AND ? ', array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));


			$library_info = array_replace_recursive($library_info1, $library_info2);

			// $this->sma->print_arrays($library_info1,$library_info2,$library_info);

			$library_info = isset($library_info[0]) ? $library_info[0] : array();
			$libraryinfo = (object)$library_info;
		}



		// $this->sma->print_arrays($libraryinfo);

		return array(
			'libraryinfo' => $libraryinfo
		);
	}




	function getEntryInfoLibrarySUM($report_type_get, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$result1 =  $this->site->query_binding("SELECT SUM(id) id, SUM(`library_increase`) as library_increase, SUM(`library_decrease`) as library_decrease, SUM(`book_increase`) as book_increase, SUM(`book_decrease`) as book_decrease, SUM(`personal_increase`) as personal_increase, SUM(`personal_decrease`) as personal_decrease,  SUM(`issued_book`) as issued_book, SUM(`read_book`) as read_book,  SUM(`online_read_book`) as online_read_book, SUM(`online_sent_book`) as online_sent_book, SUM(`online_book_upload`) as  online_book_upload FROM `sma_library` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end));

		// last half		 
		$result2 =  $this->site->query_binding("SELECT SUM(id) id, SUM(`reader`) as reader,  SUM(`online_reader`) as online_reader FROM `sma_library` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end)); //$report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual

		$result = array_replace_recursive($result1, $result2);

		return $result;
	}





	function communication($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
		}






		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoCommunication($report_type, $branch_id);
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoCommunicationSUM($report_type, $branch_id);
		}



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Communication'));
		$meta = array('page_title' => 'Communication', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/communication_entry', $meta, $this->data, 'leftmenu/others');
		else
			$this->page_construct('training/communication', $meta, $this->data, 'leftmenu/others');
	}

	function communication_export($branch_id)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
		}






		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {

			$branch_id = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$report_info = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$detailinfo = $this->getEntryInfoCommunication($report_type, $branch_id);
		} else {
			$detailinfo = $this->getEntryInfoCommunicationSUM($report_type, $branch_id);
		}



		if (!empty($detailinfo)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Communication');




			$this->excel->getActiveSheet()->mergeCells('A1:F1');
			$this->excel->getActiveSheet()->mergeCells('A2:F2');
			$this->excel->getActiveSheet()->mergeCells('A3:F3');
			$this->excel->getActiveSheet()->mergeCells('A4:F4');
			$this->excel->getActiveSheet()->mergeCells('A5:F5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:F4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:F4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' যোগাযোগ  রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));












			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




			$this->excel->getActiveSheet()->getStyle('A6:G6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A6', 'যোগাযোগ');
			$this->excel->getActiveSheet()->SetCellValue('B6', 'কেন্দ্র থেকে প্রাপ্ত');
			$this->excel->getActiveSheet()->SetCellValue('C6', 'শাখা থেকে প্রকাশিত');
			$this->excel->getActiveSheet()->SetCellValue('D6', 'অধঃস্থন সংগঠনে প্রেরিত');
			$this->excel->getActiveSheet()->SetCellValue('E6', 'কেন্দ্রে প্রেরিত');
			$this->excel->getActiveSheet()->SetCellValue('F6', 'সংগঠনের বাইরে থেকে প্রাপ্ত');

			$row = 7;
			$total = 0;


			$this->excel->getActiveSheet()->SetCellValue('A7', 'চিঠি/সার্কুলার');
			$this->excel->getActiveSheet()->SetCellValue('B7', $detailinfo['communicationinfo']->letter_from_center);
			$this->excel->getActiveSheet()->SetCellValue('C7', $detailinfo['communicationinfo']->letter_from_branch);
			$this->excel->getActiveSheet()->SetCellValue('D7', $detailinfo['communicationinfo']->letter_to_subordinate);
			$this->excel->getActiveSheet()->SetCellValue('E7', $detailinfo['communicationinfo']->letter_to_center);
			$this->excel->getActiveSheet()->SetCellValue('F7', $detailinfo['communicationinfo']->letter_from_outside);







			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);




			$filename = 'Communication_' .( $branch_id ? '_'.$branch_id : '_central'). '_' . $this->input->get('year');
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}




		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	function getEntryInfoCommunication($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';



			$communicationinfo = $this->site->getOneRecord('communication', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$communicationinfo) {
				$this->site->insertData('communication', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}



		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$communicationinfo = $this->site->getOneRecord('communication', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		else if ($report_type == 'annual') {
			$communication_info =  $this->site->query_binding("SELECT sum(id) id, SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
			//$communicationinfo = $this->site->getOneRecord('communication','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);	
			$communicationinfo = isset($communication_info[0]) ? (object) $communication_info[0] : NULL;
		}


		return array(
			'communicationinfo' => $communicationinfo
		);
	}




	function getEntryInfoCommunicationSUM($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
		else
			$result =  $this->site->query_binding("SELECT SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));


		return $result;
	}









	function trainingelement($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
		}


		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoTrainingElement($report_type, $branch_id);
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoTrainingElementSUM($report_type, $branch_id);
		}



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'TrainingElement'));
		$meta = array('page_title' => 'TrainingElement', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/trainingelement_entry', $meta, $this->data, 'leftmenu/others');
		else
			$this->page_construct('training/trainingelement', $meta, $this->data, 'leftmenu/others');
	}


	function trainingelement_export($branch_id)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
		}


		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$branch_id = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$report_info = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$detailinfo = $this->getEntryInfoTrainingElement($report_type, $branch_id);
		} else {
			$detailinfo = $this->getEntryInfoTrainingElementSUM($report_type, $branch_id);
		}



		if (!empty($detailinfo)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Element');




			$this->excel->getActiveSheet()->mergeCells('A1:D1');
			$this->excel->getActiveSheet()->mergeCells('A2:D2');
			$this->excel->getActiveSheet()->mergeCells('A3:D3');
			$this->excel->getActiveSheet()->mergeCells('A4:D4');
			$this->excel->getActiveSheet()->mergeCells('A5:D5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . 'উপকরণ  রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));












			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




			$this->excel->getActiveSheet()->getStyle('A6:G6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A6', 'উপকরণ');
			$this->excel->getActiveSheet()->SetCellValue('B6', 'উৎস');
			$this->excel->getActiveSheet()->SetCellValue('C6', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('D6', 'বিষয়');





			$this->excel->getActiveSheet()->mergeCells('A7:A8');

			$this->excel->getActiveSheet()->SetCellValue('A7', 'পোষ্টার');

			$this->excel->getActiveSheet()->mergeCells('A9:A10');
			$this->excel->getActiveSheet()->SetCellValue('A9', 'লিফলেট');


			$this->excel->getActiveSheet()->SetCellValue('A11', 'দাওয়াতী ব্যানার');
			$this->excel->getActiveSheet()->SetCellValue('A12', 'দেয়ালিকা/বুলেটিন');


			$this->excel->getActiveSheet()->SetCellValue('B7', 'কেন্দ্র');
			$this->excel->getActiveSheet()->SetCellValue('B8', 'শাখা');
			$this->excel->getActiveSheet()->SetCellValue('B9', 'কেন্দ্র');
			$this->excel->getActiveSheet()->SetCellValue('B10', 'শাখা');



			$this->excel->getActiveSheet()->SetCellValue('C7', $detailinfo['trainingelementinfo']->poster_from_center);
			$this->excel->getActiveSheet()->SetCellValue('D7', $detailinfo['trainingelementinfo']->poster_from_center_topic);

			$this->excel->getActiveSheet()->SetCellValue('C8', $detailinfo['trainingelementinfo']->poster_from_branch);
			$this->excel->getActiveSheet()->SetCellValue('D8', $detailinfo['trainingelementinfo']->poster_from_branch_topic);

			$this->excel->getActiveSheet()->SetCellValue('C9', $detailinfo['trainingelementinfo']->leaflet_from_center);
			$this->excel->getActiveSheet()->SetCellValue('D9', $detailinfo['trainingelementinfo']->leaflet_from_center_topic);

			$this->excel->getActiveSheet()->SetCellValue('C10', $detailinfo['trainingelementinfo']->leaflet_from_branch);
			$this->excel->getActiveSheet()->SetCellValue('D10', $detailinfo['trainingelementinfo']->leaflet_from_branch_topic);

			$this->excel->getActiveSheet()->SetCellValue('C11', $detailinfo['trainingelementinfo']->dawat_banner);
			$this->excel->getActiveSheet()->SetCellValue('D11', $detailinfo['trainingelementinfo']->dawat_banner_topic);

			$this->excel->getActiveSheet()->SetCellValue('C12', $detailinfo['trainingelementinfo']->bulletin);
			$this->excel->getActiveSheet()->SetCellValue('D12', $detailinfo['trainingelementinfo']->bulletin_topic);



			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(100);





			$filename = 'Element_' .( $branch_id ? '_'.$branch_id : '_central'). '_' . $this->input->get('year');


			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}




		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	function getEntryInfoTrainingElement($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];




		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$trainingelementinfo = $this->site->getOneRecord('trainingelement', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$trainingelementinfo) {
				$this->site->insertData('trainingelement', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}





		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$trainingelementinfo = $this->site->getOneRecord('trainingelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		else if ($report_type == 'annual') {

			$trainingelement_info  =  $this->site->query_binding("SELECT GROUP_CONCAT(leaflet_from_center_topic) leaflet_from_center_topic, GROUP_CONCAT(bulletin_topic) bulletin_topic, GROUP_CONCAT(dawat_banner_topic) dawat_banner_topic,  GROUP_CONCAT(leaflet_from_branch_topic) leaflet_from_branch_topic,  GROUP_CONCAT(`poster_from_branch_topic`) as poster_from_branch_topic , SUM(`poster_from_center`) as poster_from_center , GROUP_CONCAT(`poster_from_center_topic`) as poster_from_center_topic ,SUM(`poster_from_branch`) as poster_from_branch , SUM(`leaflet_from_center`) as leaflet_from_center , SUM(`leaflet_from_branch`) as leaflet_from_branch , SUM(`dawat_banner`) as dawat_banner, SUM(`bulletin`) as bulletin, SUM(id) as id FROM `sma_trainingelement` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));

			$trainingelementinfo = isset($trainingelement_info[0]) ? (object)$trainingelement_info[0] : null;
		}


		return array(
			'trainingelementinfo' => $trainingelementinfo
		);
	}




	function getEntryInfoTrainingElementSUM($report_type_get, $branch_id = NULL)
	{

		//$this->sma->checkPermissions('index', TRUE);



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];


		$result  =  $this->site->query_binding("SELECT SUM(`poster_from_center`) as poster_from_center , SUM(`poster_from_branch`) as poster_from_branch , SUM(`leaflet_from_center`) as leaflet_from_center , SUM(`leaflet_from_branch`) as leaflet_from_branch , SUM(`dawat_banner`) as dawat_banner, SUM(`bulletin`) as bulletin FROM `sma_trainingelement` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end));



		return $result;
	}
}
