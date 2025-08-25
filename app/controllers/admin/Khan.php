<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Khan extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->admin_load('products', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('organization_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function insitution_code($warehouse_id = NULL)
    {
        $this->sma->checkPermissions();

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        
 
  $branches = $this->site->getAllBranches();
  
   
  // $this->sma->print_arrays($institutions);
  
  foreach($branches as $branch) if(in_array($branch->id , array(109,110,111) )){
     
    //  $institutions = $this->organization_model->getAllInstitution();
     
     
      $this->db->select("id, code, institution_name", FALSE)
				->from('institutionlist')
				->where('branch_id', $branch->id)->order_by('id asc');
     
     $q = $this->db->get();
     
     foreach($q->result() as $key=>$institution ) { 
         
         $ins_id = $institution->id;
         $last = $key+1;
     
          $institution_code =  sprintf('%03d',$branch->code).sprintf('%05d',$last);
          
          
    $data = array(
        'code'=>$institution_code,
              );
     
     //  $this->sma->print_arrays($data); 
     
   //  echo '<pre>';
   //  print_r($data);
   //  echo '</pre>';
     
     $this->site->updateData('institutionlist',$data,array('id'=>$ins_id));
     }
     
     $this->site->updateData('branches', array('last_institution_code'=>$last) ,array('id'=>$branch->id));
      
  }
 
 
    }
            

}
