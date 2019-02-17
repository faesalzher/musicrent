<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class modPenyewaan extends CI_Model {

   /* var $id_penyewaan = '';
    var $id_barang = '';
    var $tanggal = '';
    var $nama_penyewa = '';
    var $no_ktp_1 = '';
    var $no_ktp_2 = '';
    var $username = '';
    var $email = '';


    var $alamat_sewa = '';*/

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    function cek_penyewaan($id_barang, $tanggal) {
        $query = $this->db->query("SELECT * FROM penyewaan WHERE tanggal='$tanggal' && id_barang='$id_barang' ");
        return $query->result();
    }

    function getPenyewaanIndeks($id_barang, $tanggal) {
        $query = $this->db->query("SELECT * FROM penyewaan WHERE tanggal='$tanggal' && id_barang='$id_barang' ");
        return $query;
    }

    function SetNewPenyewaan($data) {
        $this->db->insert('penyewaan', $data);
    }
    function getPenyewaan(){
      $query = $this->db->get('penyewaan');
      return $query->result();
  }
  function getKalender($tanggal){
      $query=$this->db->query("SELECT * FROM penyewaan WHERE tanggal='$tanggal' ");
      return $query->result();
  }
  function getKalenderIndeks($tanggal){
      $query=$this->db->query("SELECT * FROM penyewaan WHERE tanggal='$tanggal' ");
      return $query;
  }
  function delete_penyewaan($id_penyewaan)
  {
      $this->db->delete('penyewaan', array('id_penyewaan' => $id_penyewaan));
  }

}
