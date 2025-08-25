<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Foundation extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
		 
		$this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=8) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==8) {  //Foundation
			$this->departmentuser = true; 
		}
		      
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 8
        $this->data['department_id'] = 8;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  8)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>8), 'id desc', 1, 0);
        
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



///////////////////////////////////////////////
///////////////////////////////////////////////
///////////foundation_info starts///////////
///////////////////////////////////////////////
///////////////////////////////////////////////
function foundation_bivag($branch_id = NULL)
{  
    //$this->sma->checkPermissions();

    if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
        $this->session->set_flashdata('warning', lang('access_denied'));
        admin_redirect('departmentsreport/foundation-bivag/'.$this->session->userdata('branch_id'));
    }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
        admin_redirect('departmentsreport/foundation-bivag/'.$this->session->userdata('branch_id'));
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

     $this->db->select('*');
    if ($branch_id)
    $this->db->where('branch_id', $branch_id);
$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $this->data['foundation_foundation_info'] = $this->db->get('foundation_foundation_info')->first_row('array');
   
    
    $this->db->select_sum('s_g');
    $this->db->select_sum('s_h');
    $this->db->select_sum('s_k');
    $this->db->select_sum('s_l');
    $this->db->select_sum('t_g');
    $this->db->select_sum('t_h');
    $this->db->select_sum('t_k');
    $this->db->select_sum('t_l');
    
    if ($branch_id)
    $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $this->data['foundation_motorcycle'] = $this->db->get('foundation_motorcycle')->first_row('array');
 
    if( $this->data['foundation_motorcycle']==null){
        $this->db->select_sum('s_g');
        $this->db->select_sum('s_h');
        $this->db->select_sum('s_k');
        $this->db->select_sum('s_l');
        $this->db->select_sum('t_g');
        $this->db->select_sum('t_h');
        $this->db->select_sum('t_k');
        $this->db->select_sum('t_l');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "2023-06-18" and "2023-12-15" ');
    
        $this->data['foundation_motorcycle'] = $this->db->get('foundation_motorcycle')->first_row('array'); 
    } 




    if ($branch_id)
    $this->db->where('branch_id', $branch_id);
$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $this->db->order_by('branch_id');
    $this->data['foundation_jomi_shongkranto'] = $this->db->get('foundation_jomi_shongkranto');


    if ($branch_id)
    $this->db->where('branch_id', $branch_id);
$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $this->db->order_by('branch_id');
    $this->data['foundation_flat_shongkranto'] = $this->db->get('foundation_flat_shongkranto');


    if ($branch_id)
    $this->db->where('branch_id', $branch_id);
  $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $this->db->order_by('branch_id');
    $this->data['foundation_others'] = $this->db->get('foundation_others');


   


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

    $this->data['foundation_training_program'] = $this->db->get('foundation_training_program')->first_row('array');

}
else{  // current session for data entry
    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_training_program');


    $this->data['foundation_training_program'] = $query->first_row('array');	

    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_foundation_info');
    $this->data['foundation_foundation_info'] = $query;

    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_jomi_shongkranto');
    $this->data['foundation_jomi_shongkranto'] = $query;

    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_flat_shongkranto');
    $this->data['foundation_flat_shongkranto'] = $query;

    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_others');
    $this->data['foundation_others'] = $query;




    $this->db->select('*');
    $this->db->where('branch_id',$branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $query = $this->db->get('foundation_motorcycle');
    $this->data['foundation_motorcycle'] = $query->first_row('array');



    }
    $this->data['m'] = 'foundation';
    $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
    $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
    
   // exit();
    if($branch_id)
    $this->page_construct('departmentsreport/foundation/foundation_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
    else
    $this->page_construct('departmentsreport/foundation/foundation_bivag', $meta, $this->data,'leftmenu/departmentsreport');
}

function add_foundation_jomi_shongkranto($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-foundation-jomi-shongkranto/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-foundation-jomi-shongkranto/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('foundation_jomi_shongkranto'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['khotiyan_no']=$this->input->post('khotiyan_no');
			$data['jomir_poriman']=$this->input->post('jomir_poriman');
            $data['registration_name']=$this->input->post('registration_name');
			$data['namjarir_poriman']=$this->input->post('namjarir_poriman');
            $data['cs']=$this->input->post('cs');
			$data['sa']=$this->input->post('sa');
            $data['rs_ror']=$this->input->post('rs_ror');
			$data['dcr']=$this->input->post('dcr');
            $data['city_bs']=$this->input->post('city_bs');
            $data['khajna_porishodh']=$this->input->post('khajna_porishodh');
            $data['gas_biddut_wasa']=$this->input->post('gas_biddut_wasa');
			$data['purber_dolil']=$this->input->post('purber_dolil');
            $data['rajuk_onumoti']=$this->input->post('rajuk_onumoti');
            $data['comments']=$this->input->post('comments');
			$this->site->insertData('foundation_jomi_shongkranto',$data);
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('foundation_jomi_shongkranto_update'))
		{ 
            $data['khotiyan_no']=$this->input->post('khotiyan_no');
			$data['jomir_poriman']=$this->input->post('jomir_poriman');
            $data['registration_name']=$this->input->post('registration_name');
			$data['namjarir_poriman']=$this->input->post('namjarir_poriman');
            $data['cs']=$this->input->post('cs');
			$data['sa']=$this->input->post('sa');
            $data['rs_ror']=$this->input->post('rs_ror');
			$data['dcr']=$this->input->post('dcr');
            $data['city_bs']=$this->input->post('city_bs');
            $data['khajna_porishodh']=$this->input->post('khajna_porishodh');
            $data['gas_biddut_wasa']=$this->input->post('gas_biddut_wasa');
			$data['purber_dolil']=$this->input->post('purber_dolil');
            $data['rajuk_onumoti']=$this->input->post('rajuk_onumoti');
            $data['comments']=$this->input->post('comments');
			$this->site->updateData('foundation_jomi_shongkranto',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['foundation_jomi_shongkranto'] = $this->db->get('foundation_jomi_shongkranto')->first_row('array');

        }

        $this->data['m'] = 'foundation';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/foundation/add_foundation_jomi_shongkranto', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_foundation_flat_shongkranto($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-foundation-flat-shongkranto/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-foundation-flat-shongkranto/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('foundation_flat_shongkranto'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['khotiyan_no']=$this->input->post('khotiyan_no');
			$data['koto_sqft']=$this->input->post('koto_sqft');
            $data['amader_name_ache_kina']=$this->input->post('amader_name_ache_kina');
			$data['reg_kar_name']=$this->input->post('reg_kar_name');
            $data['cs']=$this->input->post('cs');
			$data['sa']=$this->input->post('sa');
            $data['rs_ror']=$this->input->post('rs_ror');
			$data['dcr']=$this->input->post('dcr');
            $data['city_bs']=$this->input->post('city_bs');
            $data['khajna_porishodh']=$this->input->post('khajna_porishodh');
            $data['gas_biddut_wasa']=$this->input->post('gas_biddut_wasa');
			$data['purber_dolil']=$this->input->post('purber_dolil');
            $data['rajuk_onumoti']=$this->input->post('rajuk_onumoti');
            $data['comments']=$this->input->post('comments');
			$this->site->insertData('foundation_flat_shongkranto',$data);
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('foundation_flat_shongkranto_update'))
		{ 
            $data['khotiyan_no']=$this->input->post('khotiyan_no');
			$data['koto_sqft']=$this->input->post('koto_sqft');
            $data['amader_name_ache_kina']=$this->input->post('amader_name_ache_kina');
			$data['reg_kar_name']=$this->input->post('reg_kar_name');
            $data['cs']=$this->input->post('cs');
			$data['sa']=$this->input->post('sa');
            $data['rs_ror']=$this->input->post('rs_ror');
			$data['dcr']=$this->input->post('dcr');
            $data['city_bs']=$this->input->post('city_bs');
            $data['khajna_porishodh']=$this->input->post('khajna_porishodh');
            $data['gas_biddut_wasa']=$this->input->post('gas_biddut_wasa');
			$data['purber_dolil']=$this->input->post('purber_dolil');
            $data['rajuk_onumoti']=$this->input->post('rajuk_onumoti');
            $data['comments']=$this->input->post('comments');
			$this->site->updateData('foundation_flat_shongkranto',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['foundation_flat_shongkranto'] = $this->db->get('foundation_flat_shongkranto')->first_row('array');

        }

        $this->data['m'] = 'foundation';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/foundation/add_foundation_flat_shongkranto', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_foundation_trust($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-foundation-trust/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-foundation-trust/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('foundation-trust'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['name']=$this->input->post('name');
            $data['number']=$this->input->post('number');
            $data['joint_stock']=$this->input->post('joint_stock');
            $data['shomaj_sheba']=$this->input->post('shomaj_sheba');
            $data['ca_farm_audit']=$this->input->post('ca_farm_audit');
            $data['committee_resulation']=$this->input->post('committee_resulation');
			
			$this->site->insertData('foundation_foundation_info',$data);
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('foundation-trust_update'))
		{ 
            $data['name']=$this->input->post('name');
            $data['number']=$this->input->post('number');
            $data['joint_stock']=$this->input->post('joint_stock');
            $data['shomaj_sheba']=$this->input->post('shomaj_sheba');
            $data['ca_farm_audit']=$this->input->post('ca_farm_audit');
            $data['committee_resulation']=$this->input->post('committee_resulation');
			$this->site->updateData('foundation_foundation_info',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['foundation_trust'] = $this->db->get('foundation_foundation_info')->first_row('array');

        }

        $this->data['m'] = 'foundation';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/foundation/add_foundation_trust', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_foundation_others($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-foundation-others/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-foundation-others/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('foundation_others'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['guide_coaching_name']=$this->input->post('guide_coaching_name');
			$data['reg_ache_kina']=$this->input->post('reg_ache_kina');
            $data['kon_sreni']=$this->input->post('kon_sreni');
			$data['total_ay']=$this->input->post('total_ay');
            $data['total_bey']=$this->input->post('total_bey');
			$this->site->insertData('foundation_others',$data);
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('foundation_others_update'))
		{ 
            $data['guide_coaching_name']=$this->input->post('guide_coaching_name');
			$data['reg_ache_kina']=$this->input->post('reg_ache_kina');
            $data['kon_sreni']=$this->input->post('kon_sreni');
			$data['total_ay']=$this->input->post('total_ay');
            $data['total_bey']=$this->input->post('total_bey');
			$this->site->updateData('foundation_others',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/foundation-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['foundation_others'] = $this->db->get('foundation_others')->first_row('array');

        }

        $this->data['m'] = 'foundation';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/foundation/add_foundation_others', $meta, $this->data,'leftmenu/departmentsreport');
    }


 

///////////////////////////////////////////////
///////////////////////////////////////////////
///////////foundation_info ends///////////
///////////////////////////////////////////////
///////////////////////////////////////////////

   
     
    
	
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
