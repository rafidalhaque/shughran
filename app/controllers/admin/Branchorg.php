<?php defined('BASEPATH') or exit('No direct script access allowed');

class Branchorg extends MY_Controller
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
		$this->load->admin_model('branchorg_model');
		$this->digital_upload_path = 'files/';
		$this->upload_path = 'assets/uploads/';
		$this->thumbs_path = 'assets/uploads/thumbs/';
		$this->image_types = 'gif|jpg|jpeg|png|tif';
		$this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
		$this->allowed_file_size = '1024';
		$this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
	}




 
    function branchlist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'শাখা সংগঠন তালিকা'));
        $meta = array('page_title' => 'শাখা সংগঠন তালিকা', 'bc' => $bc);
        $this->page_construct('branchorg/branchlist', $meta, $this->data, 'leftmenu/organization');
    }





    function getListbranch($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();

        // $this->sma->print_arrays($report_type);
        // exit();



        $edit_link = anchor('admin/branchorg/editbranch/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');

        // SELECT sma_thana.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code, sma_thana.org_type, d1.name AS district, d3.name AS upazila, d4.name AS unions, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.ins_name AS institute, v3_member_thana_count( sma_thana.branch_id, sma_thana.thana_code) AS member_number, v3_associate_thana_count( sma_thana.branch_id, sma_thana.thana_code ) AS associate_number, worker_number, supporter_number, ward_number, unit_number, is_ideal_thana, sma_thana.note FROM `sma_thana` LEFT JOIN sma_district AS d1 ON d1.id = sma_thana.district LEFT JOIN sma_district AS d3 ON d3.id = sma_thana.upazila LEFT JOIN sma_district AS d4 ON d4.id = sma_thana.union LEFT JOIN sma_district AS d5 ON d5.id = sma_thana.ward LEFT JOIN sma_institution AS i1 ON i1.id = sma_thana.institution_parent_id LEFT JOIN sma_institution AS i2 ON i2.id = sma_thana.sub_category LEFT JOIN sma_institutionlist AS i3 ON i3.id = sma_thana.institution_id LEFT JOIN `sma_branches` AS `t1` ON `t1`.`id`=`sma_thana`.`branch_id` WHERE ((is_pending = 1 AND `in_out` = 2) OR (`is_pending` = 2 AND `in_out` = 1)) ORDER BY `branch_name` ASC LIMIT 25

        $this->load->library('datatables');


        if ($branch_id) {

            //  $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name  , sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details, th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.ins_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 1)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, 
           v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number,   ward_number, unit_number, CASE WHEN is_ideal_thana = 1 THEN "Yes" ELSE "No" END is_ideal ', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.branch_id', $branch_id)->where('thana.level', 1)->where('thana.is_current', 1);


        } else {
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, 
v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number,    ward_number,   unit_number, CASE WHEN is_ideal_thana = 1 THEN "Yes" ELSE "No" END is_ideal ', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 1)->where('thana.is_current', 1);

        }


  		  $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Decrease' . "' href='" . admin_url('branchorg/branchdecrease/$1') . "' data-toggle='modal' data-target='#myModal'>ঘাটতি <i class=\"fa fa-minus\"></i></a>";
        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Actions", $edit_link, "id");

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }


	
    function editbranch($id = NULL, $type_id = null)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $thana_details = $this->site->getByID('thana', 'id', $id);


        $this->form_validation->set_rules('thana_name', 'name', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'branch_id' => $this->input->post('branch_id'),  //all time.

                'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),  //all time.
                'thana_code' => $this->input->post('thana_code'),  //all time.
                'org_type' => $this->input->post('org_type'),   //all time.
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id') ? $this->input->post('institution_id') : null,
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'note' => $this->input->post('note'), //all time.
                'update_by' => $this->session->userdata('user_id'), //all time.
                'update_at' => date("Y-m-d H:i:s"), //all time.
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),



            );









            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {


                $data['is_attached'] = $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                //  $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }



 



            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }

                $data['prosasonik_details'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }
 





            if ($type_id == 1) {

                $data['level'] = 1;
            } elseif ($type_id == 2) {

                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($type_id == 3) {
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);
                $data['level'] = 3;
            }


 

            $thana_log = array();

            if (1 || $this->Owner || $this->Admin) {  //apatoto
                $data['date'] = $this->sma->fsd($this->input->post('date'));
                $thana_log['date'] = $this->sma->fsd($this->input->post('date'));
            }



            if ($type_id == 2 || $type_id == 3) {
                $thana_log = array(
                    'branch_id' => $this->input->post('branch_id'),
                    'org_thana_id' => $this->input->post('thana_id'),
                    'org_ward_id' => $this->input->post('ward_id'),
                    'thana_id' => $id,   //thana ward uposhakha
                    'note' => $this->input->post('note'),
                    //'in_out' => 1,
                    'level' => $type_id,
                    // 'user_id' => $this->session->userdata('user_id')
                );
                //  $thana_id = $this->site->insertData('thana_log', $thana_log, 'id');
            }



            //  $this->sma->print_arrays($data,$thana_log);

        } elseif ($this->input->post('edit_thana')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/thanalist');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $data, array('id' => $id))) {




            if (1 || $this->Owner || $this->Admin) {
                $this->site->updateData('thana_log', $thana_log, array('thana_id' => $id, 'in_out' => 1));
            }



            if (isset($thana_details->institution_id) && $thana_details->institution_id > 0)
                $this->org_calculate_in_institution($thana_details->institution_id, $data['institution_id']);
            else if ($thana_details->institution_id == null || empty($thana_details->institution_id))
                $this->org_calculate_in_institution(null, $data['institution_id']);



            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect("organization/thanalist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['thana'] = $thana_details;

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);



            //$zone = $this->site->getByID('district', 'id', $thana_details->district);

            // $this->sma->print_arrays($thana_details);

            //top level list
            $this->data['districts'] = $this->site->getDistrict();

            //2nd level list
            //$this->data['second_level'] = $zone->parent_second_level != null ? $this->site->getByID('district','id',$zone->parent_second_level) : null;

            // $second_level = $thana_details->upazila != null ? $this->site->getByID('district','id',$thana_details->upazila) : null;
            $this->data['second_level'] = $thana_details->upazila != null ? $this->site->getList('district', '*', ['parent_top_level' => $thana_details->district, 'level' => 2]) : null;
            // $this->data['second_level'] = 
            //3rd level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['third_level'] = $thana_details->union != null ? $this->site->getList('district', '*', ['parent_second_level' => $thana_details->upazila, 'level' => 3]) : null;

            //4th level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['fourth_level'] = $thana_details->ward != null ? $this->site->getList('district', '*', ['parent_third_level' => $thana_details->union, 'level' => 4]) : null;

            $this->data['sub_category'] = $thana_details->institution_parent_id != null ? $this->db->where('type_id', $thana_details->institution_parent_id)->get('institution')->result() : null;


            $this->data['institutionlist'] = $thana_details->sub_category ? $this->db->where('institution_type_child', $thana_details->sub_category)->where('branch_id', $thana_details->branch_id)->get('institutionlist')->result() : null;


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $thana_details->branch_id;
                $this->data['branch'] = $this->site->getBranchByID($thana_details->branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }


            $this->load->view($this->theme . 'organization/thanaedit', $this->data);
        }
    }


    function branchdecrease($thana_id)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');





        $thana_info = $this->site->getByID('thana', 'id', $thana_id);


        $this->form_validation->set_rules('date', lang("date"), 'required');
        // $this->form_validation->set_rules('branch_id', 'Member', 'required|callback_check_branch[' . $this->input->post('branch_id') . ']');
        $this->form_validation->set_rules('thana_id', 'Thana', 'required|callback_check_thana[' . $thana_id . ']');
        $this->form_validation->set_rules('branch_id', 'Branch', 'required');



        if ($this->form_validation->run() == true) {

            $is_changeable = $this->site->check_confirm($thana_info->branch_id, date('Y-m-d'));


            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }


            $branch_id = $this->input->post('branch_id');
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

            $thana_data = array(
                'is_pending' => ($thana_info->level == 1 ? 1 : 2),
                'in_out' => 2, //($thana_info->level == 1 ? 2 : 1),
                'note' => $note,
                'is_current' => ($thana_info->level == 1 ? 1 : 2),
                'update_at' => date('Y-m-d H:i:s')
            );



            $thana_log = array(
                'branch_id' => $branch_id,
                'date' => $date,
                'thana_id' => $thana_id,
                'org_thana_id' => $thana_info->org_thana_id,   //thana ward union
                'org_ward_id' => $thana_info->org_ward_id,
                'note' => $note,
                'in_out' => 2,
                'level' => $thana_info->level,
                'user_id' => $this->session->userdata('user_id')
            );
        } elseif ($this->input->post('thanadecrease')) {



            $this->session->set_flashdata('error', validation_errors());
            if ($thana_info->level == 1)

                admin_redirect("organization/thanalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            else if ($thana_info->level == 1)

                admin_redirect("organization/wardlist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            else if ($thana_info->level == 1)
                admin_redirect("organization/uposhakhalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        }


        if ($this->form_validation->run() == true && $this->site->updateData('thana', $thana_data, array('id' => $thana_id)) && $this->site->insertData('thana_log', $thana_log)) {


            if (isset($thana_info->institution_id) && $thana_info->institution_id > 0)
                $this->org_calculate_in_institution($thana_info->institution_id);


            if ($thana_info->level == 1) {
                $this->session->set_flashdata('message', 'কেন্দ্রীয় সভাপতির অনুমোদনের জন্য অপেক্ষা করুন।');
                admin_redirect("organization/thanalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            } else if ($thana_info->level == 2) {
                $this->session->set_flashdata('message', 'ঘাটতি সম্পন্ন হয়েছে।');
                admin_redirect("organization/wardlist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            } else if ($thana_info->level == 3) {
                $this->session->set_flashdata('message', 'ঘাটতি সম্পন্ন হয়েছে।');
                admin_redirect("organization/uposhakhalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            }
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['thana'] = $thana_info;



            $this->load->view($this->theme . 'organization/thanadecrease', $this->data);
        }
    }



    function addbranch($branch_id = null, $id = null)
    {


        //thana_code

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/addthana/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/addthana/' . $this->session->userdata('branch_id'));
        }

        if ($branch_id == NULL && ($this->Owner || $this->Admin)) {
            //admin_redirect('organization/thanalist');
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($id == NULL) {
            //admin_redirect('organization/thanalist');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $this->load->admin_model('organization_model');
        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        $branches = $this->site->getAllBranches();
        $this->form_validation->set_rules('thana_name', 'name', 'required');
        if ($id == 1) {
            $this->form_validation->set_rules('thana_code', 'thana_code', 'required');
        }
        $this->form_validation->set_rules('branch_id', 'branch', 'required');


        // $this->sma->print_arrays($this->input->post());



        if ($this->form_validation->run() == true) {



            $data = array(
                'date' => $this->sma->fsd($this->input->post('date')),
                'branch_id' => $this->input->post('branch_id'),
                'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),
                'thana_code' => $this->input->post('thana_code'),
                'org_type' => $this->input->post('org_type'),
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id'),
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),
                'is_ideal_thana' => $this->input->post('is_ideal_thana'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'note' => $this->input->post('note'),
                'is_setup' => $this->input->post('is_setup'),
                'unit_category' => $this->input->post('unit_category'),
                'user_id' => $this->session->userdata('user_id'),
                'is_current' => ($id == 1 ? 2 : 1)

            );



            //org_type == 'Residential'  prosasonik_details==1,2,3,4  is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Residential'  prosasonik_details==3 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Residential'  prosasonik_details==2,3,4  is_attached !=1 
            //district  upazila  union ward




            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {

                unset($data['is_attached'], $data['institution_parent_id'], $data['sub_category'], $data['institution_id']);

            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                //  unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }


            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }






            //org_type == 'Institutional'  prosasonik_details == 5,6,7
            //district  upazila  union ward


            //org_type == 'Institutional'  prosasonik_details == 6     is_attached !=1 
            //institution_parent_id  sub_category  institution_id







            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {
                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }

                unset($data['prosasonik_details'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            //  institution_parent_id sub_category  institution_id



            //$this->sma->print_arrays($data);

            if ($id == 1) {
                $data['is_pending'] = 1;
                $data['level'] = 1;
            } elseif ($id == 2) {
                $data['is_pending'] = 2;
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($id == 3) {
                $data['is_pending'] = 2;
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 3;
            }


            $thana_id = $this->site->insertData('thana', $data, 'id');


            if ($id == 2 || $id == 3) {
                $thana_log = array(
                    'branch_id' => $this->input->post('branch_id'),
                    'date' => $this->sma->fsd($this->input->post('date')),
                    'org_thana_id' => $this->input->post('thana_id'),
                    'org_ward_id' => $this->input->post('ward_id'),
                    'thana_id' => $thana_id,   //thana ward uposhakha
                    'note' => $this->input->post('note'),
                    'in_out' => 1,
                    'level' => $id,
                    'user_id' => $this->session->userdata('user_id')
                );
                $thana_id = $this->site->insertData('thana_log', $thana_log, 'id');


                if (isset($data['institution_id']) && $data['institution_id'] > 0)
                    $this->org_calculate_in_institution($data['institution_id']);

            }


            if ($this->input->post('is_ideal_thana') == 1) {  // will need while approve
                $data_log = array(
                    'branch_id' => ($this->Owner || $this->Admin) ? $this->input->post('branch_id') : $this->session->userdata('branch_id'),
                    'date' => date('Y-m-d'),
                    'user_id' => $this->session->userdata('user_id'),
                    'is_ideal_thana' => 1,
                    'is_pending' => 1,
                    'thana_id' => $thana_id
                );

                $this->site->insertData('thana_ideal_log', $data_log);
            }






            if ($id == 1) {
                $this->session->set_flashdata('message', 'থানা যুক্ত হয়েছে। কেন্দ্রীয় সভাপতির অনুমোদনের জন্য অপেক্ষা করুন।');
                admin_redirect('organization/addthana/' . $branch_id . '/1');
            } elseif ($id == 2) {
                $this->session->set_flashdata('message', 'ওয়ার্ড যুক্ত হয়েছে।');
                admin_redirect('organization/addthana/' . $branch_id . '/2');
            } elseif ($id == 3) {
                $this->session->set_flashdata('message', 'উপশাখা যুক্ত হয়েছে।');
                admin_redirect('organization/addthana/' . $branch_id . '/3');
            }
        } else {


            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $branch_id;
                $this->data['branch'] = $this->site->getBranchByID($branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }

            $this->data['districts'] = $this->site->getDistrict();

            //$this->sma->print_arrays($this->data['districts']);



            if ($id != 1) {  //org thana
                if ($this->Owner || $this->Admin)
                    $this->data['thanas'] = $this->site->getThanaByBranch($branch_id);
                else
                    $this->data['thanas'] = $this->site->getThanaByBranch($this->session->userdata('branch_id'));
            }


            $this->data['institutions'] = $this->organization_model->getAllInstitution(1);
            // $this->data['institutiontype'] = $this->organization_model->getInstitutionType();
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);


            // $this->sma->print_arrays($this->data);

            if ($id == 1) {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('থানা')));
                $meta = array('page_title' => lang('থানা '), 'bc' => $bc);


                $this->page_construct('branchorg/addbranch', $meta, $this->data, 'leftmenu/organization');
            } elseif ($id == 2) {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('ওয়ার্ড')));
                $meta = array('page_title' => lang('ওয়ার্ড '), 'bc' => $bc);

                $this->page_construct('organization/addward', $meta, $this->data, 'leftmenu/organization');
            } elseif ($id == 3) {
                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('উপশাখা')));
                $meta = array('page_title' => lang('উপশাখা '), 'bc' => $bc);
                $this->page_construct('organization/adduposhakha', $meta, $this->data, 'leftmenu/organization');
            } else {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সমর্থক সংগঠন')));
                $meta = array('page_title' => lang('সমর্থক সংগঠন '), 'bc' => $bc);
                $this->page_construct('organization/addsupporter', $meta, $this->data, 'leftmenu/organization');
            }
        }
    }

	
    ///////////////////////////////////////////////////////////////
    //////////////////Export///////////////////////////////////////
    /////////////////////////////////////////////////////////////// 

    function branchexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();
        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;

        if ($branch_id) {


            $this->db
                ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`,v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
            v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit ,
             `is_ideal_thana`", false)
                ->join('branches', 'branches.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id)->where('`level`', 1)->where('`is_current`', 1);
        } else {

            $this->db
                ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`,v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
            v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit , 
          `is_ideal_thana`", false)
                ->join('branches', 'branches.id=thana.branch_id', 'left')
                ->from('thana')->where('`level`', 1)->where('`is_current`', 1);
        }









        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);




            $this->excel->getActiveSheet()->setTitle('থানা তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানার নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'থানা কোড');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('H1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'উপশাখা');

            $this->excel->getActiveSheet()->SetCellValue('K1', 'আদর্শ থানা');
            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->thana_code);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->member);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->associate);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->ward);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->unit);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->is_ideal_thana == 1 ? 'Yes' : 'No');

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_thana_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


 
}
