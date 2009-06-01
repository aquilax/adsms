<?php
/**
 * Description of account
 *
 * @author aquilax
 */
class Account extends ADSMS_Controller{

  function Account(){
    parent::ADSMS_Controller();
    $this->load->model('Accountmodel');
  }

  function index(){
    if(!$this->Usermodel->logged()){
      redirect('denied');
    } else {
      $data['title'] = lang("Account");
      $data['menu'] = $this->menu;
      $data['sum'] = $this->Accountmodel->getSum();
      $data['payments'] = $this->Accountmodel->getTransactionsByDays(14, 1);
      $data['transactions'] = $this->Accountmodel->getTransactionsByDays(14, -1);
      $this->load->view('account_view', $data);
    }
  }
}
?>
