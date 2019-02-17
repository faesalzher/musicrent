<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('modBarang');
		$this->load->model('modPenyewaan');
		$this->load->helper(array('form', 'url'));	
		$this->load->library('form_validation');	
		
	}
	public function index()
	{
		if($this->session->userdata('username') == '') {
			redirect ('guest'); 
		}else{	
			if($this->session->userdata('akses')=='1'){
				$messages = $this->modBarang->getAllBarang();
				$data['barang'] = $messages;		
				$this->load->view('header', $data);
				$this->load->view('v_HalamanUtamaAdmin', $data);
				$this->load->view('footer', $data);
			}else if($this->session->userdata('akses')=='3'){
				redirect('member');
			}		
			
		}			
	}
	public function halaman_tambah_barang()
	{
		if($this->session->userdata('username') == '') {
			redirect ('guest'); 
		}else{	
			if($this->session->userdata('akses')=='1'){
				$data['barang'] = "";
				$this->load->view('header');
				$this->load->view('v_FormTambahBarang');
				$this->load->view('footer');
			}else if($this->session->userdata('akses')=='3'){
				redirect('member');
			}		
			
		}
	}

	public function tambah_barang(){	

		if($this->session->userdata('username') == '') {
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){
			$config['upload_path'] = './assets/gambar_barang';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 3000;
			$config['max_width']  = 9000;
			$config['max_height']  = 9000;			
			$this->load->helper('file');             
			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			$this->upload->do_upload('gambar');
			
			$judul = $this->input->post('judul');
			$jenis = $this->input->post('jenis');
			$harga_sewa = $this->input->post('harga_sewa');
			$deskripsi = $this->input->post('deskripsi');
			$pict = array('upload_data'=>$this->upload->data());
			$gambar = $pict['upload_data']['file_name'];
			$data = array(
				'judul' =>  $judul,
				'jenis' =>  $jenis,
				'harga_sewa' => $harga_sewa,
				'deskripsi' => $deskripsi,
				'gambar' => $gambar
			);			
			$this->modBarang->SetNewBarang($data);		
			$this->session->set_flashdata('sukses','barang berhasil ditambahkan !');
			redirect("admin/halaman_tambah_barang");
			
		}else if($this->session->userdata('akses')=='3'){
			redirect('member');
		}

	}
	public function halaman_update_barang()
	{
		if($this->session->userdata('username') == '') {
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){
			$data['entry'] =  $this->modBarang->get_entry($this->uri->segment(3, 0));
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				$this->session->set_flashdata('sukses','barang berhasil diupdate');				
				redirect('admin');
			}
			else
			{
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$this->load->view('v_FormUpdateBarang', $data);
				$this->load->view('footer');
			}
		}else if($this->session->userdata('akses')=='3'){
			redirect('member');
		}
	}

	public function update(){
		if($this->session->userdata('username') == '') {			
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){
			$config['upload_path'] = './assets/gambar_barang';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 3000;
			$config['max_width']  = 9000;
			$config['max_height']  = 9000;			
			$this->load->helper('file');             
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('gambar'))
			{
				//$this->session->set_flashdata('upload','Upload gambar terlebih dahulu')
				redirect('admin/halaman_update_barang');
			}
			else
			{
				$id_barang = $this->input->post('id_barang');
				$judul = $this->input->post('judul');
				$jenis = $this->input->post('jenis');
				$harga_sewa = $this->input->post('harga_sewa');
				$deskripsi = $this->input->post('deskripsi');
				$pict = array('upload_data'=>$this->upload->data());
				$gambar = $pict['upload_data']['file_name'];
				$data = array(
					'id_barang' => $id_barang,
					'judul' =>  $judul,
					'jenis' =>  $jenis,
					'harga_sewa' => $harga_sewa,
					'deskripsi' => $deskripsi,
					'gambar' => $gambar
				);			
				$this->modBarang->update_entry($data);
				$this->session->set_flashdata('sukses','barang berhasil diupdate !');
				redirect("admin/halaman_update_barang");
			}
		}else if($this->session->userdata('akses')=='3'){
			redirect('member');
		}	
	}

	public function delete_barang(){
		if($this->session->userdata('username') == '') {//jika belum login
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){//jika sudah login admin
			if($this->uri->segment(3, 0) != ""){
				$this->modBarang->delete_barang($this->uri->segment(3, 0));	
				$this->session->set_flashdata('sukses','barang berhasil dihapus !');					
			}
			redirect('admin');
		}else if($this->session->userdata('akses')=='3'){//jia sudah login member
			redirect('member');//diarahkan ke halaman guest
		}
	}


	public function delete_penyewaan(){
		if($this->session->userdata('username') == '') {//jika belum login
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){//jika sudah login admin
			if($this->uri->segment(3, 0) != ""){
				$this->modPenyewaan->delete_penyewaan($this->uri->segment(3, 0));
				$this->session->set_flashdata('sukses','penyewaan berhasil dihapus !');					
			}
			redirect('admin/halaman_permintaan');
		}else if($this->session->userdata('akses')=='3'){//jia sudah login member
			redirect('member');//diarahkan ke halaman guest
		}
	}

	public function halaman_permintaan(){
		if($this->session->userdata('username') == '') {//jika belum login
			redirect('guest');
		}else if($this->session->userdata('akses')=='1'){
			$tanggal = $this->input->get('tanggal');
			$messages = $this->modPenyewaan->getKalender($tanggal);
			$isExist = $this->modPenyewaan->getKalenderIndeks($tanggal);		
  					if($isExist->num_rows() > 0){ //jika login sebagai member  						
  						$data['penyewaan'] = $messages;
  						$this->load->view('header', $data);
  						$this->load->view('v_HalamanPermintaan', $data);
  						$this->load->view('footer', $data);	  	
  					}else {
  						$messages = $this->modPenyewaan->getPenyewaan();
  						$data['penyewaan'] = $messages;
  						$this->load->view('header', $data);
  						$this->load->view('v_HalamanPermintaan', $data);
  						$this->load->view('footer', $data);	
  					}		
  				}else if($this->session->userdata('akses')=='3'){
  					redirect('member');
  				}


  			}

  		}


