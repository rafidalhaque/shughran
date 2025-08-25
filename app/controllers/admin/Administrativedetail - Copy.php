<?php defined('BASEPATH') or exit('No direct script access allowed');

class Administrativedetail extends MY_Controller
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
        $this->load->admin_model('organization_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }












    function district($branch_id = NULL)
    {


       
        $this->sma->checkPermissions();
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
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









        if ($branch_id) {


            $this->data['district_info'] = $this->site->query("SELECT 
                        v3_district_upazila(district) district_name, 
                        -- district,
                        org_thana,
                        org_ward,
                        org_unit,
                        branch_number,
                        supporter_organization,district,
                        v3_count_zone(district, 2, 2,1) upazilla, v3_count_zone(district, 1, 2,1) thana
                        FROM (

                        SELECT 
                        SUM(CASE WHEN `level` = 1 THEN 1 ELSE 0 END) org_thana,
                        SUM(CASE WHEN `level` = 2 THEN 1 ELSE 0 END) org_ward,
                        SUM(CASE WHEN `level` = 3 THEN 1 ELSE 0 END) org_unit,
                        SUM(supporter_organization) supporter_organization,
                        COUNT(DISTINCT(branch_id)) branch_number, 
                        district
                        FROM sma_thana WHERE branch_id = $branch_id  GROUP BY  district 
                            
                        ) a");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT 
                    v3_district_upazila(district) district_name, 
                    -- district,
                    org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,
                    v3_count_zone(district, 2, 2,1) upazilla, v3_count_zone(district, 1, 2,1) thana
                    FROM (

                    SELECT 
                    SUM(CASE WHEN `level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN `level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN `level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district
                    FROM sma_thana GROUP BY  district 
                        
                    ) a");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);
       
            $this->page_construct2('administrativedetail/index', $meta, $this->data, 'leftmenu/organization');
    

}

}
