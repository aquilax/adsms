<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of denied
 *
 * @author aquilax
 */
class Denied extends ADSMS_Controller{

  function Denied(){
    parent::ADSMS_Controller();
  }

  function index(){
    $data['title'] = lang('Access denied');
    $this->load->view('denied_view', $data);
  }
}
?>
