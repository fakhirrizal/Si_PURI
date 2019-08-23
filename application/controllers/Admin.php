<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$where['status'] = '1';
			$data['limit_stok'] = $this->Perpus_model->limit_stok();
			$data['peminjaman_terbanyak'] = $this->Perpus_model->peminjaman_terbanyak();
			$data['data_buku'] = $this->User_model->getSelectedData('buku',$where);
			$data['data_anggota'] = $this->User_model->getAlldata('anggota');
			$data['data_author'] = $this->User_model->getAlldata('author');
			$data['data_peminjaman'] = $this->User_model->getAlldata('peminjaman');
			$data['data_kategori'] = $this->User_model->getAlldata('kategori');
			$this->load->view('template/header');
			$this->load->view('admin/dashboard',$data);
			$this->load->view('template/footer');
		}
	}
	public function sop()
	{
		$this->load->view('template/header');
		$this->load->view('admin/sop');
		$this->load->view('template/footer');
	}
	public function pengadaan_pengelolaan(){
		$file_download = base_url('assets/document/SOP/SOPPengadaandanPengelolaanPerpusNew.pdf');
		$data = file_get_contents($file_download); // Read the file's contents
		force_download("SOP Pengadaan dan Pengelolaan.pdf", $data);
		// redirect('Admin/sop');
		echo "<script>window.location='".base_url()."Admin/sop'</script>";
	}
	public function sop_peminjaman(){
		$file_download = base_url('assets/document/SOP/f.pdf');
		$data = file_get_contents($file_download); // Read the file's contents
		force_download("SOP Peminjaman.pdf", $data);
		// redirect('Admin/sop');
		echo "<script>window.location='".base_url()."Admin/sop'</script>";
	}
	public function panduan()
	{
		$this->load->view('template/header');
		$this->load->view('admin/panduan');
		$this->load->view('template/footer');
	}
	public function profil(){
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$where = array(
				'id' => $this->session->userdata('id')
			);
			$data['profil'] = $this->User_model->getSelectedData('users',$where);
			$this->load->view('template/header');
			$this->load->view('admin/profil',$data);
			$this->load->view('template/footer');
		}
	}
	public function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');
		if($modul=="kabupaten"){
			echo $this->User_model->kabupaten($id);
		}
	}
	public function ubah_password(){
		$a = $this->input->post('password');
		$b = $this->session->userdata('username');
		$cek = $this->User_model->cek_password($a,$b);
		$where = array(
			'username' => $this->session->userdata('username')
		);
		if(!empty($cek)){
			$data = array(
				'password' => $this->input->post('new_password')
			);
			$res = $this->User_model->updateData("users",$data,$where); // akses model untuk menyimpan ke database
			$data2 = array(
				'keterangan' => 'Admin ubah password akun',
				'waktu' => date('Y-m-d H-i-s')
			);
			$this->User_model->tambahdata('log_activity',$data2);
			$this->session->set_flashdata('sukses','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i> Well done! </strong>Kata sandi telah di ubah.</div>');
			// redirect('Admin/profil');
			echo "<script>window.location='".base_url()."Admin/profil'</script>";
		}
		else {
			$this->session->set_flashdata('error','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password lama tidak valid.<br /></div>' );
			// redirect('Admin/profil');
			echo "<script>window.location='".base_url()."Admin/profil'</script>";
		}
	}
	public function ubah_email(){
		$p = $this->input->post('email');
		$e = array(
			'username' => $this->session->userdata('username'),
			'password' => $this->input->post('_password')
		);
		$where = array(
			'username' => $this->session->userdata('username')
		);
		$cek = $this->User_model->getSelectedData('users',$e);

		if(!empty($cek)){
			$data = array(
				'email' => $this->input->post('email')
			);

			$cek2 = $this->User_model->getSelectedData('users',$data);
			if(empty($cek2)){
				$res = $this->User_model->updateData("users",$data,$where);
				$data2 = array(
					'keterangan' => 'Admin ubah email akun',
					'waktu' => date('Y-m-d H-i-s')
				);
				$this->User_model->tambahdata('log_activity',$data2);
				$this->session->set_flashdata('sukses','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i> Well done! </strong>Email Anda telah berhasil di ubah.</div>');
				// redirect('Admin/profil');
				echo "<script>window.location='".base_url()."Admin/profil'</script>";
			}
			else{
				$this->session->set_flashdata('error','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Email yang Anda masukkan telah dipakai.<br /></div>' );
				// redirect('Admin/profil');
				echo "<script>window.location='".base_url()."Admin/profil'</script>";
			}
		}
		else {
			$this->session->set_flashdata('error','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password tidak valid.<br /></div>' );
			// redirect('Admin/profil');
			echo "<script>window.location='".base_url()."Admin/profil'</script>";
		}
	}
	public function ubah_profil(){
		$where = array('id'=>$this->session->userdata('id'));
		$data = array(
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat')
		);
		$this->User_model->updateData('users',$data,$where);
		$data2 = array(
			'keterangan' => 'Admin ubah data profil',
			'waktu' => date('Y-m-d H-i-s')
		);
		$this->User_model->tambahdata('log_activity',$data2);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Profil Anda telah berhasil diubah.<br /></div>' );
		echo "<script>window.location='".base_url()."Admin/profil'</script>";
		// redirect('Admin/profil');
	}
	public function ubah_data_anggota(){
		$where = array('id'=>$this->uri->segment(3));
		$data['variable'] = $this->User_model->getSelectedData('anggota',$where);
		$this->load->view('template/header');
		$this->load->view('admin/ubah_anggota',$data);
		$this->load->view('template/footer');
	}
	public function update_anggota(){
		$where = array('id'=>$this->input->post('id'));
		$data = array(
			'nama' => $this->input->post('nama'),
			'no_anggota' => $this->input->post('no_anggota'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat')
		);
		$this->User_model->updateData('anggota',$data,$where);
		$data2 = array(
			'keterangan' => 'Admin ubah data profil '.$this->input->post('nama'),
			'waktu' => date('Y-m-d H-i-s')
		);
		$this->User_model->tambahdata('log_activity',$data2);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Profil berhasil mengubah profil anggota.<br /></div>' );
		// redirect('Admin/daftar_anggota');
		echo "<script>window.location='".base_url()."Admin/daftar_anggota'</script>";
	}
	public function ubah_foto(){
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/profil/'; // path folder
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
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Aduh Error! </strong>'.$a.'<br /></div>' );
				echo "<script>window.location='".base_url('Admin/profil')."'</script>";
			}
			else
			{
				$gbr = $this->upload->data();

				$where = array('id'=>$this->session->userdata('id'));
				$data = array(
					'picture_url' =>$gbr['file_name']
				);

				$res = $this->User_model->updateData("users",$data,$where);
				$data2 = array(
					'keterangan' => 'Admin mengubah foto profil',
					'waktu' => date('Y-m-d H-i-s')
				);
				$this->User_model->tambahdata('log_activity',$data2);
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config2['new_image'] = '/assets/hasil_resize/profil/'; // folder tempat menyimpan hasil resize
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 100; // lebar setelah resize menjadi 100 px
				$config2['height'] = 300; // lebar setelah resize menjadi 100 px
				$this->load->library('image_lib',$config2);

				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Foto telah berhasil diubah.<br /></div>' );
				echo "<script>window.location='".base_url()."Admin/profil'</script>";
			}
		}
	}
	public function tentang(){
		$this->load->view('template/header');
		$this->load->view('admin/peralihan');
		$this->load->view('template/footer');
	}
	public function anggota_baru(){
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$this->load->view('template/header');
			$this->load->view('admin/tambah_anggota');
			$this->load->view('template/footer');
		}
	}
	public function simpan_anggota(){
		$where['email'] = $this->input->post("email");
		$cek_email = $this->User_model->getSelectedData('anggota',$where);
		if(empty($cek_email)){
			$this->load->library('upload');
			$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/profil/'; // path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '3072'; // maksimum besar file 3M
			$config['max_width']  = '5000'; // lebar maksimum 5000 px
			$config['max_height']  = '5000'; // tinggi maksimu 5000 px
			$config['file_name'] = $nmfile; // nama yang terupload nantinya

			$this->upload->initialize($config);

			if($_FILES['file_foto']['name'])
			{
				if ($this->upload->do_upload('file_foto'))
				{
					$gbr = $this->upload->data();
					$data = array(
					'nama' => $this->input->post("nama"),
					'no_anggota' => $this->input->post("no_anggota"),
					'tempat_lahir' => $this->input->post("tempat_lahir"),
					'tanggal_lahir' => $this->input->post("tanggal_lahir"),
					'jenis_kelamin' => $this->input->post("jenis_kelamin"),
					'email' => $this->input->post("email"),
					'no_hp' => $this->input->post("hp"),
					'password' => $this->input->post("password"),
					'alamat' => $this->input->post("alamat"),
					'tanggal_daftar' => date('Y-m-d'),
					'file_foto' =>$gbr['file_name']
					);

					$res = $this->User_model->tambahdata("anggota",$data); // akses model untuk menyimpan ke database

					$data2 = array(
						'keterangan' => 'Admin menambahkan user baru',
						'waktu' => date('Y-m-d H-i-s')
					);
					$this->User_model->tambahdata('log_activity',$data2);
					$config2['image_library'] = 'gd2';
					$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config2['new_image'] = '/assets/hasil_resize/'; // folder tempat menyimpan hasil resize
					$config2['maintain_ratio'] = TRUE;
					$config2['width'] = 100; // lebar setelah resize menjadi 100 px
					$config2['height'] = 100; // lebar setelah resize menjadi 100 px
					$this->load->library('image_lib',$config2);

					if ($res>=1) {
						echo "<script>alert('Data berhasil disimpan')</script>";
						echo "<script>window.location='".base_url()."Admin/daftar_anggota'</script>";
					}
					else{
						$this->session->set_flashdata('gagal','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Gagal input data.<br /></div>' );
						echo "<script>window.location='".base_url()."Admin/anggota_baru'</script>";
					}
				}
			}
		}
		else{
				$this->session->set_flashdata('gagal','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Email telah digunakan.<br /></div>' );
				echo "<script>window.location='".base_url()."Admin/anggota_baru'</script>";
		}
	}
	public function daftar_anggota(){
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$data['data_anggota'] = $this->User_model->getAlldata('anggota');
			$this->load->view('template/header');
			$this->load->view('admin/semua_anggota',$data);
			$this->load->view('template/footer');
		}
	}
	public function hapus(){
		$id['id'] = $this->uri->segment(3);
		$this->User_model->deleteData('anggota',$id);
		$data2 = array(
			'keterangan' => 'Admin menghapus data anggota',
			'waktu' => date('Y-m-d H-i-s')
		);
		$this->User_model->tambahdata('log_activity',$data2);
		$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Data buku telah dihapus.<br /></div>' );
		echo "<script>window.location='".base_url()."Admin/daftar_anggota'</script>";
	}
	public function detail(){
		$id = $this->uri->segment(3);
		$where = array(
			'id' => $id
		);
		$data['detail_anggota'] = $this->User_model->getSelectedData('anggota',$where);
		$this->load->view('template/header');
		$this->load->view('admin/detail_anggota',$data);
		$this->load->view('template/footer');
	}
	public function cetak_kta(){
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$data['proses'] = $this->User_model->proses_cetak();
			$data['belum'] = $this->User_model->belum_cetak();
			$this->load->view('template/header');
			$this->load->view('admin/cetak_kta',$data);
			$this->load->view('template/footer');
		}
	}
	public function pindah_belum(){
		$id = $this->uri->segment(3);
		$where = array(
			'id' => $id
		);
		$data = array(
			'status_cetak' => 1
		);
		$this->User_model->updateData('anggota',$data,$where);
		// redirect('Admin/cetak_kta');
		echo "<script>window.location='".base_url()."Admin/cetak_kta'</script>";
	}
	public function pindah_proses(){
		$id = $this->uri->segment(3);
		$where = array(
			'id' => $id
		);
		$data = array(
			'status_cetak' => 2
		);
		$this->User_model->updateData('anggota',$data,$where);
		// redirect('Admin/cetak_kta');
		echo "<script>window.location='".base_url()."Admin/cetak_kta'</script>";
	}
	public function cetak(){
		$this->load->view('admin/cetak');
	}
	public function done(){
		$this->User_model->sudah_cetak();
		// redirect('Admin/cetak_kta');
		echo "<script>window.location='".base_url()."Admin/cetak_kta'</script>";
	}
	public function cetak_belakang(){
		$data['jumlah'] = $this->input->post("jumlah");
		$this->load->view('admin/bagian_belakang',$data);
	}
	public function download(){
		$this->load->view('admin/sudah_cetak');
	}
	public function log_activity(){
		if(($this->session->userdata('id'))==NULL){
			echo "<script>alert('Harap login terlebih dahulu')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
		}
		else{
			$data['variable'] = $this->User_model->getAlldata('log_activity');
			$this->load->view('template/header');
			$this->load->view('admin/log_activity',$data);
			$this->load->view('template/footer');
		}
	}
	public function kosongkan_log(){
		$this->User_model->kosongkan_log();
		$this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button></i>Log activity telah dikosongkan.<br /></div>' );
		echo "<script>window.location='".base_url()."Admin/log_activity'</script>";
	}
	public function logout() {
		$this->session->sess_destroy();
		// redirect('Perpustakaan/admin');
		echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
	}
}