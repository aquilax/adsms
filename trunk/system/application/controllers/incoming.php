<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of incoming
 *
 * @author aquilax
 */
class Incoming extends Controller{

  function Incoming(){
    parent::Controller();
    parse_str($_SERVER['QUERY_STRING'],$_GET);
    $this->load->model('paymentmodel');
  }

  function sms(){
    //Fortumo Processing Code
    // check that the request comes from Fortumo server

    if(!in_array($_SERVER['REMOTE_ADDR'],
      array('81.20.151.38', '81.20.148.122'))) {
      die("Error: Unknown IP");
    }

    // check the signature
    
    $service_id = $_GET['service_id'];

    if (isset($config['keys'][$service_id])){
      $secret = $config['keys'][$service_id];
    }

    if(!empty($secret) && !$this->check_signature($_GET, $secret)) {
      die("Error: Invalid signature");
    }

    $this->paymentmodel->insert($_GET);
    $sender = $_GET['sender'];
    $message = $_GET['message'];

    // do something with $sender and $message
    $reply = "Thank you $sender for sending $message";

    // print out the reply
    echo($reply);
  }

  function check_signature($params_array, $secret) {
    ksort($params_array);

    $str = '';
    foreach ($params_array as $k=>$v) {
      if($k != 'sig') {
        $str .= "$k=$v";
      }
    }
    $str .= $secret;
    $signature = md5($str);

    return ($params_array['sig'] == $signature);
  }
}
?>
