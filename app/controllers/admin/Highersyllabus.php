<?php defined('BASEPATH') or exit('No direct script access allowed');

class Highersyllabus extends MY_Controller
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
		$this->load->admin_model('highersyllabus_model');
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
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;

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

		$this->data['highersyllabuss'] = $this->highersyllabus_model->getAllHigherSyllabus();


		if ($branch_id) {
			$this->data['detailinfo'] = '';
		} else
			$this->data['detailinfo'] = '';






		$this->data['highersyllabus_summary'] = $this->gethighersyllabus_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);
		$this->data['highersyllabusinfo_summary'] = $this->gethighersyllabusinfo_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);



		//$this->data['member_summary'] = $this->getmember_summary($report_type['type'],$last_year,$branch_id);	 


		$this->data['current_member'] = $this->site->allmembernumber($branch_id);
		//$this->sma->print_arrays($this->data['org_summary']);



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Higher Syllabus'));
		$meta = array('page_title' => 'Higher Syllabus', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('highersyllabus/index_entry', $meta, $this->data, 'leftmenu/training');
		} else
			$this->page_construct('highersyllabus/index', $meta, $this->data, 'leftmenu/training');
	}



	function export($branch_id)
	{
		$this->sma->checkPermissions();

		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		}

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$report_info = $report_type;

		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$branch_id = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$highersyllabuss = $this->highersyllabus_model->getAllHigherSyllabus();


		if ($branch_id) {
			$detailinfo = '';
		} else
			$detailinfo = '';






		$highersyllabus_summary = $this->gethighersyllabus_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);
		$highersyllabusinfo_summary = $this->gethighersyllabusinfo_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);



		//$this->data['member_summary'] = $this->getmember_summary($report_type['type'],$last_year,$branch_id);	 


		$current_member = $this->site->allmembernumber($branch_id);

		if (!empty($highersyllabuss)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Libraby');




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
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' উচ্চতর সিলেবাস  রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));







			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




			$this->excel->getActiveSheet()->getStyle('A6:I6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A6', 'নং');
			$this->excel->getActiveSheet()->SetCellValue('B6', 'বিষয়ের নাম');
			$this->excel->getActiveSheet()->SetCellValue('C6', 'কতজন অধ্যয়ন করেছেন');
			$this->excel->getActiveSheet()->SetCellValue('D6', 'কতটি বই অধ্যয়ন করেছেন');


			$row = 8;
			$total_book = 0;

			foreach ($highersyllabuss as $key => $highersyllabus) {
				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $highersyllabus->highersyllabus_name);
				$row_info = record_row($highersyllabus_summary, 'highersyllabus_id', $highersyllabus->id);
				$reader_number = $row_info['reader_number'];
				$total_book += $row_info['book_number'];

				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['reader_number']=='' ? 0 : $row_info['reader_number']);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, $row_info['book_number']=='' ? 0 : $row_info['book_number']);



				$row++;
			}

			$this->excel->getActiveSheet()->mergeCells('A'.$row.':C'.$row);
			$this->excel->getActiveSheet()->SetCellValue('A'.$row, 'মোট বই অধ্যয়ন');
			$this->excel->getActiveSheet()->SetCellValue('D'.$row, $total_book);
			 
			$row++;
			$row++;


			//

			



			$this->excel->getActiveSheet()->getStyle('A'.$row.':I'.$row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A'.$row, 'মোট সদস্য');
			$this->excel->getActiveSheet()->SetCellValue('B'.$row, 'কতজন অধ্যয়ন করেছেন');
			$this->excel->getActiveSheet()->SetCellValue('C'.$row, 'কতটি বই');
			$this->excel->getActiveSheet()->SetCellValue('D'.$row, 'গড় বই');
			$row++;

			$this->excel->getActiveSheet()->SetCellValue('A'.$row, $current_member->member);
			$total_reader = isset($highersyllabusinfo_summary[0]['total_reader']) ? $highersyllabusinfo_summary[0]['total_reader'] : 0;
 
			$this->excel->getActiveSheet()->SetCellValue('B'.$row, $total_reader);
			$this->excel->getActiveSheet()->SetCellValue('C'.$row, $total_book);
			$this->excel->getActiveSheet()->SetCellValue('D'.$row, ($total_reader!=0) ? round($total_book/$total_reader,2) : 0);


			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

			$filename = 'highersyllabus_' . $branch->name . '_' . $this->input->get('year');

			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}




		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}

	function gethighersyllabus_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{

		$report_info =  $reportinfo['info'];


		//$this->sma->print_arrays($reportinfo);


		if ($branch_id) {

			if ($reportinfo['last_half'] || $report_type == 'half_yearly')  //($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly'
				$result =  $this->site->query_binding("SELECT * from sma_highersyllabus_record WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `highersyllabus_id`, SUM(`reader_number`) reader_number,SUM(`book_number`) book_number, SUM(id) id from sma_highersyllabus_record WHERE   branch_id = ? AND date BETWEEN ? AND ? GROUP BY highersyllabus_id ", array($branch_id, $reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));
		} else {
			if ($reportinfo['last_half'] || $report_type == 'half_yearly') //($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly'
				$result =  $this->site->query_binding("SELECT * from sma_highersyllabus_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `highersyllabus_id`, SUM(`reader_number`) reader_number,SUM(`book_number`) book_number, SUM(id) id from sma_highersyllabus_record WHERE   date BETWEEN ? AND ? GROUP BY highersyllabus_id ", array($reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));
		}


		return $result;
	}



	function gethighersyllabusinfo_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{


		$report_info =  $reportinfo['info'];


		//$this->sma->print_arrays($report_info->startdate_annual);





		if ($branch_id) {
			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result =  $this->site->query_binding("SELECT id, total_reader from sma_highersyllabusinfo_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT SUM(total_reader)  as total_reader, SUM(id) id from sma_highersyllabusinfo_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_info->startdate_annual, $report_info->enddate_annual));
		} else {
			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result =  $this->site->query_binding("SELECT SUM(total_reader)  as total_reader from sma_highersyllabusinfo_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT SUM(total_reader)  as total_reader from sma_highersyllabusinfo_record WHERE   date BETWEEN ? AND ? ", array($report_info->startdate_annual, $report_info->enddate_annual));
		}


		return $result;
	}













	function highersyllabuslist($branch_id = NULL)
	{



		if (!$this->Owner && !$this->Admin) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			redirect($_SERVER["HTTP_REFERER"]);
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


		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'বিষয়ের নাম'));
		$meta = array('page_title' => 'বিষয়ের নাম', 'bc' => $bc);
		$this->page_construct('highersyllabus/highersyllabuslist', $meta, $this->data, 'leftmenu/training');
	}








	function getHigherSyllabus($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);

		if ((!$this->Owner || !$this->Admin) && !$branch_id) {
			$user = $this->site->getUser();
			$branch_id = $user->branch_id;
		}

		$edit_link = anchor('admin/highersyllabus/edithighersyllabus/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');


		$action = '<div class="text-center"><div class="btn-group text-left">'
			. '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
			. lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

		$action .= '<li class="divider"></li>
            <li>' . $edit_link . '</li>
            </ul>
        </div></div>';




		$this->load->library('datatables');

		$this->datatables
			->select("id,  highersyllabus_name,  priority, is_active", FALSE)
			->from('highersyllabus');







		$this->datatables->add_column("Actions", $action, "id");

		echo $this->datatables->generate();
	}
























	function check_member($member_id, $branch)
	{


		$info = $this->site->getcolumn('postpone', 'id', array('manpower_id' => $member_id, 'orgstatus_id' => 1, 'end_date' => '2050-12-31', 'branch' => $branch), 'id DESC', 1, 0);


		if ($info != NULL) {
			$this->form_validation->set_message('check_member', 'Already postponed!');
			return false;
		} else {

			return true;
		}
	}




	/* ------------------------------------------------------- */

	function addhighersyllabus()
	{



		if (!$this->Owner && !$this->Admin) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			redirect($_SERVER["HTTP_REFERER"]);
		}

		$this->form_validation->set_rules('highersyllabus_name', 'Subject name', 'required');
		$this->form_validation->set_rules('priority', 'Priority', 'required');



		if ($this->form_validation->run() == true) {
			$data = array(
				'highersyllabus_name' => $this->input->post('highersyllabus_name'),
				'priority' => $this->input->post('priority'),
				'user_id' => $this->session->userdata('user_id'),
				'is_active' => $this->input->post('is_active')
			);
		} elseif ($this->input->post('highersyllabus')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('highersyllabus/highersyllabuslist');
		}

		if ($this->form_validation->run() == true && $this->highersyllabus_model->insertData('highersyllabus', $data)) {

			$this->session->set_flashdata('message', 'Added successfully');
			admin_redirect("highersyllabus/highersyllabuslist");
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();



			$this->load->view($this->theme . 'highersyllabus/highersyllabusentry', $this->data);
		}
	}







	function edithighersyllabus($id = NULL)
	{


		$this->sma->checkPermissions();



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		$highersyllabus_details = $this->site->getByID('highersyllabus', 'id', $id);


		$this->form_validation->set_rules('highersyllabus_name', 'Subject name', 'required');
		$this->form_validation->set_rules('priority', 'Priority', 'required');



		if ($this->form_validation->run() == true) {
			$data = array(
				'highersyllabus_name' => $this->input->post('highersyllabus_name'),
				'priority' => $this->input->post('priority'),
				'user_id' => $this->session->userdata('user_id'),
				'is_active' => $this->input->post('is_active')
			);
		} elseif ($this->input->post('edit_highersyllabus')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('highersyllabus/highersyllabuslist');
		}

		if ($this->form_validation->run() == true && $this->site->updateData('highersyllabus', $data, array('id' => $id))) {

			$this->session->set_flashdata('message', 'Added successfully');
			admin_redirect("highersyllabus/highersyllabuslist");
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();

			$this->data['highersyllabus'] = $highersyllabus_details;

			$this->load->view($this->theme . 'highersyllabus/edithighersyllabus', $this->data);
		}
	}











	function detailupdate()
	{


		$this->sma->checkPermissions('index', TRUE);


		$report_type = $this->report_type();
		$start = $report_type['start'];
		$end = $report_type['end'];
		$year = $report_type['year'];
		$cal_type = $report_type['type'];
		$report_info =  $report_type['info'];
		$flag = 1;
		$msg = "done";


		$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));



		if ($is_changeable) {
			if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
				$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
				$flag = 2;  //update
			} elseif ($this->input->get_post('branch_id') && $this->input->get_post('id') && $this->input->get_post('idname')) {
				$this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], 'report_year' => $year, $this->input->get_post('name') => $this->input->get_post('value'), $this->input->get_post('idname') => $this->input->get_post('id'),   'date' => date('Y-m-d')));
				$flag = 3;  //new entry

			}
		} else
			$msg = 'failed';


		echo json_encode(array('flag' => $flag, 'msg' => $msg));
		exit;
	}



	function detailupdateinfo()
	{

		$this->sma->checkPermissions('index', TRUE);

		$report_type = $this->report_type();
		$flag = 1;
		if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
			$flag = 2;  //update
		} elseif ($this->input->get_post('branch_id')) {
			$this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'),    'date' => date('Y-m-d')));
			$flag = 3;  //new entry

		}
		echo json_encode(array('flag' => $flag, 'msg' => ''));
		exit;
	}


	function export_old($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('highersyllabus/' . $this->session->userdata('branch_id'));
		}



		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branch_id'] = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {

			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}






		//$this->sma->print_arrays($this->data['branch']);

		$report_type = $this->report_type();



		if ($branch_id) {

			$this->db
				->select("reader_number,  book_number, {$this->db->dbprefix('highersyllabus')}.highersyllabus_name", FALSE)
				->from('highersyllabus_record');
			$this->db->join('highersyllabus', 'highersyllabus_record.highersyllabus_id=highersyllabus.id', 'left');
			$this->db->where('highersyllabus_record.branch_id', $branch_id);
			$this->db->where('highersyllabus_record.report_type', $report_type['type']);
			$this->db->where($this->db->dbprefix('highersyllabus_record') . '.date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
		} else {
			$this->db
				->select("SUM(reader_number) as reader_number, SUM(book_number) as book_number,   {$this->db->dbprefix('highersyllabus')}.highersyllabus_name", FALSE)
				->from('highersyllabus_record');
			$this->db->join('highersyllabus', 'highersyllabus_record.highersyllabus_id=highersyllabus.id', 'left');
			$this->db->where('highersyllabus_record.report_type', $report_type['type']);
			$this->db->where($this->db->dbprefix('highersyllabus_record') . '.date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
			$this->db->group_by('highersyllabus_record.highersyllabus_id');
		}







		//$this->sma->print_arrays($branch_id);



		$q = $this->db->get();
		//echo $this->db->last_query();
		if ($q->num_rows() > 0) {
			foreach (($q->result()) as $key => $row) {
				$data[] = $row;
			}
		} else {
			$data = NULL;
		}



		$last_year =  date("Y", strtotime("-1 year"));

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(`member`) as  member            
			FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type['type'], $branch_id, $last_year));

		else
			$result =  $this->site->query_binding("SELECT SUM(`member`) as  member  FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type['type'], $last_year));


		$total_reader_row =	$this->gethighersyllabusinfo_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id);


		$total_reader =	isset($total_reader_row[0]['total_reader']) ? $total_reader_row[0]['total_reader'] : 0;



		if (!empty($data)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Higher Syllabus');




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
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' উচ্চতর সিলেবাস: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));












			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




			$this->excel->getActiveSheet()->getStyle('A6:G6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A6', 'Serial');
			$this->excel->getActiveSheet()->SetCellValue('B6', 'Subject');
			$this->excel->getActiveSheet()->SetCellValue('C6', 'Reader');
			$this->excel->getActiveSheet()->SetCellValue('D6', 'Book');

			$row = 7;
			$total = 0;
			foreach ($data as $key => $data_row) {
				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->highersyllabus_name);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->reader_number);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->book_number);

				$total += $data_row->book_number;

				$row++;
			}




			$this->excel->getActiveSheet()->getStyle("A" . $row . ":D" . $row)->getBorders()
				->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

			$this->excel->getActiveSheet()->SetCellValue('D' . $row, $total);
			$this->excel->getActiveSheet()->mergeCells('A' . $row . ':C' . $row);
			$this->excel->getActiveSheet()->SetCellValue('A' . $row, "Total Book Read");
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);

			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

			$this->excel->getActiveSheet()->getStyle('A' . $row . ':D' . $row)->getFont()->setBold(true);




			$row = $row + 2;



			$this->excel->getActiveSheet()->getStyle('A' . $row . ':D' . $row)->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A' . $row . ':D' . $row)->getFont()->setBold(true);

			$this->excel->getActiveSheet()->SetCellValue('A' . $row, 'Total member');
			$this->excel->getActiveSheet()->SetCellValue('B' . $row, 'Total Reader');
			$this->excel->getActiveSheet()->SetCellValue('C' . $row, 'Number of Book');
			$this->excel->getActiveSheet()->SetCellValue('D' . $row, 'Avg');



			$row = $row + 1;
			$this->excel->getActiveSheet()->SetCellValue('A' . $row, $result[0]['member']);
			$this->excel->getActiveSheet()->SetCellValue('B' . $row, $total_reader);
			$this->excel->getActiveSheet()->SetCellValue('C' . $row, $total);
			$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($total_reader != 0) ? round($total / $total_reader, 2) : 0);





			$filename = 'Highersyllabus';
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}
		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}
}
