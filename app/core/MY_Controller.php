<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->Settings = $this->site->get_setting();


        if ($sma_language = $this->input->cookie('sma_language', TRUE)) {
            $this->config->set_item('language', $sma_language);
            $this->lang->admin_load('sma', $sma_language);
            $this->Settings->user_language = $sma_language;
        } else {
            $this->config->set_item('language', $this->Settings->language);
            $this->lang->admin_load('sma', $this->Settings->language);
            $this->Settings->user_language = $this->Settings->language;
        }
        if ($rtl_support = $this->input->cookie('sma_rtl_support', TRUE)) {
            $this->Settings->user_rtl = $rtl_support;
        } else {
            $this->Settings->user_rtl = $this->Settings->rtl;
        }
        $this->theme = $this->Settings->theme . '/admin/views/';
        if (is_dir(VIEWPATH . $this->Settings->theme . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR)) {
            $this->data['assets'] = base_url() . 'themes/' . $this->Settings->theme . '/admin/assets/';
        } else {
            $this->data['assets'] = base_url() . 'themes/default/admin/assets/';
        }

        $this->data['Settings'] = $this->Settings;
        $this->loggedIn = $this->sma->logged_in();

        if ($this->loggedIn) {
            $this->default_currency = $this->site->getCurrencyByCode($this->Settings->default_currency);
            $this->data['default_currency'] = $this->default_currency;
            $this->Owner = $this->sma->in_group('owner') ? TRUE : NULL;
            $this->data['Owner'] = $this->Owner;
            $this->Customer = $this->sma->in_group('customer') ? TRUE : NULL;
            $this->data['Customer'] = $this->Customer;
            $this->Supplier = $this->sma->in_group('supplier') ? TRUE : NULL;
            $this->data['Supplier'] = $this->Supplier;
            $this->Admin = $this->sma->in_group('admin') ? TRUE : NULL;
            $this->data['Admin'] = $this->Admin;

            if ($sd = $this->site->getDateFormat($this->Settings->dateformat)) {
                $dateFormats = array(
                    'js_sdate' => $sd->js,
                    'php_sdate' => $sd->php,
                    'mysq_sdate' => $sd->sql,
                    'js_ldate' => $sd->js . ' hh:ii',
                    'php_ldate' => $sd->php . ' H:i',
                    'mysql_ldate' => $sd->sql . ' %H:%i'
                );
            } else {
                $dateFormats = array(
                    'js_sdate' => 'mm-dd-yyyy',
                    'php_sdate' => 'm-d-Y',
                    'mysq_sdate' => '%m-%d-%Y',
                    'js_ldate' => 'mm-dd-yyyy hh:ii:ss',
                    'php_ldate' => 'm-d-Y H:i:s',
                    'mysql_ldate' => '%m-%d-%Y %T'
                );
            }
            if (file_exists(APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'Pos.php')) {
                define("POS", 1);
            } else {
                define("POS", 0);
            }
            if (file_exists(APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'Shop.php')) {
                define("SHOP", 1);
            } else {
                define("SHOP", 0);
            }
            if (!$this->Owner && !$this->Admin) {
                $gp = $this->site->checkPermissions();
                $this->GP = $gp[0];
                $this->data['GP'] = $gp[0];
            } else {
                $this->data['GP'] = NULL;
            }
            $this->dateFormats = $dateFormats;
            $this->data['dateFormats'] = $dateFormats;
            $this->load->language('calendar');
            //$this->default_currency = $this->Settings->currency_code;
            //$this->data['default_currency'] = $this->default_currency;
            $this->m = strtolower($this->router->fetch_class());
            $this->v = strtolower($this->router->fetch_method());
            $this->data['m'] = $this->m;
            $this->data['v'] = $this->v;
            $this->data['dt_lang'] = json_encode(lang('datatables_lang'));
            $this->data['dp_lang'] = json_encode(array('days' => array(lang('cal_sunday'), lang('cal_monday'), lang('cal_tuesday'), lang('cal_wednesday'), lang('cal_thursday'), lang('cal_friday'), lang('cal_saturday'), lang('cal_sunday')), 'daysShort' => array(lang('cal_sun'), lang('cal_mon'), lang('cal_tue'), lang('cal_wed'), lang('cal_thu'), lang('cal_fri'), lang('cal_sat'), lang('cal_sun')), 'daysMin' => array(lang('cal_su'), lang('cal_mo'), lang('cal_tu'), lang('cal_we'), lang('cal_th'), lang('cal_fr'), lang('cal_sa'), lang('cal_su')), 'months' => array(lang('cal_january'), lang('cal_february'), lang('cal_march'), lang('cal_april'), lang('cal_may'), lang('cal_june'), lang('cal_july'), lang('cal_august'), lang('cal_september'), lang('cal_october'), lang('cal_november'), lang('cal_december')), 'monthsShort' => array(lang('cal_jan'), lang('cal_feb'), lang('cal_mar'), lang('cal_apr'), lang('cal_may'), lang('cal_jun'), lang('cal_jul'), lang('cal_aug'), lang('cal_sep'), lang('cal_oct'), lang('cal_nov'), lang('cal_dec')), 'today' => lang('today'), 'suffix' => array(), 'meridiem' => array()));
            $this->Settings->indian_gst = FALSE;
            if ($this->Settings->invoice_view > 0) {
                $this->Settings->indian_gst = $this->Settings->invoice_view == 2 ? TRUE : FALSE;
                $this->Settings->format_gst = TRUE;
                $this->load->library('gst');
            }





            $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);


            $current_date = strtotime(date('Y-m-d'));


            $annual_start = strtotime($entrytimeinfo->startdate_annual);
            $annual_end = strtotime($entrytimeinfo->enddate_annual);

            $half_start = strtotime($entrytimeinfo->startdate_half);
            $half_end = strtotime($entrytimeinfo->enddate_half);

            $type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual';

            if ($type == 'half_yearly')
                $this->data['reportdate'] =  array('type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
            else
                $this->data['reportdate'] =  array('type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);







            $this->data['entry_permission'] = $this->site->get_entry_permission();
        }
    }

    function page_construct($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
    {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $meta['support_ticket'] = $this->site->getTickets();

        //$this->sma->print_arrays($meta['support_ticket']);
        $meta['events'] = $this->site->getUpcomingEvents();
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Owner'] = $data['Owner'];
        $meta['Admin'] = $data['Admin'];
        $meta['Supplier'] = $data['Supplier'];
        $meta['Customer'] = $data['Customer'];
        $meta['Settings'] = $data['Settings'];
        $meta['dateFormats'] = $data['dateFormats'];
        $meta['assets'] = $data['assets'];
        $meta['GP'] = $data['GP'];
        $meta['reportdate'] = $data['reportdate'];
        //$meta['qty_alert_num'] = $this->site->get_total_qty_alerts();
        //$meta['exp_alert_num'] = $this->site->get_expiring_qty_alerts();
        //$meta['shop_sale_alerts'] = SHOP ? $this->site->get_shop_sale_alerts() : 0;
        // $meta['shop_payment_alerts'] = SHOP ? $this->site->get_shop_payment_alerts() : 0;


        if ($left_panel == 'leftmenu/left_panel') {
            $meta['pending_list'] = $this->getlist();
            $meta['manpowertransferout'] = $this->manpowertransferout();
            $meta['assocandidateworkerin'] = $this->assocandidateworkerin();
            $meta['assocandidateworkerout'] = $this->assocandidateworkerout();
            $meta['manpowerstdout'] = $this->getstdpendinglist();
            $meta['membercandidatepending'] = $this->getmembercandidatependinglist();
            $meta['thanapendingcount'] = $this->getpendingthanacount();
        }

        // $this->sma->print_arrays($data);

        $this->load->view($this->theme . 'header', $meta);
        $this->load->view($this->theme . $left_panel, $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer');
    }
    function page_construct2($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
    {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $meta['events'] = $this->site->getUpcomingEvents();
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Owner'] = $data['Owner'];
        $meta['Admin'] = $data['Admin'];
        $meta['Supplier'] = $data['Supplier'];
        $meta['Customer'] = $data['Customer'];
        $meta['Settings'] = $data['Settings'];
        $meta['dateFormats'] = $data['dateFormats'];
        $meta['assets'] = $data['assets'];
        $meta['GP'] = $data['GP'];
        $meta['reportdate'] = $data['reportdate'];
        //$meta['qty_alert_num'] = $this->site->get_total_qty_alerts();
        //$meta['exp_alert_num'] = $this->site->get_expiring_qty_alerts();
        //$meta['shop_sale_alerts'] = SHOP ? $this->site->get_shop_sale_alerts() : 0;
        // $meta['shop_payment_alerts'] = SHOP ? $this->site->get_shop_payment_alerts() : 0;


        $this->load->view($this->theme . 'header2', $meta);
        $this->load->view($this->theme . $left_panel, $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer2');
    }

    function page_construct3($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
    {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $meta['support_ticket'] = $this->site->getTickets();
        $meta['events'] = $this->site->getUpcomingEvents();
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Owner'] = $data['Owner'];
        $meta['Admin'] = $data['Admin'];
        $meta['Supplier'] = $data['Supplier'];
        $meta['Customer'] = $data['Customer'];
        $meta['Settings'] = $data['Settings'];
        $meta['dateFormats'] = $data['dateFormats'];
        $meta['assets'] = $data['assets'];
        $meta['GP'] = $data['GP'];
        $meta['reportdate'] = $data['reportdate'];
        //$meta['qty_alert_num'] = $this->site->get_total_qty_alerts();
        //$meta['exp_alert_num'] = $this->site->get_expiring_qty_alerts();
        //$meta['shop_sale_alerts'] = SHOP ? $this->site->get_shop_sale_alerts() : 0;
        // $meta['shop_payment_alerts'] = SHOP ? $this->site->get_shop_payment_alerts() : 0;


        $this->load->view($this->theme . 'header', $meta);
        $this->load->view($this->theme . $left_panel, $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer_guest');
    }




    function page_construct4($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
    {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $meta['support_ticket'] = $this->site->getTickets();
        $meta['events'] = $this->site->getUpcomingEvents();
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Owner'] = $data['Owner'];
        $meta['Admin'] = $data['Admin'];
        $meta['Supplier'] = $data['Supplier'];
        $meta['Customer'] = $data['Customer'];
        $meta['Settings'] = $data['Settings'];
        $meta['dateFormats'] = $data['dateFormats'];
        $meta['assets'] = $data['assets'];
        $meta['GP'] = $data['GP'];
        $meta['reportdate'] = $data['reportdate'];
        //$meta['qty_alert_num'] = $this->site->get_total_qty_alerts();
        //$meta['exp_alert_num'] = $this->site->get_expiring_qty_alerts();
        //$meta['shop_sale_alerts'] = SHOP ? $this->site->get_shop_sale_alerts() : 0;
        // $meta['shop_payment_alerts'] = SHOP ? $this->site->get_shop_payment_alerts() : 0;


        if ($left_panel == 'leftmenu/left_panel') {
            $meta['pending_list'] = $this->getlist();
            $meta['manpowertransferout'] = $this->manpowertransferout();
            $meta['assocandidateworkerin'] = $this->assocandidateworkerin();
            $meta['assocandidateworkerout'] = $this->assocandidateworkerout();
        }



        $this->load->view($this->theme . 'header', $meta);
        $this->load->view($this->theme . $left_panel, $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer4');
    }




    function report_typeold()
    {



        $type = $this->input->get('type');  //half_yearly/annual
        $year = $this->input->get('year');
        // $is_current = false;
        $is_current = $this->input->get('type');

        // $this->sma->print_arrays($year);

        if (!$year && !$type) {

            $year = 2023; //date('Y');



            $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => $year), 'id desc', 1, 0);


            // $this->sma->print_arrays($entrytimeinfo);



            if (strtotime($entrytimeinfo->startdate_half) < time() &&  strtotime($entrytimeinfo->enddate_half) > time()) {
                //$this->sma->print_arrays($entrytimeinfo);

                $is_current = 'half_yearly';

                return array('info' => $entrytimeinfo, 'last_half' => false, 'prev_record' => true, 'last_year' => $year - 1, 'is_current' => $is_current, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $year);
            } else if (strtotime($entrytimeinfo->startdate_annual) < time() &&  strtotime($entrytimeinfo->enddate_annual) > time()) {
                $is_current = 'annual'; //last_half
                return array('info' => $entrytimeinfo, 'last_half' => true, 'prev_record' => false, 'last_year' => $year - 1, 'is_current' => $is_current,  'type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $year);
            }
        } else if ($year && $type) {

            //$this->sma->print_arrays(222222);

            $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => $year), 'id desc', 1, 0);
            if ($type == 'half_yearly')
                return array('info' => $entrytimeinfo, 'last_half' => false, 'prev_record' => true,  'last_year' => $year - 1, 'is_current' => false,  'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $year);

            else if ($type == 'annual') //full_year
                return array('info' => $entrytimeinfo,  'last_half' => false, 'prev_record' => true,  'last_year' => $year - 1, 'is_current' => false,  'type' => 'annual', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_annual, 'year' => $year);
        } else
            return false;
    }
    function report_type()
    {

        

        $type = $this->input->get('type');  //half_yearly/annual
        $year = $this->input->get('year');
        // $is_current = false;
        $is_current = $this->input->get('type');

        // $this->sma->print_arrays($year);
        
        if (!$year && !$type) {

          
            $year = date('Y');



            $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => $year), 'id desc', 1, 0);


            // $this->sma->print_arrays($entrytimeinfo);



            if (strtotime($entrytimeinfo->startdate_half) < time() &&  strtotime($entrytimeinfo->enddate_half) > time()) {
                //$this->sma->print_arrays($entrytimeinfo);

                $is_current = 'half_yearly';

                return array('info' => $entrytimeinfo, 'last_half' => false, 'prev_record' => true, 'last_year' => $year - 1, 'is_current' => $is_current, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $year);
            } else if (strtotime($entrytimeinfo->startdate_annual) < time() &&  strtotime($entrytimeinfo->enddate_annual) > time()) {
                $is_current = 'annual'; //last_half
                return array('info' => $entrytimeinfo, 'last_half' => true, 'prev_record' => false, 'last_year' => $year - 1, 'is_current' => $is_current,  'type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $year);
            }
        } else if ($year && $type) {
           
            //$this->sma->print_arrays(222222);

            $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => $year), 'id desc', 1, 0);
            if ($type == 'half_yearly')
                return array('info' => $entrytimeinfo, 'last_half' => false, 'prev_record' => true,  'last_year' => $year - 1, 'is_current' => $is_current,  'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $year);

            else if ($type == 'annual') //full_year
                return array('info' => $entrytimeinfo,  'last_half' => false, 'prev_record' => true,  'last_year' => $year - 1, 'is_current' => $is_current,  'type' => 'annual', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_annual, 'year' => $year);
        } else
            return false;
    }




    function manpowertransferout()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }

        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower_transfer')}.id) as  manpower_transfer", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer')->where('manpower_transfer.from_branch_id', $branch_id);
            $q = $this->db->get();

            if ($q->num_rows() > 0) {
                $result =  $q->result();

                //  $this->sma->print_arrays($result);
                return $result[0]->manpower_transfer;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }



    function assocandidateworkerout()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }


        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower_transfer_assoworker')}.id) as assocandidateworker", FALSE)

                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('manpower_transfer_assoworker.from_branch_id', $branch_id)->where('status', 2);
            $q = $this->db->get();

            if ($q->num_rows() > 0) {
                $result =  $q->result();

                //  $this->sma->print_arrays($result);
                return $result[0]->assocandidateworker;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }


    function assocandidateworkerin()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }

        if ($branch_id) {
            $this->db

                ->select("COUNT({$this->db->dbprefix('manpower_transfer_assoworker')} .id) as assocandidateworker", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('manpower_transfer_assoworker.to_branch_id', $branch_id)->where('status', 2);
            $q = $this->db->get();
        } else {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower_transfer_assoworker')} .id) as assocandidateworker", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 2);
            $q = $this->db->get();
        }

        if ($q->num_rows() > 0) {
            $result =  $q->result();

            //  $this->sma->print_arrays($result);
            return $result[0]->assocandidateworker;
        } else {
            return 0;
        }
    }



    function getlist()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }


        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower_transfer')}.id) as total_transfer", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer')->where('manpower_transfer.to_branch_id', $branch_id);
            $q = $this->db->get();
        } else {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower_transfer')}.id) as total_transfer", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer');
            $q = $this->db->get();
        }

        if ($q->num_rows() > 0) {
            $result =  $q->result();
            return $result[0]->total_transfer;
        } else {
            return 0;
        }
    }





    function getstdpendinglist()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }


        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower')}.id) as total_pending", FALSE)
                ->from('manpower')->where('manpower.branch', $branch_id)->where('orgstatus_id', 1)->where('is_studentship_pending', 1);
            $q = $this->db->get();
        } else {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower')}.id) as total_pending", FALSE)
                ->from('manpower')->where('orgstatus_id', 1)->where('is_studentship_pending', 1);
            $q = $this->db->get();
        }

        if ($q->num_rows() > 0) {
            $result =  $q->result();
            return $result[0]->total_pending;
        } else {
            return 0;
        }
    }



    function getpendingthanacount()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }






        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('thana')}.id) as total_pending", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id)->where('is_pending', 1);
            $q = $this->db->get();
        } else {
            $this->db
                ->select("COUNT({$this->db->dbprefix('thana')}.id) as total_pending", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana')->where('is_pending', 1);
            $q = $this->db->get();
        }

        if ($q->num_rows() > 0) {
            $result =  $q->result();
            return $result[0]->total_pending;
        } else {
            return 0;
        }
    }


    function getmembercandidatependinglist()
    {

        if ($this->Owner || $this->Admin) {

            $branch_id = null;
        } else {

            $branch_id = $this->session->userdata('branch_id');
        }


        if ($branch_id) {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower')}.id) as total_pending", FALSE)
                ->from('manpower')->where('manpower.branch', $branch_id)->where('orgstatus_id', 12)->where('is_studentship_pending', 1);
            $q = $this->db->get();
        } else {
            $this->db
                ->select("COUNT({$this->db->dbprefix('manpower')}.id) as total_pending", FALSE)
                ->from('manpower')->where('orgstatus_id', 12)->where('is_studentship_pending', 1);
            $q = $this->db->get();
        }

        if ($q->num_rows() > 0) {
            $result =  $q->result();
            return $result[0]->total_pending;
        } else {
            return 0;
        }
    }
}
