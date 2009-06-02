<?php

class Home extends ADSMS_Controller{

  function Home(){
    parent::ADSMS_Controller();
  }

  function index(){
    $this->data['title']= lang('Home');
    $this->load->view('home_view',$this->data);
  }

  function test(){
    $this->data['title'] = lang('Sample ads');
    $this->load->view('test_ad', $this->data);
  }

  function prices(){
    $this->data['title'] = lang('Ad Prices');
    $this->data['services'] = $this->config->item('services');
    $this->load->view('home_prices_view', $this->data);
  }
}

?>