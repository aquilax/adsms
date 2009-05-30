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
class Denied extends Controller{

  function Denied(){
    parent::Controller();
    $this->lang->load('adsms', 'bulgarian');
  }

  function index(){
    $data['title'] = lang('Access denied');
    $this->load->view('denied_view', $data);
  }
}
?>
