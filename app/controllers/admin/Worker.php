<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Worker extends MY_Controller
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
        $this->load->admin_model('worker_model');
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
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('worker/'.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('worker/'.$this->session->userdata('branch_id'));	  
		  }
	   

		
		//$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>1)); 
		
		 
		
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
        
         
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Associate'));
        $meta = array('page_title' => 'Worker', 'bc' => $bc);
        $this->page_construct('worker/worker', $meta, $this->data,'leftmenu/manpower');
    
	
	}
	
    	
    public function newName($field)
    {
        switch ($field) {

                    case 'manpowerid': $field = 'আইডি'; break;
                    case 'name': $field = 'নাম'; break;
                    case 'branch_name': $field = 'শাখা কোড'; break;
                    case 'mobile': $field = 'মোবাইল নং'; break;
                    case 'responsibility': $field = 'সর্বশেষ দায়িত্ব'; break;
                    case 'orgstatus_at_forum': $field = 'বৃহত্তর আন্দোলনের মান'; break;
                    case 'education_qualification': $field = 'শিক্ষাগত যোগ্যতা'; break;
                    case 'current_profession': $field = 'বর্তমান পেশা'; break;
                    case 'institution_type': $field = 'শিক্ষাপ্রতিষ্ঠানের ধরন'; break;
                    case 'sessionyear': $field = 'শ্রেণি/বর্ষ'; break;
                    case 'subject': $field = 'বিভাগ/বিষয়'; break;
                    case 'foreign_country': $field = 'দেশের নাম'; break;
                    case 'foreign_address': $field = 'শহরের নাম'; break;
                    case 'higher_education_institution': $field = 'শিক্ষা প্রতিষ্ঠানের নাম'; break;
                    case 'type_higher_education': $field = 'উচ্চশিক্ষার ধরন'; break;
                    case 'type_of_profession': $field = 'পেশার ধরন'; break;
                    case 'email': $field = 'ইমেইল'; break;
                    case 'is_forum': $field = 'ফোরামে যুক্ত হয়েছেন কিনা?'; break;
                    case 'date_death': $field = 'ইন্তেকালের তারিখ'; break;
                    case 'how_death': $field = 'কীভাবে'; break;
                    case 'opposition': $field = 'প্রতিপক্ষ'; break;
                    case 'myr_serial': $field = 'কততম শহিদ'; break;
                    case 'member_oath_date': $field = 'সদস্য হওয়ার তারিখ'; break;
                    case 'prossion_target': $field = 'পেশাগত টার্গেট-সেক্টর'; break;
                    case 'prossion_target_sub': $field = 'পেশাগত টার্গেট-সাব-সেক্টর'; break;
                    case 'studentlife': $field = 'ছাত্রত্ব'; break;
                    case 'district': $field = 'নিজ জেলা'; break;
                    case 'oath_date': $field = 'সাথী হওয়ার তারিখ'; break;
            
            default: $field = $field; break;

        }
        return $field;
    }

	
    public function sheetcellValue($branch=null,$field_arr=null,$data=null,$process_Title=null )
    {
        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        //for cell value
        $exColh = 'B';
        foreach ($field_arr as $field) { 
            $newName = $this->newName($field);
            $this->excel->getActiveSheet()->SetCellValue($exColh . '6', $newName);
            $this->excel->getActiveSheet()->getColumnDimension($exColh)->setWidth(20);
            $exColh++;
        }

        $row = 7; $sQty = 0; $pQty = 0; $sAmt = 0; $pAmt = 0; $bQty = 0; $bAmt = 0; $pl = 0;
        foreach ($data as $key=> $data_row) {

            $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key+1);
            $this->excel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($style);

            $exCol = 'B';
            foreach ($field_arr as $field) {

                $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $data_row->{$field});
                $this->excel->getActiveSheet()->getStyle($exCol . $row)->applyFromArray($style);

                $exCol++;
            }
            $row++;
        } 

        //>>>>>>>>>>>for Title >>>>>>>>>>>>>>>>            
        $lastmarg1= $exColh.'1'; $lastmarg2= $exColh.'2';  $lastmarg3= $exColh.'3';  $lastmarg4= $exColh.'4';  $lastmarg5= $exColh.'5';
        $this->excel->getActiveSheet()->mergeCells("A1:$lastmarg1");$this->excel->getActiveSheet()->mergeCells("A2:$lastmarg2");$this->excel->getActiveSheet()->mergeCells("A3:$lastmarg3");$this->excel->getActiveSheet()->mergeCells("A4:$lastmarg4");$this->excel->getActiveSheet()->mergeCells("A5:$lastmarg5");
        $this->excel->getActiveSheet()->getStyle("A1:$lastmarg5")->applyFromArray($style)->getFont()->setBold(true)->setSize(16); 
        $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim'); 
        $this->excel->getActiveSheet()->SetCellValue('A3', $process_Title);        
        $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' .($branch ? $branch : lang('all_branches')));

       // >>>>>>>>>>>>>>>>>> for table heading
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->SetCellValue('A6', lang('ক্রম'));
        $lastmarg6= $exColh.'6';
        $this->excel->getActiveSheet()->getStyle("A6:$lastmarg6")->applyFromArray($style)->getFont()->setBold(true)->setSize(12);

       $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
       $this->excel->getActiveSheet()->getStyle('C2:AE' . $row)->getAlignment()->setWrapText(true);

    }
	
	
 
	
	
	 
	
	 function workerdecreaselist($process_id = NULL)
    { 

       
	   $this->sma->checkPermissions('index', TRUE);
	   $branch_id = $this->input->get('branch_id');
		$process = $this->site->getByID('process','id', $process_id);
 
 
 
	    
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('worker/workerdecreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('worker/workerdecreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
		  }
	   

		
		//$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>1)); 
		
		 
		
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
        
         $this->data['process'] = $process; 
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Associate'));
        $meta = array('page_title' => 'Worker', 'bc' => $bc);
        $this->page_construct('worker/decrease', $meta, $this->data,'leftmenu/manpower');
    
	
	}
	
	
	
	  
	
	
function getWorker($branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('worker/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_worker') . "</a>";
         
		 $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('worker/edit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';
        
        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';
		
		 
       
	 
		
	 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, date, {$this->db->dbprefix('worker_decrease')}.name,  {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('district')}.name as district_name", FALSE)
				->from('worker_decrease');
		$this->datatables->join('district', 'worker_decrease.district=district.id', 'left');
		$this->datatables->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
                ->where('branches.id', $branch_id);
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, date, {$this->db->dbprefix('worker_decrease')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('district')}.name as district_name", FALSE)
				->from('worker_decrease');
		$this->datatables->join('district', 'worker_decrease.district=district.id', 'left');
		$this->datatables->join('branches', 'branches.id=worker_decrease.branch_id', 'left');
        }
		
		
		
		
		
		
				
		 $this->datatables->add_column("Actions", $action, "manpowerid");
          
		  echo $this->datatables->generate();
		 
    	
	}
	
	
	function getDecreaseWorker($process_id,$branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('worker/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_worker') . "</a>";
         
		 $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('worker/edit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';
        
        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';
		
		 
       $report_type = $this->report_type();
	 
		 
	 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, date, {$this->db->dbprefix('worker_decrease')}.name,  {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
				->from('worker_decrease');
		$this->datatables->join('district', 'worker_decrease.district=district.id', 'left');
		$this->datatables->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
                ->where('branches.id', $branch_id)
				->where('worker_decrease.process_id', $process_id);
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, date, {$this->db->dbprefix('worker_decrease')}.name, {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
				->from('worker_decrease');
		
		$this->datatables->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
				->where('worker_decrease.process_id', $process_id);
        }
		
		
	 
	
	$start = $report_type['start'];
	$end = $report_type['end'];
 	
		
		$this->datatables->where('DATE(date) BETWEEN "' . $start . '" and "' . $end . '"');	
		
		
		
				
		 $this->datatables->add_column("Actions", $action, "manpowerid");
          
		  echo $this->datatables->generate();
		 
    	
	}
	     
       

    /* ------------------------------------------------------- */

    function add($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
		$this->load->admin_model('organization_model');
		
        $branches = $this->site->getAllBranches();
        
		$this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');	
		//$this->form_validation->set_rules('district', 'District', 'required');
		//$this->form_validation->set_rules('address', 'address', 'required');
		//$this->form_validation->set_rules('notes', 'notes', 'required');
		 
		
	 

        if ($this->form_validation->run() == true) {
			
			if($this->input->post('prossion_target_id'))
			 $prossion_target = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_id')),'id desc',1,0);
		if($this->input->post('prossion_target_sub_it'))
			 $prossion_target_sub = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_sub_it')),'id desc',1,0);
			
			//worker
			$data = array(
                'date' =>  $this->sma->fsd($this->input->post('date')),
                'branch_id' => $this->input->post('branch'),
				'district' => $this->input->post('district'),
				'process_id' => $this->input->post('process_id'),
                'address' => $this->input->post('address'),
                'notes' => $this->input->post('notes'),
				 'name' => $this->input->post('name'),
				 'user_id' => $this->session->userdata('user_id'),
				 
				 'sessionyear' => $this->input->post('sessionyear'),
                'responsibility' => $this->input->post('responsibility'),
                'studentlife' => $this->input->post('studentlife'),
				'education' => $this->input->post('education'),
				 
				 
				 
				 'institution_type' => $this->input->post('institution_type'),		
				'subject' => $this->input->post('subject'),
				'prossion_target_id' => $this->input->post('prossion_target_id'),
				'prossion_target_sub_it' => $this->input->post('prossion_target_sub_it'),
				
				'prossion_target' => isset($prossion_target) ? $prossion_target : NULL,
				'prossion_target_sub' =>  isset($prossion_target_sub) ? $prossion_target_sub : NULL,
				'education_institution' => $this->input->post('education_institution'),
				'is_forum' => $this->input->post('is_forum'),
				'current_profession' => $this->input->post('current_profession'),
				'orgstatus_at_forum' => $this->input->post('orgstatus_at_forum'),
				'education_qualification' => $this->input->post('education_qualification'),
				'type_of_profession' => $this->input->post('type_of_profession'),
				'type_higher_education' => $this->input->post('type_higher_education'),
				'mobile' => $this->input->post('mobile'),
				'opposition' => $this->input->post('opposition'),
				'date_death' => $this->sma->fsd($this->input->post('date_death')),  
				'higher_education_institution' => $this->input->post('higher_education_institution'),
				'email' => $this->input->post('email'),
				'foreign_country' => $this->input->post('foreign_country'),
				'foreign_address' => $this->input->post('foreign_address'),
				'how_death' => $this->input->post('how_death'),
				'myr_serial' => $this->input->post('myr_serial'),
                'orgstatus_id' => $this->input->post('orgstatus_id')
                );
			$worker_id = $this->site->insertData('worker_decrease',$data,'id'); 
			
			
			  
			   
			//$this->sma->print_arrays($data);
			
            $this->session->set_flashdata('message', 'Added');
            admin_redirect('worker/workerdecreaselist/'.$this->input->post('process_id').'/'.$this->input->post('branch'));
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

           $this->data['branches'] = $branches;
           $this->data['districts'] = $this->site->getAll('district');
		     $this->data['processes'] = $this->site->getAll('process');
			
			 
		    $this->data['responsibilities'] = $this->site->getAll('responsibilities');
			$this->data['countries'] = $this->site->getAll('countries');
			$this->data['targets'] = $this->site->getAll('profession_target');
			$this->data['institution_types'] = $this->organization_model->getAllInstitution(2);
			
			
			
			
			
			
			
			//$this->sma->print_arrays( $this->data['processes']);
			
			$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('worker'), 'page' => 'Worker Decrease'), array('link' => '#', 'page' => 'Decrease'));
            $meta = array('page_title' => 'Worker Decrease', 'bc' => $bc);
            $this->page_construct('worker/add', $meta, $this->data,'leftmenu/manpower');
        }
    }

     

    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
         $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
		$this->load->admin_model('organization_model');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
		
		$where['id'] = $id;
		
		if ($this->Owner || $this->Admin) {
            $branch_id = NULL;
         } else {
            $where['branch_id'] = $this->session->userdata('branch_id');
           
           }
		
		
        $branches = $this->site->getAllBranches();
        $manpower = $this->site->getOneRecord('worker_decrease','*',$where);
        if (!$id || !$manpower) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
         
         
		 
		$this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');	
		//$this->form_validation->set_rules('district', 'District', 'required');
		//$this->form_validation->set_rules('address', 'address', 'required');
		//$this->form_validation->set_rules('notes', 'notes', 'required');
		 
		
		 
		 
		 
          
        if ($this->form_validation->run() == true) {



			if($this->input->post('prossion_target_id'))
				$prossion_target = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_id')),'id desc',1,0);
			if($this->input->post('prossion_target_sub_it'))
				$prossion_target_sub = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_sub_it')),'id desc',1,0);
		
		$data = array(
                'date' =>  $this->sma->fsd($this->input->post('date')),
                'branch_id' => $this->input->post('branch'),
				'district' => $this->input->post('district'),
                'address' => $this->input->post('address'),
                'notes' => $this->input->post('notes'),
				 'name' => $this->input->post('name'),
				 
				 'sessionyear' => $this->input->post('sessionyear'),
                'responsibility' => $this->input->post('responsibility'),
                'studentlife' => $this->input->post('studentlife'),
				'education' => $this->input->post('education'),
				 
				 
				 
				 
				 'institution_type' => $this->input->post('institution_type'),		
				'subject' => $this->input->post('subject'),
				'prossion_target_id' => $this->input->post('prossion_target_id'),
				'prossion_target_sub_it' => $this->input->post('prossion_target_sub_it'),
				
				'prossion_target' => isset($prossion_target) ? $prossion_target : NULL,
				'prossion_target_sub' =>  isset($prossion_target_sub) ? $prossion_target_sub : NULL,
				'education_institution' => $this->input->post('education_institution'),
				'is_forum' => $this->input->post('is_forum'),
				'current_profession' => $this->input->post('current_profession'),
				'orgstatus_at_forum' => $this->input->post('orgstatus_at_forum'),
				'education_qualification' => $this->input->post('education_qualification'),
				'type_of_profession' => $this->input->post('type_of_profession'),
				'type_higher_education' => $this->input->post('type_higher_education'),
				'mobile' => $this->input->post('mobile'),
				'opposition' => $this->input->post('opposition'),
				'date_death' => $this->sma->fsd($this->input->post('date_death')),  
				'higher_education_institution' => $this->input->post('higher_education_institution'),
				'email' => $this->input->post('email'),
				'foreign_country' => $this->input->post('foreign_country'),
				'foreign_address' => $this->input->post('foreign_address'),
				'how_death' => $this->input->post('how_death'),
				'myr_serial' => $this->input->post('myr_serial')
				 
				 
				 
				   );
			 
		 
            }
 
 	
 
 
        if ($this->form_validation->run() == true && $this->site->updateData('worker_decrease',$data,$where)) {
            
			 
            admin_redirect('worker/workerdecreaselist/'.$manpower->process_id.'/'.$this->input->post('branch'));  
			 
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;
			
			 $this->data['districts'] = $this->site->getAll('district');
		    
		     $this->data['processes'] = $this->site->getAll('process');
			 $this->data['responsibilities'] = $this->site->getAll('responsibilities');
			$this->data['countries'] = $this->site->getAll('countries');
			$this->data['targets'] = $this->site->getAll('profession_target');
			$this->data['institution_types'] = $this->organization_model->getAllInstitution(2);
			
			
			
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('worker'), 'page' => 'Worker Decrease List'), array('link' => '#', 'page' => lang('Edit Decrease Info')));
            $meta = array('page_title' => lang('Edit Decrease Info'), 'bc' => $bc);
            $this->page_construct('worker/edit', $meta, $this->data);
        }
    }

     
    
    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
		$where = array();
		$where['id'] = $id;
		
		if ($this->Owner || $this->Admin) {
            $branch_id = NULL;
         } else {
            $where['branch_id'] = $this->session->userdata('branch_id');
           
           }
		
		
		if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->site->delete('worker_decrease',$where)) {
            if($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("manpower_deleted")));
            }
            $this->session->set_flashdata('message', lang('manpower_deleted'));
            admin_redirect('worker');
        }
		 
		 
    }

    
   
    
    /* --------------------------------------------------------------------------------------------- */

    function modal_view($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

         if ($this->Owner || $this->Admin) {
            $branch_id = NULL;
         } else {
            
            $branch_id = $this->session->userdata('branch_id');
           }
        
	   
		
		if($branch_id) {
	    $this->db
                ->select($this->db->dbprefix('worker_decrease') . ".id as id, image, date, {$this->db->dbprefix('worker_decrease')}.name,  {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('district')}.name as district_name,{$this->db->dbprefix('worker_decrease')}.address as address,notes", FALSE)
				->from('worker_decrease')
				->where('worker_decrease.id', $id);
		$this->db->join('district', 'worker_decrease.district=district.id', 'left');
		$this->db->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
                ->where('branches.id', $branch_id);
		
		}
		else {
	    $this->db
                ->select($this->db->dbprefix('worker_decrease') . ".id as id, image, date, {$this->db->dbprefix('worker_decrease')}.name,  {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('district')}.name as district_name,{$this->db->dbprefix('worker_decrease')}.address as address,notes", FALSE)
				->from('worker_decrease')
				->where('worker_decrease.id', $id);
		$this->db->join('district', 'worker_decrease.district=district.id', 'left');
		$this->db->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
				->limit(1);
		}
		$q = $this->db->get();
            if ($q->num_rows() > 0) {
                $data =  $q->row();
            } else {
                $data = NULL;
            }
			
			
		
		if ($data==NULL) {
            $this->session->set_flashdata('error', lang('not_found'));
            $this->sma->md();
        }
        
		//$this->sma->print_arrays($data);
		
		
        $this->data['manpower'] = $data;
		 
        $this->load->view($this->theme.'worker/modal_view', $this->data);
    }

    
        
	
 
	
	
    function export($process_id,$branch_id = NULL)
    {
		
		 $this->sma->checkPermissions('index', TRUE);
		 
        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

    
		$report_type = $this->report_type();
		 
			
			$start = $report_type['start'];
			$end = $report_type['end'];
		 

		// $field_arr = array('education','institution_type','subject','prossion_target','prossion_target_sub','education_institution','is_forum','current_profession','orgstatus_at_forum','education_qualification','type_of_profession','type_higher_education','mobile','opposition','date_death','higher_education_institution','email','foreign_country','foreign_address','myr_serial','how_death');
		
		if($branch_id) {
		$this->db
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, {$this->db->dbprefix('worker_decrease')}.name as name, {$this->db->dbprefix('process')}.process as process_name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('worker_decrease')}.date as date,  {$this->db->dbprefix('worker_decrease')}.address as address,notes,sessionyear,  {$this->db->dbprefix('worker_decrease')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,{$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('worker_decrease')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
				->from('worker_decrease')
				 
				->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
				->join('process', 'process.id=worker_decrease.process_id', 'left')
				->join('institution', 'worker_decrease.institution_type=institution.id AND institution.type = 2', 'left')
				->join('countries', 'worker_decrease.foreign_country=countries.id', 'left');
		
		
		
		$this->db->where('DATE(date) BETWEEN "' . $start . '" and "' . $end . '"');
		$this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);
		$this->db->where('worker_decrease.process_id', $process_id);
		$this->db->order_by('worker_decrease.name ASC');
		}
		
		else {
		 $this->db
                ->select($this->db->dbprefix('worker_decrease') . ".id as manpowerid, {$this->db->dbprefix('worker_decrease')}.name as name,  {$this->db->dbprefix('process')}.process as process_name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('worker_decrease')}.date as date,  {$this->db->dbprefix('worker_decrease')}.address as address,notes,sessionyear,  {$this->db->dbprefix('worker_decrease')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,{$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('worker_decrease')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
				->from('worker_decrease')
				->join('branches', 'branches.id=worker_decrease.branch_id', 'left')
				->join('process', 'process.id=worker_decrease.process_id', 'left')
				->join('institution','worker_decrease.institution_type=institution.id', 'left')
				->join('countries', 'worker_decrease.foreign_country=countries.id', 'left');
				
		$this->db->where('DATE(date) BETWEEN "' . $start . '" and "' . $end . '"');
		$this->db->where('worker_decrease.process_id', $process_id);
		 
		
		
		 $this->db->order_by('worker_decrease.name ASC');
		
		}

            $q = $this->db->get();
			
			
		//	echo $this->db->last_query();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
//  $this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Decrease list');

                //aaaa
                // $this->sma->print_arrays($process_id);


                switch ($process_id) {

                    case 11:
                        $field_arr = array(
                            'manpowerid',
                            'name',
                            'branch_name',
                            'foreign_country',
                            'higher_education_institution',
                            'type_higher_education',
                            'responsibility',
                            'email',
                            'mobile',
                            'is_forum',   

                        );
                        break;
                   
                    case 14:
                        $field_arr = array(
                        'manpowerid',
                        'name',
                        'branch_name',
                        'foreign_country',
                        'foreign_address',
                        'type_of_profession',
                        'responsibility',
                        'mobile',
                        'is_forum',
                        );
                        break;
                    case 9:
                        $field_arr = array(
                        'manpowerid',
                        'name',
                        'branch_name',
                        'date_death',
                        'how_death',
                        'responsibility',
                        );
                        break;
                    case 10:
                        $field_arr = array(
                            'manpowerid',
                            'name',
                            'branch_name',
                            'opposition',
                            'myr_serial',
                            'date_death',
                            'responsibility',
                        );
                        break;
                    
                    
                    default:
                        # code...
                        break;
                }

                //  for cellValue 
		        $process = $this->site->getByID('process','id', $process_id);

                $process_name=$process ? $process->process : '';

                $process_Title = 'কর্মী ঘাটতি : '.$process_name;
              
                $this->sheetcellValue($branch_id,$field_arr,$data,$process_Title); 
				
				
                
                
                
                
                $filename = (isset($branch_id) ? $branch_id : '').'worker_decrease_list';
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

    

	



    function report_type_own()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

       // $this->sma->print_arrays(array('DM'),$this->input->get(),$entrytimeinfo);


       // $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

       // $type =  $this->input->get('type')=='annual' ?  'annual' : 'half_yearly';

        if ($this->input->get('type')=='half_yearly')
            return array('info'=>$entrytimeinfo, 'type' => $this->input->get('type'), 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
       
            else if ($this->input->get('type') == 'annual')
                    return array('info'=>$entrytimeinfo, 'type' => $this->input->get('type'), 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
       

            else 
                return array('info'=>$entrytimeinfo, 'type' => 'current', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
           
             //   else  
               // return array('info'=>$entrytimeinfo, 'type' => 'current', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
         
     }






	
}
