<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paymentmodel
 *
 * @author aquilax
 */
class Paymentmodel extends Model{

  var $table = 'payment';

  function insert($get){
/*
message - Съдържание на съобщението без ключови думи. Ако съобщението е било
 * TXT KEY 123, то този параметър е 123. Параметърът е празен, ако е имало само
 * ключовата дума и никакъв друг допълнителен текст.
sender - Телефонният номер на подателя на съобщението в международен формат,
 * без знака плюс. Например 359888123456 или 40123456700.
country
    Държавният код на оператора на подателя. Използват се дву-символни кодове,
 * съгласно стандарта ISO 3166-1 (BG за България, RO за Румъния, SE за Швеция,
 * FI - Финландия, NO - Норвегия, LT - Литва, LV - Латвия, EE - Естония и т.н).
 * Моля, имайте предвид, че това НЕ задължително е истинското местонахождение
 * на изпращача. Например, подателят с шведски телефон може да изпрати съобщение,
 * докато е на роуминг в Норвегия, а вие пак ще имате SE в полето за държава.
price
    Крайната клиентска цена на съобщението в местната валута с включен ДДС.
currency
    Местният паричен символ, съгласно ISO 4217 (BGN, RON, EUR, SEK, NOK, DKK,
 * LTL, LVL, EEK, USD, GBP и т.н).
service_id
    Серия от символи(низ), която разпознава тази услуга на Fortumo.
 * Например f7fa12b381d290e268f99e382578d64a. Ако имате много услуги с един и
 * същи URL адрес, можете да използвате това поле, за да определите, за коя
 * услуга е това съобщение.
message_id
    Серия от символи(низ), която е уникална за всяко съобщение, което услугата
 * ви получава.
keyword
    Частта от съобщението, наречена ключова дума. Ако съобщението е TXT KEY 123,
 * тогава параметърът е TXT KEY.
shortcode
    Краткият номер, до който бе изпратено съобщението
status
    Billing status, which is either pending, ok or failed.
sig
    Поискайте подпис, който можете да проверите, за да сте сигурни, че заявката
 * е произлязла от Fortumo. Погледнете по-долу в частта "Сигурност", за да
 * разберете как.
test
 * This parameter is present only when message is sent through Fortumo testing
 * interface by yourself and it's value is always 'true'.
 */

    $data = array(
      'message' => $get['message'],
      'sender' => $get['sender'],
      'country' => $get['country'],
      'price' => $get['price'],
      'currency' => $get['currency'],
      'service_id' => $get['service_id'],
      'message_id' => $get['message_id'],
      'keyword' => $get['keyword'],
      'shortcode' => $get['shortcode'],
      'status' => $get['status'],
      'test' => $this->stb($get['test']),
    );
    $this->db->insert($this->table, $data);
    $pid = $this->db->insert_id();
    $this->insert_transaction($pid, $get);
  }

  function insert_transaction($pid, $get){
    $data = array(
      'uid' => $this->getUserId($get['message']),
      'aid' => 0,
      'tsum' => $get['price'],
      'ip' => '',
      'ip_int' => 0,
      'ttype'	=> 1,
      'pid' => $pid
    );
    $this->db->insert('transaction', $data);
  }

  function getUserId($code){
    $query = $this->db->get_where('user', array('code' => $code));
    if ($query->num_rows() > 0){
      $ary = $query->row_array();
      return $ary['id'];
    } else {
      return 0;
    }
  }

  function stb($str){
    if ($str == 'true'){
      return 1;
    } else {
      return 0;
    }
  }
}
?>
