<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guest extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
         $this->load->model('modMember'); //call model
         $this->load->model('modBarang'); //call model

       }
       public function index()
       {
         if($this->session->userdata('akses')=='3'){
          redirect('member');
        }else if($this->session->userdata('akses')=='1'){
          redirect('admin');
        }else if($this->session->userdata('username') == ''){
          $messages = $this->modBarang->getAllBarang();
          $data['barang'] = $messages;
            //$this->load->view('header',$data);
          $this->load->view('v_HalamanUtama',$data);
          $this->load->view('footer',$data);
        }		
      }

      public function register(){
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        $cek_member=$this->modMember->isExist($this->input->post('username'));
        if($this->form_validation->run() == FALSE){
          if($cek_member->num_rows() > 0){
           $this->session->set_flashdata('cekmember', 'Username telah terdaftar');
         }
         $this->load->view('v_FormRegistrasi');
         $this->load->view('footer');  
       }else{      
         if($cek_member->num_rows() > 0){
           $this->session->set_flashdata('cekmember', 'Username telah terdaftar');
           $this->load->view('v_FormRegistrasi');
           $this->load->view('footer');
         }else{
          $data['username'] =    $this->input->post('username');
          $data['email']  =    $this->input->post('email');
          $data['password'] =    md5($this->input->post('password'));
          $data['alamat']  =    $this->input->post('alamat');
          $data['no_telp']  =    $this->input->post('no_telp');
          $this->modMember->daftar($data);
          $this->session->set_flashdata('sukses', 'Pendaftaran Berhasil !');
          redirect('guest#login');         
        }
      }

    }

    public function logout(){     	
      $this->session->sess_destroy();
      $this->session->unset_userdata('username');
      redirect(site_url('guest'));

    }
     /*
     public function autentikasi(){
     	if($this->session->userdata('akses')=='1'){
     		redirect('admin');
     	}else if($this->session->userdata('akses')=='3'){
     		redirect('guest');
     	}
     	else{
     		echo "Anda tidak berhak mengakses halaman ini";
     	}
     }*/
     public function login(){     	
     	if($this->session->userdata('akses')=='1'){
     		redirect('admin');
     	}else if($this->session->userdata('akses')=='3'){
     		redirect('member');
     	}
     	else{  
       $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
       $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
       $cek_admin=$this->modMember->auth_admin($username,$password);     	
       if($cek_admin->num_rows() > 0){ //jika login sebagai admin
       	$data_admin=$cek_admin->row_array();
       	$this->session->set_userdata('masuk',TRUE);               
       	$this->session->set_userdata('akses','1');
       	$this->session->set_userdata('username',$data_admin['username_admin']);
       	redirect('admin');
        }else{ //jika login sebagai member
        	$cek_member=$this->modMember->auth_member($username,$password);
        	if($cek_member->num_rows() > 0){
        		$data_member=$cek_member->row_array();
        		$this->session->set_userdata('masuk',TRUE);
        		$this->session->set_userdata('akses','3');
        		$this->session->set_userdata('username',$data_member['username']);   
            $this->session->set_userdata('email',$data_member['email']);

            redirect('member');                
          }else{
            $this->session->set_flashdata('sukses','Member Tidak Ditemukan');        		
            redirect('guest#login');  
          }
        }
      }
    }
  }