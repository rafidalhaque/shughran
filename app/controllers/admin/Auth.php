<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->lang->admin_load('auth', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->admin_model('auth_model');
        $this->load->library('ion_auth');
    }




    function gen_pass()
    {


        // exit();


        $array = array(

            array('user' => '1', 'pass' => '*B7x2aA#'),
            array('user' => '2', 'pass' => '*M4e4hY#'),
            array('user' => '3', 'pass' => '*F0y6aA#'),
            array('user' => '4', 'pass' => '*K9s2yC#'),
            array('user' => '5', 'pass' => '*D6v9bG#'),
            array('user' => '6', 'pass' => '*S5k5qE#'),
            array('user' => '7', 'pass' => '*X5m2eZ#'),
            array('user' => '8', 'pass' => '*D7y9wH#'),
            array('user' => '9', 'pass' => '*M3c4vK#'),
            array('user' => '10', 'pass' => '*C1v0sS#'),
            array('user' => '11', 'pass' => '*S0u0uG#'),
            array('user' => '12', 'pass' => '*H7h1jQ#'),
            array('user' => '13', 'pass' => '*D5g3xS#'),
            array('user' => '14', 'pass' => '*H4a1wA#'),
            array('user' => '15', 'pass' => '*Q8m5cD#'),
            array('user' => '16', 'pass' => '*J0x3fT#'),
            array('user' => '17', 'pass' => '*X5d0eT#'),
            array('user' => '18', 'pass' => '*D7n8bB#'),
            array('user' => '19', 'pass' => '*A8t6rF#'),
            array('user' => '20', 'pass' => '*M3d1jS#'),
            array('user' => '21', 'pass' => '*R4p8zZ#'),
            array('user' => '22', 'pass' => '*S2b5qF#'),
            array('user' => '23', 'pass' => '*K3t4nM#'),
            array('user' => '24', 'pass' => '*D3c3yA#'),
            array('user' => '25', 'pass' => '*N8t2fU#'),
            array('user' => '26', 'pass' => '*H6k0yE#'),
            array('user' => '27', 'pass' => '*B2b7dJ#'),
            array('user' => '28', 'pass' => '*H1a4wF#'),
            array('user' => '29', 'pass' => '*A1s0vV#'),
            array('user' => '30', 'pass' => '*F2z6gG#'),
            array('user' => '31', 'pass' => '*B5h4aG#'),
            array('user' => '32', 'pass' => '*E1y2nQ#'),
            array('user' => '33', 'pass' => '*Y3u8rW#'),
            array('user' => '34', 'pass' => '*R6a7mF#'),
            array('user' => '35', 'pass' => '*E6r1uN#'),
            array('user' => '36', 'pass' => '*P2j6fX#'),
            array('user' => '37', 'pass' => '*H8u5xN#'),
            array('user' => '38', 'pass' => '*A9w8jN#'),
            array('user' => '39', 'pass' => '*B8n6vH#'),
            array('user' => '40', 'pass' => '*W9a8nJ#'),
            array('user' => '41', 'pass' => '*Z0s7aB#'),
            array('user' => '42', 'pass' => '*A8k5wJ#'),
            array('user' => '43', 'pass' => '*T5b2jD#'),
            array('user' => '44', 'pass' => '*T0r1jS#'),
            array('user' => '45', 'pass' => '*Q7n8gK#'),
            array('user' => '46', 'pass' => '*Q5k7jB#'),
            array('user' => '47', 'pass' => '*T0p9nS#'),
            array('user' => '48', 'pass' => '*U2t2nV#'),
            array('user' => '49', 'pass' => '*N5q1rG#'),
            array('user' => '50', 'pass' => '*U6y2aC#'),
            array('user' => '51', 'pass' => '*K3c2pK#'),
            array('user' => '52', 'pass' => '*C1s6rS#'),
            array('user' => '53', 'pass' => '*C3v2fV#'),
            array('user' => '54', 'pass' => '*N7x3vB#'),
            array('user' => '55', 'pass' => '*S1g1dE#'),
            array('user' => '56', 'pass' => '*U5w5qT#'),
            array('user' => '57', 'pass' => '*Y2y9eW#'),
            array('user' => '58', 'pass' => '*N6m6nD#'),
            array('user' => '59', 'pass' => '*M7y2kY#'),
            array('user' => '60', 'pass' => '*V5q5eP#'),
            array('user' => '61', 'pass' => '*S2u6mN#'),
            array('user' => '62', 'pass' => '*W4j2eQ#'),
            array('user' => '63', 'pass' => '*J5r7gT#'),
            array('user' => '64', 'pass' => '*K4h3qH#'),
            array('user' => '65', 'pass' => '*D1f4yP#'),
            array('user' => '66', 'pass' => '*Z6f5pW#'),
            array('user' => '67', 'pass' => '*Q9h8nQ#'),
            array('user' => '68', 'pass' => '*V5j5nF#'),
            array('user' => '69', 'pass' => '*Q4u0zX#'),
            array('user' => '70', 'pass' => '*B1j0vW#'),
            array('user' => '71', 'pass' => '*G7g7yY#'),
            array('user' => '72', 'pass' => '*P6j3gM#'),
            array('user' => '73', 'pass' => '*H6j8nR#'),
            array('user' => '74', 'pass' => '*G2t9qR#'),
            array('user' => '75', 'pass' => '*Z4g1dZ#'),
            array('user' => '76', 'pass' => '*S5w2gK#'),
            array('user' => '77', 'pass' => '*J0t7dQ#'),
            array('user' => '78', 'pass' => '*X9y8aZ#'),
            array('user' => '79', 'pass' => '*Q3j1tB#'),
            array('user' => '80', 'pass' => '*R8w5tE#'),
            array('user' => '81', 'pass' => '*B2p6fV#'),
            array('user' => '82', 'pass' => '*J1h3yG#'),
            array('user' => '83', 'pass' => '*F8k5qT#'),
            array('user' => '84', 'pass' => '*K1j6jV#'),
            array('user' => '85', 'pass' => '*V1z6pQ#'),
            array('user' => '86', 'pass' => '*J3c3wM#'),
            array('user' => '87', 'pass' => '*P8h5gJ#'),
            array('user' => '88', 'pass' => '*Z6s6eA#'),
            array('user' => '89', 'pass' => '*R3e2pR#'),
            array('user' => '90', 'pass' => '*Q3t9hX#'),
            array('user' => '91', 'pass' => '*Q5p8uP#'),
            array('user' => '92', 'pass' => '*G7z1bW#'),
            array('user' => '93', 'pass' => '*Y0s9hB#'),
            array('user' => '94', 'pass' => '*Q4s7yH#'),
            array('user' => '95', 'pass' => '*U7t3xX#'),
            array('user' => '96', 'pass' => '*A3k9eY#'),
            array('user' => '97', 'pass' => '*M8q7cG#'),
            array('user' => '98', 'pass' => '*S6v6vH#'),
            array('user' => '99', 'pass' => '*T9w5vW#'),
            array('user' => '100', 'pass' => '*K3h8vW#'),
            array('user' => '101', 'pass' => '*Y4m1uM#'),
            array('user' => '102', 'pass' => '*V3e5qN#'),
            array('user' => '103', 'pass' => '*J2n6uT#'),
            array('user' => '104', 'pass' => '*U2h8hD#'),
            array('user' => '105', 'pass' => '*Z1k2wV#'),
            array('user' => '106', 'pass' => '*K1h2nJ#'),
            array('user' => '107', 'pass' => '*P3v7nG#'),
            array('user' => '108', 'pass' => '*X5q3uS#'),
            array('user' => '109', 'pass' => '*G9v7fS#'),
            array('user' => '110', 'pass' => '*M3t7yT#'),
            array('user' => '111', 'pass' => '*S1f8xW#'),
            array('user' => '112', 'pass' => '*A0b6uS#'),
            array('user' => '113', 'pass' => '*N0b9cJ#'),
            array('user' => '114', 'pass' => '*B3w6fG#'),
            array('user' => '115', 'pass' => '*B5z5kT#'),
            array('user' => '116', 'pass' => '*G6w8qR#'),
            array('user' => '117', 'pass' => '*G6a3rJ#'),
            array('user' => '118', 'pass' => '*K5w0pU#'),
            array('user' => '119', 'pass' => '*K6p2fJ#'),
            array('user' => '120', 'pass' => '*Q5f9nW#'),
            array('user' => '121', 'pass' => '*A8p0nZ#'),
            array('user' => '122', 'pass' => '*C8m3yX#'),
            array('user' => '123', 'pass' => '*B3b8vZ#'),
            array('user' => '124', 'pass' => '*A6a3hY#'),
            array('user' => '125', 'pass' => '*U5t5bU#'),
            array('user' => '126', 'pass' => '*X0m1uF#'),
            array('user' => '127', 'pass' => '*S9b3wJ#'),
            array('user' => '128', 'pass' => '*U8e3vV#'),
            array('user' => '129', 'pass' => '*Y0x9aK#'),
            array('user' => '130', 'pass' => '*Q0z9nC#'),
            array('user' => '131', 'pass' => '*T1x3aM#'),
            array('user' => '132', 'pass' => '*R6k5yN#'),
            array('user' => '133', 'pass' => '*B0u7mD#'),
            array('user' => '134', 'pass' => '*V3f5rN#'),
            array('user' => '135', 'pass' => '*B0m8nG#'),
            array('user' => '136', 'pass' => '*D6n0rF#'),
            array('user' => '137', 'pass' => '*M9u5sF#'),
            array('user' => '138', 'pass' => '*S6w5pQ#'),
            array('user' => '139', 'pass' => '*J7w7fB#'),
            array('user' => '140', 'pass' => '*D6p8uT#'),
            array('user' => '141', 'pass' => '*G8s3hK#'),
            array('user' => '142', 'pass' => '*H9x8kF#'),
            array('user' => '143', 'pass' => '*M8t3vE#'),
            array('user' => '144', 'pass' => '*U2r6rB#'),
            array('user' => '145', 'pass' => '*W1y6kJ#'),
            array('user' => '146', 'pass' => '*R1f5kX#'),
            array('user' => '888', 'pass' => '*G4c7dJ#'),
            array('user' => '999', 'pass' => '*M8k7hF#'),
            array('user' => 'admin1', 'pass' => '*A7p4uY#'),
            array('user' => 'admin2', 'pass' => '*B1g3zS#'),
            array('user' => 'admin3', 'pass' => '*Y4m2uN#'),
            array('user' => 'owner', 'pass' => '*E2w8gH#*C8g0kE#'),
            array('user' => '2001', 'pass' => '*K3w1hJ#'),
            array('user' => '2002', 'pass' => '*R1z7xB#'),
            array('user' => '2003', 'pass' => '*T1t1eD#'),
            array('user' => '2004', 'pass' => '*M7m5hZ#'),
            array('user' => '2005', 'pass' => '*R5f9tB#'),
            array('user' => '2006', 'pass' => '*U6a7nT#'),
            array('user' => '2007', 'pass' => '*M1e8wJ#'),
            array('user' => '2008', 'pass' => '*A8m9kA#'),
            array('user' => '2009', 'pass' => '*M2z9bM#'),
            array('user' => '2010', 'pass' => '*F4f5xS#'),
            array('user' => '2011', 'pass' => '*T2p1fS#'),
            array('user' => '2012', 'pass' => '*T0s6jP#'),
            array('user' => '2013', 'pass' => '*Q8p0jN#'),
            array('user' => '2014', 'pass' => '*V1d2pK#'),
            array('user' => '2015', 'pass' => '*X5n7sE#'),
            array('user' => '2016', 'pass' => '*Q3c3gK#'),
            array('user' => '2017', 'pass' => '*S8t8sG#'),
            array('user' => '2018', 'pass' => '*Z5m3vN#'),
            array('user' => '2019', 'pass' => '*D5g3bB#'),
            array('user' => '2020', 'pass' => '*D7y5bB#'),
            array('user' => '2021', 'pass' => '*B8r7vS#'),
            array('user' => '2022', 'pass' => '*X0t9xG#'),
            array('user' => '2023', 'pass' => '*A1r2hE#'),
            array('user' => '2024', 'pass' => '*D0v3vV#'),
            array('user' => '2025', 'pass' => '*N4f7fG#'),
            array('user' => '2026', 'pass' => '*K7s5hX#'),
            array('user' => '2027', 'pass' => '*X0e8cT#'),
            array('user' => '2028', 'pass' => '*M5s7bJ#'),
            array('user' => '2029', 'pass' => '*B6a5fD#'),
            array('user' => '2030', 'pass' => '*J8u0mS#'),
            array('user' => '2031', 'pass' => '*Q2v0rM#'),
            array('user' => '2032', 'pass' => '*T9x8cG#'),
            array('user' => '2033', 'pass' => '*X8m1zS#'),
            array('user' => '2034', 'pass' => '*T3y8aH#'),
            array('user' => 'itadmin', 'pass' => '*H8p7sV#'),
            array('user' => 'citadmin1', 'pass' => '*S4d1sM#'),
            array('user' => 'cpadmin', 'pass' => '*K6z4sU#'),
            array('user' => 'sgadmin', 'pass' => '*N3h4jK#'),
            array('user' => '2040', 'pass' => '*R9z9yR#')


        );



        foreach ($array as $row)
            $this->auth_model->dm($row);



    }



    function index()
    {

        if (!$this->loggedIn) {
            admin_redirect('login');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function users()
    {
        if (!$this->loggedIn) {
            admin_redirect('login');
        }
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'admin/welcome');
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('users')));
        $meta = array('page_title' => lang('users'), 'bc' => $bc);
        $this->page_construct('auth/index', $meta, $this->data);
    }

    function getUsers()
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            $this->sma->md();
        }

        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('users') . ".id as id, first_name, last_name, email, company, award_points, " . $this->db->dbprefix('groups') . ".name, active")
            ->from("users")
            ->join('groups', 'users.group_id=groups.id', 'left')
            ->group_by('users.id')
            ->where('company_id', NULL)
            ->edit_column('active', '$1__$2', 'active, id')
            ->add_column("Actions", "<div class=\"text-center\"><a href='" . admin_url('auth/profile/$1') . "' class='tip' title='" . lang("edit_user") . "'><i class=\"fa fa-edit\"></i></a></div>", "id");

        if (!$this->Owner) {
            $this->datatables->unset_column('id');
        }
        echo $this->datatables->generate();
    }

    function getUserLogins($id = NULL)
    {
        if (!$this->ion_auth->in_group(array('owner', 'admin'))) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            admin_redirect('welcome');
        }
        $this->load->library('datatables');
        $this->datatables
            ->select("login, ip_address, time")
            ->from("user_logins")
            ->where('user_id', $id);

        echo $this->datatables->generate();
    }

    function delete_avatar($id = NULL, $avatar = NULL)
    {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('owner') && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . $_SERVER["HTTP_REFERER"] . "'; }, 0);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            unlink('assets/uploads/avatars/' . $avatar);
            unlink('assets/uploads/avatars/thumbs/' . $avatar);
            if ($id == $this->session->userdata('user_id')) {
                $this->session->unset_userdata('avatar');
            }
            $this->db->update('users', array('avatar' => NULL), array('id' => $id));
            $this->session->set_flashdata('message', lang("avatar_deleted"));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . $_SERVER["HTTP_REFERER"] . "'; }, 0);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function profile($id = NULL)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('owner') && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'admin');
        }
        if (!$id || empty($id)) {
            admin_redirect('auth');
        }

        $this->data['title'] = lang('profile');

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        //$this->data['billers'] = $this->site->getAllCompanies('biller');
        $this->data['branches'] = $this->site->getAllBranches();
        $this->data['departments'] = $this->site->getAllDepartments();


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control',
            'type' => 'password',
            'value' => ''
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'class' => 'form-control',
            'type' => 'password',
            'value' => ''
        );
        $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
        $this->data['old_password'] = array(
            'name' => 'old',
            'id' => 'old',
            'class' => 'form-control',
            'type' => 'password',
        );
        $this->data['new_password'] = array(
            'name' => 'new',
            'id' => 'new',
            'type' => 'password',
            'class' => 'form-control',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['new_password_confirm'] = array(
            'name' => 'new_confirm',
            'id' => 'new_confirm',
            'type' => 'password',
            'class' => 'form-control',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['user_id'] = array(
            'name' => 'user_id',
            'id' => 'user_id',
            'type' => 'hidden',
            'value' => $user->id,
        );

        $this->data['id'] = $id;

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('auth/users'), 'page' => lang('users')), array('link' => '#', 'page' => lang('profile')));
        $meta = array('page_title' => lang('profile'), 'bc' => $bc);
        $this->page_construct('auth/profile', $meta, $this->data);
    }

    public function captcha_check($cap)
    {
        $expiration = time() - 300; // 5 minutes limit
        $this->db->delete('captcha', array('captcha_time <' => $expiration));

        $this->db->select('COUNT(*) AS count')
            ->where('word', $cap)
            ->where('ip_address', $this->input->ip_address())
            ->where('captcha_time >', $expiration);

        if ($this->db->count_all_results('captcha')) {
            return true;
        } else {
            $this->form_validation->set_message('captcha_check', lang('captcha_wrong'));
            return FALSE;
        }
    }


    function login($m = NULL)
    {
        if ($this->loggedIn) {
            $this->session->set_flashdata('error', $this->session->flashdata('error'));
            admin_redirect('welcome');
        }
        $this->data['title'] = lang('login');

        if ($this->Settings->captcha) {
            $this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
        }

        if ($this->form_validation->run() == true) {

            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                if ($this->Settings->mmode) {
                    if (!$this->ion_auth->in_group('owner')) {
                        $this->session->set_flashdata('error', lang('site_is_offline_plz_try_later'));
                        admin_redirect('auth/logout');
                    }
                }
                if ($this->ion_auth->in_group('customer') || $this->ion_auth->in_group('supplier')) {
                    if (file_exists(APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'Shop.php')) {
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect(base_url());
                    } else {
                        admin_redirect('auth/logout/1');
                    }
                }
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $referrer = ($this->session->userdata('requested_page') && $this->session->userdata('requested_page') != 'admin') ? $this->session->userdata('requested_page') : 'welcome';
                admin_redirect($referrer);
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect('login');
            }
        } else {

            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->data['message'] = $this->session->flashdata('message');
            if ($this->Settings->captcha) {
                $this->load->helper('captcha');
                $vals = array(
                    'pool' => '0123456789',
                    'img_path' => './assets/captcha/',
                    'img_url' => base_url('assets/captcha/'),
                    'img_width' => 150,
                    'img_height' => 34,
                    'word_length' => rand(5, 8),
                    'colors' => array('background' => array(255, 255, 255), 'border' => array(204, 204, 204), 'text' => array(102, 102, 102), 'grid' => array(204, 204, 204))
                );
                $cap = create_captcha($vals);
                $capdata = array(
                    'captcha_time' => $cap['time'],
                    'ip_address' => $this->input->ip_address(),
                    'word' => $cap['word']
                );

                $query = $this->db->insert_string('captcha', $capdata);
                $this->db->query($query);
                $this->data['image'] = $cap['image'];
                $this->data['captcha'] = array(
                    'name' => 'captcha',
                    'id' => 'captcha',
                    'type' => 'text',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => lang('type_captcha')
                );
            }

            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => lang('email'),
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'required' => 'required',
                'placeholder' => lang('password'),
            );
            $this->data['allow_reg'] = $this->Settings->allow_reg;
            if ($m == 'db') {
                $this->data['message'] = lang('db_restored');
            } elseif ($m) {
                $this->data['error'] = lang('we_are_sorry_as_this_sction_is_still_under_development.');
            }

            $this->load->view($this->theme . 'auth/login', $this->data);
        }
    }

    function reload_captcha()
    {
        $this->load->helper('captcha');
        $vals = array(
            'pool' => '0123456789',
            'img_path' => './assets/captcha/',
            'img_url' => base_url('assets/captcha/'),
            'img_width' => 150,
            'img_height' => 34,
            'word_length' => rand(5, 8),
            'colors' => array('background' => array(255, 255, 255), 'border' => array(204, 204, 204), 'text' => array(102, 102, 102), 'grid' => array(204, 204, 204))
        );
        $cap = create_captcha($vals);
        $capdata = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $capdata);
        $this->db->query($query);
        //$this->data['image'] = $cap['image'];

        echo $cap['image'];
    }

    function logout($m = NULL)
    {

        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());

        admin_redirect('login/' . $m);
    }

    function change_password()
    {
        if (!$this->ion_auth->logged_in()) {
            admin_redirect('login');
        }
        $this->form_validation->set_rules('old_password', lang('old_password'), 'required');
        $this->form_validation->set_rules('new_password', lang('new_password'), 'required|min_length[8]|max_length[25]');
        $this->form_validation->set_rules('new_password_confirm', lang('confirm_password'), 'required|matches[new_password]');

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('auth/profile/' . $user->id . '/#cpassword');
        } else {
            if (DEMO) {
                $this->session->set_flashdata('warning', lang('disabled_in_demo'));
                redirect($_SERVER["HTTP_REFERER"]);
            }

            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));

            if ($change) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect('auth/profile/' . $user->id . '/#cpassword');
            }
        }
    }

    function forgot_password2()
    {
        $this->form_validation->set_rules('forgot_email', lang('email_address'), 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $error = validation_errors() ? validation_errors() : $this->session->flashdata('error');
            $this->session->set_flashdata('error', $error);
            admin_redirect("login#forgot_password");
        } else {

            $identity = $this->ion_auth->where('email', strtolower($this->input->post('forgot_email')))->users()->row();
            if (empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('error', $this->ion_auth->messages());
                admin_redirect("login#forgot_password");
            }

            $forgotten = $this->ion_auth->forgotten_password($identity->email);

            if ($forgotten) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                admin_redirect("login#forgot_password");
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect("login#forgot_password");
            }
        }
    }

    public function reset_password($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {

            $this->form_validation->set_rules('new', lang('password'), 'required|min_length[8]|max_length[25]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', lang('confirm_password'), 'required');

            if ($this->form_validation->run() == false) {

                $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
                $this->data['message'] = $this->session->flashdata('message');
                $this->data['title'] = lang('reset_password');
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'class' => 'form-control',
                    'pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}',
                    'data-bv-regexp-message' => lang('pasword_hint'),
                    'placeholder' => lang('new_password')
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'class' => 'form-control',
                    'data-bv-identical' => 'true',
                    'data-bv-identical-field' => 'new',
                    'data-bv-identical-message' => lang('pw_not_same'),
                    'placeholder' => lang('confirm_password')
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;
                $this->data['identity_label'] = $user->email;
                //render
                $this->load->view($this->theme . 'auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);
                    show_error(lang('error_csrf'));

                } else {
                    // finally change the password
                    $identity = $user->email;

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        //$this->logout();
                        admin_redirect('login');
                    } else {
                        $this->session->set_flashdata('error', $this->ion_auth->errors());
                        admin_redirect('auth/reset_password/' . $code);
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            admin_redirect("login#forgot_password");
        }
    }

    function activate($id, $code = false)
    {

        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->Owner) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            if ($this->Owner) {
                redirect($_SERVER["HTTP_REFERER"]);
            } else {
                admin_redirect("auth/login");
            }
        } else {
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            admin_redirect("forgot_password");
        }
    }

    function deactivate($id = NULL)
    {
        $this->sma->checkPermissions('users', TRUE);
        $id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;
        $this->form_validation->set_rules('confirm', lang("confirm"), 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($this->input->post('deactivate')) {
                $this->session->set_flashdata('error', validation_errors());
                redirect($_SERVER["HTTP_REFERER"]);
            } else {
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['user'] = $this->ion_auth->user($id)->row();
                $this->data['modal_js'] = $this->site->modal_js();
                $this->load->view($this->theme . 'auth/deactivate_user', $this->data);
            }
        } else {

            if ($this->input->post('confirm') == 'yes') {
                if ($id != $this->input->post('id')) {
                    show_error(lang('error_csrf'));
                }

                if ($this->ion_auth->logged_in() && $this->Owner) {
                    $this->ion_auth->deactivate($id);
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                }
            }

            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function create_user()
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['title'] = "Create User";
        $this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
        $this->form_validation->set_rules('status', lang("status"), 'trim|required');
        $this->form_validation->set_rules('group', lang("group"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $username = strtolower($this->input->post('username'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $notify = $this->input->post('notify');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'group_id' => $this->input->post('group') ? $this->input->post('group') : '3',
                //'biller_id' => $this->input->post('biller'),
                'warehouse_id' => $this->input->post('branch'),
                'department_id' => $this->input->post('department'),
                'view_right' => $this->input->post('view_right'),
                'edit_right' => $this->input->post('edit_right'),
                // 'allow_discount' => $this->input->post('allow_discount'),
            );
            $active = $this->input->post('status');
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $active, $notify)) {

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            admin_redirect("auth/users");

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
            $this->data['groups'] = $this->ion_auth->groups()->result_array();
            //$this->data['billers'] = $this->site->getAllCompanies('biller');
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['departments'] = $this->site->getAllDepartments();


            $bc = array(array('link' => admin_url('home'), 'page' => lang('home')), array('link' => admin_url('auth/users'), 'page' => lang('users')), array('link' => '#', 'page' => lang('create_user')));
            $meta = array('page_title' => lang('users'), 'bc' => $bc);
            $this->page_construct('auth/create_user', $meta, $this->data);
        }
    }

    function edit_user($id = NULL)
    {

        //$this->sma->print_arrays($_POST);
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $this->data['title'] = lang("edit_user");

        if (!$this->loggedIn || !$this->Owner && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $user = $this->ion_auth->user($id)->row();

        if ($user->username != $this->input->post('username')) {
            $this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
        }
        if ($user->email != $this->input->post('email')) {
            $this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
        }

        if ($this->form_validation->run() === TRUE) {

            if ($this->Owner) {
                if ($id == $this->session->userdata('user_id')) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                    );
                } elseif ($this->ion_auth->in_group('customer', $id) || $this->ion_auth->in_group('supplier', $id)) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                    );
                } else {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                        'active' => $this->input->post('status'),
                        'group_id' => $this->input->post('group'),
                        //'biller_id' => $this->input->post('biller') ? $this->input->post('biller') : NULL,
                        'branch_id' => $this->input->post('branch') ? $this->input->post('branch') : NULL,
                        'department_id' => $this->input->post('department') ? $this->input->post('department') : NULL,
                        'award_points' => $this->input->post('award_points'),
                        'view_right' => $this->input->post('view_right'),
                        'edit_right' => $this->input->post('edit_right'),
                        //'allow_discount' => $this->input->post('allow_discount'),
                    );
                }

            } elseif ($this->Admin) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                    'active' => $this->input->post('status'),
                    'award_points' => $this->input->post('award_points'),
                );
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                );
            }

            if ($this->Owner) {
                if ($this->input->post('password')) {
                    if (DEMO) {
                        $this->session->set_flashdata('warning', lang('disabled_in_demo'));
                        redirect($_SERVER["HTTP_REFERER"]);
                    }
                    $this->form_validation->set_rules('password', lang('edit_user_validation_password_label'), 'required|min_length[8]|max_length[25]|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', lang('edit_user_validation_password_confirm_label'), 'required');

                    $data['password'] = $this->input->post('password');
                }
            }
            //$this->sma->print_arrays($data);

        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user->id, $data)) {
            $this->session->set_flashdata('message', lang('user_updated'));
            admin_redirect("auth/profile/" . $id);
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }


    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if (
            $this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _render_page($view, $data = null, $render = false)
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view('header', $this->viewdata, $render);
        $view_html .= $this->load->view($view, $this->viewdata, $render);
        $view_html = $this->load->view('footer', $this->viewdata, $render);

        if (!$render)
            return $view_html;
    }

    /**
     * @param null $id
     */
    function update_avatar($id = NULL)
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        if (!$this->ion_auth->logged_in() || !$this->Owner && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        //validate form input
        $this->form_validation->set_rules('avatar', lang("avatar"), 'trim');

        if ($this->form_validation->run() == true) {

            if ($_FILES['avatar']['size'] > 0) {

                $this->load->library('upload');

                $config['upload_path'] = 'assets/uploads/avatars';
                $config['allowed_types'] = 'gif|jpg|png';
                //$config['max_size'] = '500';
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('avatar')) {

                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect($_SERVER["HTTP_REFERER"]);
                }

                $photo = $this->upload->file_name;

                $this->load->helper('file');
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/avatars/' . $photo;
                $config['new_image'] = 'assets/uploads/avatars/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                $config['height'] = 150;
                ;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
                $user = $this->ion_auth->user($id)->row();
            } else {
                $this->form_validation->set_rules('avatar', lang("avatar"), 'required');
            }
        }

        if ($this->form_validation->run() == true && $this->auth_model->updateAvatar($id, $photo)) {
            unlink('assets/uploads/avatars/' . $user->avatar);
            unlink('assets/uploads/avatars/thumbs/' . $user->avatar);
            $this->session->set_userdata('avatar', $photo);
            $this->session->set_flashdata('message', lang("avatar_updated"));
            admin_redirect("auth/profile/" . $id);
        } else {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("auth/profile/" . $id);
        }
    }

    function register()
    {
        $this->data['title'] = "Register";
        if (!$this->allow_reg) {
            $this->session->set_flashdata('error', lang('registration_is_disabled'));
            admin_redirect("login");
        }

        $this->form_validation->set_message('is_unique', lang('account_exists'));
        $this->form_validation->set_rules('first_name', lang('first_name'), 'required');
        $this->form_validation->set_rules('last_name', lang('last_name'), 'required');
        $this->form_validation->set_rules('email', lang('email_address'), 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('usernam', lang('usernam'), 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[8]|max_length[25]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', lang('confirm_password'), 'required');
        if ($this->Settings->captcha) {
            $this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
        }

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('username'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            admin_redirect("login");
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
            $this->data['groups'] = $this->ion_auth->groups()->result_array();

            $this->load->helper('captcha');
            $vals = array(
                'img_path' => './assets/captcha/',
                'img_url' => admin_url() . 'assets/captcha/',
                'img_width' => 150,
                'img_height' => 34,
            );
            $cap = create_captcha($vals);
            $capdata = array(
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word']
            );

            $query = $this->db->insert_string('captcha', $capdata);
            $this->db->query($query);
            $this->data['image'] = $cap['image'];
            $this->data['captcha'] = array(
                'name' => 'captcha',
                'id' => 'captcha',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => lang('type_captcha')
            );

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->load->view('auth/register', $this->data);
        }
    }

    function user_actions()
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'delete') {
                    foreach ($_POST['val'] as $id) {
                        if ($id != $this->session->userdata('user_id')) {
                            $this->auth_model->delete_user($id);
                        }
                    }
                    $this->session->set_flashdata('message', lang("users_deleted"));
                    redirect($_SERVER["HTTP_REFERER"]);
                }

                if ($this->input->post('form_action') == 'export_excel') {

                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle(lang('sales'));
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('first_name'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('last_name'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('email'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('company'));
                    // $this->excel->getActiveSheet()->SetCellValue('E1', lang('group'));
                    // $this->excel->getActiveSheet()->SetCellValue('F1', lang('status'));

                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $user = $this->site->getUser($id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $user->first_name);
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $user->last_name);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $user->email);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $user->company);
                        // $this->excel->getActiveSheet()->SetCellValue('E' . $row, $user->group);
                        //$this->excel->getActiveSheet()->SetCellValue('F' . $row, $user->status);
                        $row++;
                    }

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'users_' . date('Y_m_d_H_i_s');
                    $this->load->helper('excel');
                    create_excel($this->excel, $filename);
                }
            } else {
                $this->session->set_flashdata('error', lang("no_user_selected"));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function delete($id = NULL)
    {
        if (DEMO) {
            $this->session->set_flashdata('warning', lang('disabled_in_demo'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if (!$this->Owner || $id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'admin/welcome');
        }

        if ($this->auth_model->delete_user($id)) {
            //echo lang("user_deleted");
            $this->session->set_flashdata('message', 'user_deleted');
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

}
