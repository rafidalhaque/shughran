<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Research extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=22) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==22) {  //Research
			$this->departmentuser = true; 
		}
		
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 22
        $this->data['department_id'] = 22;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (22)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>22), 'id desc', 1, 0);

        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
		$this->load->helper('report');
        $this->load->admin_model('manpower_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function research_page_one($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/research-page-one/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/research-page-one/'.$this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
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

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {

            $this->db->select_sum('ghobeshona_shompond');
            $this->db->select_sum('school');
            $this->db->select_sum('school_bri');
            $this->db->select_sum('knowledge_movement');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_shikkha_kathamo'] = $this->db->get('gobeshona_shikkha_kathamo')->first_row('array');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_shikkha_kathamo_row'] = $this->db->get('gobeshona_shikkha_kathamo')->num_rows();

            $this->db->select_sum('shodossho');
            $this->db->select_sum('sathi');
            $this->db->select_sum('kormi');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_shomprikto_jonoshokti'] = $this->db->get('gobeshona_shomprikto_jonoshokti')->first_row('array');

            $this->db->select_sum('week_class_n');
            $this->db->select_sum('week_class_p');
            $this->db->select_sum('dars_quran_n');
            $this->db->select_sum('dars_quran_p');
            $this->db->select_sum('open_class_n');
            $this->db->select_sum('open_class_p');
            $this->db->select_sum('motobinimoy_n');
            $this->db->select_sum('motobinimoy_p');
            $this->db->select_sum('dayittoshil_n');
            $this->db->select_sum('dayittoshil_p');
            $this->db->select_sum('indoor_n');
            $this->db->select_sum('indoor_p');
            $this->db->select_sum('beboharik_n');
            $this->db->select_sum('beboharik_p');
            $this->db->select_sum('visual_n');
            $this->db->select_sum('visual_p');
            $this->db->select_sum('milonmela_n');
            $this->db->select_sum('milonmela_p');
            $this->db->select_sum('shongbad_n');
            $this->db->select_sum('shongbad_p');
            $this->db->select_sum('puroshkar_n');
            $this->db->select_sum('puroshkar_p');
            $this->db->select_sum('cha_n');
            $this->db->select_sum('cha_p');
            $this->db->select_sum('other_n');
            $this->db->select_sum('other_p');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_regular_program'] = $this->db->get('gobeshona_regular_program')->first_row('array');

            $this->db->select_sum('workshop_n');
            $this->db->select_sum('workshop_attendence');
            $this->db->select_sum('seminer_n');
            $this->db->select_sum('seminer_attendence');
            $this->db->select_sum('tour_n');
            $this->db->select_sum('tour_attendence');
            $this->db->select_sum('bideshe_n');
            $this->db->select_sum('bideshe_attendence');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_bishesh_program'] = $this->db->get('gobeshona_bishesh_program')->first_row('array');

            $this->db->select_sum('emil_s');
            $this->db->select_sum('emil_tg');
            $this->db->select_sum('sms_s');
            $this->db->select_sum('sms_tg');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $this->data['gobeshona_bivag_jogajog'] = $this->db->get('gobeshona_bivag_jogajog')->first_row('array');
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('gobeshona_shikkha_kathamo');
            $this->data['gobeshona_shikkha_kathamo'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $query = $this->db->get('gobeshona_shomprikto_jonoshokti');
            $this->data['gobeshona_shomprikto_jonoshokti'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('gobeshona_regular_program');
            $this->data['gobeshona_regular_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $query = $this->db->get('gobeshona_bishesh_program');
            $this->data['gobeshona_bishesh_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $query = $this->db->get('gobeshona_bivag_jogajog');
            $this->data['gobeshona_bivag_jogajog'] = $query->first_row('array');
        }
       

        $this->data['m'] = 'research';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/research/research_page_one_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/research/research_page_one', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function research_page_two($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/research-page-two/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/research-page-two/'.$this->session->userdata('branch_id'));
		}

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

		if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
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

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {

            
            $this->db->select_sum('probondho_lekha');
            $this->db->select_sum('probondho_prokash');
            $this->db->select_sum('nibondhon_lekha');
            $this->db->select_sum('nibondhon_prokash');
            $this->db->select_sum('boi_lekha');
            $this->db->select_sum('boi_prokash');
            $this->db->select_sum('boi_review_lekha');
            $this->db->select_sum('boi_review_prokash');
            $this->db->select_sum('review_lekha');
            $this->db->select_sum('review_prokash');
            $this->db->select_sum('presentation_lekha');
            $this->db->select_sum('presentation_prokash');
            $this->db->select_sum('document_lekha');
            $this->db->select_sum('document_prokash');
            $this->db->select_sum('script_lekha');
            $this->db->select_sum('script_prokash');
            $this->db->select_sum('bangla_lekha');
            $this->db->select_sum('bangla_prokash');
            $this->db->select_sum('english_lekha');
            $this->db->select_sum('english_prokash');
            $this->db->select_sum('poster_pre_lekha');
            $this->db->select_sum('poster_pre_prokash');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $this->data['gobeshona_lekhalekhi'] = $this->db->get('gobeshona_lekhalekhi')->first_row('array');
            
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id'); 
            $this->data['gobeshona_gobeshonay_agrohi'] = $this->db->get('gobeshona_gobeshonay_agrohi');
            
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id'); 
            $this->data['gobeshona_gobeshonaroto_vai'] = $this->db->get('gobeshona_gobeshonaroto_vai');
           
            $this->db->select_sum('shikkha_central_s');
            $this->db->select_sum('shikkha_central_p');
            $this->db->select_sum('shikkha_shakha_s');
            $this->db->select_sum('shikkha_shakha_p'); 
            $this->db->select_sum('kormoshala_central_s');
            $this->db->select_sum('kormoshala_central_p');
            $this->db->select_sum('kormoshala_shakha_s');
            $this->db->select_sum('kormoshala_shakha_p'); 
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['gobeshona_training_program'] = $this->db->get('gobeshona_training_program')->first_row('array');
     
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('gobeshona_training_program');
            $this->data['gobeshona_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $query = $this->db->get('gobeshona_lekhalekhi');
            $this->data['gobeshona_lekhalekhi'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
 
            $query = $this->db->get('gobeshona_gobeshonay_agrohi');
            $this->data['gobeshona_gobeshonay_agrohi'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('gobeshona_gobeshonaroto_vai');
            $this->data['gobeshona_gobeshonaroto_vai'] = $query;
 
        }
       
		$this->data['m'] = 'research';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/research/research_page_two_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/research/research_page_two', $meta, $this->data,'leftmenu/departmentsreport');
	}

  

	
function report_type1(){
	
	$entrytimeinfo = $this->site->getOneRecord('entry_settings','*',array('year'=>date('Y')),'id desc',1,0);	
	
	
	$current_date = strtotime(date('Y-m-d'));
	
	
	$annual_start = strtotime($entrytimeinfo->startdate_annual);
	$annual_end = strtotime($entrytimeinfo->enddate_annual);
  	
	$half_start = strtotime($entrytimeinfo->startdate_half);
	$half_end = strtotime($entrytimeinfo->enddate_half);
	
	$type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual'; 
	if($type=='half_yearly') 
	  return array('type'=>'half_yearly','start'=>$entrytimeinfo->startdate_half,'end'=>$entrytimeinfo->enddate_half,'year'=>$entrytimeinfo->year);
    else 
	  return array('type'=>'annual','start'=>$entrytimeinfo->startdate_annual,'end'=>$entrytimeinfo->enddate_annual,'year'=>$entrytimeinfo->year);
}	
	
function add_gobeshona_gobeshonay_agrohi($branch_id = NULL)
{ 
    //$this->sma->checkPermissions();

    if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
        $this->session->set_flashdata('warning', lang('access_denied'));

       // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        admin_redirect('departmentsreport/add-gobeshona-gobeshonay-agrohi/'.$this->session->userdata('branch_id'));
    }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
       // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

        admin_redirect('departmentsreport/add-gobeshona-gobeshonay-agrohi/'.$this->session->userdata('branch_id'));
    } 

    $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

    if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
        $this->data['branches'] = $this->site->getAllBranches();
        $this->data['branch_id'] = $branch_id;
        $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
    } else {
        $this->data['branches'] = NULL;
        $this->data['branch_id'] = $this->session->userdata('branch_id');
        $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
    }

    $last_year =  date("Y",strtotime("-1 year"));
    $report_type = $this->report_type();
    
    if($this->input->post('gobeshona_gobeshonay_agrohi'))
    {
        $data['report_type']=$report_type['type'];
        $data['report_year']=date("Y");
        $data['date']=date("Y-m-d"); 				
        $data['branch_id']=$branch_id;
        $data['user_id']=$this->session->userdata('user_id');
        $data['name']=$this->input->post('name');
        $data['sangothonik_man']=$this->input->post('sangothonik_man');
        $data['bivag']=$this->input->post('bivag');
        $data['interested_sector']=$this->input->post('interested_sector');
        $data['online_number']=$this->input->post('online_number');
        $this->site->insertData('gobeshona_gobeshonay_agrohi',$data);
        header("Location: ".admin_url('departmentsreport/research-page-two/'.$this->data['branch_id']));
    }
    if($this->input->post('gobeshona_gobeshonay_agrohi_update'))
    { 
        $data['name']=$this->input->post('name');
        $data['sangothonik_man']=$this->input->post('sangothonik_man');
        $data['bivag']=$this->input->post('bivag');
        $data['interested_sector']=$this->input->post('interested_sector');
        $data['online_number']=$this->input->post('online_number');
        $this->site->updateData('gobeshona_gobeshonay_agrohi',$data,array('id'=>$this->input->get('id')));
        header("Location: ".admin_url('departmentsreport/research-page-two/'.$this->data['branch_id']));
    }
    if($this->input->get('type')=='edit')
    {
        $this->db->select('*');
        $this->db->where('id',$this->input->get('id'));
        $this->data['gobeshona_gobeshonay_agrohi'] = $this->db->get('gobeshona_gobeshonay_agrohi')->first_row('array');

    }

    $this->data['m'] = 'research';
    $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
    $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

    if($branch_id)
        $this->page_construct('departmentsreport/research/add_gobeshona_gobeshonay_agrohi', $meta, $this->data,'leftmenu/departmentsreport');
}
function add_gobeshona_gobeshonaroto_vai($branch_id = NULL)
{ 
    //$this->sma->checkPermissions();

    if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
        $this->session->set_flashdata('warning', lang('access_denied'));

       // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        admin_redirect('departmentsreport/add-gobeshona-gobeshonaroto-vai/'.$this->session->userdata('branch_id'));
    }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
       // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

        admin_redirect('departmentsreport/add-gobeshona-gobeshonaroto-vai/'.$this->session->userdata('branch_id'));
    } 

    $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

    if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
        $this->data['branches'] = $this->site->getAllBranches();
        $this->data['branch_id'] = $branch_id;
        $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
    } else {
        $this->data['branches'] = NULL;
        $this->data['branch_id'] = $this->session->userdata('branch_id');
        $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
    }

    $last_year =  date("Y",strtotime("-1 year"));
    $report_type = $this->report_type();
    
    if($this->input->post('gobeshona_gobeshonaroto_vai'))
    {
        $data['report_type']=$report_type['type'];
        $data['report_year']=date("Y");
        $data['date']=date("Y-m-d"); 				
        $data['branch_id']=$branch_id;
        $data['user_id']=$this->session->userdata('user_id');
        $data['name']=$this->input->post('name');
        $data['which_country']=$this->input->post('which_country');
        $data['last_dayitto']=$this->input->post('last_dayitto');
        $data['stor']=$this->input->post('stor');
        $data['online_num']=$this->input->post('online_num');
        $this->site->insertData('gobeshona_gobeshonaroto_vai',$data);
        header("Location: ".admin_url('departmentsreport/research-page-two/'.$this->data['branch_id']));
    }
    if($this->input->post('gobeshona_gobeshonaroto_vai_update'))
    { 
        $data['name']=$this->input->post('name');
        $data['which_country']=$this->input->post('which_country');
        $data['last_dayitto']=$this->input->post('last_dayitto');
        $data['stor']=$this->input->post('stor');
        $data['online_num']=$this->input->post('online_num');
        $this->site->updateData('gobeshona_gobeshonaroto_vai',$data,array('id'=>$this->input->get('id')));
        header("Location: ".admin_url('departmentsreport/research-page-two/'.$this->data['branch_id']));
    }
    if($this->input->get('type')=='edit')
    {
        $this->db->select('*');
        $this->db->where('id',$this->input->get('id'));
        $this->data['gobeshona_gobeshonaroto_vai'] = $this->db->get('gobeshona_gobeshonaroto_vai')->first_row('array');

    }

    $this->data['m'] = 'research';
    $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
    $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

    if($branch_id)
        $this->page_construct('departmentsreport/research/add_gobeshona_gobeshonaroto_vai', $meta, $this->data,'leftmenu/departmentsreport');
}


 
  function detailupdate()
    {
		 $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	//$this->site->check_confirm(6, date('Y-m-d'));
	 
	$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
	
	$flag = 1; 	 
	$msg = 'done';
	if($is_changeable) {
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
	    $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name')=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($this->input->get_post('branch_id')){
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		
	   
	   
	   

	
	
	
}
