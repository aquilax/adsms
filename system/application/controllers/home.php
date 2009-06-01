<?php

class Home extends ADSMS_Controller{

  function Home(){
    parent::ADSMS_Controller();
  }

  function index(){
    $data['title']= lang('Home');

    $data['menu'] = $this->menu;

    $query = $this->db->query('SELECT count(*) AS cnt FROM user');
    $row = $query->row_array();
    $data['registered_users'] = $row['cnt'];

    $this->load->view('home_view',$data);
  }

  function test(){
    $data['title'] = lang('Sample ads');
    $data['menu'] = $this->menu;

    $this->load->view('test_ad', $data);
  }

  function prices(){
    $data['title'] = lang('Ad Prices');
    $data['menu'] = $this->menu;

    $data['services'] = $this->config->item('services');
    $this->load->view('home_prices_view', $data);
  }
}

?>