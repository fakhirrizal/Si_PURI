<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$this->load->view('halaman_awal');
	}
	public function notifikasi(){
		$data['peminjaman'] = $this->Main_model->getSelectedData('request_peminjaman a', 'a.*,b.nama_buku,bb.nama,bbb.jawaban,bbb.catatan', array('a.id_anggota'=>$this->session->userdata('id_pengguna')),'a.status ASC,a.created_date DESC','','','',array(
			array(
				'table' => 'buku b',
				'on' => 'a.id_buku=b.id_buku',
				'pos' => 'LEFT'
			),array(
				'table' => 'anggota bb',
				'on' => 'a.id_anggota=bb.id',
				'pos' => 'LEFT'
			),array(
				'table' => 'jawaban_request_peminjaman bbb',
				'on' => 'a.id_request_peminjaman=bbb.id_request_peminjaman',
				'pos' => 'LEFT'
			)
		))->result();
		$this->load->view('user/notifikasi',$data);
	}
	public function cek_email(){
		$where['email'] = $this->input->post('email');
		$cek = $this->User_model->getSelectedData('anggota',$where);
		if(empty($cek)){
			echo '<br><div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Email ini belum terdaftar.<br /></div>';
		}
		else{
			echo '<br><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Email telah digunakan.<br /></div>';
		}
	}
	public function baca()
	{
		$id_buku = array('id' => '6');
		$lain = "SELECT * from buku where kategori='B-001'";
		$data['jumlah_buku'] = $this->User_model->getAlldata('buku');
		$data['id'] = 6;
		$data['buku'] = $this->User_model->getSelectedData('buku',$id_buku);
		$data['buku_lain'] = $this->User_model->manualQuery($lain)->result();
		$this->load->view('user/read',$data);
	}
	public function masuk(){
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/masuk');
		} else {
			$usr = $this->input->post('email');
			$psw = $this->input->post('password');
			$cek = $this->User_model->cek_login($usr, $psw);
			if ($cek->num_rows() > 0) {
				// login berhasil, buat session
				foreach ($cek->result() as $qad) {
					$sess_data['user_name'] = $qad->nama;
					$sess_data['id_pengguna'] = $qad->id;
					$sess_data['mail_pengguna'] = $qad->email;
					$this->session->set_userdata($sess_data);

					$data = array(
						'keterangan' => $qad->nama.' login',
						'waktu' => date('Y-m-d H-i-s')
					);
					$this->User_model->tambahdata('log_activity',$data);
					// redirect("Perpustakaan/pencarian");
					echo "<script>window.location='".base_url()."Perpustakaan/pencarian'</script>";
				}
			} else {
				$this->session->set_flashdata('sukses','<div class="alert alert-warning" style="text-align: justify;"><i class="ace-icon fa fa-times"></i><strong></i>Oops! </strong>Username atau Password yang anda masukkan salah<br /></div>' );
				echo "<script>window.location='".base_url()."Perpustakaan'</script>";
			}
		}
	}
	public function daftar(){
		$where1['id'] = '5';
		$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
		$this->load->view('user/signup',$data);
	}
	public function guest(){
		$where1['id'] = '5';
		$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
		$this->load->view('user/guest',$data);
	}
	public function signup(){
		$where = array(
			'email' => $this->input->post('email')
		);
		$cek = $this->User_model->getSelectedData('anggota',$where);
		if(!empty($cek)){
			$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Hai!</div><p>Email sudah terdaftar.</p></div>');
			echo "<script>window.location='".base_url()."Pengguna/daftar/'</script>";
		}
		else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$res = $this->User_model->tambahdata("anggota",$data); //akses model untuk menyimpan ke database
			if ($res>=1) {
				$cek2 = $this->User_model->getSelectedData('anggota',$where);
				foreach ($cek2 as $key => $value) {
					$sess_data['user_name'] = $value->nama;
					$sess_data['id_pengguna'] = $value->id;
					$sess_data['mail_pengguna'] = $value->email;
					$this->session->set_userdata($sess_data);
					$this->load->view('user/search');
				}
			}
			else{
				$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Hai!</div><p>Gagal input, silahkan coba lagi.</p></div>');
				echo "<script>window.location='".base_url()."Pengguna/daftar/'</script>";
			}
		}
	}
	public function signup2(){
			$kd_tamu = $this->User_model->getKodeTamu();
			$where['kd_tamu'] = $kd_tamu;
			$data = array(
				'kd_tamu' => $kd_tamu,
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'waktu' => date('Y-m-d H-i-s')
			);
			$res = $this->User_model->tambahdata("tamu",$data); //akses model untuk menyimpan ke database
			if ($res>=1) {
				$cek2 = $this->User_model->getSelectedData('tamu',$where);
				foreach ($cek2 as $key => $value) {
					$sess_data['user_name'] = $value->nama;
					$sess_data['id_pengguna'] = $value->id;
					$sess_data['mail_pengguna'] = $value->email;
					$this->session->set_userdata($sess_data);
					$data['data_buku'] = $this->User_model->getSelectedData('buku',array('status'=>'1'));
					$this->load->view('user/halaman_depan',$data);
				}
			}
			else{
				$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Hai!</div><p>Gagal input, silahkan coba lagi.</p></div>');
				echo "<script>window.location='".base_url()."Pengguna/guest/'</script>";
			}
	}
	// public function pencarian(){
	// 	$this->load->view('user/search2');
	// }
	public function ubah_foto(){
		$id = $this->input->post('id');
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
				echo "<script>window.location='".base_url()."Admin/detail/".$id."/'</script>";
			}
			else
			{
				$gbr = $this->upload->data();
				$where = array('id'=>$id);
				$data = array(
					'file_foto' =>$gbr['file_name']
				);

				$res = $this->User_model->updateData("anggota",$data,$where);
				$data2 = array(
					'keterangan' => 'Admin mengubah foto profil '.$this->input->post('nama'),
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
				echo "<script>window.location='".base_url()."Admin/detail/".$id."/'</script>";
			}
		}
	}
	public function ubah_foto_pengguna(){
		$id = $this->input->post('id');
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/profil/'; // path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '7072'; // maksimum besar file 3M
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
				echo "<script>window.location='".base_url()."Pengguna/profil'</script>";
			}
			else
			{
				$gbr = $this->upload->data();
				$where = array('id'=>$id);
				$data = array(
					'file_foto' =>$gbr['file_name']
				);

				$res = $this->User_model->updateData("anggota",$data,$where);
				$data2 = array(
					'keterangan' => $this->input->post('nama').' mengubah foto profilnya',
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
				echo "<script>alert('Foto telah berhasil diubah.')</script>";
				echo "<script>window.location='".base_url()."Pengguna/profil'</script>";
			}
		}
	}
	public function profil(){
		$this->load->view('user/profil');
	}
	public function ubah_profil(){
		$where = array('id'=>$this->input->post('id'));
		$data = array(
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat')
		);
		$this->User_model->updateData('anggota',$data,$where);
		$data2 = array(
			'keterangan' => $this->input->post('nama').' mengubah data profilnya',
			'waktu' => date('Y-m-d H-i-s')
		);
		$this->User_model->tambahdata('log_activity',$data2);
		echo "<script>alert('Profil Anda telah berhasil diubah.')</script>";
		echo "<script>window.location='".base_url()."Pengguna/profil'</script>";
	}
	public function email(){
		$this->load->view('user/email');
	}
	public function ubah_password(){
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$password_konfirmasi = $this->input->post('password_konfirmasi');
		$b = $this->session->userdata('id_pengguna');
		$cek = $this->User_model->cek_password_p($password_lama,$b);
		$where = array(
			'id' => $this->session->userdata('id_pengguna')
		);
		if(!empty($cek)){
			if($password_baru==$password_konfirmasi){
				$data = array(
					'password' => $password_baru
				);
				$res = $this->User_model->updateData("anggota",$data,$where); //akses model untuk menyimpan ke database
				$data2 = array(
					'keterangan' => $this->input->post('nama').' mengubah passwordnya',
					'waktu' => date('Y-m-d H-i-s')
				);
				$this->User_model->tambahdata('log_activity',$data2);
				$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">OK!</div><p>Password berhasil diubah.</p></div>');
				// redirect('Pengguna/password');
				echo "<script>window.location='".base_url()."Pengguna/password'</script>";
			}
			else{
				$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Eh!</div><p>Password baru dengan password konfirmasi tidak cocok.</p></div>');
				// redirect('Pengguna/password');
				echo "<script>window.location='".base_url()."Pengguna/password'</script>";
			}
		}
		else {
			$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Duh!</div><p>Password lama tidak valid.</p></div>');
			// redirect('Pengguna/password');
			echo "<script>window.location='".base_url()."Pengguna/password'</script>";
		}
	}
	public function ganti_email(){
		$e = array(
			'id' => $this->session->userdata('id_pengguna'),
			'password' => $this->input->post('password')
		);
		$where = array(
			'id' => $this->session->userdata('id_pengguna')
		);
		$cek = $this->User_model->getSelectedData('anggota',$e);

		if(!empty($cek)){
			$data = array(
				'email' => $this->input->post('email')
			);
			$cek2 = $this->User_model->getSelectedData('anggota',$data);
			if(empty($cek2)){
				$res = $this->User_model->updateData("anggota",$data,$where);
				$data2 = array(
					'keterangan' => $this->input->post('nama').' mengubah emailnya',
					'waktu' => date('Y-m-d H-i-s')
				);
				$this->User_model->tambahdata('log_activity',$data2);

				$this->load->view('user/search');
				// redirect('Pengguna/email');
				echo "<script>window.location='".base_url()."Pengguna/email'</script>";
			}
			else{
				$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Hmm!</div><p>Email yang Anda masukkan sudah terpakai.</p></div>' );
				// redirect('Pengguna/email');
				echo "<script>window.location='".base_url()."Pengguna/email'</script>";
			}
		}
		else {
			$this->session->set_flashdata('gagal','<div class="ui success message"><div class="header">Ouch!</div><p>Password tidak valid.</p></div>' );
			// redirect('Pengguna/email');
			echo "<script>window.location='".base_url()."Pengguna/email'</script>";
		}
	}
	public function password(){
		$this->load->view('user/password');
	}
	public function tentang(){
		$this->load->view('user/tentang');
	}
	function autocomplete()
	{
		$nama = $this->input->post('kirimNama');
		$data['hasil_semua']=$this->Perpus_model->tampil_semua($nama);
		$data['hasil_limit']=$this->Perpus_model->tampil_limit($nama);
		if($nama!="")
		{
			echo '<ul>';
				foreach($data['hasil_limit']->result() as $result)
				{
					echo '<li class="u-full-width select2" onClick="pilih(\''.$result->nama_buku.'\');">
					<i class="fa fa-list-alt"></i>
					<b><font color="white">'.$result->nama_buku.'</font></b><br><font color="white">Penerbit : '.$result->penerbit.'</font></li>';
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
	public function logout() {
		$this->session->sess_destroy();
		// redirect('Perpustakaan');
		echo "<script>window.location='".base_url()."Perpustakaan'</script>";
	}
}