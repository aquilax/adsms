<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ad
 *
 * @author aquilax
 */
class Ad extends ADSMS_Controller{
  
  function Ad(){
    parent::ADSMS_Controller();
    $this->load->model('Admodel');
  }

  function index(){
    if(!$this->Usermodel->logged()){
      redirect('denied');
    } else {
      $data['title']= lang('Ads');

      $data['menu'] = $this->menu;

      $data['ads'] = $this->Admodel->getAds();

      $this->load->view('ad_view', $data);
    }
  }

  function add(){
     if(!$this->Usermodel->logged()){
      redirect('denied');
    } else {

      $data['title']= lang('Add new ad');

      $data['menu'] = $this->menu;

      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['statusa'] = array(0 => lang('Active'), '-1' => lang('Inactive'), '1' => lang('VIP'));

      $this->form_validation->set_rules('name', lang('Title'), 'trim|required');
      $this->form_validation->set_rules('url', lang('URL'), 'trim|required');
      $this->form_validation->set_rules('descr', lang('Description'), 'trim');
      $this->form_validation->set_rules('cpv', lang('Cost Per View'), 'trim|numeric');
      $this->form_validation->set_rules('status', lang('Status'), 'integer');

      if ($this->form_validation->run() == FALSE){
        $this->load->view('ad_add_view', $data);
      } else {
        $this->Admodel->add($_POST);
        redirect('ad');
      }
    }
  }

  function activate(){

  }

  function deactivate(){

  }
}
?>