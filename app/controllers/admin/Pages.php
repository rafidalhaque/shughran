<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->admin_load('pages', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('pages_model');
        $this->digital_upload_path = $this->config->item('upload_location').'files/pages/';
        $this->upload_path = $this->config->item('upload_location').'files/pages/';
        $this->thumbs_path = $this->config->item('upload_location').'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function index($warehouse_id = NULL)
    {
        $this->sma->checkPermissions();

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('warehouse_id')) {
           // $this->data['warehouses'] = $this->site->getAllWarehouses();
          //  $this->data['warehouse_id'] = $warehouse_id;
           // $this->data['warehouse'] = $warehouse_id ? $this->site->getWarehouseByID($warehouse_id) : NULL;
        } else {
          //  $this->data['warehouses'] = NULL;
           // $this->data['warehouse_id'] = $this->session->userdata('warehouse_id');
           // $this->data['warehouse'] = $this->session->userdata('warehouse_id') ? $this->site->getWarehouseByID($this->session->userdata('warehouse_id')) : NULL;
        }

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('pages')));
        $meta = array('page_title' => lang('pages'), 'bc' => $bc);
        $this->page_construct('pages/index', $meta, $this->data);
    }

    function getPages($warehouse_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        
        if ((! $this->Owner || ! $this->Admin) && ! $warehouse_id) {
            $user = $this->site->getUser();
            $warehouse_id = NULL;
        }
        $detail_link = anchor('admin/pages/view/$1', '<i class="fa fa-file-text-o"></i> ' . lang('page_details'));
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_page") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('pages/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_page') . "</a>";
         // $single_label = anchor_popup('pages/single_label/$1/' . ($warehouse_id ? $warehouse_id : ''), '<i class="fa fa-print"></i> ' . lang('print_label'), $this->popup_attributes);
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
           
            <li><a href="' . admin_url('pages/edit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_page') . '</a></li>';
       
        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';
        $this->load->library('datatables');
         
            $this->datatables
                ->select("id, title , priority , IF(status=1, 'Active', 'Inactive') as status, date", FALSE)
                ->from('pages');
         
        
        
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

     

    


    /* ------------------------------------------------------- */

    function add($id = NULL)
    {
        $this->sma->checkPermissions();
        $this->load->helper('security');
       // $warehouses = $this->site->getAllWarehouses();
          
        $this->form_validation->set_rules('title', lang("title"), 'required|xss_clean');
          
        if ($this->form_validation->run() == true) {
               $data = array( 
                 
                'title' => $this->input->post('title'),
                 'priority' => $this->input->post('priority'),
                'status' => $this->input->post('status'),
                 'notes' => $this->input->post('notes'),
                 'created_by' => $this->session->userdata('user_id') 
                 
            );
            
            $this->load->library('upload');
             
       
            
            if ($_FILES['page_image']['size'] > 0) {

                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = $this->image_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['max_filename'] = 25;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('page_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("pages/add");
                }
                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload_path . $photo;
                $config['new_image'] = $this->thumbs_path . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $this->Settings->twidth;
                $config['height'] = $this->Settings->theight;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
                if ($this->Settings->watermark) {
                    $this->image_lib->clear();
                    $wm['source_image'] = $this->upload_path . $photo;
                    $wm['wm_text'] = 'Copyright ' . date('Y') . ' - ' . $this->Settings->site_name;
                    $wm['wm_type'] = 'text';
                    $wm['wm_font_path'] = 'system/fonts/texb.ttf';
                    $wm['quality'] = '100';
                    $wm['wm_font_size'] = '16';
                    $wm['wm_font_color'] = '999999';
                    $wm['wm_shadow_color'] = 'CCCCCC';
                    $wm['wm_vrt_alignment'] = 'top';
                    $wm['wm_hor_alignment'] = 'left';
                    $wm['wm_padding'] = '10';
                    $this->image_lib->initialize($wm);
                    $this->image_lib->watermark();
                }
                $this->image_lib->clear();
                $config = NULL;
            }

             
        }

        if ($this->form_validation->run() == true && $this->pages_model->addPage($data)) {
            $this->session->set_flashdata('message', lang("page_added"));
            admin_redirect('pages');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            
          //  $this->data['warehouses'] = $warehouses;
            $this->data['page'] = $id ? $this->pages_model->getPageByID($id) : NULL;
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('pages'), 'page' => lang('pages')), array('link' => '#', 'page' => lang('add_page')));
            $meta = array('page_title' => lang('add_page'), 'bc' => $bc);
            $this->page_construct('pages/add', $meta, $this->data);
        }
    }

    function suggestions()
    {
        $term = $this->input->get('term', TRUE);
        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->pages_model->getPageNames($term);
        if ($rows) {
            foreach ($rows as $row) {
                $pr[] = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'name' => $row->name, 'price' => $row->price, 'qty' => 1);
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }

    function get_suggestions()
    {
        $term = $this->input->get('term', TRUE);
        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->pages_model->getPagesForPrinting($term);
        if ($rows) {
            foreach ($rows as $row) {
                $variants = $this->pages_model->getPageOptions($row->id);
                $pr[] = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'name' => $row->name, 'price' => $row->price, 'qty' => 1, 'variants' => $variants);
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }

    function addByAjax()
    {
        if (!$this->sma->checkPermissions('add')) {
            exit(json_encode(array('msg' => lang('access_denied'))));
        }
        if ($this->input->get('token') && $this->input->get('token') == $this->session->userdata('user_csrf') && $this->input->is_ajax_request()) {
            $page = $this->input->get('page');
            if (!isset($page['code']) || empty($page['code'])) {
                exit(json_encode(array('msg' => lang('page_code_is_required'))));
            }
            if (!isset($page['name']) || empty($page['name'])) {
                exit(json_encode(array('msg' => lang('page_name_is_required'))));
            }
            if (!isset($page['category_id']) || empty($page['category_id'])) {
                exit(json_encode(array('msg' => lang('page_category_is_required'))));
            }
            if (!isset($page['unit']) || empty($page['unit'])) {
                exit(json_encode(array('msg' => lang('page_unit_is_required'))));
            }
            if (!isset($page['price']) || empty($page['price'])) {
                exit(json_encode(array('msg' => lang('page_price_is_required'))));
            }
            if (!isset($page['cost']) || empty($page['cost'])) {
                exit(json_encode(array('msg' => lang('page_cost_is_required'))));
            }
            if ($this->pages_model->getPageByCode($page['code'])) {
                exit(json_encode(array('msg' => lang('page_code_already_exist'))));
            }
            if ($row = $this->pages_model->addAjaxPage($page)) {
                $tax_rate = $this->site->getTaxRateByID($row->tax_rate);
                $pr = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'qty' => 1, 'cost' => $row->cost, 'name' => $row->name, 'tax_method' => $row->tax_method, 'tax_rate' => $tax_rate, 'discount' => '0');
                $this->sma->send_json(array('msg' => 'success', 'result' => $pr));
            } else {
                exit(json_encode(array('msg' => lang('failed_to_add_page'))));
            }
        } else {
            json_encode(array('msg' => 'Invalid token'));
        }

    }


    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
        $this->sma->checkPermissions();
        $this->load->helper('security');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
      //  $warehouses = $this->site->getAllWarehouses();
        
        $page = $this->pages_model->getPageByID($id);
        if (!$id || !$page) {
            $this->session->set_flashdata('error', lang('page_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->form_validation->set_rules('title', lang("title"), 'required');
        
        
         
        if ($this->form_validation->run() == true) {

            $data = array( 
                 
                'title' => $this->input->post('title'),
                 'priority' => $this->input->post('priority'),
                'status' => $this->input->post('status'),
                 'notes' => $this->input->post('notes'),
               // 'created_by' => $this->session->userdata('user_id') 
                 
            );
            
            $this->load->library('upload');
           
	    
            
            if ($_FILES['page_image']['size'] > 0) {

                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = $this->image_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('page_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("pages/edit/" . $id);
                }
                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload_path . $photo;
                $config['new_image'] = $this->thumbs_path . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $this->Settings->twidth;
                $config['height'] = $this->Settings->theight;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
                if ($this->Settings->watermark) {
                    $this->image_lib->clear();
                    $wm['source_image'] = $this->upload_path . $photo;
                    $wm['wm_text'] = 'Copyright ' . date('Y') . ' - ' . $this->Settings->site_name;
                    $wm['wm_type'] = 'text';
                    $wm['wm_font_path'] = 'system/fonts/texb.ttf';
                    $wm['quality'] = '100';
                    $wm['wm_font_size'] = '16';
                    $wm['wm_font_color'] = '999999';
                    $wm['wm_shadow_color'] = 'CCCCCC';
                    $wm['wm_vrt_alignment'] = 'top';
                    $wm['wm_hor_alignment'] = 'left';
                    $wm['wm_padding'] = '10';
                    $this->image_lib->initialize($wm);
                    $this->image_lib->watermark();
                }
                $this->image_lib->clear();
                $config = NULL;
            }

            
            
          }

        if ($this->form_validation->run() == true && $this->pages_model->updatePage($id, $data)) {
            $this->session->set_flashdata('message', lang("page_updated"));
            admin_redirect('pages');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            
          //  $this->data['warehouses'] = $warehouses;
            
            $this->data['page'] = $page;
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('pages'), 'page' => lang('pages')), array('link' => '#', 'page' => lang('edit_page')));
            $meta = array('page_title' => lang('edit_page'), 'bc' => $bc);
            $this->page_construct('pages/edit', $meta, $this->data);
        }
    }

    /* ---------------------------------------------------------------- */

    function import_csv()
    {
        $this->sma->checkPermissions('csv');
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');

        if ($this->form_validation->run() == true) {

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("pages/import_csv");
                }

                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 5000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);
                $updated = 0; $items = array();
                foreach ($arrResult as $key => $value) {
                    $item = [
                        'name'              => isset($value[0]) ? trim($value[0]) : '',
                        'code'              => isset($value[1]) ? trim($value[1]) : '',
                        'barcode_symbology' => isset($value[2]) ? mb_strtolower(trim($value[2]), 'UTF-8') : '',
                        'brand'             => isset($value[3]) ? trim($value[3]) : '',
                        'category_code'     => isset($value[4]) ? trim($value[4]) : '',
                        'unit'              => isset($value[5]) ? trim($value[5]) : '',
                        'sale_unit'         => isset($value[6]) ? trim($value[6]) : '',
                        'purchase_unit'     => isset($value[7]) ? trim($value[7]) : '',
                        'cost'              => isset($value[8]) ? trim($value[8]) : '',
                        'price'             => isset($value[9]) ? trim($value[9]) : '',
                        'alert_quantity'    => isset($value[10]) ? trim($value[10]) : '',
                        'tax_rate'          => isset($value[11]) ? trim($value[11]) : '',
                        'tax_method'        => isset($value[12]) ? (trim($value[12]) == 'exclusive' ? 1 : 0) : '',
                        'image'             => isset($value[13]) ? trim($value[13]) : '',
                        'subcategory_code'  => isset($value[14]) ? trim($value[14]) : '',
                        'variants'          => isset($value[15]) ? trim($value[15]) : '',
                        'cf1'               => isset($value[16]) ? trim($value[16]) : '',
                        'cf2'               => isset($value[17]) ? trim($value[17]) : '',
                        'cf3'               => isset($value[18]) ? trim($value[18]) : '',
                        'cf4'               => isset($value[19]) ? trim($value[19]) : '',
                        'cf5'               => isset($value[20]) ? trim($value[20]) : '',
                        'cf6'               => isset($value[21]) ? trim($value[21]) : '',
                        'hsn_code'          => isset($value[22]) ? trim($value[22]) : '',
                        'second_name'       => isset($value[23]) ? trim($value[23]) : '',
                        'slug'              => $this->sma->slug($value[0]),
                    ];

                    if ($catd = $this->pages_model->getCategoryByCode($item['category_code'])) {
                        $tax_details = $this->pages_model->getTaxRateByName($item['tax_rate']);
                        $prsubcat = $this->pages_model->getCategoryByCode($item['subcategory_code']);
                        $brand = $this->pages_model->getBrandByName($item['brand']);
                        $unit = $this->pages_model->getUnitByCode($item['unit']);
                        $base_unit = $unit ? $unit->id : NULL;
                        $sale_unit = $base_unit;
                        $purcahse_unit = $base_unit;
                        if ($base_unit) {
                            $units = $this->site->getUnitsByBUID($base_unit);
                            foreach ($units as $u) {
                                if ($u->code == $item['sale_unit']) {
                                    $sale_unit = $u->id;
                                }
                                if ($u->code == $item['purchase_unit']) {
                                    $purcahse_unit = $u->id;
                                }
                            }
                        } else {
                            $this->session->set_flashdata('error', lang("check_unit") . " (" . $item['unit'] . "). " . lang("unit_code_x_exist") . " " . lang("line_no") . " " . ($key+1));
                            admin_redirect("pages/import_csv");
                        }

                        unset($item['category_code'], $item['subcategory_code']);
                        $item['unit'] = $base_unit;
                        $item['sale_unit'] = $sale_unit;
                        $item['category_id'] = $catd->id;
                        $item['purchase_unit'] = $purcahse_unit;
                        $item['brand'] = $brand ? $brand->id : NULL;
                        $item['tax_rate'] = $tax_details ? $tax_details->id : NULL;
                        $item['subcategory_id'] = $prsubcat ? $prsubcat->id : NULL;

                        if ($page = $this->pages_model->getPageByCode($item['code'])) {
                            if ($page->type == 'standard') {
                                if ($item['variants']) {
                                    $vs = explode('|', $item['variants']);
                                    foreach ($vs as $v) {
                                        $variants[] = ['page_id' => $page->id, 'name' => trim($v)];
                                    }
                                }
                                unset($item['variants']);
                                if ($this->pages_model->updatePage($page->id, $item, null, null, null, null, $variants)) {
                                    $updated++;
                                }
                            }
                            $item = false;
                        }
                    } else {
                        $this->session->set_flashdata('error', lang("check_category_code") . " (" . $item['category_code'] . "). " . lang("category_code_x_exist") . " " . lang("line_no") . " " . ($key+1));
                        admin_redirect("pages/import_csv");
                    }

                    if ($item) {
                        $items[] = $item;
                    }
                }
            }

            // $this->sma->print_arrays($items);
        }

        if ($this->form_validation->run() == true && !empty($items)) {
            if ($this->pages_model->add_pages($items)) {
                $updated = $updated ? '<p>'.sprintf(lang("pages_updated"), $updated).'</p>' : '';
                $this->session->set_flashdata('message', sprintf(lang("pages_added"), count($items)).$updated);
                admin_redirect('pages');
            }
        } else {
            if (isset($items) && empty($items)) {
                if ($updated) {
                    $this->session->set_flashdata('message', sprintf(lang("pages_updated"), $updated));
                    admin_redirect('pages');
                } else {
                    $this->session->set_flashdata('warning', lang('csv_issue'));
                }
                admin_redirect('pages/import_csv');
            }

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['userfile'] = array('name' => 'userfile',
                'id' => 'userfile',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userfile')
            );

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('pages'), 'page' => lang('pages')), array('link' => '#', 'page' => lang('import_pages_by_csv')));
            $meta = array('page_title' => lang('import_pages_by_csv'), 'bc' => $bc);
            $this->page_construct('pages/import_csv', $meta, $this->data);

        }
    }

    /* ------------------------------------------------------------------ */

   
    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions(NULL, TRUE);

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->pages_model->deletePage($id)) {
			
            if($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("page_deleted")));
            }
			
            $this->session->set_flashdata('message', lang('page_deleted'));
            admin_redirect('pages');
        }

    }

    

    /* --------------------------------------------------------------------------------------------- */

    function modal_view($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $pr_details = $this->pages_model->getPageByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('content_not_found'));
            $this->sma->md();
        }
        
        $this->data['page'] = $pr_details;
         
      
        $this->load->view($this->theme.'pages/modal_view', $this->data);
    }

   
     
     
    function page_actions($wh = NULL)
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'sync_quantity') {

                    
                } elseif ($this->input->post('form_action') == 'delete') {

                    $this->sma->checkPermissions('delete');
                    foreach ($_POST['val'] as $id) {
                        $this->pages_model->deletePage($id);
                    }
                    $this->session->set_flashdata('message', $this->lang->line("pages_deleted"));
                    redirect($_SERVER["HTTP_REFERER"]);

                } elseif ($this->input->post('form_action') == 'labels') { } 
				elseif ($this->input->post('form_action') == 'export_excel') { }
            } else {
                $this->session->set_flashdata('error', $this->lang->line("no_page_selected"));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'admin/pages');
        }
    }

    public function delete_image($id = NULL)
    {
        $this->sma->checkPermissions('edit', true);
        if ($id && $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            $this->db->delete('page_photos', array('id' => $id));
            $this->sma->send_json(array('error' => 0, 'msg' => lang("image_deleted")));
        }
        $this->sma->send_json(array('error' => 1, 'msg' => lang("ajax_error")));
    }

    public function getSubUnits($unit_id)
    {
        // $unit = $this->site->getUnitByID($unit_id);
        // if ($units = $this->site->getUnitsByBUID($unit_id)) {
        //     array_push($units, $unit);
        // } else {
        //     $units = array($unit);
        // }
        $units = $this->site->getUnitsByBUID($unit_id);
        $this->sma->send_json($units);
    }

    public function qa_suggestions()
    {
        $term = $this->input->get('term', true);

        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $analyzed = $this->sma->analyze_term($term);
        $sr = $analyzed['term'];
        $option_id = $analyzed['option_id'];

        $rows = $this->pages_model->getQASuggestions($sr);
        if ($rows) {
            foreach ($rows as $row) {
                $row->qty = 1;
                $options = $this->pages_model->getPageOptions($row->id);
                $row->option = $option_id;
                $row->serial = '';
                $c = sha1(uniqid(mt_rand(), true));
                $pr[] = array('id' => $c, 'item_id' => $row->id, 'label' => $row->name . " (" . $row->code . ")",
                    'row' => $row, 'options' => $options);

            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }

    
    

     

    
 
    

}
