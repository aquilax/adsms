<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admodel
 *
 * @author aquilax
 */
class Admodel extends Model{

  var $table = 'ad';

  function getAds(){
    $uid = $this->Usermodel->getId();
    $data = array('uid' => $uid);
    $query = $this->db->get_where($this->table, $data);
    return $query->result_array();
  }

  function add($post){
    $data = array(
      'uid' => $this->Usermodel->getId(),
      'name' => $post['name'],
      'url' => $post['url'],
      'descr' => $post['descr'],
      'status' => $post['status'],
    );
    $this->db->insert($this->table, $data);
  }

  function activate($id){

  }

  function deactivate($id){

  }
}
?>
