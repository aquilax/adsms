<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author aquilax
 */
class User extends ADSMS_Controller{

  function User(){
    parent::ADSMS_Controller();
  }

  function index(){
    if (!$this->logged){
      redirect("home");
    } else {
      $this->data['title'] = lang('My Profile');
      $this->load->view('user_view', $this->data);
    }
  }

  function register(){
    $this->data['title']= lang('Register');

		$this->load->helper('form');
		$this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_reg');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_again]|md5');
    $this->form_validation->set_rules('password_again', 'Password Confirmation', 'trim|required');

		if ($this->form_validation->run() == FALSE){
      $this->load->view('user_register_view', $this->data);
		} else {
      $this->Usermodel->register($_POST);
			redirect('user/register_success');
		}
  }

  function register_success(){
    $this->data['title']= lang('Successful registration');
    $this->load->view('register_success_view', $this->data);
  }

  function check_email_reg($str){
    if ($this->Usermodel->emailExists($str)){
      $this->form_validation->set_message('check_email_reg', 'This E-mail is already registered');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function login(){
    $this->data['title']= lang('Login');

    $this->load->helper('form');
		$this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE){
      $this->load->view('user_login_view', $this->data);
		} else {
      if ($this->Usermodel->login($_POST)){
        redirect('user');
      } else {
        $this->load->view('user_login_view', $this->data);
      }
		}
  }

  function forgotten_pass(){
    
  }

  function logout(){
    $this->Usermodel->logout();
    redirect('home');
  }
}
?>
