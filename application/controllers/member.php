<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('modMember'); //call model
        $this->load->model('modBarang'); //call model
        $this->load->model('modPenyewaan'); //call model
    }

    public function halaman_sewa() {
        if ($this->session->userdata('username') == ''){
            $this->session->set_flashdata('ceklogin', 'Anda Harus Login Terlebih Dahulu ');            
            redirect('guest#login');
        } 
        if($this->session->userdata('akses') == '3') {
            $data['entry'] = $this->modBarang->get_entry($this->uri->segment(3, 0));
            if (!isset($data['entry'][0]) || $data['entry'][0] == "") {
                echo "error";
            } else {
                $messages = $this->modPenyewaan->getPenyewaan();
                $data['penyewaan'] = $messages;
                $data['entry'] = $data['entry'][0];
                $this->load->view('header');
                $this->load->view('v_FormPenyewaan', $data);
                $this->load->view('footer');
            }
        } else if ($this->session->userdata('akses') == '1') {
            redirect('admin');

        }
    }

    public function cek_ketersediaan() {
       $this->form_validation->set_rules('nama','nama','required');
       $this->form_validation->set_rules('alamat_sewa', 'alamat_sewa','required');
       $this->form_validation->set_rules('no_ktp','no_ktp','required');
       if ($this->session->userdata('username') == '') {
        $this->session->set_flashdata('ceklogin', 'Anda Harus Login Terlebih Dahulu ');
        redirect('guest#login');
    }else if ($this->session->userdata('akses') == '3') {
        $data['entry'] = $this->modBarang->get_entry($this->uri->segment(3, 0));
        $tanggal = $this->input->post('tanggal');
        $id_barang = $this->input->post('id_barang');
        $messages = $this->modPenyewaan->cek_penyewaan($id_barang, $tanggal);
        $isExist = $this->modPenyewaan->getPenyewaanIndeks($id_barang, $tanggal);
        if($this->form_validation->run() == FALSE){                      
            $data['entry'] = $data['entry'][0];
            $data2['entry'] = $tanggal;
            $this->load->view('header');
            $this->load->view('v_FormPenyewaan', $data, $data2);
            $this->load->view('footer');
            }else {//jika telah disewa
                if ($isExist->num_rows() > 0) {//jika ada di database
                    $this->session->set_flashdata('ketersediaan', 'Barang Tidak Tersedia');
                    $data['entry'] = $data['entry'][0];
                    $data2['entry'] = $tanggal;
                    $this->load->view('header');
                    $this->load->view('v_FormPenyewaan', $data, $data2);
                    $this->load->view('footer');                
                } else{
                    $this->session->set_flashdata('ketersediaan', 'Barang Berhasil Dipesan, Silahkan menunggu untuk konfirmasi lewat email anda');
                    $id_barang = $this->input->POST('id_barang');
                    $username = $this->session->userdata('username');
                    $email = $this->session->userdata('email');
                    $tanggal = $this->input->post('tanggal');
                    $nama_penyewa = $this->input->POST('nama_penyewa');
                    $no_ktp = $this->input->POST('no_ktp');
                    $alamat_sewa = $this->input->POST('alamat_sewa');
                    $data = array(
                        'id_barang' => $id_barang,
                        'username' => $username,
                        'email' => $email,
                        'tanggal' => $tanggal,
                        'nama_penyewa' => $nama_penyewa,
                        'no_ktp' => $no_ktp,
                        'alamat_sewa' => $alamat_sewa,
                    );
                    $this->modPenyewaan->SetNewPenyewaan($data);
                    redirect('member/halaman_sewa/'. $id_barang);
                }
            }
        }else if ($this->session->userdata('akses') == '1') {
            redirect('admin');
        }

    }


    public function index() {

        if ($this->session->userdata('username') == '') {
           redirect('guest#login');
       } else {
        if ($this->session->userdata('akses') == '3') {
            $messages = $this->modBarang->getAllBarang();
            $data['barang'] = $messages;
                //$this->load->view('header');
            $this->load->view('v_HalamanUtama', $data);
            $this->load->view('footer');
        } else if ($this->session->userdata('akses') == '1') {
            redirect('admin');
        }
    }
}

}
