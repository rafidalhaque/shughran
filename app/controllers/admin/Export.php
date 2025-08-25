<?php defined('BASEPATH') or exit('No direct script access allowed');

class Export extends MY_Controller
{

  function __construct()
  {
    parent::__construct();

    if (!$this->loggedIn) {
      $this->session->set_userdata('requested_page', $this->uri->uri_string());
      $this->sma->md('login');
    }
  }


  function index($branch_id = NULL)
  {
    if ($this->session->userdata('branch_id')) {
      $branch_id = $this->session->userdata('branch_id');
    }

    if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
      $this->session->set_flashdata('warning', lang('access_denied'));
      //  $this->sma->print_arrays(7777);
      admin_redirect('export/' . $this->session->userdata('branch_id'));
    } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
      //  $this->sma->print_arrays(999);
      admin_redirect('export/' . $this->session->userdata('branch_id'));
    }

    // $this->sma->print_arrays(7777);

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


    $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Export')));
    $meta = array('page_title' => lang('Export'), 'bc' => $bc);

    // $this->sma->print_arrays($this->data);
    $this->page_construct('export', $meta, $this->data);
  }
}
