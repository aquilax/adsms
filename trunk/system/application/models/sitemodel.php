<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sitemodel
 *
 * @author aquilax
 */
class Sitemodel extends Model{

  var $table = 'site';

  function Sitemodel(){
    parent::Model();
  }

  function add($post){
    $data = array(
      'name' => $post['name'],
      'url' => $post['url'],
      'descr' => $post['descr'],
      'status' => $post['status'],
    );
    $this->db->insert($this->table, $data);
  }

  function getSites(){
    $query = $this->db->get($this->table);
    return $query->result_array();
  }
}
?>
