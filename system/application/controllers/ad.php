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
      $this->data['title']= lang('Ads');
      $this->data['ads'] = $this->Admodel->getAds();
      $this->load->view('ad_view', $this->data);
    }
  }

  function add(){
     if(!$this->Usermodel->logged()){
      redirect('denied');
    } else {

      $this->data['title']= lang('Add new ad');


      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->data['statusa'] = array(0 => lang('Active'), '-1' => lang('Inactive'), '1' => lang('VIP'));

      $this->form_validation->set_rules('name', lang('Title'), 'trim|required');
      $this->form_validation->set_rules('url', lang('URL'), 'trim|required');
      $this->form_validation->set_rules('descr', lang('Description'), 'trim');
      $this->form_validation->set_rules('cpv', lang('Cost Per View'), 'trim|numeric');
      $this->form_validation->set_rules('status', lang('Status'), 'integer');

      if ($this->form_validation->run() == FALSE){
        $this->load->view('ad_add_view', $this->data);
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