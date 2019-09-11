<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Risalah extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		// $data['risalah'] = $this->Risalah_model->getRisalah();
		// $this->load->view('Risalah/home',$data);

		$data['jumlah'] = $this->User_model->getAlldata('risalah');
		$config['base_url'] = base_url().'Risalah/index/';
		$config['total_rows'] = count($this->User_model->getAlldata('risalah'));
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['risalah'] = $this->Risalah_model->data_risalah($config['per_page'],$from);
		$where1['id'] = '3';
		$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
		$this->load->view('Risalah/home',$data);
	}
	public function admin()
	{
		$this->load->view('Risalah/login');
	}
	public function background(){
		$data['active'] = 'background';
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/background',$data);
		$this->load->view('template2/footer');
	}
	public function simpan_background(){
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/background/'; // path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '8192'; // maksimum besar file 3M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; // nama yang terupload nantinya

		$this->upload->initialize($config);

		if(isset($_FILES['foto']['name']))
		{
			if(!$this->upload->do_upload('foto'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Aduh Error! </strong>'.$a.'<br /></div>' );
				echo "<script>window.location='".base_url('Risalah/background')."'</script>";
			}
			else
			{
				$gbr = $this->upload->data();
				$where = array('id'=>$this->input->post('id'));
				$data = array(
					'keterangan' =>$gbr['file_name']
				);

				$res = $this->User_model->updateData("pengaturan",$data,$where);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Foto telah berhasil diubah.<br /></div>' );
				echo "<script>window.location='".base_url()."Risalah/background'</script>";
			}
		}
	}
	public function masuk(){
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Risalah/login');
		} else {
			$usr = $this->input->post('email');
			$psw = $this->input->post('password');
			// $u = mysql_real_escape_string($usr);
			// $p = mysql_real_escape_string($psw);
			$cek = $this->User_model->cek($usr, $psw);
			if ($cek->num_rows() > 0) {
				// login berhasil, buat session
				foreach ($cek->result() as $qad) {
					if($qad->status=='risalah'){
						$sess_data['uname'] = $qad->username;
						$sess_data['id_user'] = $qad->id;
						$sess_data['email_user'] = $psw;
						$this->session->set_userdata($sess_data);
						// redirect("Risalah/daftar_risalah");
						echo "<script>window.location='".site_url()."Risalah/daftar_risalah'</script>";
					}
					else{
						$this->session->set_flashdata('error','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ouch! </strong>Maaf Anda bukan admin dari aplikasi ini.<br /></div>' );
						// redirect('Risalah/admin');
						echo "<script>window.location='".site_url()."Risalah/admin'</script>";
					}
				}
			} else {
				$this->session->set_flashdata('error','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username atau Password yang anda masukkan salah.<br /></div>' );
				// redirect('Risalah/admin');
				echo "<script>window.location='".site_url()."Risalah/admin'</script>";
			}
		}
	}
	public function profil(){
		if(($this->session->userdata('id_user'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Risalah/admin'</script>";
		}
		else{
			$data['active'] = '';
			$where = array('id'=>$this->session->userdata('id_user'));
			$where2 = array('email'=>$this->session->userdata('email_user'));
			$data['data_profil'] = $this->User_model->getSelectedData('users',$where);

			$this->load->view('template2/header',$data);
			$this->load->view('Risalah/profil',$data);
			$this->load->view('template2/footer');
		}
	}
	public function dashboard()
	{
		$data['active'] = 'beranda';
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/beranda');
		$this->load->view('template2/footer');
	}
	public function cari(){
		$data['data_risalah'] = $this->Risalah_model->cari_risalah($this->input->post('keyword'));
		$data['active'] = '';
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/hasil_cari',$data);
		$this->load->view('template2/footer');
	}
	public function cari_tahun(){
		$data['data_risalah'] = $this->Risalah_model->cari_tahun($this->uri->segment(3));
	}
	public function pencarian(){
		$tahun = $this->uri->segment(3);
		if($tahun==NULL){
			$x = $_GET['param1'];
			$y = $_GET['param2'];
			if($x==NULL&&$y==NULL){
				echo "<script>alert('Isikan keyword dan pilih parameter!')</script>";
				echo "<script>window.location='".base_url()."Risalah'</script>";
			}
			elseif($x==NULL){
				echo "<script>alert('Harap isikan keyword!')</script>";
				echo "<script>window.location='".base_url()."Risalah'</script>";
			}
			elseif($y==NULL){
				echo "<script>alert('Harap pilih parameter!')</script>";
				echo "<script>window.location='".base_url()."Risalah'</script>";
			}
			else{
				if($y=='judul'){
					$data['risalah'] = $this->Risalah_model->cari_judul($x);
					$data['jumlah'] = $this->Risalah_model->cari_judul($x);
					$where1['id'] = '3';
					$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
					$this->load->view('Risalah/home',$data);
				}
				else{
					$data['risalah'] = $this->Risalah_model->cari_isi($x);
					$data['jumlah'] = $this->Risalah_model->cari_isi($x);
					$where1['id'] = '3';
					$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
					$this->load->view('Risalah/home',$data);
				}
			}
		}
		else{
			$data['risalah'] = $this->Risalah_model->cari_tahun($this->uri->segment(3));
			$data['jumlah'] = $this->Risalah_model->cari_tahun($this->uri->segment(3));
			$where1['id'] = '3';
			$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
			$this->load->view('Risalah/home',$data);
		}
	}
	public function input_risalah()
	{
		if(($this->session->userdata('id_user'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Risalah/admin'</script>";
		}
		else{
			$data['active'] = 'input';
			$this->load->view('template2/header',$data);
			$this->load->view('Risalah/input_risalah');
			$this->load->view('template2/footer');
		}
	}
	public function daftar_risalah()
	{
		if(($this->session->userdata('id_user'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Risalah/admin'</script>";
		}
		else{
			$data['active'] = 'daftar';
			$data['data_risalah'] = $this->User_model->getAlldata('risalah');
			$this->load->view('template2/header',$data);
			$this->load->view('Risalah/daftar_risalah',$data);
			$this->load->view('template2/footer');
		}
	}
	public function baca(){
		$id = $this->uri->segment(3);
		$where['id_risalah'] = $id;
		$data['gambar'] = $this->Risalah_model->getGambar($id);
		$data['audio'] = $this->Risalah_model->getAudio($id);
		$data['pdf'] = $this->Risalah_model->getPDF($id);
		$data['risalah'] = $this->User_model->getSelectedData('risalah',$where);
		$this->load->view('Risalah/read_risalah',$data);
	}
	public function download_risalah(){
		$id = $this->uri->segment(3);
		$risalah = $this->Risalah_model->getPDF($id);
		$file = '';
		foreach ($risalah as $key => $value) {
			$file = $value->nama_file;
		}
		$file_download = base_url('assets2/uploads/document/').$file;
		$data = file_get_contents($file_download); // Read the file's contents
		force_download("Risalah.pdf", $data);
		// redirect('Risalah/baca/'.$id);
		echo "<script>window.location='".site_url()."Risalah/baca/".$id."'</script>";
	}
	public function detail(){
		$data['active'] = 'daftar';
		$id = $this->uri->segment(3);
		$where['id_risalah'] = $id;
		$data['gambar'] = $this->Risalah_model->getGambar($id);
		$data['audio'] = $this->Risalah_model->getAudio($id);
		$data['pdf'] = $this->Risalah_model->getPDF($id);
		$data['risalah'] = $this->User_model->getSelectedData('risalah',$where);
		$data['risalah_lain'] = $this->Risalah_model->risalah_lain($id);
		// $this->load->view('template2/header',$data);
		$this->load->view('Risalah/coba',$data);
		// $this->load->view('template2/footer');
	}
	public function ubah(){
		$data['active'] = 'daftar';
		$id['id_risalah'] = $this->uri->segment(3);
		$data['data_risalah'] = $this->User_model->getSelectedData('risalah',$id);
		$data['gambar'] = $this->Risalah_model->getGambar($this->uri->segment(3));
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/edit_risalah',$data);
		$this->load->view('template2/footer');
	}
	public function ubah_risalah(){
		$where['id_risalah'] = $this->input->post('id');
		$data = array(
			'nomor_risalah' => $this->input->post('nomor'),
			'nama_acara' => $this->input->post('nama_acara'),
			'isi_risalah' => $this->input->post('isi'),
			'tanggal_acara' => $this->input->post('tanggal'),
			'link' => $this->input->post('link'),
			'tanggal_revisi' => date('Y-m-d H:i:s'),
		);
		$this->User_model->updateData("risalah",$data,$where);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yuk cek! </strong>ada risalah yang diubah.<br /></div>' ); 
		echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id')."/'</script>";
	}
	public function tambah_foto_kegiatan(){
		$namafile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/foto_kegiatan/'; // path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '8192'; // maksimum besar file 10M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimu 5000 px
		$config['file_name'] = $namafile; // nama yang terupload nantinya
		$this->upload->initialize($config);
		if($_FILES['foto']['name'])
		{
			if(!$this->upload->do_upload('foto'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal mengubah foto kegiatan. Mohon coba lagi :)<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}

			else{
				$data = array(
					'id_risalah' => $this->input->post('id_risalah'),
					'nama_file' => $this->upload->data('file_name'),
					'keterangan' => 'foto'
				);
				$this->User_model->tambahdata('file_risalah',$data);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Okay! </strong>berhasil menambahkan foto kegiatan.<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}
		}
	}
	public function ubah_foto_kegiatan(){
		$namafile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/foto_kegiatan/'; // path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '8192'; // maksimum besar file 10M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimu 5000 px
		$config['file_name'] = $namafile; // nama yang terupload nantinya
		$this->upload->initialize($config);
		if($_FILES['foto']['name'])
		{
			if(!$this->upload->do_upload('foto'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal mengubah foto kegiatan. Mohon coba lagi :)<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}

			else{
				$where['id'] = $this->input->post('id');
				$data = array(
				'nama_file' => $this->upload->data('file_name')
				);
				$this->User_model->updateData('file_risalah',$data,$where);
				// $data2 = array(
				//     'keterangan' => 'Admin mengubah foto cover buku',
				//     'waktu' => date('Y-m-d H-i-s')
				// );
				// $this->User_model->tambahdata('log_activity',$data2);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ahay! </strong>berhasil mengubah foto kegiatan, silahkan cek!<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}
		}
	}
	public function hapus_foto_kegiatan(){
		$id_risalah = $this->uri->segment(3);
		$this->User_model->deleteData('file_risalah',array('id'=>$this->uri->segment(4)));
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Okay! </strong>Foto risalah telah dihapus.<br /></div>' );
		echo "<script>window.location='".base_url()."Risalah/detail/".$id_risalah."'</script>";
	}
	public function ubah_dokumen(){
		$namafile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/document/'; // path folder
		$config['allowed_types'] = 'pdf'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '8192'; // maksimum besar file 10M
		$config['file_name'] = $namafile; // nama yang terupload nantinya
		$this->upload->initialize($config);
		if($_FILES['dokumen']['name'])
		{
			if(!$this->upload->do_upload('dokumen'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal mengubah file dokumen. Mohon coba lagi :)<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}

			else{
				$where['id'] = $this->input->post('id');
				$data = array(
				'nama_file' => $this->upload->data('file_name')
				);
				$this->User_model->updateData('file_risalah',$data,$where);
				// $data2 = array(
				//     'keterangan' => 'Admin mengubah foto cover buku',
				//     'waktu' => date('Y-m-d H-i-s')
				// );
				// $this->User_model->tambahdata('log_activity',$data2);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ahay! </strong>berhasil mengubah file dokumen, silahkan cek!<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}
		}
	}
	public function ubah_audio(){
		$namafile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/audio/'; // path folder
		$config['allowed_types'] = 'mp3'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '8192'; // maksimum besar file 10M
		$config['file_name'] = $namafile; // nama yang terupload nantinya
		$this->upload->initialize($config);
		if($_FILES['audio']['name'])
		{
			if(!$this->upload->do_upload('audio'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal mengubah file audio. Mohon coba lagi :)<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}
			else{
				$where['id'] = $this->input->post('id');
				$data = array(
				'nama_file' => $this->upload->data('file_name')
				);
				$this->User_model->updateData('file_risalah',$data,$where);
				// $data2 = array(
				//     'keterangan' => 'Admin mengubah foto cover buku',
				//     'waktu' => date('Y-m-d H-i-s')
				// );
				// $this->User_model->tambahdata('log_activity',$data2);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ahay! </strong>berhasil mengubah file audio, silahkan cek!<br /></div>' ); 
				echo "<script>window.location='".base_url()."Risalah/detail/".$this->input->post('id_risalah')."/'</script>";
			}
		}
	}
	public function hapus(){
		$id['id_risalah'] = $this->uri->segment(3);
		$this->User_model->deleteData('file_risalah',$id);
		$this->User_model->deleteData('risalah',$id);
		// $data2 = array(
		// 	'keterangan' => 'Admin menghapus data buku',
		// 	'waktu' => date('Y-m-d H-i-s')
		// );
		// $this->User_model->tambahdata('log_activity',$data2);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Data risalah telah dihapus.<br /></div>' );
		echo "<script>window.location='".base_url()."Risalah/daftar_risalah'</script>";
	}
	public function user_guide()
	{
		$data['active'] = 'user_guide';
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/user_guide');
		$this->load->view('template2/footer');
	}
	public function tentang()
	{
		$data['active'] = 'tentang';
		$this->load->view('template2/header',$data);
		$this->load->view('Risalah/tentang');
		$this->load->view('template2/footer');
	}
	public function simpan_risalah(){
		$nomor = $this->input->post('nomor');
		$nama_acara = $this->input->post('nama_acara');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$tanggal_buat = date('Y-m-d H:i:s');
		$id_risalah = $this->Risalah_model->getKode();
		if(!empty($_FILES['audio'])){
			$namafile = "file_".time();
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/audio/'; // path folder
			$config['allowed_types'] = 'mp3'; // type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '8192'; // maksimum besar file 10M
			$config['file_name'] = $namafile; // nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['audio']['name'])
			{
				if(!$this->upload->do_upload('audio'))
				{
					$a = $this->upload->display_errors();
					// echo $a;
					echo "<script>alert('Maaf terjadi kesalahan dalam menyimpan file!')</script>";
					echo "<script>window.location='".base_url()."Risalah/input_risalah'</script>";
				}
				else{
					$data = array(
					'id_risalah' => $id_risalah,
					'nama_file' => $this->upload->data('file_name'),
					'keterangan' => 'audio'
					);
					$this->User_model->tambahdata("file_risalah",$data);  // akses model untuk menyimpan ke database
				}
			}
		}
		else{
			echo "";
		}
		if(!empty($_FILES['file'])){
			$namafile = "file_".time();
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/document/'; // path folder
			$config['allowed_types'] = 'pdf'; // type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '8192'; // maksimum besar file 10M
			$config['file_name'] = $namafile; // nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['file']['name'])
			{
				if(!$this->upload->do_upload('file'))
				{
					$a = $this->upload->display_errors();
					// echo $a;
					echo "<script>alert('Maaf terjadi kesalahan dalam menyimpan file!')</script>";
					echo "<script>window.location='".base_url()."Risalah/input_risalah'</script>";
				}
				else{
					$data = array(
					'id_risalah' => $id_risalah,
					'nama_file' => $this->upload->data('file_name'),
					'keterangan' => 'pdf'
					);
					$this->User_model->tambahdata("file_risalah",$data);  // akses model untuk menyimpan ke database
				}
			}
		}
		else{
			echo "";
		}

		$data = array(
			'id_risalah' => $id_risalah,
			'nomor_risalah' => $nomor,
			'nama_acara' => $nama_acara,
			'isi_risalah' => $isi,
			'tanggal_acara' => $tanggal,
			'link' => $_POST['link'],
			'tanggal_buat' => $tanggal_buat
		);
		$this->User_model->tambahdata("risalah",$data);

		if(!empty($_FILES['foto'])){

			$config = array(
				'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/foto_kegiatan/',
				'allowed_types' => 'jpg|jpeg|png|bmp',
				'max_size'      => 8192,
				'overwrite'     => 1,
			);

			$this->load->library('upload', $config);

			$images = array();
			$files = $_FILES['foto'];
			foreach ($files['name'] as $key => $image) {
				$_FILES['images[]']['name']= $files['name'][$key];
				$_FILES['images[]']['type']= $files['type'][$key];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['images[]']['error']= $files['error'][$key];
				$_FILES['images[]']['size']= $files['size'][$key];
				$no = 1;
				$fileName = $id_risalah.$no++;

				$images[] = $fileName;

				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('images[]')) {
					$this->upload->data();
					$data = array(
						'id_risalah' => $id_risalah,
						'nama_file' => $this->upload->data('file_name'),
						'keterangan' => 'foto'
					);
					$this->User_model->tambahdata("file_risalah",$data);  // akses model untuk menyimpan ke database
					echo "<script>alert('Data berhasil ditambahkan!')</script>";
					echo "<script>window.location='".base_url()."Risalah/daftar_risalah'</script>";
				} else {
					return false;
				}
			}

		}
		else{
			echo "";
		}
	}
	public function ubah_profil(){
		$where = array('id'=>$this->session->userdata('id_user'));
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->User_model->updateData('users',$data,$where);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Profil Anda telah berhasil diubah.<br /></div>' );
		// redirect('Risalah/profil');
		echo "<script>window.location='".site_url()."Risalah/profil'</script>";
	}
	public function ganti_sandi(){
		if(($this->session->userdata('id_user'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Risalah/admin'</script>";
		}
		else{
			$data['active'] = '';
			$where = array('id'=>$this->session->userdata('id_user'));
			$data['data_profil'] = $this->User_model->getSelectedData('users',$where);
			$this->load->view('template2/header',$data);
			$this->load->view('Risalah/ganti_sandi',$data);
			$this->load->view('template2/footer');
		}
	}
	public function ubah_sandi(){
		$cek = $this->User_model->cek_pass($this->session->userdata('id_user'),$this->input->post('password'));
		if($cek->num_rows() > 0){
			$where = array('id'=>$this->session->userdata('id_user'));
			$data = array('password'=>$this->input->post('password_new'));
			$this->User_model->updateData('users',$data,$where);
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Password telah berhasil diubah.<br /></div>' );
			// redirect('Risalah/ganti_sandi');
			echo "<script>window.location='".site_url()."Risalah/ganti_sandi'</script>";
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password yang Anda masukkan tidak valid.<br /></div>' );
			echo "<script>window.location='".site_url()."Risalah/ganti_sandi'</script>";
			// redirect('Risalah/ganti_sandi');
		}
	}
	public function ganti_email(){
		if(($this->session->userdata('id_user'))==NULL){
				echo "<script>alert('Harap login terlebih dahulu')</script>";
				echo "<script>window.location='".base_url()."Risalah/admin'</script>";
		}
		else{
			$data['active'] = '';
			$where = array('id'=>$this->session->userdata('id_user'));
			$data['data_profil'] = $this->User_model->getSelectedData('users',$where);
			$this->load->view('template2/header',$data);
			$this->load->view('Risalah/ganti_email',$data);
			$this->load->view('template2/footer');
		}
	}
	public function ubah_email(){
		$cek = $this->User_model->cek($this->input->post('email'),$this->input->post('pass'));
		if($cek->num_rows() > 0){
			$where = array('id'=>$this->session->userdata('id_user'));
			$data = array('email'=>$this->input->post('email_new'));
			$cek2 = $this->User_model->getSelectedData('users',$data);
			if(empty($cek2)){
				$this->User_model->updateData('users',$data,$where);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Email telah berhasil diubah.<br /></div>' );
				// redirect('Risalah/ganti_email');
				echo "<script>window.location='".site_url()."Risalah/ganti_email'</script>";
			}
			else{
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Email yang Anda masukkan sudah digunakan.<br /></div>' );
				// redirect('Risalah/ganti_email');
				echo "<script>window.location='".site_url()."Risalah/ganti_email'</script>";
			}
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password yang Anda masukkan tidak valid.<br /></div>' );
			// redirect('Risalah/ganti_email');
			echo "<script>window.location='".site_url()."Risalah/ganti_email'</script>";
		}
	}
	public function ubah_foto(){
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets2/uploads/foto_profil/'; // path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '3072'; // maksimum besar file 3M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; // nama yang terupload nantinya

		$this->upload->initialize($config);

		if(isset($_FILES['foto']['name']))
		{
			if(!$this->upload->do_upload('foto'))
			{
				$a = $this->upload->display_errors();
				echo "<script>alert('".$a."')</script>";
				echo "<script>window.location='".base_url('Risalah/profil')."'</script>";
			}
			else
			{
				$gbr = $this->upload->data();

				$where = array('id'=>$this->session->userdata('id_user'));
				$data = array(
					'picture_url' =>$gbr['file_name']
				);

				$res = $this->User_model->updateData("users",$data,$where); // akses model untuk menyimpan ke database

				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Foto telah berhasil diubah.<br /></div>' );
				echo "<script>window.location='".base_url()."Risalah/profil'</script>";
			}
		}
	}
	function autocomplete()
	{
		$nama = $this->input->post('kirimNama');
		$data['hasil_semua']=$this->Risalah_model->tampil_semua($nama);
		$data['hasil_limit']=$this->Risalah_model->tampil_limit($nama);
		if($nama!="")
		{
			echo '<ul>';
				foreach($data['hasil_limit']->result() as $result)
				{
					echo '<li class="u-full-width select2" onClick="pilih(\''.$result->nomor_risalah.'\');">
					<i class="fa fa-list-alt"></i>
					<b><font color="white">'.$result->nomor_risalah.'</font></b><br><font color="white">Tanggal kegiatan : '.$result->tanggal_acara.'</font></li>';
				}
				echo '<li class="list-group-item" id="total">
				<a href="#" class="thickbox">
				Terdapat <b>'.$data['hasil_semua']->num_rows().'</b> hasil pencarian dengan kata "<b>'.$nama.'</b>"</a></li>';
			echo '</ul>';
		}
		else
		{
			echo "error";
		}
	}
	public function keluar(){
		$this->session->sess_destroy();
		// redirect('Risalah/admin');
		echo "<script>window.location='".site_url()."Risalah/admin'</script>";
	}
}
?>