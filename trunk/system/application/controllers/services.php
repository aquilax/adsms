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
class Services extends Controller{

  function Services(){
    parent::Controller();
    parse_str($_SERVER['QUERY_STRING'],$_GET);
    $this->load->model('paymentmodel');
  }

  function mobio(){
    $item = $_POST["item"];
    $fromnum = $_POST["fromnum"];
    $extid = $_POST["extid"];
    $servID = $_POST["servID"];

    log_message('error', serialize($_REQUEST));

    $mobio_remote_addr = "194.12.244.114";

    if($_SERVER['REMOTE_ADDR'] == $mobio_remote_addr) {
      $this->paymentmodel->insertMobio($_POST);
      $sms_reply = "Uspeshna obrabotka.";
      // your script action ends
      file("http://mobio.bg/paynotify/pnsendsms.php?servID=$servID&tonum=$fromnum&extid=$extid&message=".urlencode($sms_reply));
    }
  }

  function fortumo(){
    // Fortumo Processing Code
    // check that the request comes from Fortumo server

    if(!in_array($_SERVER['REMOTE_ADDR'],
      array('81.20.151.38', '81.20.148.122'))) {
      die("Error: Unknown IP");
    }

    // check the signature
    
    $service_id = $_GET['service_id'];

    $services = $this->config->item('services');

    if (isset($services['fortumo'][$service_id])){
      $secret = $services['fortumo'][$service_id]['key'];
    }

    echo $secret;

    if(!empty($secret) && !$this->check_signature($_GET, $secret)) {
      die("Error: Invalid signature");
    }

    $this->paymentmodel->insertFortumo($_GET);
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
