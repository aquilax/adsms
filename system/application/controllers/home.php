<?php

class Home extends ADSMS_Controller{

  function Home(){
    parent::ADSMS_Controller();
  }

  function index(){
    $data['title']= lang('Home');

    if (!$this->Usermodel->logged()){
      $data['links'] = array(
        '' => lang('Home'),
        'home/prices' => lang('Prices'),
        'user/login' => lang('Login'),
        'user/register' => lang('Register'),
      );
    } else {
      $data['links'] = array(
        '' => lang('Home'),
        'home/prices' => lang('Prices'),
        'user' => lang('My Profile'),
        'user/logout' => lang('Logout'),
        
      );
    }

    $query = $this->db->query('SELECT count(*) AS cnt FROM user');
    $row = $query->row_array();
    $data['registered_users'] = $row['cnt'];

    $this->load->view('home_view',$data);
  }

  function test(){
    $data['title'] = lang('Sample ads');
    $data['links'] = array(
      '' => lang('Home'),
      'home/prices' => lang('Prices'),
      'user/login' => lang('Login'),
      'user/register' => lang('Register'),
    );

    $this->load->view('test_ad', $data);
  }

  function prices(){
    $data['title'] = lang('Ad Prices');
    $data['links'] = array(
      '' => lang('Home'),
      'home/prices' => lang('Prices'),
      'user/login' => lang('Login'),
      'user/register' => lang('Register'),
    );

    $data['services'] = $this->config->item('services');
    $this->load->view('home_prices_view', $data);
  }
}

?>