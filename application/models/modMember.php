  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class modMember extends CI_Model{

  	function daftar($data)
  	{
  		$this->db->insert('member',$data);
  	}
  	function auth_admin($username,$password){
  		$query=$this->db->query("SELECT * FROM admin WHERE username_admin='$username' AND password='$password' LIMIT 1");
  		return $query;
  	}

    //cek nim dan password mahasiswa
  	function auth_member($username,$password){
  		$query=$this->db->query("SELECT * FROM member WHERE username='$username' AND password=MD5('$password') LIMIT 1");
  		return $query;
  	}
    function isExist($username){
      $query=$this->db->query("SELECT * FROM member WHERE username='$username' LIMIT 1");
      return $query;
    }
  }