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



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/district/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/district/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name district_name ,
             b.org_thana,
                    b.org_ward,
                    b.org_unit,
                    b.branch_number,
                    b.supporter_organization,b.district,
                    v3_count_area_thana_upozilla(b.district, 2, $branch_id) upazilla, v3_count_area_thana_upozilla(b.district, 1, $branch_id) thana  FROM `sma_district` LEFT JOIN  
		
		(SELECT 
                    
                    
                    org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district 
                    FROM (

                    SELECT 
                    SUM(CASE WHEN `level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN `level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN `level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district
                    FROM sma_thana where branch_id = $branch_id GROUP BY  district 
                        
                    ) a )b ON sma_district.id = b.district WHERE sma_district.level=1
                    AND  sma_district.id  IN (
SELECT DISTINCT district_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name district_name ,
             b.org_thana,
                    b.org_ward,
                    b.org_unit,
                    b.branch_number,
                    b.supporter_organization,b.district,
                    v3_count_area_thana_upozilla(b.district, 2,-1) upazilla, v3_count_area_thana_upozilla(b.district, 1, -1) thana   FROM `sma_district` LEFT JOIN  
		
		(SELECT 
                    
                    
                    org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district 
                    FROM (

                    SELECT 
                    SUM(CASE WHEN `level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN `level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN `level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district
                    FROM sma_thana GROUP BY  district 
                        
                    ) a )b ON sma_district.id = b.district WHERE sma_district.level=1");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/index', $meta, $this->data, 'leftmenu/organization');


    }



    function thana($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/thana/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/thana/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name thana_name ,v3_district_upazila( sma_district.parent_top_level) district_name, 
            
            b.org_thana,
                    b.org_ward,
                    b.org_unit,
                    b.branch_number,
                    b.supporter_organization,b.district,b.upazila,
                      v3_count_area_ward(b.upazila, 1,2, $branch_id ) ward_number  FROM `sma_district` LEFT JOIN  
		
		(  SELECT          org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila 
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila 
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.upazila 
                                       
                    
                    WHERE 
                     branch_id = $branch_id AND   sma_district.level = 2 AND   sma_district.zone_type =1             
                     GROUP BY  district,upazila 
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.upazila WHERE sma_district.level=2 AND sma_district.zone_type = 1 
                    AND   sma_district.id  IN (
SELECT DISTINCT thana_upazila_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )

                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name thana_name ,v3_district_upazila( sma_district.parent_top_level) district_name, 
            b.org_thana,
                    b.org_ward,
                    b.org_unit,
                    b.branch_number,
                    b.supporter_organization,b.district,b.upazila,
                        v3_count_area_ward(b.upazila, 1, 2,-1 ) ward_number  FROM `sma_district` LEFT JOIN  
		
		(  SELECT          org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila 
                      
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila 
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.upazila 
                                       
                    
                    WHERE 
                        sma_district.level = 2 AND   sma_district.zone_type = 1              
                     GROUP BY  district,upazila 
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.upazila WHERE sma_district.level=2 AND sma_district.zone_type = 1");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/thana', $meta, $this->data, 'leftmenu/organization');


    }









    function upazila($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/upazila/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/upazila/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name thana_name ,v3_district_upazila( sma_district.parent_top_level) district_name, 
             b.org_thana,
                    b.org_ward,
                    b.org_unit,
                    b.branch_number,
                    b.supporter_organization,b.district,b.upazila,
                      v3_count_area_paurosova_union(b.upazila, 1, 2,$branch_id) paurosova_number,
                      v3_count_area_paurosova_union(b.upazila, 2, 2,$branch_id) union_number
               FROM `sma_district` LEFT JOIN  
		
		(  SELECT          org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila 
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila 
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.upazila 
                                       
                    
                    WHERE 
                     branch_id = $branch_id AND   sma_district.level = 2 AND   sma_district.zone_type =2             
                     GROUP BY  district,upazila 
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.upazila WHERE sma_district.level=2 AND sma_district.zone_type = 2
                    AND   sma_district.id  IN (
SELECT DISTINCT thana_upazila_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name thana_name ,
            v3_district_upazila( sma_district.parent_top_level) district_name, 
            b.org_thana,b.org_ward,b.org_unit,b.branch_number,b.supporter_organization,b.district,
            b.upazila,
                      v3_count_area_paurosova_union(b.upazila, 1, 2,-1) paurosova_number,
                      v3_count_area_paurosova_union(b.upazila, 2, 2,-1) union_number  FROM `sma_district` LEFT JOIN  
		
		(  SELECT          org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila 
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.upazila 
                                       
                    
                    WHERE 
                        sma_district.level = 2 AND   sma_district.zone_type = 2              
                     GROUP BY  district,upazila 
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.upazila WHERE sma_district.level=2 AND sma_district.zone_type = 2");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/upazila', $meta, $this->data, 'leftmenu/organization');


    }






    function pourosova($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/pourosova/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/pourosova/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name pourosova_name ,v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) upazila_name,
 v3_count_zone(sma_district.id, 3, 4,3) ward_number ,b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` pourosova 
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                   -- , v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`union`
                                       
                    
                    WHERE 
                      branch_id = $branch_id AND  sma_district.level = 3 AND   sma_district.zone_type = 1             
                     GROUP BY  district,upazila ,`union`
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.pourosova WHERE sma_district.level=3 AND sma_district.zone_type = 1
                     AND   sma_district.id  IN (
SELECT DISTINCT pourashava_union_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name pourosova_name ,v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) upazila_name,
 v3_count_zone(sma_district.id, 3, 4,3) ward_number ,b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` pourosova 
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  , v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`union`
                                       
                    
                    WHERE 
                       sma_district.level = 3 AND   sma_district.zone_type = 1             
                     GROUP BY  district,upazila ,`union`
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.pourosova WHERE sma_district.level=3 AND sma_district.zone_type = 1");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/pourosova', $meta, $this->data, 'leftmenu/organization');


    }







    function union($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/union/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/union/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name union_name ,v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) upazila_name,
 `v3_count_area_ward`(sma_district.id, 2,3,$branch_id) ward_number,b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(   
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` 
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                   -- , v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`union`
                                       
                    
                    WHERE 
                      branch_id = $branch_id AND  sma_district.level = 3 AND   sma_district.zone_type = 2             
                     GROUP BY  district,upazila ,`union`
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.union WHERE sma_district.level=3 AND sma_district.zone_type = 2
                    
                     AND   sma_district.id  IN (
SELECT DISTINCT pourashava_union_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name union_name ,v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) upazila_name,
 `v3_count_area_ward`(sma_district.id, 2,3,-1) ward_number, b.org_thana, b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` 
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                   -- ,v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`union`
                                       
                    
                    WHERE 
                        sma_district.level = 3 AND   sma_district.zone_type = 2             
                     GROUP BY  district,upazila ,`union`
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.union WHERE sma_district.level=3 AND sma_district.zone_type = 2");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/union', $meta, $this->data, 'leftmenu/organization');


    }



    function cityward($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/cityward/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/cityward/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) union_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union`, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                      branch_id = $branch_id AND  sma_district.level = 4 AND   sma_district.zone_type = 1             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 1
                     AND   sma_district.id  IN (
SELECT DISTINCT ward_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) union_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union`, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                        sma_district.level = 4 AND   sma_district.zone_type = 1             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 1");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/cityward', $meta, $this->data, 'leftmenu/organization');


    }




    function pouroward($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/pouroward/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/pouroward/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) pourosova_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` pourosova, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                        branch_id = $branch_id AND sma_district.level = 4 AND   sma_district.zone_type = 3             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 3
                    AND   sma_district.id  IN (
SELECT DISTINCT ward_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) pourosova_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union` pourosova, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                        sma_district.level = 4 AND   sma_district.zone_type = 3             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 3");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/pouroward', $meta, $this->data, 'leftmenu/organization');


    }



    function unionward($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('administrativedetail/unionward/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('administrativedetail/unionward/' . $this->session->userdata('branch_id'));
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


            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) union_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union`, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                      branch_id = $branch_id AND  sma_district.level = 4 AND   sma_district.zone_type = 2             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 2
                    AND   sma_district.id  IN (
SELECT DISTINCT ward_id FROM   sma_administrative_area WHERE   branch_id = $branch_id                   
                    )
                    ");



        } else {

            $this->data['district_info'] = $this->site->query("SELECT sma_district.name ward_name, v3_district_upazila( sma_district.parent_top_level) district_name,
v3_district_upazila( sma_district.parent_second_level) thana_name, v3_district_upazila( sma_district.parent_third_level) union_name,
  b.org_thana,b.org_ward,b.org_unit, b.supporter_organization, b.branch_number  FROM `sma_district` LEFT JOIN  
		
		(  
		
		    SELECT       org_thana,
                    org_ward,
                    org_unit,
                    branch_number,
                    supporter_organization,district,upazila,`union`, ward
                  --  `v3_count_zone`(in_parent_id  INT, in_zone_type  INT, in_zone_level  INT, in_parent_level INT)
                  --  v3_count_zone(`union`, 1, 4,3) ward_number
                    FROM (
                    
                    SELECT 
                    SUM(CASE WHEN sma_thana.`level` = 1 THEN 1 ELSE 0 END) org_thana,
                    SUM(CASE WHEN sma_thana.`level` = 2 THEN 1 ELSE 0 END) org_ward,
                    SUM(CASE WHEN sma_thana.`level` = 3 THEN 1 ELSE 0 END) org_unit,
                    SUM(supporter_organization) supporter_organization,
                    COUNT(DISTINCT(branch_id)) branch_number, 
                    district, upazila, `union`, ward
                    FROM sma_thana 
                    LEFT JOIN sma_district ON sma_district.id = sma_thana.`ward`
                                       
                    
                    WHERE 
                        sma_district.level = 4 AND   sma_district.zone_type = 2             
                     GROUP BY  district,upazila ,`union`, ward
                        
                    ) a 
                    
                                        
                    )b ON sma_district.id = b.ward WHERE sma_district.level = 4 AND sma_district.zone_type = 2");
        }







        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administrative detail'));
        $meta = array('page_title' => 'Administrative detail', 'bc' => $bc);

        $this->page_construct('administrativedetail/unionward', $meta, $this->data, 'leftmenu/organization');


    }


    function fuad()
    {

        exit();

        $result = $this->site->query(" SELECT DISTINCT parent_second_level FROM sma_district WHERE `level` = 4 AND parent_top_level IS NULL AND parent_second_level IS NOT NULL");


        foreach ($result as $row) {

            $result = $this->site->getByID('district', 'id', $row['parent_second_level']);
            $this->db->where('parent_second_level', $row['parent_second_level']);
            $this->db->where('level', 4);
            $this->db->where('parent_top_level', null, false); // Use 'false' to prevent automatic escaping
            // Update the table
            $this->db->update('district',['parent_top_level' => $result->parent_top_level]);
          
            echo $result->parent_top_level . '>>' . $row['parent_second_level'] . '<br/>';
        }




    }


}
