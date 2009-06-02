<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adserver
 *
 * @author aquilax
 */
class Adserver extends Controller{

  function Adserver(){
    parent::Controller();
    $this->load->model('adservermodel');
  }

  function ad($pos){
    $aid = 1;
    $uid = 1;
    $tsum = 0.012;
    $this->adservermodel->impression($aid, $uid, $tsum);
    $ad = "function dw(t){document.write(t);};
dw('<div><a href=\"http://scenata.com\">Сцената</a><p>Събития от културния живот</p></div>');";
    echo $ad;
  }

  function index(){
    redirect('home');
  }
}
?>
