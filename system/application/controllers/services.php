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

  function wisdom(){
  /*
   * За да бъдат предотвратени евентуални злоупотреби, ограничете достъпа до
   * скрипта си само за IP адреса на Wisdom.BG - 87.120.41.150.
   * Забележка: Скриптът Ви трябва да се изпълни и да върне съдържание в рамките
   * на 5 секунди. В противен случай връзката ще бъде прекъсната и потребителят
   * ще получи съобщение за грешка като обратен SMS.
   * Системата ни изпраща данните за SMS-а към посочения скрипт чрез GET,
   * използвайки следните параметри: date - датата на изпращане на входящия
   * SMS (unix timestamp), sms_id - уникално ID на sms-a (произволен символен низ),
   * number_from - GSM номера на потребителя, sms_number - краткият SMS номер с
   * добавена стойност на Wisdom.BG, sms_price - цена на входящия SMS (без ДДС),
   * sms_text - текст на входящия SMS.

   * Примерен казус:
   * Вашият префикс е "test" и потребител изпраща на еднолевовия ни номер 1910
   * SMS със съдържание "ts 1" от личния си gsm 0898-912-974. Системата ни ще
   * извика вашия скрипт по следния начин:
   * http://site.com/s.php?date=1167602401&sms_id=af6h&number_from=359898912974&sms_number=1910&sms_price=1&sms_text=ts+1
   * Скриптът трябва да върне текстово съдържание, което потребителят ще
   * получи като обратен SMS.
   */
    if(!in_array($_SERVER['REMOTE_ADDR'],
      array('87.120.41.150'))) {
      die("Error: Unknown IP");
    }

    $this->paymentmodel->insertWisdom($_GET);
    echo "Plashtaneto Vi e prieto";
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
