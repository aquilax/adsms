<?php
/**
 * Description of usermodel
 *
 * @author aquilax
 */
class Usermodel extends Model{

  var $table = 'user';
  var $id = -1;
  var $email = '';
  var $pass = '';
  var $created = '';
  var $code_length = 6;

  function Usermodel(){
    parent::Model();
  }


  function generateCode(){
    $chars = '0123456789DFGIJLNQRSUVWYZ';
    $achars = str_split($chars);
    $code = '';
    do{
      $keys = array_rand($achars, $this->code_length);
      foreach($keys as $key){
        $code .= $achars[$key];
      }
      $query = $this->db->get_where($this->table, array('code' => $code));
      if ($query->num_rows() > 0){
        $code = '';
      }
    } while ($code == '');
    return $code;
  }

  function register($post){
    $code = $this->generateCode();
    $data = array(
      'email' => $post['email'],
      'pass' => $post['password'],
      'code' => $code,
    );
    $this->db->insert($this->table, $data);
    $uid = $this->db->insert_id();
    $this->session->set_userdata('uid', $uid);
    $this->session->set_userdata('email', $_POST['email']);
    $this->session->set_userdata('status', 0);
  }

  function login($post){
    $data = array(
      'email' => $post['email'],
      'pass' => $post['password'],
    );
    $query = $this->db->get_where($this->table, $data, 1);
    if ($query->num_rows() > 0){
      $row = $query->row_array();
      $this->session->set_userdata('uid', $row['id']);
      $this->session->set_userdata('email', $row['email']);
      $this->session->set_userdata('status', $row['status']);
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function emailExists($email){
    $query = $this->db->get_where($this->table, array('email' => $email));
    if ($query->num_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function logged(){
    return $this->session->userdata('uid') != false;
  }

  function isAdmin(){
    return $this->session->userdata('status') == 100;
  }

  function getId(){
    return $this->session->userdata('uid');
  }

  function logout(){
    $array_items = array('uid' => '', 'email' => '');
    $this->session->unset_userdata($array_items);
  }
}
?>
