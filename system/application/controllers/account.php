<?php
/**
 * Description of account
 *
 * @author aquilax
 */
class Account extends Controller{

  function Account(){
    parent::Controller();
    $this->load->model('Accountmodel');
    $this->output->enable_profiler(TRUE);
  }

  function index(){
    if(!$this->Usermodel->logged()){
      redirect('denied');
    } else {
      $data['title'] = "My Account";
      $data['sum'] = $this->Accountmodel->getSum();
      $data['payments'] = $this->Accountmodel->getTransactionsByDays(14, 1);
      $data['transactions'] = $this->Accountmodel->getTransactionsByDays(14, -1);
      $this->load->view('account_view', $data);
    }
  }
}
?>
