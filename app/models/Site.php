<?php defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_total_qty_alerts()
    {
        $this->db->where('quantity < alert_quantity', NULL, FALSE)->where('track_quantity', 1);
        return $this->db->count_all_results('products');
    }

    public function get_expiring_qty_alerts()
    {
        $date = date('Y-m-d', strtotime('+3 months'));
        $this->db->select('SUM(quantity_balance) as alert_num')
            ->where('expiry !=', NULL)->where('expiry !=', '0000-00-00')
            ->where('expiry <', $date);
        $q = $this->db->get('purchase_items');
        if ($q->num_rows() > 0) {
            $res = $q->row();
            return (int) $res->alert_num;
        }
        return FALSE;
    }

    public function get_shop_sale_alerts()
    {
        $this->db->join('deliveries', 'deliveries.sale_id=sales.id', 'left')
            ->where('sales.shop', 1)->where('sales.sale_status', 'completed')->where('sales.payment_status', 'paid')
            ->group_start()->where('deliveries.status !=', 'delivered')->or_where('deliveries.status IS NULL', NULL)->group_end();
        return $this->db->count_all_results('sales');
    }

    public function get_shop_payment_alerts()
    {
        $this->db->where('shop', 1)->where('attachment !=', NULL)->where('payment_status !=', 'paid');
        return $this->db->count_all_results('sales');
    }

    public function get_setting()
    {
        $q = $this->db->get('settings');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }




    public function get_entry_permission()
    {




        $entrytimeinfo = $this->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

        $current_date = time();

        $annual_start = strtotime($entrytimeinfo->startdate_annual);
        $annual_end = strtotime($entrytimeinfo->enddate_annual);

        $half_start = strtotime($entrytimeinfo->startdate_half);
        $half_end = strtotime($entrytimeinfo->enddate_half);

        $type = ($current_date > $half_start && $current_date < $half_end) ? 'half_yearly' : 'annual';
        if ($type == 'half_yearly')
            $info = array('type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half);
        else
            $info = array('type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual);



        if (!($this->Owner || $this->Admin) && $this->session->userdata('branch_id'))
            $confirmreportinfo = $this->getOneRecord('confirmreport', '*', array('branch_id' => $this->session->userdata('branch_id'), 'report_type' => $info['type'], 'year' => date('Y')), 'id desc', 1, 0);






        if (isset($confirmreportinfo) && $confirmreportinfo == false)
            return true;


        return FALSE;
    }




    public function getDateFormat($id)
    {
        $q = $this->db->get_where('date_format', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllCompanies($group_name)
    {
        $q = $this->db->get_where('companies', array('group_name' => $group_name));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getCompanyByID($id)
    {
        $q = $this->db->get_where('companies', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getCustomerGroupByID($id)
    {
        $q = $this->db->get_where('customer_groups', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getUser($id = NULL)
    {
        if (!$id) {
            $id = $this->session->userdata('user_id');
        }
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getManpowerByID($id)
    {
        $q = $this->db->get_where('manpower', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllCurrencies()
    {
        $q = $this->db->get('currencies');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getCurrencyByCode($code)
    {
        $q = $this->db->get_where('currencies', array('code' => $code), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllTaxRates()
    {
        $q = $this->db->get('tax_rates');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getTaxRateByID($id)
    {
        $q = $this->db->get_where('tax_rates', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllBranches($id = null)
    {



        if ($id != null)
            $this->db->where('id', $id);


        $q = $this->db->get("branches");


        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }




    public function getAllwards($thana_id, $level = null)
    {


        if ($level)
            $q = $this->db->get_where('thana', array('parent_id' => $thana_id, 'level' => $level));
        else
            $q = $this->db->get_where('thana', array('parent_id' => $thana_id));



        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
    public function getAllthanas()
    {
        $q = $this->db->get('thana');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getThanaByBranch($branch_id, $level = 1)
    {
        $this->db->where('branch_id', $branch_id);
        $this->db->where('level', $level);

        $q = $this->db->get('thana');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getBranchByID($id)
    {
        $q = $this->db->get_where('branches', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    // serial 
    public function getAllSerial($id)
    {
        $q = $this->db->get_where('serial_reports', array('branch_id' => $id));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllCategories()
    {
        $this->db->where('parent_id', NULL)->or_where('parent_id', 0)->order_by('name');
        $q = $this->db->get("categories");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getSubCategories($parent_id)
    {
        $this->db->where('parent_id', $parent_id)->order_by('name');
        $q = $this->db->get("categories");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getSubZones($id)
    {
        $this->db->where('parent_top_level', $id);
        $this->db->or_where('parent_second_level', $id);
        $this->db->or_where('parent_third_level', $id);


        $q = $this->db->get("district");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }



    public function getCategoryByID($id)
    {
        $q = $this->db->get_where('categories', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }




    public function getAllDepartments($id = null, $report_submit = null, $serial = null)
    {
        if ($id != null)
            $this->db->where('id', $id);
        else if ($report_submit)
            $this->db->where('is_submit', 1);
        else if ($serial)
            $this->db->where('for_serial', 1);
        else
            $this->db->where('parent_id', NULL)->or_where('parent_id', 0)->order_by('name');


        $q = $this->db->get("departments");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getSubDepartments($parent_id)
    {
        $this->db->where('parent_id', $parent_id)->order_by('name');
        $q = $this->db->get("departments");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getDepartmentByID($id)
    {
        $q = $this->db->get_where('departments', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }






    public function getGiftCardByID($id)
    {
        $q = $this->db->get_where('gift_cards', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getGiftCardByNO($no)
    {
        $q = $this->db->get_where('gift_cards', array('card_no' => $no), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updateInvoiceStatus()
    {
        $date = date('Y-m-d');
        $q = $this->db->get_where('invoices', array('status' => 'unpaid'));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                if ($row->due_date < $date) {
                    $this->db->update('invoices', array('status' => 'due'), array('id' => $row->id));
                }
            }
            $this->db->update('settings', array('update' => $date), array('setting_id' => '1'));
            return true;
        }
    }

    public function modal_js()
    {

        // echo 222;
        // exit();

        return '<script type="text/javascript">' . file_get_contents($this->data['assets'] . 'js/modal.js?v=3') . '</script>';
    }

    public function getReference($field)
    {
        $q = $this->db->get_where('order_ref', array('ref_id' => '1'), 1);
        if ($q->num_rows() > 0) {
            $ref = $q->row();
            switch ($field) {
                case 'so':
                    $prefix = $this->Settings->sales_prefix;
                    break;
                case 'pos':
                    $prefix = isset($this->Settings->sales_prefix) ? $this->Settings->sales_prefix . '/POS' : '';
                    break;
                case 'qu':
                    $prefix = $this->Settings->quote_prefix;
                    break;
                case 'po':
                    $prefix = $this->Settings->purchase_prefix;
                    break;
                case 'to':
                    $prefix = $this->Settings->transfer_prefix;
                    break;
                case 'do':
                    $prefix = $this->Settings->delivery_prefix;
                    break;
                case 'pay':
                    $prefix = $this->Settings->payment_prefix;
                    break;
                case 'ppay':
                    $prefix = $this->Settings->ppayment_prefix;
                    break;
                case 'ex':
                    $prefix = $this->Settings->expense_prefix;
                    break;
                case 're':
                    $prefix = $this->Settings->return_prefix;
                    break;
                case 'rep':
                    $prefix = $this->Settings->returnp_prefix;
                    break;
                case 'qa':
                    $prefix = $this->Settings->qa_prefix;
                    break;
                default:
                    $prefix = '';
            }

            $ref_no = $prefix;

            if ($this->Settings->reference_format == 1) {
                $ref_no .= date('Y') . "/" . sprintf("%04s", $ref->{$field});
            } elseif ($this->Settings->reference_format == 2) {
                $ref_no .= date('Y') . "/" . date('m') . "/" . sprintf("%04s", $ref->{$field});
            } elseif ($this->Settings->reference_format == 3) {
                $ref_no .= sprintf("%04s", $ref->{$field});
            } else {
                $ref_no .= $this->getRandomReference();
            }

            return $ref_no;
        }
        return FALSE;
    }

    public function getRandomReference($len = 12)
    {
        $result = '';
        for ($i = 0; $i < $len; $i++) {
            $result .= mt_rand(0, 9);
        }

        if ($this->getSaleByReference($result)) {
            $this->getRandomReference();
        }

        return $result;
    }

    public function getSaleByReference($ref)
    {
        $this->db->like('reference_no', $ref, 'both');
        $q = $this->db->get('sales', 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }



    public function checkPermissions()
    {
        $q = $this->db->get_where('permissions', array('group_id' => $this->session->userdata('group_id')), 1);
        if ($q->num_rows() > 0) {
            return $q->result_array();
        }
        return FALSE;
    }



    public function getNotifications_old()
    {

        $branch_id = $this->session->userdata('branch_id');

        $date = date('Y-m-d H:i:s', time());
        $this->db->where("from_date <=", $date);
        $this->db->where("till_date >=", $date);
        if (!$this->Owner) {
            if ($this->Supplier) {
                $this->db->where('scope', 4);
            } elseif ($this->Customer) {
                $this->db->where('scope', 1)->or_where('scope', 3);
            } elseif (!$this->Customer && !$this->Supplier) {
                $this->db->where('scope', 2)->or_where('scope', 3);
            }
        }
        $q = $this->db->get("notifications");


        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getNotifications()
    {
        $branch_id = $this->session->userdata('branch_id');
        $date = date('Y-m-d H:i:s', time());

        $this->db->select('sma_notifications.*');
        $this->db->from('sma_branch_notifications');
        $this->db->join('sma_notifications', 'sma_notifications.id = sma_branch_notifications.notification_id');
        $this->db->where("sma_notifications.from_date <=", $date);
        $this->db->where("sma_notifications.till_date >=", $date);

        if (!$this->Owner) {
            $branch_id = $this->session->userdata('branch_id');
            $this->db->where('sma_branch_notifications.branch_id', $branch_id);
        }
        $this->db->group_by('sma_notifications.id');
        // echo $this->db->get_compiled_select();
        $q = $this->db->get();
        // $this->sma->print_arrays( $this->db->last_query());

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }




    public function getTickets()
    {

        if ($this->Owner || $this->Admin) {
            $this->db->where('is_read_admin', 'No');
        } else {
            $this->db->where('is_read_branch', 'No');
            $this->db->where('branch_id', $this->session->userdata('branch_id'));
        }

        $this->db->select('count(id) as total', FALSE);
        $q = $this->db->get('support_ticket');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getUpcomingEvents()
    {
        $dt = date('Y-m-d');
        $this->db->where('start >=', $dt)->order_by('start')->limit(5);
        if ($this->Settings->restrict_calendar) {
            $this->db->where('user_id', $this->session->userdata('user_id'));
        }

        $q = $this->db->get('calendar');

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getUserGroup($user_id = false)
    {
        if (!$user_id) {
            $user_id = $this->session->userdata('user_id');
        }
        $group_id = $this->getUserGroupID($user_id);
        $q = $this->db->get_where('groups', array('id' => $group_id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getUserGroupID($user_id = false)
    {
        $user = $this->getUser($user_id);
        return $user->group_id;
    }



    public function getSaleByID($id)
    {
        $q = $this->db->get_where('sales', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }



    public function getUnitByID($id)
    {
        $q = $this->db->get_where("units", array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }





    public function convertToBase($unit, $value)
    {
        switch ($unit->operator) {
            case '*':
                return $value / $unit->operation_value;
                break;
            case '/':
                return $value * $unit->operation_value;
                break;
            case '+':
                return $value - $unit->operation_value;
                break;
            case '-':
                return $value + $unit->operation_value;
                break;
            default:
                return $value;
        }
    }



    public function getAddressByID($id)
    {
        return $this->db->get_where('addresses', ['id' => $id], 1)->row();
    }

    public function checkSlug($slug, $type = NULL)
    {
        if (!$type) {
            return $this->db->get_where('products', ['slug' => $slug], 1)->row();
        } elseif ($type == 'category') {
            return $this->db->get_where('categories', ['slug' => $slug], 1)->row();
        } elseif ($type == 'brand') {
            return $this->db->get_where('brands', ['slug' => $slug], 1)->row();
        }
        return FALSE;
    }


    public function getSmsSettings()
    {
        $q = $this->db->get('sms_settings');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getByID($table, $field, $id)
    {
        $q = $this->db->get_where($table, array($field => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }



    function getcolumn($table, $item = "*", $where1 = null, $order = null, $limit = null, $offset = null)
    {


        $this->db->select($item);
        $this->db->from($table);

        if ($where1 != null && $where1 != '')
            $this->db->where($where1);

        if ($order != null || $order != '')
            $this->db->order_by($order);

        if ($limit != null && $limit != '')
            $this->db->limit($limit, $offset);
        else
            $this->db->limit(1, 0);

        $query = $this->db->get();
        return isset($query->row()->$item) ? $query->row()->$item : NULL;
    }




    function getOneRecord($table, $item = "*", $where = null, $order = null, $limit = null, $offset = null)
    {
        if ($order != null || $order != '')
            $this->db->order_by($order);
        $this->db->select($item);
        $this->db->from($table);

        if ($where != null && $where != '')
            $this->db->where($where);
        if ($limit != null && $limit != '')
            $this->db->limit($limit, $offset);
        $query = $this->db->get();


        //	$this->sma->print_arrays($query->first_row());

        if ($query->first_row()) {

            return $query->first_row();
        } else
            return false;
    }


    function getList($table, $item = "*", $where = null, $order = null, $limit = null, $offset = null)
    {
        if ($order != null || $order != '')
            $this->db->order_by($order);
        $this->db->select($item);
        $this->db->from($table);

        if ($where != null && $where != '')
            $this->db->where($where);
        if ($limit != null && $limit != '')
            $this->db->limit($limit, $offset);
        $query = $this->db->get();


        //	$this->sma->print_arrays($query->first_row());

        if ($query->num_rows() > 0) {
            foreach (($query->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return FALSE;
    }



    public function insertData($table, $data, $return_id = NULL)
    {


        if ($this->db->insert($table, $data)) {

            if ($return_id != NULL)
                return $this->db->insert_id();
            return true;
        }
        return false;
    }


    public function updateData($table, $data, $where)
    {

        if ($this->db->update($table, $data, $where)) {

            //echo $this->db->last_query();
            return true;
        }
        return false;
    }

    ///direct query select with binding option
    function query_binding($query, $param, $array = 1)
    {


        if ($array == 1)
            $r = $this->db->query($query, $param)->result_array();
        else
            $r = $this->db->query($query, $param)->result();
        //    if (strpos($query, 'UPDATE sma_manpower_record') !== false) {
        //     echo $this->db->last_query();
        // }


        return $r;
    }

    ///direct query select without binding option
    function query($query)
    {

        return $this->db->query($query)->result_array();
    }







    /**
     * Delete  record
     *
     * @param	table
     * @param	int
     * @return	bool
     */
    function delete($table, $where)
    {
        $this->db->where($where);

        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {

            return TRUE;
        }
        return FALSE;
    }


    function deleteward($table, $where)
    {
        $this->db->where($where);

        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {

            return TRUE;
        }
        return FALSE;
    }


    public function getAll($table, $year=null)
    {


        if ($table == 'responsibilities')
            $this->db->order_by('priority', 'Desc');
        if($year)
            $this->db->where('year',$year);
        
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
    public function getDistrict($level = 1, $parent_id = 0)
    {

        //$this->db->order_by('priority', 'Desc');
        $this->db->where('level', $level);
        $this->db->where('parent_id', $parent_id);
        $q = $this->db->get('district');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }





    public function getDistrictOwn($level = 1, $parent_id = 0, $branch_id = null)
    {


        if ($branch_id) {

            if ($level == 1)
                $sql = "SELECT * FROM sma_district where id in ( SELECT DISTINCT district_id FROM `sma_administrative_area` WHERE branch_id = ? )";
            else if ($level == 2)
                $sql = "SELECT * FROM sma_district where id in ( SELECT DISTINCT thana_upazila_id FROM `sma_administrative_area` WHERE branch_id = ? )";
            else if ($level == 3)
                $sql = "SELECT * FROM sma_district where id in ( SELECT DISTINCT pourashava_union_id FROM `sma_administrative_area` WHERE branch_id = ? )";
            else   //4
                $sql = "SELECT * FROM sma_district where id in ( SELECT DISTINCT ward_id FROM `sma_administrative_area` WHERE branch_id = ? )";

            $q = $this->db->query($sql, [$branch_id]);


        } else {

            //$this->db->order_by('priority', 'Desc');
            $this->db->where('level', $level);
            $this->db->where('parent_id', $parent_id);
            $q = $this->db->get('district');

        }



        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;



    }



    public function getUpozilla($parent_id = null)
    {

        //$this->db->order_by('priority', 'Desc');
        $this->db->where('level', 2);
        if ($parent_id != null)
            $this->db->where('parent_id', $parent_id);
        $q = $this->db->get('district');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getDistrictnUpozilla()
    {

        //$this->db->order_by('priority', 'Desc');
        $this->db->where('level <=', 2);

        $q = $this->db->get('district');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }



    public function getAllThana($branch = null) //org thana
    {


        // if ($table == 'responsibilities')
        //     $this->db->order_by('priority', 'Desc');

        $q = $this->db->get('thana');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getAllWard($branch = null)
    {


        if ($table == 'responsibilities')
            $this->db->order_by('priority', 'Desc');

        $q = $this->db->get('thana');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }







    function check_confirm($branch_id, $date)
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y', strtotime($date))), 'id desc', 1, 0);

        $current_date = strtotime($date);

        $annual_start = strtotime($entrytimeinfo->startdate_annual);
        $annual_end = strtotime($entrytimeinfo->enddate_annual);

        $half_start = strtotime($entrytimeinfo->startdate_half);
        $half_end = strtotime($entrytimeinfo->enddate_half);

        $type = ($current_date >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual';

        $year = $entrytimeinfo->year;


        $confirm = $this->site->getOneRecord('confirmreport', '*', array('branch_id' => $branch_id, 'year' => $entrytimeinfo->year, 'report_type' => $type), 'id desc', 1, 0);
        //var_dump($confirm);

        if ($confirm == false)
            return true;
        else
            return false;
    }


    function allmembernumber($branch = null)
    {
        if ($branch)
            return $this->getOneRecord('member', 'COUNT(id) as member', array('branch' => $branch, 'is_member_now' => 1));
        else
            return $this->getOneRecord('member', 'COUNT(id) as member', array('is_member_now' => 1));
    }





    function update($table, $field1, $field2, $where)
    {

        $this->db->set($field1, $field2, FALSE);

        $this->db->where($where);
        $this->db->update($table);
    }
}
