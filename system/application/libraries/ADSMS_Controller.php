<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of adsms_controller
 *
 * @author aquilax
 */
class ADSMS_Controller extends Controller{
  var $menu = array();

  var $logged = false;

  function ADSMS_Controller(){
    parent::Controller();
    $this->lang->load('adsms', 'bulgarian');
    $this->logged = $this->Usermodel->logged();
    $this->fillMenu();
  }

  function fillMenu(){
    $this->menu[10][10] = array('url' => '', 'name' => lang('Home'));
    $this->menu[10][20] = array('url' => 'home/prices', 'name' => lang('Prices'));

    if (!$this->logged){
      $this->menu[20][10] = array('url' => 'user/login', 'name' => lang('Login'));
      $this->menu[20][20] = array('url' => 'user/register', 'name' => lang('Register'));
    } else {
      $this->menu[20][10] = array('url' => 'user', 'name' => lang('My Profile'));
      $this->menu[20][20] = array('url' => 'ad', 'name' => lang('Ads'));
      $this->menu[20][30] = array('url' => 'account', 'name' => lang('Account'));
      $this->menu[20][500] = array('url' => 'user/logout', 'name' => lang('Logout'));
    }
  }
}
?>
