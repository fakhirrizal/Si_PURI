<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
        $where['status'] = 1;
		$data['data_buku'] = $this->User_model->getSelectedData('buku',$where);
		$this->load->view('template/header');
		$this->load->view('buku/daftar_buku',$data);
		$this->load->view('template/footer');	
        }
	}
	public function tambah_buku()
	{
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
		$data['data_kategori'] = $this->User_model->getAlldata('kategori');
        $data['author'] = $this->User_model->getAlldata('author');
		$this->load->view('buku/tambah_buku',$data);
        }
	}
    public function detail(){
        $data['data_buku'] = $this->Buku_model->getAlldataBuku($this->uri->segment(3));
        $this->load->view('template/header');
        $this->load->view('buku/detail_buku',$data);
        $this->load->view('template/footer');   
    }
    public function ubah(){
        $data['variable'] = $this->Buku_model->getAlldataBuku($this->uri->segment(3));
        $data['data_kategori'] = $this->User_model->getAlldata('kategori');
        $data['author'] = $this->User_model->getAlldata('author');
        $this->load->view('template/header');
        $this->load->view('buku/edit_buku',$data);
        $this->load->view('template/footer');   
    }
    public function hapus_sementara(){
        $id['id'] = $this->uri->segment(3);
        $data['status'] = '0';
        $this->User_model->updateData('buku',$data,$id);
        $data2 = array(
                        'keterangan' => 'Admin memindahkan buku ke recycle bin',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
        $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Eh! </strong>Satu buku di hapus dari daftar :(<br /></div>' );
                echo "<script>window.location='".base_url()."Buku'</script>";
    }
    public function hapus(){
        $id['id_buku'] = $this->uri->segment(3);
        $this->User_model->deleteData('file',$id);
        $this->User_model->deleteData('buku',$id);
        $data2 = array(
                        'keterangan' => 'Admin menghapus data buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Data buku telah dihapus.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku'</script>";
    }
	public function simpan_buku(){
        $kategori = $this->input->post('kategori');
		$belakang = $this->User_model->getKode($kategori);
		$id_buku = $kategori."-".$belakang;

		if(!empty($_FILES['file_cover'])){
        	$namafile = "file_".time();
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '8192'; //maksimum besar file 10M
            $config['max_width']  = '5000'; //lebar maksimum 5000 px
            $config['max_height']  = '5000'; //tinggi maksimu 5000 px
            $config['file_name'] = $namafile; //nama yang terupload nantinya
            $this->upload->initialize($config); 
              if($_FILES['file_cover']['name'])
              {
                 if(!$this->upload->do_upload('file_cover'))
                 {               
                    $a = $this->upload->display_errors();
                    //echo $a;
                    echo "<script>alert('Maaf terjadi kesalahan dalam menyimpan foto!')</script>"; 
                    echo "<script>window.location='".base_url()."Buku/tambah_buku'</script>";
                 }
                 else{          
                    $data = array(
                     'nama_file' => $this->upload->data('file_name'),
                     'id_buku' => $id_buku,
                     'keterangan' => 'gambar'
                    );    
                    $this->User_model->tambahdata("file",$data);  //akses model untuk menyimpan ke database
                    
                 }
              }
        }
        else{
            echo "";
        }

        if(!empty($_FILES['file_dokumen'])){
        	$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $konfig['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/document/'; //path folder
            $konfig['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $konfig['max_size'] = '8192'; //maksimum besar file 10M
            $konfig['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($konfig);
           


            if($_FILES['file_dokumen']['name'])
            {
                if(!$this->upload->do_upload('file_dokumen'))
                {
                    $a = $this->upload->display_errors();
                    //echo $a;
                    echo "<script>alert('Maaf terjadi kesalahan dalam menyimpan foto!')</script>"; 
                    echo "<script>window.location='".base_url()."Buku/tambah_buku'</script>";
                }
                else
                {
                    $data = array(
                    'nama_file' =>$this->upload->data('file_name'),
                    'id_buku' => $id_buku,
                    'keterangan' => 'pdf'                
                    );

                    $this->User_model->tambahdata("file",$data); //akses model untuk menyimpan ke database              
               }
            }
        }
        else{
            echo "";
    	}
        $author = $this->input->post('penulis');
        $gabung = implode(',', $author);
        $stok = $this->input->post('stok');
        if(!empty($stok)){
            $data_buku = array(
            'id_buku' => $id_buku,
            'nama_buku' => $this->input->post('nama_buku'),
            'stok' => $stok,
            'halaman' => $this->input->post('halaman'),
            'penulis' => $gabung,
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'kategori' => $kategori,
            'sinopsis' => $this->input->post('sinopsis'),
            'call_number' => $this->input->post('call_number')
            );
        }
        else{
            $data_buku = array(
            'id_buku' => $id_buku,
            'nama_buku' => $this->input->post('nama_buku'),
            'halaman' => $this->input->post('halaman'),
            'penulis' => $gabung,
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'kategori' => $kategori,
            'sinopsis' => $this->input->post('sinopsis'),
            'call_number' => $this->input->post('call_number')
            );
        }
    	
    	$res = $this->User_model->tambahdata('buku',$data_buku);
        $data2 = array(
                        'keterangan' => 'Admin menambahkan data buku baru',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                if ($res>=1) {
				echo "<script>alert('Data berhasil disimpan!')</script>";
				echo "<script>window.location='".base_url()."Buku'</script>";
				}
				else{
		        echo "<script>alert('Data gagal disimpan!')</script>";
				echo "<script>window.location='".base_url()."Buku'</script>";
				}
	}
    public function ubah_foto(){
        if(!empty($_FILES['gambar'])){
            $namafile = "file_".time();
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '8192'; //maksimum besar file 10M
            $config['max_width']  = '5000'; //lebar maksimum 5000 px
            $config['max_height']  = '5000'; //tinggi maksimu 5000 px
            $config['file_name'] = $namafile; //nama yang terupload nantinya
            $this->upload->initialize($config); 
              if($_FILES['gambar']['name'])
              {
                 if(!$this->upload->do_upload('gambar'))
                 {               
                    $a = $this->upload->display_errors();
              
                    $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>'.$a.'.<br /></div>' ); 
                    echo "<script>window.location='".base_url()."Buku/detail/".$this->input->post('id')."/'</script>";
                 }

                 else{
                    $status = $this->input->post('status');
                    $id = $this->input->post('id');
                    if($status==0){
                        $data = array(
                         'nama_file' => $this->upload->data('file_name'),
                         'id_buku' => $id,
                         'keterangan' => 'gambar'
                        );    
                        $this->User_model->tambahdata("file",$data);  //akses model untuk menyimpan ke database
                    }   
                    else{   
                        $where['id'] = $this->input->post('id_gambar');
                        $data = array(
                         'nama_file' => $this->upload->data('file_name')
                        ); 
                        $this->User_model->updateData('file',$data,$where);
                    }      
                    $data2 = array(
                        'keterangan' => 'Admin mengubah foto cover buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                    echo "<script>alert('Foto berhasil diubah!')</script>"; 
                    echo "<script>window.location='".base_url()."Buku/detail/".$id."/'</script>";
                 }
              }
        }
    }
    public function ubah_file(){
        if(!empty($_FILES['filepdf'])){
            $namafile = "file_".time();
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/document/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '8192'; //maksimum besar file 10M
            $config['file_name'] = $namafile; //nama yang terupload nantinya
            $this->upload->initialize($config); 
              if($_FILES['filepdf']['name'])
              {
                 if(!$this->upload->do_upload('filepdf'))
                 {               
                    $a = $this->upload->display_errors();
              
                    $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>'.$a.'.<br /></div>' ); 
                    echo "<script>window.location='".base_url()."Buku/ubah/".$this->input->post('id')."/'</script>";
                 }

                 else{
                    $status = $this->input->post('status');
                    $id = $this->input->post('id');
                    if($status==0){
                        $data = array(
                         'nama_file' => $this->upload->data('file_name'),
                         'id_buku' => $id,
                         'keterangan' => 'pdf'
                        );    
                        $this->User_model->tambahdata("file",$data);  //akses model untuk menyimpan ke database
                    }   
                    else{   
                        $where['id'] = $this->input->post('id_pdf');
                        $data = array(
                         'nama_file' => $this->upload->data('file_name')
                        ); 
                        $this->User_model->updateData('file',$data,$where);
                    }      
                    $data2 = array(
                        'keterangan' => 'Admin mengubah file e-book',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                    echo "<script>alert('File berhasil diubah!')</script>"; 
                    echo "<script>window.location='".base_url()."Buku/ubah/".$id."/'</script>";
                 }
              }
        }
    }
    public function tampil_ajax_edit_stok(){
        $where['id'] = $this->input->post('id');
        $data['variable'] = $this->User_model->getSelectedData('buku',$where);
        $this->load->view('buku/tampil_ajax_edit_stok',$data);
    }
    public function tambah_stok(){
        $id = $this->input->post('id');
        $where['id_buku'] = $this->input->post('id');
        $stok_lama = $this->input->post('stok_lama');
        $stok = $this->input->post('stok');
        $data['stok'] = $stok+$stok_lama;
        $res = $this->User_model->updateData('buku',$data,$where);
        $data2 = array(
                        'keterangan' => 'Admin menambahkan stok buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                echo "<script>alert('Stok berhasil ditambahkan!')</script>";
                echo "<script>window.location='".base_url()."Buku/detail/".$id."/'</script>";
    }
	public function kategori()
	{
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
		$data['data_kategori'] = $this->User_model->getAlldata('kategori');
		$this->load->view('template/header');
		$this->load->view('buku/kategori',$data);
		$this->load->view('template/footer');
        }
	}
    public function simpan_kategori(){

        $data = array(
                'kode_kategori'=>$this->input->post('kode'),
                'nama_kategori'=>$this->input->post('nama'),
            );
        $cek_kode = $this->Buku_model->cek_kode_kategori($this->input->post('kode'));
        $cek_nama = $this->Buku_model->cek_nama_kategori($this->input->post('nama'));
        if(!empty($cek_kode)){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ehem! </strong>kode kategori telah digunakan.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
        }
        else{
            if(!empty($cek_nama)){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Sorry! </strong>nama kategori telah digunakan.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
            }
            else{
                $res = $this->User_model->tambahdata("kategori",$data); //akses model untuk menyimpan ke database  
                $data2 = array(
                        'keterangan' => 'Admin menambahkan kategori buku baru',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);            
                if ($res>=1) {
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Kuy cek!! </strong>Ada kategori baru.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
                }
                else{
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Uhuk! </strong>Gagal menambahkan kategori baru.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
                }
            }
        }
    }
	public function ubah_kategori()
	{
        $where['id'] = $this->input->post('id');
        $data = array(
                'nama_kategori'=>$this->input->post('nama'),
            );
        $cek_nama = $this->Buku_model->cek_nama_kategori($this->input->post('nama'));
       
            if(!empty($cek_nama)){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Sorry! </strong>nama kategori telah digunakan.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
            }
            else{
                $this->User_model->updateData('kategori',$data,$where);         
                $data2 = array(
                        'keterangan' => 'Admin mengubah kategori buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Alhamdulillah!! </strong>Kategori telah diubah.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
                
            }
        
	}
    public function tampil_ajax_ubah_kategori(){
        $where['id'] = $this->input->post('id');
        $data['variable'] = $this->User_model->getSelectedData('kategori',$where);
        $this->load->view('buku/tampil_ajax_ubah_kategori',$data);
    }
	public function hapus_kategori()
	{
        $id['id'] = $this->uri->segment(3);
        $this->User_model->deleteData('kategori',$id);
        $data2 = array(
                        'keterangan' => 'Admin menghapus kategori buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Satu ketegori telah dihapus.<br /></div>' );
                echo "<script>window.location='".base_url()."Buku/kategori'</script>";
	}
    public function ambil_data(){
        $id = $this->input->post('id');
        $modul = $this->input->post('modul');
        if($modul=='kategori'){
            $q = "select * from buku where kategori='".$id."' and stok>0 order by nama_buku";
            $query = $this->User_model->manualQuery($q);
            if(count($query->result_array())>0){
            echo "<option value='0'>--Pilih Buku--</pilih>";
            foreach ($query->result() as $value) {
                if(!empty($value->stok)){
                    echo "<option value='".$value->id_buku."'>".$value->nama_buku."</option>";
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
            $where['id_buku'] = $this->input->post('id');
            $data['data_buku'] = $this->User_model->getSelectedData('buku',$where);
            $this->load->view('buku/tampil',$data);
        }
        else{
            echo "<option value='0'>--Tidah Ada Data--</pilih>";
        }
    }
    public function restore(){
        $id['id'] = $this->uri->segment(3);
        $data['status'] = 1;
        $this->User_model->updateData('buku',$data,$id);
        $data2 = array(
                        'keterangan' => 'Admin merestore data buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
        $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Satu buku di restore dari recycle bin.<br /></div>' );
        echo "<script>window.location='".base_url()."Buku'</script>";
    }
    public function recycle_bin(){
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
        $where['status'] = '0';
        $data['variable'] = $this->User_model->getSelectedData('buku',$where);
        $this->load->view('template/header');
        $this->load->view('buku/recycle_bin',$data);
        $this->load->view('template/footer');
        }
    }
    public function ubah_data(){
        $where['id_buku'] = $this->input->post('id_buku');
        if(!empty($this->input->post('stok'))){
            $stok_total = $this->input->post('stok')+$this->input->post('stok_baru');
            $data = array(
            'nama_buku' => $this->input->post('nama_buku'),
            'halaman' => $this->input->post('halaman'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'kategori' => $this->input->post('kategori'),
            'sinopsis' => $this->input->post('sinopsis'),
            'stok' => $stok_total
        );
        $this->User_model->updateData('buku',$data,$where);
        }
        else{
        $data = array(
            'nama_buku' => $this->input->post('nama_buku'),
            'halaman' => $this->input->post('halaman'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'kategori' => $this->input->post('kategori'),
            'sinopsis' => $this->input->post('sinopsis')
        );
        $this->User_model->updateData('buku',$data,$where);
        }
        $data2 = array(
                        'keterangan' => 'Admin mengubah data buku',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
        $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Informasi buku telah diubah.</div>' );
        echo "<script>window.location='".base_url()."Buku/detail/".$this->input->post('id_buku')."/'</script>";
    }
}