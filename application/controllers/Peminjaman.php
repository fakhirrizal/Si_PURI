<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
        $this->load->library('cart');
        date_default_timezone_set("Asia/Jakarta");
    }
	public function index()
	{
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
		$data['data_kategori'] = $this->User_model->getAlldata('kategori');
		$data['data_peminjam'] = $this->User_model->getAlldata('anggota');
		$data['kode_peminjaman'] = $this->User_model->getKodePeminjaman();
		$this->load->view('template/header');
        $this->load->view('peminjaman/tambah_pinjam',$data);
        $this->load->view('template/footer');
        }
	}
    public function laporan()
    {
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
    	$data['peminjaman'] = $this->User_model->getDataPeminjam();
        $data['sudah'] = $this->User_model->sudah_mengembalikan();
        $this->load->view('template/header');
        $this->load->view('peminjaman/laporan',$data);
        $this->load->view('template/footer');
        }
	}
    public function detail(){
        $where['id'] = '2';
            $query = $this->User_model->getSelectedData('pengaturan',$where);
            $data['max'] = '';
            foreach ($query as $key => $value) {
                $data['max'] = $value->keterangan;
            }
        $id = $this->uri->segment(3);
        $data['data_user'] = $this->Peminjaman_model->getDataAnggota($id);
        $data['data_1'] = $this->Peminjaman_model->status1($id);
        $data['data_2'] = $this->Peminjaman_model->status2($id);
        $data['data_3'] = $this->Peminjaman_model->status3($id);
        $this->load->view('template/header');
        $this->load->view('peminjaman/detail_pinjam',$data);
        $this->load->view('template/footer');
    }
    public function detail2(){
        $where['id'] = '2';
            $query = $this->User_model->getSelectedData('pengaturan',$where);
            $data['max'] = '';
            foreach ($query as $key => $value) {
                $data['max'] = $value->keterangan;
            }
        $id = $this->uri->segment(3);
        $data['data_user'] = $this->Peminjaman_model->getDataAnggota($id);
        $data['data_1'] = $this->Peminjaman_model->status1($id);
        $data['data_2'] = $this->Peminjaman_model->status2($id);
        $data['data_3'] = $this->Peminjaman_model->status3($id);
        $this->load->view('template/header');
        $this->load->view('peminjaman/detail_pinjam2',$data);
        $this->load->view('template/footer');
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
            $res = $this->User_model->updateData("users",$data,$where); //akses model untuk menyimpan ke database
            $this->session->set_flashdata('sukses','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i> Well done! </strong>Kata sandi telah di ubah.</div>');
            redirect('Advertiser/profil');
        }
        else {
            $this->session->set_flashdata('error','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password lama tidak valid.<br /></div>' );
            redirect('Advertiser/profil');
		}
    }
    public function simpan(){
        $where['id'] = '1';
        $query = $this->User_model->getSelectedData('pengaturan',$where);
        $nilai = '';
        foreach ($query as $key => $value) {
            $nilai = $value->keterangan;
        }
        $jumlah = $this->input->post('jumlah');
        $stok = $this->input->post('stok');
        $sisa = $this->input->post('sisa');
        $total_items = $this->cart->total_items();
        $jumlah_masuk = $jumlah+$total_items;
    	if($jumlah>$stok){
    		echo "<script>alert('Tidak bisa meminjam buku lebih dari stok yang tersedia!')</script>";
			echo "<script>window.location='".base_url()."Peminjaman'</script>";
    	}
    	else{
            if($jumlah>$sisa){
                echo "<script>alert('Tidak bisa meminjam buku lebih dari stok yang tersedia!')</script>";
                echo "<script>window.location='".base_url()."Peminjaman'</script>";
            }
            else{
                if($total_items>=$nilai){
                    echo "<script>alert('Tidak bisa meminjam buku lagi!')</script>";
                    echo "<script>window.location='".base_url()."Peminjaman'</script>";
                }
                else{
                    if($jumlah_masuk>$nilai){
                        echo "<script>alert('Melebihi batas jumlah peminjaman buku!')</script>";
                        echo "<script>window.location='".base_url()."Peminjaman'</script>";
                    }
                    else{
                        $data = array(
                        'id'    => $this->input->post('buku'),
                        'price' => $this->input->post('stok'),
                        'qty'   => $this->input->post('jumlah'),
                        'name'   => $this->input->post('nama_buku'),
                    );
                    $this->cart->insert($data);
                    echo "<script>window.location='".base_url()."Peminjaman'</script>";
                    }
                }
            }
    	}
    }
    public function pinjam_buku(){
        $where['id'] = '1';
        $query = $this->User_model->getSelectedData('pengaturan',$where);
        $nilai = '';
        foreach ($query as $key => $value) {
            $nilai = $value->keterangan;
        }
        $sudah_pinjam = $this->input->post('sudah_pinjam');
        $sisa = $nilai-$sudah_pinjam;
        $total_items = $this->cart->total_items();
        if($total_items>$sisa){
            echo "<script>alert('Melebihi batas jumlah peminjaman buku!')</script>";
            echo "<script>window.location='".base_url()."Peminjaman'</script>";
        }
        else{
            $data = array(
            'id_peminjaman'=>$this->input->post('kode_peminjaman'),
            'no_anggota'=>$this->input->post('peminjam'),
            'tanggal_pinjam' => date('Y-m-d')
        );
        $this->User_model->tambahdata("peminjaman",$data);

        foreach($this->cart->contents() as $items){
            $data_detail = array(
                'id_peminjaman' => $this->input->post('kode_peminjaman'),
                'id_buku'=> $items['id'],
                'jumlah'=> $items['qty'],
                'tanggal_pinjam' => date('Y-m-d'),
                'kurang' => $items['qty']
            );
            $this->User_model->tambahdata("peminjaman_detail",$data_detail);
        }
        $data2 = array(
                        'keterangan' => 'Admin menambahkan data peminjaman buku',
                        'waktu' => date('Y-m-d h-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
        $this->cart->destroy();

        echo "<script>alert('Data berhasil disimpan!')</script>";
        echo "<script>window.location='".base_url()."Peminjaman/laporan'</script>";
        }
    }
    public function hapus(){
    	$data = array(
    		'rowid' => $this->input->post('kode'),
    		'qty' => "0",
    		);
    	$this->cart->update($data);
        echo "<script>window.location='".base_url()."Peminjaman'</script>";
    }
    public function remove(){
    	$this->cart->destroy();
    	echo "<script>window.location='".base_url()."Peminjaman'</script>";
    }
    public function kirim_email_pemberitahuan(){
		$mail = new PHPMailer();
        // $mail->SMTPDebug = 2;
        // $mail->Debugoutput = 'html';

        // set smtp
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
        $mail->Username = 'bokir.rizal@gmail.com';
        $mail->Password = 'rriizzaal';
        $mail->WordWrap = 50;
        // set email content
        $mail->setFrom('no-reply@semarangkota.go.id', 'Perpustakaan | Pemerintah Kota Semarang');
        $mail->addAddress($this->input->post('email'));
		$mail->Subject = 'Email Pemberitahuan';
		$mail->isHTML(true);
        $mail->Body = $this->input->post('editordata');

		if ($mail->send()) {
			$data2 = array(
				'keterangan' => 'Admin mengirimkan pemberitahuan perihal peminjaman buku oleh '.$this->input->post('nama').' (via email)',
				'waktu' => date('Y-m-d H-i-s')
			);
			$this->User_model->tambahdata('log_activity',$data2);
			echo "<script>alert('Sukses! email berhasil dikirim.')</script>";
			echo "<script>window.location='".base_url()."Peminjaman/detail/".$this->input->post('id_peminjaman')."'</script>";
		} else {
			echo "<script>alert('Error! email tidak dapat dikirim.')</script>";
			echo "<script>window.location='".base_url()."Peminjaman/detail/".$this->input->post('id_peminjaman')."'</script>";
		}
	}
    public function syarat(){
		$where['aplikasi'] = 'perpus';
        $data['syarat_dan_ketentuan'] = $this->User_model->getSelectedData('pengaturan',$where);
        $this->load->view('template/header');
        $this->load->view('peminjaman/syarat',$data);
        $this->load->view('template/footer');
    }
    public function kembalikan_semua(){
        $id['id_peminjaman'] = $this->uri->segment(3);
        $data['status_peminjaman'] = 3;
        $data2 = array(
            'tanggal_kembali' => date('Y-m-d'),
            'status_peminjaman' => 3,
            'kurang' => 0
        );
        $this->User_model->updateData('peminjaman_detail',$data2,$id);
        $this->User_model->updateData('peminjaman',$data,$id);
        echo "<script>alert('Terima kasih telah mengembalikan buku!')</script>";
        echo "<script>window.location='".base_url()."Peminjaman/laporan'</script>";
    }
    public function kembalikan_satu(){
        $query = "SELECT * from peminjaman_detail where id=".$this->uri->segment(3)."";
        $res = $this->User_model->manualQuery($query)->result();
        $id_peminjaman = "";
        $kurang = "";
        $jumlah = "";
        foreach ($res as $key => $value) {
            $kurang = $value->kurang;
            $jumlah = $value->jumlah;
            $id_peminjaman = $value->id_peminjaman;
        }
        if($jumlah==1){
            redirect('Peminjaman/kembalikan_semua2/'.$this->uri->segment(3));
        }
        else{
            if($kurang==1){
                $id['id'] = $this->uri->segment(3);
                $data = array(
                    'kurang' => 0
                );
                $this->User_model->updateData('peminjaman_detail',$data,$id);
                $data2 = array(
                'id_peminjaman_detail' => $this->uri->segment(3),
                'tanggal_kembali' => date('Y-m-d'),
                'jumlah' => 1
                );
                $this->User_model->tambahdata('cache_peminjaman',$data2);
                echo "<script>alert('Terima kasih telah mengembalikan buku!')</script>";
                echo "<script>window.location='".base_url()."Peminjaman/detail/".$id_peminjaman."'</script>";
            }
            else{
                $id['id'] = $this->uri->segment(3);
                $data = array(
                    'status_peminjaman' => 2,
                    'kurang' => ($kurang-1)
                );
                $this->User_model->updateData('peminjaman_detail',$data,$id);
                $data2 = array(
                'id_peminjaman_detail' => $this->uri->segment(3),
                'tanggal_kembali' => date('Y-m-d'),
                'jumlah' => 1
                );
                $this->User_model->tambahdata('cache_peminjaman',$data2);
                $id3['id_peminjaman'] = $id_peminjaman;
                $data3['status_peminjaman'] = 2;
                $this->User_model->updateData('peminjaman',$data3,$id3);
                echo "<script>alert('Terima kasih telah mengembalikan buku!')</script>";
                echo "<script>window.location='".base_url()."Peminjaman/detail/".$id_peminjaman."'</script>";
            }
        }
    }
    public function kembalikan_semua2(){
        $id['id'] = $this->uri->segment(3);
        $data = array(
            'tanggal_kembali' => date('Y-m-d'),
            'status_peminjaman' => 3,
            'kurang' => 0
        );
        $this->User_model->updateData('peminjaman_detail',$data,$id);
        $query = "SELECT id_peminjaman from peminjaman_detail where id=".$this->uri->segment(3)."";
        $res = $this->User_model->manualQuery($query)->result();
        $id_peminjaman = "";
        foreach ($res as $key => $value) {
            $id_peminjaman = $value->id_peminjaman;
        }
        $id2['id_peminjaman'] = $id_peminjaman;
        $data2['status_peminjaman'] = 2;
        $this->User_model->updateData('peminjaman',$data2,$id2);
        echo "<script>alert('Terima kasih telah mengembalikan buku!')</script>";
        echo "<script>window.location='".base_url()."Peminjaman/detail/".$id_peminjaman."'</script>";
    }
    public function tampil_ajax(){
        $where['id'] = '2';
            $query = $this->User_model->getSelectedData('pengaturan',$where);
            $data['max'] = '';
            foreach ($query as $key => $value) {
                $data['max'] = $value->keterangan;
            }
        $data['data_pengembalian'] = $this->Peminjaman_model->peminjaman_detail($this->input->post('id'));
        $data['tanggal_pinjam'] = $this->input->post('tanggal_pinjam');
        $this->load->view('peminjaman/ajax_peminjaman',$data);
    }
    public function kembalikan_semua3(){
        $id['id'] = $this->uri->segment(3);
        $data = array(
            'kurang' => 0
        );
        $this->User_model->updateData('peminjaman_detail',$data,$id);
        $query = "SELECT * from peminjaman_detail where id=".$this->uri->segment(3)."";
        $res = $this->User_model->manualQuery($query)->result();
        $sisa = "";
        foreach ($res as $key => $value) {
            $sisa = $value->kurang;
        }
        $data2 = array(
                'id_peminjaman_detail' => $this->uri->segment(3),
                'tanggal_kembali' => date('Y-m-d'),
                'jumlah' => $sisa
            );
        $this->User_model->tambahdata('cache_peminjaman',$data2);
        echo "<script>alert('Terima kasih telah mengembalikan buku!')</script>";
        echo "<script>window.location='".base_url()."Peminjaman/detail/".$id_peminjaman."'</script>";
    }
    public function ambil_data(){
        $id = $this->input->post('id');
        $modul = $this->input->post('modul');
        if($modul=='kategori'){
    	    $q = "SELECT * from buku where kategori='".$id."' order by nama_buku";
    	    $query = $this->User_model->manualQuery($q);
    	    if(count($query->result_array())>0){
    	    echo "<option value='0'>--Pilih Buku--</pilih>";
    	    foreach ($query->result() as $value) {
    	    	if(!empty($value->stok)){
    	    		echo "<option value='".$value->id_buku."'>".$value->nama_buku." (".$value->stok." buah)</option>";
    	    	}
    	    	else{
    	    		echo "";
    	    	}
    	    	}
			}
			else{
				echo "<option value='0'>--Tidah Ada Data--</pilih>";
			}
    	}
    	elseif($modul=='buku'){
    		$where['id_buku'] = $id;
    		$data['data_buku'] = $this->User_model->getSelectedData('buku',$where);
            $data['buku_sisa'] = $this->User_model->cek_buku($id);
    		$this->load->view('peminjaman/tampil',$data);
    	}
        elseif ($modul=='peminjam') {
            $where['id'] = '1';
            $query = $this->User_model->getSelectedData('pengaturan',$where);
            $data['max'] = '';
            foreach ($query as $key => $value) {
                $data['max'] = $value->keterangan;
            }
            $data['total_peminjaman'] = $this->User_model->cek_peminjaman($id);
            $this->load->view('peminjaman/status',$data);
        }
    	elseif($modul=='mati'){
    		echo '<div id="coba">Status : Mati</div>';
    	}
    	elseif($modul=='hidup'){
    		echo '<div id="coba">Status : Hidup</div>';
    	}
    	else{
    		echo "<option value='0'>--Tidah Ada Data--</pilih>";
    	}
	}
}