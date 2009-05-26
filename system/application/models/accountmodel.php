<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accountmodel
 *
 * @author aquilax
 */
class Accountmodel extends Model{

  var $table = 'transaction';

  function getTransactionsByDays($limit, $type){
    $uid = $this->Usermodel->getId();
    $sql = "SELECT
            sum(tsum) AS tsum,
            DATE(created) AS tdate
            FROM ".$this->table."
            WHERE uid = ".$this->db->escape($uid)."
            AND ttype = ".$this->db->escape($type)."
            GROUP BY DATE(created)
            ORDER BY tdate DESC
            LIMIT $limit";
    $query = $this->db->query($sql);
    $ary = $query->result_array();
    $query->free_result();
    return $ary;
  }

  function getSum(){
    $uid = $this->Usermodel->getId();
    $this->db->where('uid', $uid);
    $this->db->select_sum('tsum');
    $query = $this->db->get($this->table);
    $row = $query->row_array();
    if($row){
      return $row['tsum'];
    } else {
      return 0;
    }
  }
}
?>
