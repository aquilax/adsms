<?php

class Home extends Controller{

  function Home(){
    parent::Controller();
    $this->lang->load('adsms', 'bulgarian');
  }

  function index(){
    $data['title']= lang('Home');

    if (!$this->Usermodel->logged()){
      $data['links'] = array(
        'user/login' => lang('Login'),
        'user/register' => lang('Register'),
      );
    } else {
      $data['links'] = array(
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
      'user/login' => lang('Login'),
      'user/register' => lang('Register'),
    );

    $this->load->view('test_ad', $data);
  }
}

?>