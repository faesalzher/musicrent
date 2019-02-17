<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class modBarang extends CI_Model {

 var $id_barang = '';
 /*var $judul = '';
 var $jenis = '';
 var $harga_sewa = '';
 var $deskripsi = '';
 var $gambar = '';*/
 function __construct()
 {
        // Call the Model constructor
  parent::__construct();
}

function getAllBarang()
{
  $query = $this->db->get('barang');
  return $query->result();
}

function SetNewBarang($data)
{/*
    $this->id_barang =  $data['id_barang'];
    $this->judul =  $data['judul'];
    $this->jenis =  $data['jenis'];
    $this->harga_sewa = $data['harga_sewa'];
    $this->deskripsi = $data['deskripsi'];
    $this->gambar = $data['gambar'];*/
    $this->db->insert('barang', $data);
  }

  function update_entry($data)
{/*
   $this->id_barang =  $data['id_barang'];
   $this->judul =  $data['judul'];
   $this->jenis =  $data['jenis'];
   $this->harga_sewa = $data['harga_sewa'];
   $this->deskripsi = $data['deskripsi'];
   $this->gambar = $data['gambar'];*/
   $this->db->update('barang', $data, array('id_barang' => $data['id_barang']));
 }

 function delete_barang($id_barang)
 {
  $this->db->delete('barang', array('id_barang' => $id_barang));
}


function get_entry($id_barang){
  $this->db->where('id_barang', $id_barang);
  $query = $this->db->get('barang', 1);
  return $query->result();
}






}