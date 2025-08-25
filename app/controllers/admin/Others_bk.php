<?php defined('BASEPATH') or exit('No direct script access allowed');

class Others extends MY_Controller
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
		$this->load->admin_model('others_model');
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
	}



	function program($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
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

		$this->data['programs'] = $this->others_model->getAllProgram();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfo($report_type_get, $this->data['programs'], $branch_id);
		} else
			$this->data['detailinfo'] = '';


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$this->data['program_summary'] = $this->getprogram_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		// $this->sma->print_arrays($this->data['org_summary']);



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Program'));
		$meta = array('page_title' => 'Program', 'bc' => $bc);


		if ($branch_id) {
			$this->page_construct('others/program_entry', $meta, $this->data, 'leftmenu/program');
		} else
			$this->page_construct('others/program', $meta, $this->data, 'leftmenu/program');
	}



	function program_export($branch_id)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
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

		$programs = $this->others_model->getAllProgram();


		if ($branch_id) {
			$detailinfo = $this->getEntryInfo($report_type_get, $this->data['programs'], $branch_id);
		} else
			$detailinfo = '';


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$program_summary = $this->getprogram_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		if ($programs) {
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

			$this->excel->getActiveSheet()->getStyle("A1:I4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:I4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'সভাসমূহ  ' . strtoupper($report_type_get['type']) . ' Report: from ' . $report_type_get['start'] . ' to ' . $report_type_get['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




			$this->excel->getActiveSheet()->getStyle('A7:I7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'সভাসমূহ');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D7', 'গড়');

			$this->excel->getActiveSheet()->SetCellValue('F7', 'সভাসমূহ');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'সংখ্যা');

			$this->excel->getActiveSheet()->SetCellValue('H7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I7', 'গড়');




			$row = 8;

			foreach ($programs as $key => $program)
				if ($key < floor(count($programs) / 2)) {

					$row_info = record_row($program_summary, 'program_id', $program->id);
					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('A' . $row, $program->program_type);
					$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}


			$row = 8;
			foreach ($programs as $key => $program)
				if ($key >= floor(count($programs) / 2)) {
					$row_info = record_row($program_summary, 'program_id', $program->id);
					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('F' . $row, $program->program_type);
					$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);


			$filename = 'programs_' . $branch->name . '_' . $this->input->get('year');

			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}

		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}
	function program_export1($branch_id)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
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

		$programs = $this->others_model->getAllProgram();


		if ($branch_id) {
			$detailinfo = $this->getEntryInfo($report_type_get, $this->data['programs'], $branch_id);
		} else
			$detailinfo = '';


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$program_summary = $this->getprogram_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		if ($programs) {
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

			$this->excel->getActiveSheet()->getStyle("A1:I4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:I4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'সভাসমূহ  ' . strtoupper($report_type_get['type']) . ' Report: from ' . $report_type_get['start'] . ' to ' . $report_type_get['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




			$this->excel->getActiveSheet()->getStyle('A7:I7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'সভাসমূহ');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D7', 'গড়');

			$this->excel->getActiveSheet()->SetCellValue('F7', 'সভাসমূহ');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'সংখ্যা');

			$this->excel->getActiveSheet()->SetCellValue('H7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I7', 'গড়');




			$row = 8;

			foreach ($programs as $key => $program)
				if ($key < floor(count($programs) / 2)) {

					$row_info = record_row($program_summary, 'program_id', $program->id);
					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('A' . $row, $program->program_type);
					$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}


			$row = 8;
			foreach ($programs as $key => $program)
				if ($key >= floor(count($programs) / 2)) {
					$row_info = record_row($program_summary, 'program_id', $program->id);
					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('F' . $row, $program->program_type);
					$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);



			$filename = 'সভাসমূহ_' . ($branch->name);
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}

		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	function getprogram_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{




		if ($branch_id) {

			if (($reportinfo['last_half'] || $report_type == 'half_yearly'))
				$result = $this->site->query_binding("SELECT * from sma_program_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT `program_id`, SUM(`number`) AS number ,SUM(`total_presence`) AS total_presence, sum(id) id  from sma_program_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY program_id", array($branch_id, $start_date, $end_date));
		} else {
			if (($reportinfo['last_half'] || $report_type == 'half_yearly'))
				$result = $this->site->query_binding("SELECT * from sma_program_record WHERE  date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT `program_id`, SUM(`number`) AS number ,SUM(`total_presence`) AS total_presence, sum(id) id  from sma_program_record WHERE date BETWEEN ? AND ? GROUP BY program_id", array($start_date, $end_date));
		}

		return $result;
	}



	function getorg_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result = $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));
		else
			$result = $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}




	function getEntryInfo($report_type_get, $programs, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($report_type_get['is_current'] != false && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type = ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';
			///half_yearly starts
			$program_recordinfo = $this->site->getOneRecord('program_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$program_recordinfo) {

				foreach ($programs as $program)
					$this->site->insertData('program_record', array('program_id' => $program->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}

			///half_yearly ends


		}





		$program_recordinfo = $this->site->getOneRecord('program_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		return array(
			'program_recordinfo' => $program_recordinfo
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
			$this->data['status'] = 'Member';
		}
		$this->load->view($this->theme . 'manpower/modal_view', $this->data);
	}






	function detailupdate()
	{

		$this->sma->checkPermissions('index', TRUE);

		$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));


		$flag = 1;
		$msg = 'done';
		if ($is_changeable) {
			$flag = 100;
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
		} else {
			$msg = 'failed';
		}
		echo json_encode(array('flag' => $flag, 'msg' => $msg));
		exit;
	}




	function centraltraining($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
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

		$this->data['centraltrainings'] = $this->others_model->getAllCentralTraining();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfoCentralTraining($report_type_get, $this->data['centraltrainings'], $branch_id);
		} else
			$this->data['detailinfo'] = '';



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['centraltraining_summary'] = $this->getcentraltraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Central Training'));
		$meta = array('page_title' => 'central training', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('others/centraltraining_entry', $meta, $this->data, 'leftmenu/training');
		} else
			$this->page_construct('others/centraltraining', $meta, $this->data, 'leftmenu/training');
	}



	function centraltraining_export($branch_id)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
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
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$centraltrainings = $this->others_model->getAllCentralTraining();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$detailinfo = $this->getEntryInfoCentralTraining($report_type_get, $this->data['centraltrainings'], $branch_id);
		} else
			$detailinfo = '';



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$centraltraining_summary = $this->getcentraltraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);








		if ($centraltrainings) {
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

			$this->excel->getActiveSheet()->getStyle("A1:I4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:I4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'কেন্দ্রীয় প্রশিক্ষণ ' . strtoupper($report_type['type']) . ' Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




			$this->excel->getActiveSheet()->getStyle('A7:I7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'শিক্ষাশিবির');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D7', 'গড়');

			$this->excel->getActiveSheet()->SetCellValue('F7', 'শিক্ষা বৈঠক');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I7', 'গড়');




			$row = 8;

			foreach ($centraltrainings as $training)
				if ($training->type == 1) {

					$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];

					$this->excel->getActiveSheet()->SetCellValue('A' . $row, $training->training_name);
					$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}

			$row = 8;
			foreach ($centraltrainings as $training)
				if ($training->type == 2) {
					$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
					$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

					$row++;
				}



			$this->excel->getActiveSheet()->getStyle('F' . $row . ':I' . $row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('F' . $row, 'কর্মশালা');
			$this->excel->getActiveSheet()->SetCellValue('G' . $row, 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H' . $row, 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I' . $row, 'গড়');

			$row++;

			foreach ($centraltrainings as $training)
				if ($training->type == 3) {
					$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

					$number = $row_info['number'];
					$total_presence = $row_info['total_presence'];
					$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
					$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
					$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
					$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);
					$row++;
				}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);


			$filename = 'centraltraining_' . $branch->name . '_' . $this->input->get('year');

			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}

		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	function getEntryInfoCentralTraining($report_type_get, $centraltrainings, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type = ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';
			///half_yearly starts
			$centraltraining_recordinfo = $this->site->getOneRecord('centraltraining_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$centraltraining_recordinfo) {

				foreach ($centraltrainings as $training)
					$this->site->insertData('centraltraining_record', array('centraltraining_id' => $training->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}

			///half_yearly ends


		}







		$centraltraining_recordinfo = $this->site->getOneRecord('centraltraining_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		return array(
			'centraltraining_recordinfo' => $centraltraining_recordinfo
		);
	}






	function getcentraltraining_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{
		$last_half = $reportinfo['last_half'];

		if ($branch_id) {
			if ($report_type == 'half_yearly' || $last_half)
				$result = $this->site->query_binding("SELECT * from sma_centraltraining_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT `centraltraining_id`, SUM(`number`) number, SUM(`total_presence`) total_presence , SUM(id) id from sma_centraltraining_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY centraltraining_id", array($branch_id, $start_date, $end_date));
		} else {

			if ($report_type == 'half_yearly' || $last_half)
				$result = $this->site->query_binding("SELECT * from sma_centraltraining_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT `centraltraining_id`, SUM(`number`) number, SUM(`total_presence`) total_presence , SUM(id) id from sma_centraltraining_record WHERE   date BETWEEN ? AND ? GROUP BY centraltraining_id", array($start_date, $end_date));
		}


		return $result;
	}







	function organizationinfo($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/organizationinfo/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/organizationinfo/' . $this->session->userdata('branch_id'));
		}


		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;



		// $this->sma->print_arrays($this->data['report_info']);


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

		$this->data['organizationinfos'] = $this->others_model->getAllOrganizationInfo();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryOrganizationInfo($report_type_get, $this->data['organizationinfos'], $branch_id);
		} else
			$this->data['detailinfo'] = '';




		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		// $this->sma->print_arrays($report_type_get);

		//$this->data['thanainfo_summary'] = $this->getthanainfo_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);
		$this->data['idealthanainfo_summary'] = $this->getidealthanainfo_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);

		//$this->data['current_thana'] = $this->current_thana($branch_id);
		$this->data['current_ideal_thana'] = $this->current_ideal_thana($branch_id);
		//$this->sma->print_arrays($this->data['current_ideal_thana']);
		$this->data['organizationinfo_summary'] = $this->getorganizationinfo_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);
		$this->data['organizationinfo_summary_prev'] = $this->getorganizationinfo_summary_prev('annual', $report_type_get['last_year'], $branch_id);

		//$this->data['unit_increase_decrease'] = $this->unit_increase_decrease($report_type, $report_start, $report_end, $branch_id, $report_type_get);
		$this->data['org_thana_ward_unit'] = $this->org_thana_ward_unit($report_start, $report_end, $branch_id);

		//$this->sma->print_arrays($this->data['org_thana_ward_unit']);
		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization Info'));
		$meta = array('page_title' => 'organization info', 'bc' => $bc);


		if ($branch_id)
			$this->page_construct('others/organizationinfo_entry', $meta, $this->data, 'leftmenu/organization');
		else
			$this->page_construct('others/organizationinfo', $meta, $this->data, 'leftmenu/organization');



	}



	function current_thana($branch_id = null)
	{


		if ($branch_id)
			$result = $this->site->query_binding("SELECT count(id) current_thana from sma_thana WHERE  ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) AND branch_id = ?  ", array($branch_id));
		else
			$result = $this->site->query("SELECT count(id) current_thana from sma_thana WHERE ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ");



		return isset($result[0]['current_thana']) ? $result[0]['current_thana'] : 0;
	}




	function current_ideal_thana($branch_id = null)
	{


		if ($branch_id)
			$result = $this->site->query_binding("SELECT count(id) current_ideal_thana from sma_thana WHERE is_ideal_thana = 1 AND ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) AND  branch_id = ?  ", array($branch_id));
		else
			$result = $this->site->query("SELECT count(id) current_ideal_thana from sma_thana WHERE is_ideal_thana = 1 AND ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ");



		return isset($result[0]['current_ideal_thana']) ? $result[0]['current_ideal_thana'] : 0;
	}




	function unit_increase_decrease2($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{


		if ($branch_id)
			$result = $this->site->query_binding("SELECT SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease from sma_organization_record WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
		else
			$result = $this->site->query_binding("SELECT  SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease  from sma_organization_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));



		return $result;
	}



	function unit_increase_decrease($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{


		if ($branch_id)
			$result = $this->site->query_binding("SELECT SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease from sma_institution_unit WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
		else
			$result = $this->site->query_binding("SELECT  SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease  from sma_institution_unit WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));



		return $result;
	}



	function org_thana_ward_unit($start_date, $end_date, $branch_id = NULL)
	{
		//	select  count(id),  org_type,in_out,`level` from `sma_thana` where is_pending = 2 group by org_type, in_out, `level`

		if ($branch_id)
			$result = $this->site->query_binding("SELECT COUNT(sma_thana_log.id) org_count , org_type,sma_thana_log.in_out,sma_thana_log.`level`  
			FROM sma_thana_log LEFT JOIN sma_thana ON sma_thana.id = sma_thana_log.thana_id
			 WHERE  sma_thana.branch_id = ? AND sma_thana_log.`date` BETWEEN ? AND ?  GROUP BY org_type, sma_thana_log.in_out, sma_thana_log.`level`", array($branch_id, $start_date, $end_date));
		else
			$result = $this->site->query_binding("SELECT COUNT(sma_thana_log.id) org_count , org_type,sma_thana_log.in_out,sma_thana_log.`level`  
			FROM sma_thana_log LEFT JOIN sma_thana ON sma_thana.id = sma_thana_log.thana_id
			 WHERE sma_thana_log.`date` BETWEEN ? AND ?  GROUP BY org_type, sma_thana_log.in_out, sma_thana_log.`level`", array($start_date, $end_date));

		return $result;
	}




	function getorganizationinfo_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result = $this->site->query_binding("SELECT * from sma_organizationinfo_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));
		else
			$result = $this->site->query_binding("SELECT * from sma_organizationinfo_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}



	function getEntryOrganizationInfo($report_type_get, $organizationinfos, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		if ($report_type_get['is_current'] != false && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type = ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$organizationinfo_recordinfo = $this->site->getOneRecord('organizationinfo_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$organizationinfo_recordinfo) {

				foreach ($organizationinfos as $organizationinfo)
					if ($organizationinfo->id > 4)
						$this->site->insertData('organizationinfo_record', array('organizationinfo_id' => $organizationinfo->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}







		$organizationinfo_recordinfo = $this->site->getOneRecord('organizationinfo_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);





		return array(
			'organizationinfo_recordinfo' => $organizationinfo_recordinfo
		);
	}






	function getorganizationinfo_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{



		if ($branch_id) {
			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result = $this->site->query_binding("SELECT * from sma_organizationinfo_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT  `organizationinfo_id`,SUM(`institutional_increase`)  institutional_increase, SUM(`institutional_decrease`) institutional_decrease, SUM(`residential_increase`) residential_increase , SUM(`residential_decrease`) residential_decrease, SUM(id) id from sma_organizationinfo_record WHERE   branch_id = ? AND date BETWEEN ? AND ? GROUP BY organizationinfo_id", array($branch_id, $start_date, $end_date));
		} else {

			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result = $this->site->query_binding("SELECT * from sma_organizationinfo_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result = $this->site->query_binding("SELECT  `organizationinfo_id`,SUM(`institutional_increase`)  institutional_increase, SUM(`institutional_decrease`) institutional_decrease, SUM(`residential_increase`) residential_increase , SUM(`residential_decrease`) residential_decrease, SUM(id) id from sma_organizationinfo_record WHERE   date BETWEEN ? AND ? GROUP BY organizationinfo_id", array($start_date, $end_date));
		}


		return $result;
	}


	function getthanainfo_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{



		if ($branch_id) {

			$result = $this->site->query_binding("select 
 			SUM(  case  WHEN sma_thana_log.in_out = 1 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_increase, 
			SUM(  CASE  WHEN sma_thana_log.in_out = 1 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_increase,
			
			SUM(  case  WHEN sma_thana_log.in_out = 2 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_decrease,
			SUM(  CASE  WHEN sma_thana_log.in_out = 2 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_decrease
			
			from   `sma_thana_log` 
			left join `sma_thana` on sma_thana.id = sma_thana_log.thana_id
			where is_pending = 2 AND sma_thana_log.branch_id = ? AND sma_thana_log.date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
		} else {

			$result = $this->site->query_binding("select 
				SUM(  case  WHEN sma_thana_log.in_out = 1 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_increase, 
			   SUM(  CASE  WHEN sma_thana_log.in_out = 1 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_increase,
			   
			   SUM(  case  WHEN sma_thana_log.in_out = 2 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_decrease,
			   SUM(  CASE  WHEN sma_thana_log.in_out = 2 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_decrease
			   
			   from   `sma_thana_log` 
			   left join `sma_thana` on sma_thana.id = sma_thana_log.thana_id
			   where is_pending = 2 AND   sma_thana_log.date BETWEEN ? AND ? ", array($start_date, $end_date));
		}


		return $result;
	}


	function getidealthanainfo_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{



		if ($branch_id) {

			$result = $this->site->query_binding("select 
			SUM( case WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_increase, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_increase, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Departmental' THEN 1 ELSE 0 END ) departmental_increase,
			SUM( case WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_decrease, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_decrease,
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Departmental' THEN 1 ELSE 0 END ) departmental_decrease 
			
			from `sma_thana_ideal_log` left join `sma_thana` on sma_thana.id = sma_thana_ideal_log.thana_id 
			where sma_thana.is_pending = 2 AND sma_thana_ideal_log.is_pending = 2  
			 AND sma_thana_ideal_log.branch_id = ? AND   sma_thana_ideal_log.date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
		} else {

			$result = $this->site->query_binding("select 
			SUM( case WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_increase, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_increase,
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 1 AND sma_thana.org_type = 'Departmental' THEN 1 ELSE 0 END ) departmental_increase, 
			SUM( case WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Residential' THEN 1 ELSE 0 END ) residential_decrease, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Institutional' THEN 1 ELSE 0 END ) institutional_decrease, 
			SUM( CASE WHEN sma_thana_ideal_log.in_out = 2 AND sma_thana.org_type = 'Departmental' THEN 1 ELSE 0 END ) departmental_decrease
			
			from `sma_thana_ideal_log` left join `sma_thana` on sma_thana.id = sma_thana_ideal_log.thana_id 
			where sma_thana.is_pending = 2 AND sma_thana_ideal_log.is_pending = 2  
			 AND  sma_thana_ideal_log.date BETWEEN ? AND ? ", array($start_date, $end_date));
		}


		return $result;
	}



	function administration($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);
		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/administration/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/administration/' . $this->session->userdata('branch_id'));
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

		$this->data['administrations'] = $this->others_model->getAllAdministration();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryAdministrationInfo($report_type_get, $this->data['administrations'], $branch_id);
		} else
			$this->data['detailinfo'] = '';





		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['administration_summary'] = $this->getadministration_summary($branch_id, $report_type_get);

		$this->data['nor_org'] = $this->get_no_org($branch_id);

		//$this->sma->print_arrays($this->data['administration_summary']);




		$this->data['prev'] = $this->administrative_details_prev('annual', $report_type_get['last_year'], $branch_id);

		$org_info = $this->administrative_org_info($branch_id);




		$this->data['org_info'] = $org_info;




		//$this->sma->print_arrays($org_info);

		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administration'));
		$meta = array('page_title' => 'Administration', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('others/administration_entry', $meta, $this->data, 'leftmenu/organization');
		} else
			$this->page_construct('others/administration', $meta, $this->data, 'leftmenu/organization');
	}






	function administrative_area_list($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);
		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/administrative_area_list/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/administrative_area_list/' . $this->session->userdata('branch_id'));
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





		//$this->sma->print_arrays($this->data['prev']);

		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'প্রশাসনিক এলাকা'));
		$meta = array('page_title' => 'প্রশাসনিক এলাকা', 'bc' => $bc);



		$this->page_construct('others/administrative_area_list', $meta, $this->data, 'leftmenu/organization');
	}





	function getArea($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);

		if ((!$this->Owner || !$this->Admin)) {  // && !$branch_id
			$user = $this->site->getUser();
			$branch_id = $user->branch_id;
		}




		$delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_area") . "</b>' data-content=\"<p>"
			. lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('others/areadelete/$1') . "'>"
			. lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
			. lang('delete_area') . "</a>";

		$action = '<div class="text-center"><div class="btn-group text-left">'
			. '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
			. lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a   href="' . admin_url('others/areaedit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_area') . '</a></li>';

		$action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';






		$this->load->library('datatables');

		if ($branch_id) {

			$this->datatables
				->select($this->db->dbprefix('administrative_area') . ".id as areaid,    {$this->db->dbprefix('branches')}.name as branch_name,  v3_district_upazila(district_id) ,v3_district_upazila(thana_upazila_id) ,v3_district_upazila(pourashava_union_id) ,v3_district_upazila(ward_id) ", FALSE)
				->from('administrative_area');

			$this->datatables->join('branches', 'branches.id=administrative_area.branch_id', 'left')
				->where('branches.id', $branch_id);
		} else {
			$this->datatables
				->select($this->db->dbprefix('administrative_area') . ".id as areaid,    {$this->db->dbprefix('branches')}.name as branch_name,  v3_district_upazila(district_id) ,v3_district_upazila(thana_upazila_id) ,v3_district_upazila(pourashava_union_id) ,v3_district_upazila(ward_id) ", FALSE)
				->from('administrative_area');

			$this->datatables->join('branches', 'branches.id=administrative_area.branch_id', 'left');
		}



		$this->datatables->add_column("Actions", $action, "areaid");

		echo $this->datatables->generate();
	}




	function add_administrative_area()
	{


		$this->load->admin_model('organization_model');
		$this->sma->checkPermissions('index', TRUE);
		$this->load->helper('security');
		$branches = $this->site->getAllBranches();

		$this->form_validation->set_rules('district', 'district', 'required');
		$this->form_validation->set_rules('upazila', 'upazila/thana', 'required');
		$this->form_validation->set_rules('union', 'union/pouroshova', 'required');
		$this->form_validation->set_rules('ward', 'ward', 'required');
		$this->form_validation->set_rules('branch_id', 'branch', 'required');


		// $this->sma->print_arrays($this->input->post());




		if ($this->form_validation->run() == true) {
			$data = array(
				// 'date' =>  $this->sma->fsd($this->input->post('date')),
				'branch_id' => $this->input->post('branch_id'),
				'district_id' => $this->input->post('district'),
				'thana_upazila_id' => $this->input->post('upazila'),
				'pourashava_union_id' => $this->input->post('union'),
				'ward_id' => $this->input->post('ward'),
				'date' => date('Y-m-d'),
				'user_id' => $this->session->userdata('user_id')

			);

			$union_Pourashava_type = $this->site->getcolumn('district','zone_type',['id'=>$this->input->post('union')]);
			$thana_upozilla_type = $this->site->getcolumn('district','zone_type',['id'=>$this->input->post('upazila')]);

			$data['union_Pourashava_type'] = $union_Pourashava_type;
			$data['thana_upozilla_type'] = $thana_upozilla_type;
			//function getcolumn($table, $item = "*", $where1 = null, $order = null, $limit = null, $offset = null)
    
			//union_Pourashava_type   thana_upozilla_type
			//

			//$this->sma->print_arrays($data);
			$this->site->insertData('administrative_area', $data, 'id');



			$this->session->set_flashdata('message', 'Area Successfully Added.');
			admin_redirect('others/administrative_area_list');
		} else {
			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


			$this->data['branches'] = $this->site->getAllBranches();

			if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

				$this->data['branch_id'] = NULL;
				$this->data['branch'] = NULL;
			} else {

				$this->data['branch_id'] = $this->session->userdata('branch_id');
				$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
			}


			$this->data['districts'] = $this->site->getDistrict();


			$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('প্রশাসনিক এলাকা')));
			$meta = array('page_title' => lang('প্রশাসনিক এলাকা '), 'bc' => $bc);


			$this->page_construct('others/add_administrative_area', $meta, $this->data, 'leftmenu/organization');
		}
	}








	function administrative_details_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result = $this->site->query_binding("SELECT SUM(organization)  as organization,  SUM(administration)  as administration,  administration_id from sma_administration_record_calculated WHERE  branch_id = ? AND  calculated_year = ? group by  administration_id", array($branch_id, $year)); //`report_type` = ? AND $report_type,
		else
			$result = $this->site->query_binding("SELECT SUM(organization)  as organization,  SUM(administration)  as administration, administration_id  from sma_administration_record_calculated WHERE  calculated_year = ?  group by administration_id", array($year));   //`report_type` = ? AND $report_type,


		return $result;
	}


	function administrative_org_info($branch_id = NULL)
	{
		if ($branch_id)
			$result = $this->site->query("SELECT 
 `level`,
  
SUM(upazila_COUNT)  count_1 ,
SUM(thana_count)  count_7,
SUM(pourosova_count) count_2,
SUM(union_count) count_3 ,
SUM(cityward_count) count_4,
SUM(pouroward_count) count_5,
SUM(unionward_count)  count_6
  FROM (


SELECT 
    `level`, 0 upazila_COUNT,
      
    COUNT(*) AS thana_count, 0 pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        upazila,
        MIN(`level`) AS `level`
    FROM (SELECT 
DISTINCT
upazila,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.upazila

 WHERE  sma_thana.branch_id = $branch_id AND  sma_district.`level` = 2 AND sma_district.zone_type = 1
 AND  upazila IN (
 SELECT DISTINCT `thana_upazila_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 
 )a
    GROUP BY upazila
) AS subquery
GROUP BY LEVEL
  

UNION ALL 
 

SELECT 
    `level`,
     
    COUNT(*) AS upazila_COUNT, 0 thana_count, 0 pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        upazila,
        MIN(`level`) AS `level`
    FROM (SELECT 
DISTINCT
upazila,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.upazila

 WHERE    sma_thana.branch_id = $branch_id AND sma_district.`level` = 2 AND sma_district.zone_type = 2
 AND  upazila IN (
 SELECT DISTINCT `thana_upazila_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 
 )a
    GROUP BY upazila
) AS subquery
GROUP BY LEVEL
 
 

UNION ALL 
 

SELECT 
    `level`,
  
    0 upazila_COUNT, 0 thana_count,  COUNT(*) AS pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `union`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`union`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.union

 WHERE   sma_thana.branch_id = $branch_id AND  sma_district.`level` = 3 AND sma_district.zone_type = 1
 AND  `union` IN (
 SELECT DISTINCT `pourashava_union_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 
 )a
    GROUP BY `union`
) AS subquery
GROUP BY LEVEL
 

UNION ALL 
 

SELECT 
    `level`,
   
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, COUNT(*)  union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `union`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`union`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.union

 WHERE   sma_thana.branch_id = $branch_id AND  sma_district.`level` = 3 AND sma_district.zone_type = 2
 AND  `union` IN (
 SELECT DISTINCT `pourashava_union_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 )a
    GROUP BY `union`
) AS subquery
GROUP BY LEVEL
 


UNION ALL 



SELECT 
    `level`,
    
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, COUNT(*) cityward_count, 0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE  sma_thana.branch_id = $branch_id AND   sma_district.`level` = 4 AND sma_district.zone_type = 1
 AND  `ward` IN (
 SELECT DISTINCT `ward_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 )a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL


UNION ALL 

SELECT 
    `level`,
   
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, 0 cityward_count, COUNT(*) pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE  sma_thana.branch_id = $branch_id AND   sma_district.`level` = 4 AND sma_district.zone_type = 3
  AND  `ward` IN (
 SELECT DISTINCT `ward_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 )a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL


UNION ALL 

SELECT 
    `level`,
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, 0 cityward_count,  0 pouroward_count, COUNT(*) unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE   sma_thana.branch_id = $branch_id AND  sma_district.`level` = 4 AND sma_district.zone_type = 2
  AND  `ward` IN (
 SELECT DISTINCT `ward_id` FROM `sma_administrative_area` WHERE `branch_id` = $branch_id
 )
 )a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL
) c  GROUP BY `level`");
		else
			$result = $this->site->query("SELECT 
 `level`,
  
SUM(upazila_COUNT)  count_1 ,
SUM(thana_count)  count_7,
SUM(pourosova_count) count_2,
SUM(union_count) count_3 ,
SUM(cityward_count) count_4,
SUM(pouroward_count) count_5,
SUM(unionward_count)  count_6
  FROM (


SELECT 
    `level`, 0 upazila_COUNT,
      
    COUNT(*) AS thana_count, 0 pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        upazila,
        MIN(`level`) AS `level`
    FROM (SELECT 
DISTINCT
upazila,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.upazila

 WHERE    sma_district.`level` = 2 AND sma_district.zone_type = 1)a
    GROUP BY upazila
) AS subquery
GROUP BY LEVEL
  

UNION ALL 
 

SELECT 
    `level`,
     
    COUNT(*) AS upazila_COUNT, 0 thana_count, 0 pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        upazila,
        MIN(`level`) AS `level`
    FROM (SELECT 
DISTINCT
upazila,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.upazila

 WHERE    sma_district.`level` = 2 AND sma_district.zone_type = 2)a
    GROUP BY upazila
) AS subquery
GROUP BY LEVEL
 
 

UNION ALL 
 

SELECT 
    `level`,
  
    0 upazila_COUNT, 0 thana_count,  COUNT(*) AS pourosova_count, 0 union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `union`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`union`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.union

 WHERE    sma_district.`level` = 3 AND sma_district.zone_type = 1)a
    GROUP BY `union`
) AS subquery
GROUP BY LEVEL
 

UNION ALL 
 

SELECT 
    `level`,
   
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, COUNT(*)  union_count, 0 cityward_count,  0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `union`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`union`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.union

 WHERE    sma_district.`level` = 3 AND sma_district.zone_type = 2)a
    GROUP BY `union`
) AS subquery
GROUP BY LEVEL
 


UNION ALL 



SELECT 
    `level`,
    
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, COUNT(*) cityward_count, 0 pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE    sma_district.`level` = 4 AND sma_district.zone_type = 1)a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL


UNION ALL 

SELECT 
    `level`,
   
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, 0 cityward_count, COUNT(*) pouroward_count, 0 unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE    sma_district.`level` = 4 AND sma_district.zone_type = 3)a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL


UNION ALL 

SELECT 
    `level`,
    0 upazila_COUNT, 0 thana_count,  0 pourosova_count, 0  union_count, 0 cityward_count,  0 pouroward_count, COUNT(*) unionward_count
FROM (
    SELECT 
        `ward`,
        MIN(`level`) AS `level`
    FROM (
    SELECT 
DISTINCT
`ward`,

sma_thana.`level`  
FROM `sma_thana`
INNER JOIN sma_district ON sma_district.id = sma_thana.ward

 WHERE    sma_district.`level` = 4 AND sma_district.zone_type = 2)a
    GROUP BY `ward`
) AS subquery
GROUP BY LEVEL
) c  GROUP BY `level`");

		return $result;
	}


	function getadministration_summary($branch_id = NULL, $reportinfo = null)
	{

		//$this->sma->print_arrays($reportinfo);

		$report_start = $reportinfo['start'];
		$report_end = $reportinfo['end'];
		$report_type = $reportinfo['type'];
		$report_year = $reportinfo['year'];
		$last_half = $reportinfo['last_half'];


		if ($branch_id) {


			if ($report_type == 'half_yearly' || $last_half)
				$result = $this->site->query_binding("SELECT * from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
			else if ($report_type == 'annual') {

				$result = $this->site->query_binding("SELECT  administration_id,  SUM(`administrative_increase`) administrative_increase,  SUM(`administrative_decrease`) administrative_decrease, SUM(`organization_increase`) organization_increase,SUM(`organization_decrease`) organization_decrease, SUM(id) id from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY administration_id", array($branch_id, $report_start, $report_end));


				//last half
				$result2 = $this->site->query_binding("SELECT  administration_id, SUM(`branch`) branch,   SUM(`thana`) thana,SUM(`ward`) ward,SUM(`unit`) unit,SUM(`supporter_org`) supporter_org from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY administration_id", array($branch_id, $reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));

				$merged = array_replace_recursive($result, $result2);

				$result = $merged;
			}
		} else {


			if ($report_type == 'half_yearly' || $last_half)
				$result = $this->site->query_binding("SELECT * from sma_administration_record WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
			else if ($report_type == 'annual') {

				$result = $this->site->query_binding("SELECT  administration_id,  SUM(`administrative_increase`) administrative_increase,  SUM(`administrative_decrease`) administrative_decrease, SUM(`organization_increase`) organization_increase,SUM(`organization_decrease`) organization_decrease, SUM(id) id from sma_administration_record WHERE date BETWEEN ? AND ? GROUP BY administration_id", array($report_start, $report_end));


				//last half
				$result2 = $this->site->query_binding("SELECT  administration_id, SUM(`branch`) branch,   SUM(`thana`) thana,SUM(`ward`) ward,SUM(`unit`) unit,SUM(`supporter_org`) supporter_org from sma_administration_record WHERE  date BETWEEN ? AND ? GROUP BY administration_id", array($reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));

				$merged = array_replace_recursive($result, $result2);

				$result = $merged;
			}
		}

		//$this->sma->print_arrays($result);
		return $result;
	}



	function getadministration_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result = $this->site->query_binding("SELECT * from sma_administration_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));
		else
			$result = $this->site->query_binding("SELECT * from sma_administration_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}



	function get_no_org($branch_id = NULL)
	{

		if ($branch_id)
			$result = $this->site->query_binding("SELECT COUNT(id) as total, administration_id from sma_administration_without_org WHERE   branch_id = ?  GROUP BY administration_id ", array($branch_id));
		else
			$result = $this->site->query("SELECT COUNT(id) as total, administration_id from sma_administration_without_org GROUP BY administration_id");



		return $result;
	}













	function getEntryAdministrationInfo($report_type_get, $administrations, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type = ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';

			$administration_recordinfo = $this->site->getOneRecord('administration_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$administration_recordinfo) {

				foreach ($administrations as $administration)
					$this->site->insertData('administration_record', array('administration_id' => $administration->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}









		if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
			/*$administration_recordinfo = $this->site->query_binding('SELECT administration_id,SUM(organization_increase) organization_increase, SUM(organization_decrease) organization_decrease, SUM(thana) thana, SUM(ward) ward, SUM(unit) unit, SUM(supporter_org) supporter_org,  SUM(prev) prev, SUM(org_number) org_number,SUM(id) id FROM sma_administration_record GROUP BY administration_id',array($branch_id,$end,$start));	
			 */
			// it seems no need this part
		} else {
			// $administration_recordinfo = $this->site->getOneRecord('administration_record','*',array('branch_id'=>$branch_id,'date <= '=>$report_end,'date >= '=>$report_start),'id desc',1,0);
		}




		return array(
			'administration_recordinfo' => $administration_recordinfo
		);
	}









	function administrationbutorg($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/administrationbutorg/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/administrationbutorg/' . $this->session->userdata('branch_id'));
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


		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Area without org'));
		$meta = array('page_title' => 'Area without org', 'bc' => $bc);
		$this->page_construct('others/administrationbutorg', $meta, $this->data, 'leftmenu/organization');
	}








	function getAdministration($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);

		if ((!$this->Owner || !$this->Admin) && !$branch_id) {
			$user = $this->site->getUser();
			$branch_id = $user->branch_id;
		}

		$delete_link = "<a href='#' class='tip po' title='<b>" . "Delete" . "</b>' data-content=\"<p>"
			. lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('others/delete/$1') . "'>"
			. lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
			. "Delete" . "</a>";

		$edit_link = anchor('admin/others/editadministration/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');



		$action = '<div class="text-center"><div class="btn-group text-left">'
			. '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
			. lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

		$action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
			<li>' . $edit_link . '</li>
            </ul>
        </div></div>';




		$this->load->library('datatables');

		if ($branch_id) {

			$this->datatables
				->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
				->from('administration_without_org');
			$this->datatables->join('administration', 'administration_without_org.administration_id=administration.id', 'left');
			$this->datatables->join('branches', 'branches.id=administration_without_org.branch_id', 'left')
				->where('branches.id', $branch_id);
		} else {
			$this->datatables
				->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
				->from('administration_without_org');
			$this->datatables->join('administration', 'administration_without_org.administration_id=administration.id', 'left');
			$this->datatables->join('branches', 'branches.id=administration_without_org.branch_id', 'left');
		}








		$this->datatables->add_column("Actions", $action, "id");

		echo $this->datatables->generate();
	}


	function administrationexport($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);

		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$branch_id = $branch_id;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}


		$this->db->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
			->from('administration_without_org')
			->join('administration', 'administration_without_org.administration_id=administration.id', 'left')

			->join('branches', 'branches.id=administration_without_org.branch_id', 'left')
			->order_by('administration_without_org.id ASC');



		if ($branch_id)
			$this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);




		$q = $this->db->get();

		if ($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
		} else {
			$data = NULL;
		}


		if (!empty($data)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Associate Increase list');





			$this->excel->getActiveSheet()->mergeCells('A1:G1');
			$this->excel->getActiveSheet()->mergeCells('A2:G2');
			$this->excel->getActiveSheet()->mergeCells('A3:G3');
			$this->excel->getActiveSheet()->mergeCells('A4:G4');
			$this->excel->getActiveSheet()->mergeCells('A5:G5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'Administration without org');
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch ? $branch->name : lang('all_branches')));

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold(true);





			$this->excel->getActiveSheet()->SetCellValue('A6', 'Sr');
			$this->excel->getActiveSheet()->SetCellValue('B6', lang('name'));
			$this->excel->getActiveSheet()->SetCellValue('C6', lang('ধরণ'));

			$this->excel->getActiveSheet()->SetCellValue('D6', 'Branch');
			$this->excel->getActiveSheet()->SetCellValue('E6', 'Notes');

			$row = 7;

			foreach ($data as $key => $data_row) {


				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->administration_name);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->administration_type);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->branch_name);
				$this->excel->getActiveSheet()->SetCellValue('E' . $row, strip_tags($data_row->notes));
				$row++;
			}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C2:E' . $row)->getAlignment()->setWrapText(true);
			$filename = 'administrationwithoutorg';
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}
		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	/* ------------------------------------------------------- */

	function addadministration($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/addadministration/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/addadministration/' . $this->session->userdata('branch_id'));
		}






		$this->form_validation->set_rules('branch_id', lang("branch"), 'required');
		$this->form_validation->set_rules('administration_name', 'Name', 'required');
		$this->form_validation->set_rules('administration_id', 'Type', 'required');



		if ($this->form_validation->run() == true) {


			$is_changeable = $this->site->check_confirm($this->input->post('branch_id'), date('Y-m-d'));

			if ($is_changeable == false) {
				$this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
				redirect($_SERVER["HTTP_REFERER"]);
			}


			$data = array(
				'administration_name' => $this->input->post('administration_name'),
				'administration_id' => $this->input->post('administration_id'),
				'user_id' => $this->session->userdata('user_id'),
				'branch_id' => $this->input->post('branch_id'),
				'notes' => $this->input->post('notes')
			);
		} elseif ($this->input->post('orgadministration')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('others/admnistrationbutorg/' . $branch_id);
		}

		if ($this->form_validation->run() == true && $this->others_model->addAdministration($data)) {

			$this->session->set_flashdata('message', 'Added successfully');
			admin_redirect("others/administrationbutorg/" . $branch_id);
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();

			$this->data['branch_id'] = $branch_id;
			$this->data['administrations'] = $this->others_model->getAllAdministration();

			$this->load->view($this->theme . 'others/administrationentry', $this->data);
		}
	}





	function editadministration($id = NULL)
	{


		$this->sma->checkPermissions('index', TRUE);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		$administration_without_org_details = $this->site->getByID('administration_without_org', 'id', $id);


		$this->form_validation->set_rules('administration_name', 'Name', 'required');
		$this->form_validation->set_rules('administration_id', 'Type', 'required');



		if ($this->form_validation->run() == true) {
			$data = array(
				'administration_name' => $this->input->post('administration_name'),
				'administration_id' => $this->input->post('administration_id'),
				'user_id' => $this->session->userdata('user_id'),

				'notes' => $this->input->post('notes')
			);
		} elseif ($this->input->post('edit_administration')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('others/administrationbutorg');
		}

		if ($this->form_validation->run() == true && $this->site->updateData('administration_without_org', $data, array('id' => $id))) {

			$this->session->set_flashdata('message', 'Updated successfully');
			admin_redirect("others/administrationbutorg");
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();

			$this->data['administration'] = $administration_without_org_details;



			$this->data['administrations'] = $this->others_model->getAllAdministration();


			$this->load->view($this->theme . 'others/administrationedit', $this->data);
		}
	}





	function delete($id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if (!($this->Owner || $this->Admin))
			$where = array('id' => $id, 'branch_id' => $this->session->userdata('branch_id'));
		else if ($this->Owner || $this->Admin)
			$where = array('id' => $id);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		if ($this->site->delete('administration_without_org', $where)) {
			if ($this->input->is_ajax_request()) {
				$this->sma->send_json(array('error' => 0, 'msg' => 'Area Deleted'));
			}
			$this->session->set_flashdata('message', 'Area Deleted');
			admin_redirect('welcome');
		}
	}


	function areadelete($id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if (!($this->Owner || $this->Admin))
			$where = array('id' => $id, 'branch_id' => $this->session->userdata('branch_id'));
		else if ($this->Owner || $this->Admin)
			$where = array('id' => $id);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		if ($this->site->delete('administrative_area', $where)) {
			if ($this->input->is_ajax_request()) {
				$this->sma->send_json(array('error' => 0, 'msg' => 'Area Deleted'));
			}
			$this->session->set_flashdata('message', 'Area Deleted');
			admin_redirect('others/administrative_area_list' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
		}
	}



	function areaedit($id = NULL)
	{


		$this->sma->checkPermissions('index', TRUE);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		$administrativearea = $this->site->getByID('administrative_area', 'id', $id);

		if ($this->Owner || $this->Admin) {
			$branch_id = $this->input->post('branch_id');
			$where = array('id' => $id);

		} else {
			$branch_id = $this->session->userdata('branch_id');
			$where = array('id' => $id, 'branch_id' => $branch_id);

		}


		$this->form_validation->set_rules('district', 'district', 'required');
		$this->form_validation->set_rules('upazila', 'upazila/thana', 'required');
		$this->form_validation->set_rules('union', 'union/pouroshova', 'required');
		$this->form_validation->set_rules('ward', 'ward', 'required');
		$this->form_validation->set_rules('branch_id', 'branch', 'required');



		if ($this->form_validation->run() == true) {
			$data = array(


				'branch_id' => $this->input->post('branch_id'),
				'district_id' => $this->input->post('district'),
				'thana_upazila_id' => $this->input->post('upazila'),
				'pourashava_union_id' => $this->input->post('union'),
				'ward_id' => $this->input->post('ward')
			);


			$union_Pourashava_type = $this->site->getcolumn('district','zone_type',['id'=>$this->input->post('union')]);
			$thana_upozilla_type = $this->site->getcolumn('district','zone_type',['id'=>$this->input->post('upazila')]);

			$data['union_Pourashava_type'] = $union_Pourashava_type;
			$data['thana_upozilla_type'] = $thana_upozilla_type;

		} elseif ($this->input->post('edit_administrative_area')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('others/administrative_area_list' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
		}

		if ($this->form_validation->run() == true && $this->site->updateData('administrative_area', $data, $where)) {

			$this->session->set_flashdata('message', 'Updated successfully');
			admin_redirect("others/administrative_area_list" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			//$this->data['modal_js'] = $this->site->modal_js();

			$this->data['administrativearea'] = $administrativearea;

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


			$this->data['districts'] = $this->site->getDistrict();
			$selected_thana = $this->site->getByID('district', 'id', $administrativearea->thana_upazila_id);
			$this->data['thanas'] = $this->site->getDistrict(2, $selected_thana->parent_id);
			$selected_union = $this->site->getByID('district', 'id', $administrativearea->pourashava_union_id);
			$this->data['unions'] = $this->site->getDistrict(3, $selected_union->parent_id);
			$selected_ward = $this->site->getByID('district', 'id', $administrativearea->ward_id);

			if ($selected_ward)
				$this->data['wards'] = $this->site->getDistrict(4, $selected_ward->parent_id);
			else
				$this->data['wards'] = $this->site->getDistrict(4, $selected_union->id);

			// $this->sma->print_arrays($this->data['wards']);


			$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Area Edit'));
			$meta = array('page_title' => 'Area Edit', 'bc' => $bc);
			$this->page_construct('others/edit_administrative_area', $meta, $this->data, 'leftmenu/organization');
		}
	}
}
