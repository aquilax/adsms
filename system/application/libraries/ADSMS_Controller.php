<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of adsms_controller
 *
 * @author aquilax
 */
class ADSMS_Controller extends Controller{
  var $menu = array();

  function ADSMS_Controller(){
    parent::Controller();
    $this->lang->load('adsms', 'bulgarian');
  }
}
?>
