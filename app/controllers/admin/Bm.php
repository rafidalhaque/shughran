<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bm extends MY_Controller
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
		$this->load->admin_model('bm_model');
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
			admin_redirect('bm/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('bm/' . $this->session->userdata('branch_id'));
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

		$this->data['sources'] = $this->bm_model->getAllSource();


		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfo($report_type, $this->data['sources'], $branch_id);
		} else
			$this->data['detailinfo'] = '';





		//  $this->sma->print_arrays($this->data['detailinfo']);
		$this->data['bm_summary'] = $this->getbm_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);






		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'বিএম'));
		$meta = array('page_title' => 'বিএম', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('bm/index_entry', $meta, $this->data, 'leftmenu/others');
		} else
			$this->page_construct('bm/index', $meta, $this->data, 'leftmenu/others');
	}



	function getbm_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{

		$report_info =  $reportinfo['info'];




		if ($branch_id) {

			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result =  $this->site->query_binding("SELECT * from sma_bm_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `source_id`,SUM(`amount`) amount,SUM(id) id from sma_bm_record WHERE   branch_id = ? AND date BETWEEN ? AND ? GROUP BY source_id", array($branch_id, $start_date, $end_date));
		} else {

			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly') {
				$result =  $this->site->query_binding("SELECT `source_id`,SUM(`amount`) amount,SUM(id) id from sma_bm_record WHERE  date BETWEEN ? AND ? GROUP BY source_id", array($start_date, $end_date));

				//$result =  $this->site->query_binding("SELECT * from sma_bm_record WHERE  date BETWEEN ? AND ? ", array($start_date,$end_date));
			} else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `source_id`,SUM(`amount`) amount,SUM(id) id from sma_bm_record WHERE  date BETWEEN ? AND ?  GROUP BY source_id ", array($start_date, $end_date));
		}


		return $result;
	}






	function getEntryInfo($report_type, $sources, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$start = $report_type['start'];
		$end = $report_type['end'];
		$year = $report_type['year'];
		$cal_type = $report_type['type'];




		if ($report_type['is_current'] != false  && ($report_type['last_half'] || $cal_type == 'half_yearly')) {

			$type =   ($cal_type == 'half_yearly') ? 'half_yearly' : 'annual';

			$bm_recordinfo = $this->site->getOneRecord('bm_record', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $end, 'date > ' => $start, 'calculated_flag' => 2), 'id desc', 1, 0);
 



			if (!$bm_recordinfo) {

				foreach ($sources as $source) if ($source->id != 32 && $source->id != 73)
					$this->site->insertData('bm_record', array('source_id' => $source->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $year,  'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}






		$bm_recordinfo = $this->site->getOneRecord('bm_record', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);

		return array(
			'bm_recordinfo' => $bm_recordinfo
		);
	}








	function detailupdate()
	{
		$this->sma->checkPermissions('index', TRUE);
		$flag = 1;
		$msg = "done";

		$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
		if ($is_changeable) {
			$flag = 100;
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
		} else
			$msg = 'failed';

		echo json_encode(array('flag' => $flag, 'msg' => $msg));
		exit;
	}






	function export($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('bm/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('bm/' . $this->session->userdata('branch_id'));
		}


		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branch_id'] = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {

			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}


		$report_type = $this->report_type();
		$start = $report_type['start'];
		$end = $report_type['end'];
		$type = $report_type['type'];
		$report_year = $report_type['year'];

		//$this->sma->print_arrays($report_type);


		if ($branch_id) {

			$this->db
				->select("SUM(amount) as amount, type,   {$this->db->dbprefix('bm_source')}.source", FALSE)
				->from('bm_record');
			$this->db->join('bm_source', 'bm_record.source_id=bm_source.id', 'left');
			$this->db->where('bm_record.branch_id', $branch_id);
			//$this->db->where('bm_record.report_type', $report_type['type']); 
			$this->db->where($this->db->dbprefix('bm_record') . '.date BETWEEN "' . $start . '" and "' . $end . '"');
			$this->db->group_by('bm_record.source_id');
		} else {
			$this->db
				->select("SUM(amount) as amount, type,   {$this->db->dbprefix('bm_source')}.source", FALSE)
				->from('bm_record');
			$this->db->join('bm_source', 'bm_record.source_id=bm_source.id', 'left');
			// $this->db->where('bm_record.report_type', $report_type['type']); 
			$this->db->where($this->db->dbprefix('bm_record') . '.date BETWEEN "' . $start . '" and "' . $end . '"');
			$this->db->group_by('bm_record.source_id');
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

		if (!empty($data)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('BM');




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

			$this->excel->getActiveSheet()->getStyle("A1:G4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:G4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));










			$this->excel->getActiveSheet()->mergeCells('A6:C6');


			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);



			$this->excel->getActiveSheet()->SetCellValue('A6', 'Income');
			$this->excel->getActiveSheet()->getStyle('A6:G7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'Serial');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'Source');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'Amount');

			$row = 8;
			$total = 0;
			foreach ($data as $key => $data_row) if ($data_row->type == 1) {
				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->source);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->amount);

				$total += $data_row->amount;

				$row++;
			}
			$income = $total;

			$this->excel->getActiveSheet()->getStyle("A" . $row . ":C" . $row)->getBorders()
				->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

			$this->excel->getActiveSheet()->SetCellValue('C' . $row, $total);
			$this->excel->getActiveSheet()->mergeCells('A' . $row . ':B' . $row);
			$this->excel->getActiveSheet()->SetCellValue('A' . $row, "Total Income");
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
			$this->excel->getActiveSheet()->getStyle('A' . $row . ':C' . $row)->getFont()->setBold(true);








			//expenditure


			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("E6")->applyFromArray($style);


			$this->excel->getActiveSheet()->mergeCells('E6:G6');

			$this->excel->getActiveSheet()->SetCellValue('E6', 'Expenditure');
			$this->excel->getActiveSheet()->getStyle('E6')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->SetCellValue('E7', 'Serial');
			$this->excel->getActiveSheet()->SetCellValue('F7', 'Source');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'Amount');

			$row = 8;
			$total = 0;
			$icount = 1;
			foreach ($data as $key => $data_row) if ($data_row->type == 2) {
				$this->excel->getActiveSheet()->SetCellValue('E' . $row, $icount++);
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->source);
				$this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->amount);

				$total += $data_row->amount;

				$row++;
			}


			$this->excel->getActiveSheet()->getStyle("E" . $row . ":G" . $row)->getBorders()
				->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

			$this->excel->getActiveSheet()->SetCellValue('G' . $row, $total);
			$this->excel->getActiveSheet()->mergeCells('E' . $row . ':F' . $row);
			$this->excel->getActiveSheet()->SetCellValue('E' . $row, "Total Expenditure");
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
			$this->excel->getActiveSheet()->getStyle('E' . $row . ':G' . $row)->getFont()->setBold(true);

			$row = $row + 1;
			$this->excel->getActiveSheet()->SetCellValue('G' . $row, $income);
			$this->excel->getActiveSheet()->mergeCells('E' . $row . ':F' . $row);
			$this->excel->getActiveSheet()->SetCellValue('E' . $row, "Total Income");
			$this->excel->getActiveSheet()->getStyle('E' . $row . ':G' . $row)->getFont()->setBold(true);

			$row = $row + 1;
			$this->excel->getActiveSheet()->SetCellValue('G' . $row, abs($income - $total));
			$this->excel->getActiveSheet()->mergeCells('E' . $row . ':F' . $row);
			$this->excel->getActiveSheet()->SetCellValue('E' . $row,  $income - $total >= 0 ? "Surplus" : "Deficit");
			$this->excel->getActiveSheet()->getStyle('E' . $row . ':G' . $row)->getFont()->setBold(true);




			$filename = 'BM_' . ($branch_id ? '_' . $branch_id : '_central') . '_' . $this->input->get('year');
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}
		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}
}
