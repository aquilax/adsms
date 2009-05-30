<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adservermodel
 *
 * @author aquilax
 */
class Adservermodel extends Model{

  var $table = 'transaction';

  function impression($aid, $uid, $tsum){
    $data = array(
      'uid' => $uid,
      'aid' => $aid,
      'tsum' =>	$tsum,
      'ip' => $_SERVER['REMOTE_ADDR'],
      'ip_int' => ip2long($_SERVER['REMOTE_ADDR']),
      'ttype' => -1,
      'pid' => 0,
    );
    $this->db->insert($this->table, $data);
  }
}
?>
