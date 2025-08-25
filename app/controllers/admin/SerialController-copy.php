<?php defined('BASEPATH') or exit('No direct script access allowed');

class SerialController extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->load->helper('serial_form_helper'); // serial form load 
        // Load the URL helper in CodeIgniter (if not already autoloaded)
        $this->load->helper('url');     

        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->helper('report');
        $this->load->admin_model('organization_model');
 }

    /* -----------sent serial ---------------- */

    function sentserial($branch_id = NULL)
    {

        $this->form_validation->set_rules('branch_id', lang("branch"), 'required');      
        $this->form_validation->set_rules('dept_id', 'Department', 'required');      
        $this->form_validation->set_rules('report_type', 'Report Type', 'required');      

        if ($this->form_validation->run() == true) {
            
                $data = array(
                    'branch_id' => $this->input->post('branch_id'),
                    'dept_id' => $this->input->post('dept_id'),
                    'report_type' => $this->input->post('report_type'),
                    'report_year' => date(Y),
                    'user_id'=>$this->session->userdata('user_id')
                );

                $dept_id = $this->input->post('dept_id'); // get department id
                // insert data and collect result 
                $result = $this->site->insertData('serial_reports', $data);

                $this->session->set_flashdata('message', 'সিরিয়াল দেওয়া হয়েছে।');
                
                if($result && $dept_id == 5){
                    // literature department code = 5 
                    admin_redirect("departmentsreport/literature-page-one/" . $branch_id);
                }elseif($result && $dept_id == 6){ 
                    // dawah department code = 6              
                  admin_redirect("departmentsreport/dawah-page-one/" . $branch_id);
                }elseif($result && $dept_id == 7){ 
                    // law department code = 7              
                    admin_redirect("departmentsreport/law-page-one/" . $branch_id);
                }elseif($result && $dept_id == 8){ 
                    // foundation department code = 8              
                  admin_redirect("departmentsreport/foundation-page-one/" . $branch_id);
                }elseif($result && $dept_id == 9){ 
                    // publicity department code = 9              
                    admin_redirect("departmentsreport/publicity-page-one/" . $branch_id);
                }elseif($result && $dept_id == 10){ 
                    // international department code = 10              
                    admin_redirect("departmentsreport/international-page-one/" . $branch_id);
                }elseif($result && $dept_id == 11){ 
                    // shikha department code = 11              
                  admin_redirect("departmentsreport/shikha-page-one/" . $branch_id);
                }elseif($result && $dept_id == 12){                
                    // manpower-bivag (মানবসম্পদ ব্যবস্থাপনা বিভাগ) code = 12              
                    admin_redirect("departmentsreport/manpower-bivag/" . $branch_id);
                }elseif($result && $dept_id == 13){ 
                    // publication department code = 13              
                    admin_redirect("departmentsreport/publication-page-one/" . $branch_id);
                }elseif($result && $dept_id == 14){ 
                    // chatro-andolon-bivag code = 14             
                  admin_redirect("departmentsreport/chatro-andolon-bivag/" . $branch_id);
                }elseif($result && $dept_id == 15){ 
                    // chatrokollan-bivag code = 15              
                    admin_redirect("departmentsreport/chatrokollan-bivag/" . $branch_id);
                }elseif($result && $dept_id == 16){ 
                    // culture department code = 16              
                  admin_redirect("departmentsreport/culture-page-one/" . $branch_id);
                }elseif($result && $dept_id == 17){ 
                    // science department code = 17              
                    admin_redirect("departmentsreport/science-page-one/" . $branch_id);
                }elseif($result && $dept_id == 18){ 
                    // manobadhikar-bivag code = 18              
                    admin_redirect("departmentsreport/manobadhikar-bivag/" . $branch_id);
                }elseif($result && $dept_id == 19){ 
                    // madrasha department code = 19              
                    admin_redirect("departmentsreport/madrasha-page-one/" . $branch_id);
                }elseif($result && $dept_id == 20){ 
                    // poriklpona-bivag department code = 20              
                  admin_redirect("departmentsreport/poriklpona-bivag/" . $branch_id);
                }elseif($result && $dept_id == 21){ 
                    // college department code = 21              
                    admin_redirect("departmentsreport/college-page-two/" . $branch_id);
                }elseif($result && $dept_id == 22){ 
                    // research department code = 22              
                  admin_redirect("departmentsreport/research-page-one/" . $branch_id);
                }elseif($result && $dept_id == 23){ 
                    // school department code = 23              
                    admin_redirect("departmentsreport/school-page-one/" . $branch_id);
                }elseif($result && $dept_id == 24){ 
                    // media department code = 24              
                  admin_redirect("departmentsreport/media-page-one/" . $branch_id);
                }elseif($result && $dept_id == 25){ 
                    // bitorko department code = 25              
                    admin_redirect("departmentsreport/bitorko-page-one/" . $branch_id);
                }elseif($result && $dept_id == 26){ 
                    // pathagar-bivag code = 26              
                  admin_redirect("departmentsreport/pathagar-bivag/" . $branch_id);
                }elseif($result && $dept_id == 27){ 
                    // /information-bivag code = 27              
                    admin_redirect("departmentsreport/information-bivag/" . $branch_id);
                }elseif($result && $dept_id == 28){ 
                    // sports department code = 28              
                    admin_redirect("departmentsreport/sports-page-one/" . $branch_id);
                }elseif($result && $dept_id == 29){ 
                    // it-bivag code = 29              
                    admin_redirect("departmentsreport/it-bivag/" . $branch_id);
                }elseif($result && $dept_id == 30){ 
                    // social-welfare-bivag = 30              
                    admin_redirect("departmentsreport/social-welfare-bivag/" . $branch_id);
                }elseif($result && $dept_id == 43){ 
                    // it-bivag_sm (social media)  code = 43              
                    admin_redirect("departmentsreport/it-bivag_sm/" . $branch_id);
                }elseif($result && $dept_id == 44){ 
                    // business department code = 44              
                    admin_redirect("departmentsreport/business-page-one/" . $branch_id);
                }elseif($result && $dept_id == 45){ 
                    // others = 45             
                    admin_redirect("departmentsreport/others-page-one/" . $branch_id);
                }
                
        
        } elseif($this->input->post('serialForcheck')) {

                $this->session->set_flashdata('error', validation_errors());            
            
                admin_redirect("departmentsreport/" . $branch_id);
                
        }

    }

    /* ----------- /. sent serial ---------------- */
  


    /* -----------updated serial with comment  ---------------- */
 
     function updateSerial($branch_id= NULL) {

        // Set validation rules for the fields you want to update
        $this->form_validation->set_rules('is_checked', 'Check Status', 'required');
        $this->form_validation->set_rules('is_reportok', 'Report Status', 'required');
        $this->form_validation->set_rules('dept_review', 'Department Review', 'trim');

        if($this->form_validation->run() == TRUE){
            // Prepare data for updating the record
            $data = [
                'is_checked'   => $this->input->post('is_checked'),
                'is_reportok' => $this->input->post('is_reportok'),
                'dept_review'  => $this->input->post('dept_review')
            ];
            
            $where = array(
                'branch_id' => $this->input->post('branch_id'),
                'dept_id' => $this->input->post('dept_id'),
            );
            
            $dept_id = $this->input->post('dept_id');


            // Call the update function in the model and pass the data and branch_id
            $up_result = $this->site->updateData('serial_reports', $data, $where);
            $this->session->set_flashdata('message', 'Message updated successfully');
            if ($up_result) {
   
                if($up_result && $dept_id == 5){
                    // literature department code = 5 
                    admin_redirect("departmentsreport/literature-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 6){ 
                    // dawah department code = 6              
                  admin_redirect("departmentsreport/dawah-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 7){ 
                    // law department code = 7              
                    admin_redirect("departmentsreport/law-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 8){ 
                    // foundation department code = 8              
                  admin_redirect("departmentsreport/foundation-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 9){ 
                    // publicity department code = 9              
                    admin_redirect("departmentsreport/publicity-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 10){ 
                    // international department code = 10              
                    admin_redirect("departmentsreport/international-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 11){ 
                    // shikha department code = 11              
                  admin_redirect("departmentsreport/shikha-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 12){                
                    // manpower-bivag (মানবসম্পদ ব্যবস্থাপনা বিভাগ) code = 12              
                    admin_redirect("departmentsreport/manpower-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 13){ 
                    // publication department code = 13              
                    admin_redirect("departmentsreport/publication-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 14){ 
                    // chatro-andolon-bivag code = 14             
                  admin_redirect("departmentsreport/chatro-andolon-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 15){ 
                    // chatrokollan-bivag code = 15              
                    admin_redirect("departmentsreport/chatrokollan-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 16){ 
                    // culture department code = 16              
                  admin_redirect("departmentsreport/culture-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 17){ 
                    // science department code = 17              
                    admin_redirect("departmentsreport/science-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 18){ 
                    // manobadhikar-bivag code = 18              
                    admin_redirect("departmentsreport/manobadhikar-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 19){ 
                    // madrasha department code = 19              
                    admin_redirect("departmentsreport/madrasha-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 20){ 
                    // poriklpona-bivag department code = 20              
                  admin_redirect("departmentsreport/poriklpona-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 21){ 
                    // college department code = 21              
                    admin_redirect("departmentsreport/college-page-two/" . $branch_id);
                }elseif($up_result && $dept_id == 22){ 
                    // research department code = 22              
                  admin_redirect("departmentsreport/research-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 23){ 
                    // school department code = 23              
                    admin_redirect("departmentsreport/school-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 24){ 
                    // media department code = 24              
                  admin_redirect("departmentsreport/media-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 25){ 
                    // bitorko department code = 25              
                    admin_redirect("departmentsreport/bitorko-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 26){ 
                    // pathagar-bivag code = 26              
                  admin_redirect("departmentsreport/pathagar-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 27){ 
                    // /information-bivag code = 27              
                    admin_redirect("departmentsreport/information-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 28){ 
                    // sports department code = 28              
                    admin_redirect("departmentsreport/sports-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 29){ 
                    // it-bivag code = 29              
                    admin_redirect("departmentsreport/it-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 30){ 
                    // social-welfare-bivag = 30              
                    admin_redirect("departmentsreport/social-welfare-bivag/" . $branch_id);
                }elseif($up_result && $dept_id == 43){ 
                    // it-bivag_sm (social media)  code = 43              
                    admin_redirect("departmentsreport/it-bivag_sm/" . $branch_id);
                }elseif($up_result && $dept_id == 44){ 
                    // business department code = 44              
                    admin_redirect("departmentsreport/business-page-one/" . $branch_id);
                }elseif($up_result && $dept_id == 45){ 
                    // others = 45             
                    admin_redirect("departmentsreport/others-page-one/" . $branch_id);
                }
                

            } else {                
                // Error message and redirect
                $this->session->set_flashdata('error', 'Failed to update record');
                admin_redirect("departmentsreport/" . $branch_id);
            }
            



        }else {
            // Error message and redirect
            $this->session->set_flashdata('error', 'Failed to update record');
            admin_redirect("departmentsreport/" . $branch_id);
        }
    }

    /* -----------/. update serial ---------------- */
  
}
