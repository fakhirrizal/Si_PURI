<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

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
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$where1['id'] = '4';
		$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
		if(($this->session->userdata('user_name'))!=NULL){
			$data['data_buku'] = $this->User_model->getSelectedData('buku',array('status'=>'1'));
			$this->load->view('user/search',$data);
		}else{
		$this->load->view('user/masuk',$data);}
	}
	public function admin(){
		if($this->session->userdata('role')!='perpus'){
			$this->load->view('user/login');
		}
		else{
			echo "<script>window.location='".base_url('Admin')."'</script>";
		}
	}
	public function pencarian(){
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$data['data_buku'] = $this->User_model->getSelectedData('buku',array('status'=>'1'));
			$this->load->view('user/search',$data);
		}
	}
	public function pengaturan1(){
		$where1['id'] = '1';
		$where2['id'] = '2';
		$data['batas_pinjam'] = $this->User_model->getSelectedData('pengaturan',$where1);
		$data['batas_kembali'] = $this->User_model->getSelectedData('pengaturan',$where2);
		$this->load->view('template/header');
		$this->load->view('admin/pengaturan_perpus',$data);
		$this->load->view('template/footer');
	}
	public function simpan_pengaturan1(){
		$id = $this->input->post('id');
		if($id=='1'){
			$where['id'] = $this->input->post('id');
			$data = array(
				'keterangan' => $this->input->post('nilai')
			);
			$this->User_model->updateData('pengaturan',$data,$where);
			echo "<script>alert('Data berhasil disimpan!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/pengaturan1'</script>";
		}
		else{
			$where['id'] = $this->input->post('id');
			$data = array(
				'keterangan' => $this->input->post('nilai')
			);
			$this->User_model->updateData('pengaturan',$data,$where);
			echo "<script>alert('Data berhasil disimpan!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan/pengaturan1'</script>";
		}
	}
	public function pengaturan2(){
		$this->load->view('template/header');
		$this->load->view('admin/pengaturan_background');
		$this->load->view('template/footer');
	}
	public function simpan_pengaturan2(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/images/background/'; //path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '3072'; //maksimum besar file 3M
		$config['max_width']  = '5000'; //lebar maksimum 5000 px
		$config['max_height']  = '5000'; //tinggi maksimu 5000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);

		if(isset($_FILES['foto']['name']))
		{
			if(!$this->upload->do_upload('foto'))
			{
				$a = $this->upload->display_errors();
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Aduh Error! </strong>'.$a.'<br /></div>' );
				echo "<script>window.location='".base_url('Perpustakaan/pengaturan2')."'</script>";
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
				echo "<script>window.location='".base_url()."Perpustakaan/pengaturan2'</script>";
			}
		}
	}
	public function baca()
	{
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$id_buku = array('id' => '6');
			$lain = "SELECT * from buku where kategori='B-001'";
			$data['jumlah_buku'] = $this->User_model->getAlldata('buku');
			$data['id'] = 6;
			$data['buku'] = $this->User_model->getSelectedData('buku',$id_buku);
			$data['buku_lain'] = $this->User_model->manualQuery($lain)->result();
			$this->load->view('user/read',$data);
		}
	}
	public function cari(){
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$abjad = $this->uri->segment(3);
			if($abjad==NULL){
				$x = $_GET['param1'];
				$y = $_GET['param2'];
				if($x==NULL&&$y==NULL){
					echo "<script>alert('Isikan keyword dan pilih parameter!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/pencarian'</script>";
				}
				elseif($x==NULL){
					echo "<script>alert('Harap isikan keyword!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/pencarian'</script>";
				}
				elseif($y==NULL){
					echo "<script>alert('Harap pilih parameter!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/pencarian'</script>";
				}
				else{
					if($y=='judul'){
						$data['buku'] = $this->Perpus_model->cari_judul($x);
						$this->load->view('user/result',$data);
					}
					elseif($y=='tahun'){
						$data['buku'] = $this->Perpus_model->cari_tahun($x);
						$this->load->view('user/result',$data);
					}
					elseif($y=='penerbit'){
						$data['buku'] = $this->Perpus_model->cari_penerbit($x);
						$this->load->view('user/result',$data);
					}
					else{
						$data['buku'] = $this->Perpus_model->cari_author($x);
						$this->load->view('user/result',$data);
					}
				}
			}
			else{

				$data['buku'] = $this->Perpus_model->judul_abjad($abjad);
				// $config['base_url'] = base_url().'Perpustakaan/cari/'.$abjad.'/';
				// $config['total_rows'] = count($this->Perpus_model->judul_abjad($abjad));
				// $config['per_page'] = 10;
				// $from = $this->uri->segment(4);
				// //config for bootstrap pagination class integration
				// $config['full_tag_open'] = '<ul class="pagination">';
				// $config['full_tag_close'] = '</ul>';
				// $config['first_link'] = false;
				// $config['last_link'] = false;
				// $config['first_tag_open'] = '<li>';
				// $config['first_tag_close'] = '</li>';
				// $config['prev_link'] = '&laquo';
				// $config['prev_tag_open'] = '<li class="prev">';
				// $config['prev_tag_close'] = '</li>';
				// $config['next_link'] = '&raquo';
				// $config['next_tag_open'] = '<li>';
				// $config['next_tag_close'] = '</li>';
				// $config['last_tag_open'] = '<li>';
				// $config['last_tag_close'] = '</li>';
				// $config['cur_tag_open'] = '<li class="active"><a href="#">';
				// $config['cur_tag_close'] = '</a></li>';
				// $config['num_tag_open'] = '<li>';
				// $config['num_tag_close'] = '</li>';
				// $this->pagination->initialize($config);
				// $data['buku'] = $this->Buku_model->data_buku($config['per_page'],$from,$abjad);
				$this->load->view('user/result',$data);
			}
		}
	}
	public function search(){
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$this->load->view('user/search2');
		}
	}
	public function searching(){
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$abjad = $this->uri->segment(3);
			if($abjad==NULL){
				$x = $_GET['param1'];
				$y = $_GET['param2'];
				if($x==NULL&&$y==NULL){
					echo "<script>alert('Isikan keyword dan pilih parameter!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/search'</script>";
				}
				elseif($x==NULL){
					echo "<script>alert('Harap isikan keyword!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/search'</script>";
				}
				elseif($y==NULL){
					echo "<script>alert('Harap pilih parameter!')</script>";
					echo "<script>window.location='".base_url()."Perpustakaan/search'</script>";
				}
				else{
					if($y=='judul'){
						$data['buku'] = $this->Perpus_model->cari_judul($x);
						$this->load->view('user/result2',$data);
					}
					elseif($y=='tahun'){
						$data['buku'] = $this->Perpus_model->cari_tahun($x);
						$this->load->view('user/result2',$data);
					}
					elseif($y=='penerbit'){
						$data['buku'] = $this->Perpus_model->cari_penerbit($x);
						$this->load->view('user/result2',$data);
					}
					else{
						$data['buku'] = $this->Perpus_model->cari_author($x);
						$this->load->view('user/result2',$data);
					}
				}
			}
			else{

				$data['buku'] = $this->Perpus_model->judul_abjad($abjad);
				// $config['base_url'] = base_url().'Perpustakaan/cari/'.$abjad.'/';
				// $config['total_rows'] = count($this->Perpus_model->judul_abjad($abjad));
				// $config['per_page'] = 10;
				// $from = $this->uri->segment(4);
				// //config for bootstrap pagination class integration
				// $config['full_tag_open'] = '<ul class="pagination">';
				// $config['full_tag_close'] = '</ul>';
				// $config['first_link'] = false;
				// $config['last_link'] = false;
				// $config['first_tag_open'] = '<li>';
				// $config['first_tag_close'] = '</li>';
				// $config['prev_link'] = '&laquo';
				// $config['prev_tag_open'] = '<li class="prev">';
				// $config['prev_tag_close'] = '</li>';
				// $config['next_link'] = '&raquo';
				// $config['next_tag_open'] = '<li>';
				// $config['next_tag_close'] = '</li>';
				// $config['last_tag_open'] = '<li>';
				// $config['last_tag_close'] = '</li>';
				// $config['cur_tag_open'] = '<li class="active"><a href="#">';
				// $config['cur_tag_close'] = '</a></li>';
				// $config['num_tag_open'] = '<li>';
				// $config['num_tag_close'] = '</li>';
				// $this->pagination->initialize($config);
				// $data['buku'] = $this->Buku_model->data_buku($config['per_page'],$from,$abjad);
				$this->load->view('user/result2',$data);
			}
		}
	}
	public function baca_buku(){
		if(($this->session->userdata('user_name'))==NULL){
			echo "<script>alert('Silahkan login terlebih dahulu!')</script>";
			echo "<script>window.location='".base_url()."Perpustakaan'</script>";
		}
		else{
			$data['variable'] = $this->Buku_model->getAlldataBuku($this->uri->segment(3));
			$data['data_kategori'] = $this->User_model->getAlldata('kategori');
			$data['author'] = $this->User_model->getAlldata('author');
			$data['buku_lain'] = $this->Buku_model->getBukuLain($this->uri->segment(3));
			$this->load->view('user/read',$data);
		}
	}
	public function ajukan_peminjaman($id_buku){
		$check = $this->Main_model->getSelectedData('request_peminjaman a', 'a.*', array('a.id_anggota' => $this->session->userdata('id_pengguna'),"a.id_buku" => $id_buku,'a.status'=>'0'))->result();
		if($check==NULL){
			$this->db->trans_start();
			$data_insert = array(
				'id_anggota' => $this->session->userdata('id_pengguna'),
				'id_buku' => $id_buku,
				'created_date' => date('Y-m-d H:i:s')
			);
			$this->User_model->tambahdata('request_peminjaman',$data_insert);
			$get_buku = $this->Main_model->getSelectedData('buku a', 'a.*', array("a.id_buku" => $id_buku))->row();
			$get_profil = $this->Main_model->getSelectedData('anggota a', 'a.*', array("a.id" => $this->session->userdata('id_pengguna')))->row();

			$data2 = array(
				'keterangan' => $get_profil->nama.' request meminjam buku '.$get_buku->nama_buku,
				'waktu' => date('Y-m-d H-i-s')
			);
			$this->User_model->tambahdata('log_activity',$data2);
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				echo "<script>alert('Data gagal disimpan!')</script>";
				echo "<script>window.location='".base_url()."Perpustakaan/baca_buku/".$id_buku."'</script>";
			}
			else{
				echo "<script>alert('Data berhasil disimpan!')</script>";
				echo "<script>window.location='".base_url()."Perpustakaan/baca_buku/".$id_buku."'</script>";
			}
		}else{
			echo "<script>window.location='".base_url()."Perpustakaan/baca_buku/".$id_buku."'</script>";
		}
		
	}
	public function ajax_function(){
		if($this->input->post('modul')=='modul_detail_data_request_peminjaman'){
			$id_anggota = $this->input->post('id');
			$get_data = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*,b.nama_buku', array('md5(a.id_anggota)' => $id_anggota,"a.status" => '0'),'a.created_date DESC','','','a.id_buku',array(
				'table' => 'buku b',
				'on' => 'a.id_buku=b.id_buku',
				'pos' => 'LEFT'
			))->result();
			// print_r($get_data);
			$no = 1;
			echo'
			<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
				<thead>
					<tr>
						<th style="text-align: center;" width="4%"> # </th>
						<th style="text-align: center;"> Buku </th>
						<th style="text-align: center;"> Tanggal Request </th>
						<th style="text-align: center;" width="10%"> Aksi </th>
					</tr>
				</thead>
				<tbody>';
				foreach ($get_data as $key => $value) {
					$tanggal = explode(' ',$value->created_date);
					echo'<tr class="odd gradeX">
						<td style="text-align: center;">'.$no++.'.</td>
						<td style="text-align: center;">'.$value->nama_buku.'</td>
						<td style="text-align: center;">'.$this->Main_model->convert_tanggal($tanggal[0]).' '.$tanggal[1].'</td>
						<td style="text-align: center;">
							<a class="btn btn-xs green ubahdata" data-toggle="modal" data-target="#ubahdata" id="'.md5($value->id_request_peminjaman).'">Tanggapi</a>
						</td>
					</tr>';
				}
				echo'</tbody>
			</table>
			';
		}elseif($this->input->post('modul')=='modul_tanggapan_request_peminjaman'){
			$id = $this->input->post('id');
			$check = $this->Main_model->getSelectedData('jawaban_request_peminjaman  a', 'a.*', array('md5(a.id_request_peminjaman)' => $id))->row();
			if($check==NULL){
				$get_data = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*,b.nama_buku,bb.nama', array('md5(a.id_request_peminjaman)' => $id,"a.status" => '0'),'a.created_date DESC','','','a.id_buku',array(
					array(
						'table' => 'buku b',
						'on' => 'a.id_buku=b.id_buku',
						'pos' => 'LEFT'
					),array(
						'table' => 'anggota bb',
						'on' => 'a.id_anggota=bb.id',
						'pos' => 'LEFT'
					)
				))->row();
				echo'
				<form class="form-horizontal" role="form" action="'.site_url('perpustakaan/tanggapan_request_peminjaman').'" method="post">
					<input type="hidden" name="id_jawaban_request_peminjaman" value="">
					<input type="hidden" name="id_request_peminjaman" value="'.$get_data->id_request_peminjaman.'">
					<h4>Nama Anggota</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="col-xs-10 col-sm-12" value="'.$get_data->nama.'" readonly>
					</div>
	
					<h4>Buku</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<input type="text" class="col-xs-10 col-sm-12" value="'.$get_data->nama_buku.'" readonly>
					</div>
	
					<h4>Status Ketersediaan</h5>
	
					<div class="row">
						<div class="col-xs-10 col-sm-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-warning"></i></span>
						<select class="form-control" name="ketersediaan" required>
							<option value="">--Pilih--</option>
							<option value="1">Ada</option>
							<option value="0">Tidak Ada</option>
						</select>
						</div>
						</div>
					</div>
	
					<h4>Catatan</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<textarea name="catatan" class="col-xs-10 col-sm-12"></textarea>
					</div>
	
					<div class="clearfix form-actions">
						<div class="col-md-offset-4 col-md-12">
							<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
								<i class="ace-icon fa fa-check-square-o"></i>
								Simpan
							</button>
	
							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-white btn-default btn-round" type="reset">
								<i class="ace-icon fa fa-undo"></i>
								Hapus
							</button>
						</div>
					</div>
				</form>
				';
			}else{
				$get_data = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*,b.nama_buku,bb.nama,bbb.*', array('md5(a.id_request_peminjaman)' => $id),'a.created_date DESC','','','a.id_buku',array(
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
				))->row();
				echo'
				<form class="form-horizontal" role="form" action="'.site_url('perpustakaan/tanggapan_request_peminjaman').'" method="post">
					<input type="hidden" name="id_jawaban_request_peminjaman" value="'.$get_data->id_jawaban_request_peminjaman.'">
					<input type="hidden" name="id_request_peminjaman" value="'.$get_data->id_request_peminjaman.'">
					<h4>Nama Anggota</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="col-xs-10 col-sm-12" value="'.$get_data->nama.'" readonly>
					</div>
	
					<h4>Buku</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<input type="text" class="col-xs-10 col-sm-12" value="'.$get_data->nama_buku.'" readonly>
					</div>
	
					<h4>Status Ketersediaan</h5>
	
					<div class="row">
						<div class="col-xs-10 col-sm-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-warning"></i></span>
						<select class="form-control" name="ketersediaan" required>
							<option value="">--Pilih--</option>';
							if($get_data->jawaban=='0'){
								echo'
								<option value="1">Ada</option>
								<option value="0" selected>Tidak Ada</option>
								';
							}else{
								echo'
								<option value="1" selected>Ada</option>
								<option value="0">Tidak Ada</option>
								';
							}
						echo'</select>
						</div>
						</div>
					</div>
	
					<h4>Catatan</h5>
	
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<textarea name="catatan" class="col-xs-10 col-sm-12">'.$get_data->catatan.'</textarea>
					</div>
	
					<div class="clearfix form-actions">
						<div class="col-md-offset-4 col-md-12">
							<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
								<i class="ace-icon fa fa-check-square-o"></i>
								Simpan
							</button>
	
							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-white btn-default btn-round" type="reset">
								<i class="ace-icon fa fa-undo"></i>
								Hapus
							</button>
						</div>
					</div>
				</form>
				';
			}
		}
	}
}