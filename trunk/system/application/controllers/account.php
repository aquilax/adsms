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
      $this->data['title'] = lang("Account");
      $this->data['sum'] = $this->Accountmodel->getSum();
      $this->data['payments'] = $this->Accountmodel->getTransactionsByDays(14, 1);
      $this->data['transactions'] = $this->Accountmodel->getTransactionsByDays(14, -1);
      $this->load->view('account_view', $this->data);
    }
  }
}
?>
