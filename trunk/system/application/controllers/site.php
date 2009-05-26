<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sites
 *
 * @author aquilax
 */
class Site extends Controller{

  function Site(){
    parent::Controller();
    $this->load->model('Sitemodel');
  }

  function index(){
    $data['title']='Sites';
    $data['sites']= $this->Sitemodel->getSites();
    $this->load->view('site_index_view', $data);
  }

  function add(){
    //Add Site
    if (! $this->Usermodel->isAdmin()){
      redirect('home');
    }
    //Createform
    $data['title']='Add site';

    $data['statusa'] = array(0 => 'Active', '-1' => 'Inactive', '1' => 'VIP');

		$this->load->helper('form');
		$this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('url', 'Url', 'trim|required');
    $this->form_validation->set_rules('descr', 'Description', 'trim');
    $this->form_validation->set_rules('status', 'Status', 'integer');

		if ($this->form_validation->run() == FALSE){
      $this->load->view('add_site_view', $data);
		} else {
      $this->Sitemodel->add($_POST);
			redirect('site');
		}
  }

  function activate(){
    //Activate Site
  }

  function deactivate(){
    //Deactivate Site
  }
}
?>
