<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uu extends CI_Controller {
private $filename = "import_data"; // Kita tentukan nama filenya
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
		$data['jumlah'] = $this->User_model->getAlldata('uu');
		$config['base_url'] = base_url().'Uu/index/';
		
		$config['total_rows'] = count($this->User_model->getAlldata('uu'));
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		//config for bootstrap pagination class integration
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
		$data['uu'] = $this->Uu_model->data_uu($config['per_page'],$from);
		$where1['id'] = '6';
   		$data['foto'] = $this->User_model->getSelectedData('pengaturan',$where1);
		$this->load->view('UU/home',$data);
	}
	public function admin(){
		$this->load->view('UU/login'); 
	}
	public function download_uu(){
    $where['id'] = $this->uri->segment(3);
    $uu = $this->User_model->getSelectedData('uu',$where);
    $file = '';
    foreach ($uu as $key => $value) {
      $file = $value->nama_file;
    }
    $file_download = base_url('assets4/file/dokumen/').$file;
    $data = file_get_contents($file_download); // Read the file's contents
    force_download("File.pdf", $data);
    redirect('Uu');
  	}
  	public function baca(){
  		$where = $this->uri->segment(3);
    	$data['uu'] = $this->Uu_model->getAlldataUU($where);
        $data['dokumen_lain'] = $this->Uu_model->uu_lain($this->uri->segment(3));
    	$this->load->view('UU/baca',$data);
  	}
  	public function tentang(){
  		$this->load->view('template3/header');
		$this->load->view('UU/tentang');
		$this->load->view('template3/footer');
  	}
  	public function background(){
  		$this->load->view('template3/header');
		$this->load->view('UU/background');
		$this->load->view('template3/footer');
  	}
	public function profil(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$where['id'] = $this->session->userdata('iduser');
        $data['data_profil'] = $this->User_model->getSelectedData('users',$where);
		$this->load->view('template3/header');
		$this->load->view('UU/profil',$data);
		$this->load->view('template3/footer');
		}
	}
	public function ubah_profil(){
		$where = array('id'=>$this->session->userdata('iduser'));
        $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                        
                );
        $this->User_model->updateData('users',$data,$where);
        $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Profil Anda telah berhasil diubah.<br /></div>' );
			redirect('Uu/profil');
	}
	public function ubah_foto(){
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets4/file/foto/'; //path folder
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
                echo "<script>alert('".$a."')</script>";
                echo "<script>window.location='".base_url('Uu/profil')."'</script>";
             }
             else
             {
                $gbr = $this->upload->data();
                
                $where = array('id'=>$this->session->userdata('iduser'));
                $data = array(
                'picture_url' =>$gbr['file_name']          
                );

                $res = $this->User_model->updateData("users",$data,$where); //akses model untuk menyimpan ke database           

                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Foto telah berhasil diubah.<br /></div>' );
                echo "<script>window.location='".base_url()."Uu/profil'</script>";
                }
         }
	}
	public function ganti_sandi(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$where = array('id'=>$this->session->userdata('iduser'));
		$data['data_profil'] = $this->User_model->getSelectedData('users',$where);
		$this->load->view('template3/header',$data);
		$this->load->view('UU/ganti_sandi',$data);
		$this->load->view('template3/footer');
		}
	}
	public function ubah_sandi(){
		$cek = $this->User_model->cek_pass($this->session->userdata('iduser'),$this->input->post('password'));
		if($cek->num_rows() > 0){
			$where = array('id'=>$this->session->userdata('iduser'));
			$data = array('password'=>$this->input->post('password_new'));
			$this->User_model->updateData('users',$data,$where);
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Password telah berhasil diubah.<br /></div>' );
			redirect('Uu/ganti_sandi');
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password yang Anda masukkan tidak valid.<br /></div>' );
	   		redirect('Uu/ganti_sandi');
		}
	}
	public function ganti_email(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$where = array('id'=>$this->session->userdata('iduser'));
		$data['data_profil'] = $this->User_model->getSelectedData('users',$where);
		$this->load->view('template3/header',$data);
		$this->load->view('UU/ganti_email',$data);
		$this->load->view('template3/footer');
		}
	}
	public function ubah_email(){
		$cek = $this->User_model->cek($this->input->post('email'),$this->input->post('pass'));
		if($cek->num_rows() > 0){
			$where = array('id'=>$this->session->userdata('iduser'));
			$data = array('email'=>$this->input->post('email_new'));
			$cek2 = $this->User_model->getSelectedData('users',$data);
			if(empty($cek2)){
	   			$this->User_model->updateData('users',$data,$where);
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>Email telah berhasil diubah.<br /></div>' );
				redirect('Uu/ganti_email');
			}
			else{
				$this->session->set_flashdata('gagal','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Email yang Anda masukkan sudah digunakan.<br /></div>' );
	   			redirect('Uu/ganti_email');
			}
			
		}
		else{
			$this->session->set_flashdata('gagal','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ups! </strong>Password yang Anda masukkan tidak valid.<br /></div>' );
	   		redirect('Uu/ganti_email');
		}		
	}
	
	public function masuk(){
		$this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('UU/login');
        } else {
            $usr = $this->input->post('email');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = mysql_real_escape_string($psw);
            $cek = $this->User_model->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                	if($qad->status=='uu'){
                		$sess_data['u_name'] = $qad->username;
	                    $sess_data['iduser'] = $qad->id;
	                    //$sess_data['emailuser'] = $psw;
	                    $this->session->set_userdata($sess_data);

	                   
	                	redirect("Uu/dashboard");
                	}
                	else{
                		$this->session->set_flashdata('error','<div class="alert alert-warning"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ouch! </strong>Maaf Anda bukan admin dari aplikasi ini.<br /></div>' );
                		
                        redirect('Uu/admin');
                	}
                    
                }
                
            } else {
            	$this->session->set_flashdata('error','<div class="alert alert-warning"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username atau Password yang anda masukkan salah.<br /></div>' );
                redirect('Uu/admin');
            }
        }
	}
	public function dashboard(){
		$data['uu'] = $this->Uu_model->dataTerbanyak();
		$this->load->view('template3/header');
		$this->load->view('UU/beranda',$data);
		$this->load->view('template3/footer');
	}
	public function tambah_uu(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$data['kategori'] = $this->User_model->getAlldata('kategori_uu');
		$this->load->view('template3/header');
		$this->load->view('UU/tambah',$data);
		$this->load->view('template3/footer');
		}
	}
	public function kategori(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$data['kategori'] = $this->User_model->getAlldata('kategori_uu');
		$this->load->view('template3/header');
		$this->load->view('UU/kategori',$data);
		$this->load->view('template3/footer');
		}
	}
	public function simpan_kategori(){
		$id = $this->Uu_model->getKodeKategori();
		$data2 = array(
                        	'id_kategori' => $id,
                        	'kategori' => $this->input->post('kategori'),
                        );
                    	$this->User_model->tambahdata('kategori_uu',$data2);
                    $this->session->set_flashdata('sukses','<div class="alert alert-info"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>OK! </strong>berhasil menambahkan kategori baru.<br /></div><br>' ); 
                    echo "<script>window.location='".base_url('Uu/kategori')."'</script>";
	}
	public function hapus_kategori(){
		$id['id_kategori'] = $this->uri->segment(3);
        $this->User_model->deleteData('kategori_uu',$id);

                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hai! </strong>Ada kategori yang dihapus.<br /></div><br>' );
                echo "<script>window.location='".base_url()."Uu/kategori'</script>";
	}
	public function tampil_ajax(){
		$where['id_kategori'] = $this->input->post('id');
        $data['data_kategori'] = $this->User_model->getSelectedData('kategori_uu',$where);
        $this->load->view('UU/ajax_kategori',$data);
	}
	public function update_kategori(){
		$where['id'] = $this->input->post('id');
		$data = array(
				'kategori' => $this->input->post('kategori')
				);
				$res = $this->User_model->updateData("kategori_uu",$data,$where); //akses model untuk menyimpan ke database
		       		
	            $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>OK! </strong>Data kategori telah diubah.<br /></div>');
	            redirect('Uu/kategori');
	}
	public function simpan_data(){	
			$id_uu = $this->Uu_model->getKode();
            $namafile = "file_".time();
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets4/file/dokumen/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '8192'; //maksimum besar file 8M
            $config['file_name'] = $namafile; //nama yang terupload nantinya
            $this->upload->initialize($config); 
              if($_FILES['file']['name'])
              {
                 if(!$this->upload->do_upload('file'))
                 {               
                    $a = $this->upload->display_errors();
              
                    $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal menambahkan data. Mohon coba lagi :)<br /></div>' ); 
                    echo "<script>window.location='".base_url('Uu/tambah_uu')."</script>";
                 }

                 else{
                        
                        $data2 = array(
                        	'id_uu' => $id_uu,
                        	'id_kategori' => $this->input->post('kategori'),
                        	'judul_uu' => $this->input->post('judul'),
                        	'tahun_terbit' => $this->input->post('tahun'),
                        	'ringkasan' => $this->input->post('ringkasan'),
                        	'nama_file' => $this->upload->data('file_name'),
                        	'tanggal_input' => date('Y-m-d H:i:s')
                        );
                    	$this->User_model->tambahdata('uu',$data2);
                    $this->session->set_flashdata('sukses','<div class="alert alert-info"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ahay! </strong>berhasil menambahkan data, silahkan cek!<br /></div>' ); 
                    echo "<script>window.location='".base_url('Uu/lihat_uu')."'</script>";
                 }
              }
	}
	public function ubah_file(){	
            $namafile = "file_".time();
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets4/file/dokumen/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '8192'; //maksimum besar file 10M
            $config['file_name'] = $namafile; //nama yang terupload nantinya
            $this->upload->initialize($config); 
              if($_FILES['filepdf']['name'])
              {
                 if(!$this->upload->do_upload('filepdf'))
                 {               
                    $a = $this->upload->display_errors();
              
                    $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>gagal mengubah file. Mohon coba lagi :)<br /></div>' ); 
                    echo "<script>window.location='".base_url()."Uu/detail/".$this->input->post('id')."/'</script>";
                 }

                 else{
                    
                        $where['id_uu'] = $this->input->post('id');
                        $data = array(
                         'nama_file' => $this->upload->data('file_name')
                        ); 
                        $this->User_model->updateData('uu',$data,$where);
                    
                    $this->session->set_flashdata('sukses','<div class="alert alert-info"><button type="button" class="bootbox-close-button close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yes! </strong>berhasil mengubah file, silahkan cek!<br /></div>' ); 
                    echo "<script>window.location='".base_url()."Uu/detail/".$this->input->post('id')."/'</script>";
                 }
              }
	}
	public function lihat_uu(){
		if(($this->session->userdata('iduser'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Uu/admin'</script>";
	    }
	    else{
		$data['data_uu'] = $this->User_model->getAlldata('uu');
		//$this->load->view('template3/header');
		$this->load->view('UU/lihat_data',$data);
		//$this->load->view('template3/footer');
		}
	}
	public function hapus(){
        $id['id_uu'] = $this->uri->segment(3);
    
        $this->User_model->deleteData('uu',$id);
        // $data2 = array(
        //                 'keterangan' => 'Admin menghapus data buku',
        //                 'waktu' => date('Y-m-d H-i-s')
        //             );
        //             $this->User_model->tambahdata('log_activity',$data2);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Hmm! </strong>Data telah berhasil dihapus.<br /></div>' );
                echo "<script>window.location='".base_url()."Uu/lihat_uu'</script>";
    }
	public function detail(){
		$id = $this->uri->segment(3);
		$data['variable'] = $this->Uu_model->getAlldataUU($id);
		$this->load->view('template3/header');
		$this->load->view('UU/detail_data',$data);
		$this->load->view('template3/footer');
	}
	public function ubah(){
		$id = $this->uri->segment(3);
		$data['variable'] = $this->Uu_model->getAlldataUU($id);
		$data['kategori'] = $this->User_model->getAlldata('kategori_uu');
		$this->load->view('template3/header');
		$this->load->view('UU/ubah_data',$data);
		$this->load->view('template3/footer');
	}
	public function update_data(){
		$where['id_uu'] = $this->input->post('id_uu');
		$data_uu = array(
			'judul_uu' => $this->input->post('judul'),
			'id_kategori' => $this->input->post('id_kategori'),
            'tahun_terbit' => $this->input->post('tahun'),
            'ringkasan' => $this->input->post('ringkasan')
		);
		$this->User_model->updateData('uu',$data_uu,$where);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Data telah berhasil diubah.<br /></div>' );
		$data['variable'] = $this->Uu_model->getAlldataUU($this->input->post('id_uu'));
		$this->load->view('template3/header');
		$this->load->view('UU/detail_data',$data);
		$this->load->view('template3/footer');		
	}
	public function bantuan(){
		$this->load->view('template3/header');
		$this->load->view('UU/bantuan');
		$this->load->view('template3/footer');		
	}
	public function simpan_background(){
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets4/background/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '8192'; //maksimum besar file 3M
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
                echo "<script>window.location='".base_url('Uu/background')."'</script>";
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
                echo "<script>window.location='".base_url()."Uu/background'</script>";
                }
         }
    }
	public function cari_tahun(){

    $data['data_risalah'] = $this->Uu_model->cari_tahun($this->uri->segment(3));
  	}
  	public function pencarian(){
      $tahun = $this->uri->segment(3);
      if($tahun==NULL){
      $x = $_GET['param1'];
      $y = $_GET['param2'];
        if($x==NULL&&$y==NULL){
          echo "<script>alert('Isikan keyword dan pilih parameter!')</script>";
            echo "<script>window.location='".base_url()."Uu'</script>";
        }
        elseif($x==NULL){
          echo "<script>alert('Harap isikan keyword!')</script>";
            echo "<script>window.location='".base_url()."Uu'</script>";
        }
        elseif($y==NULL){
          echo "<script>alert('Harap pilih parameter!')</script>";
            echo "<script>window.location='".base_url()."Uu'</script>";
        }
        else{
          if($y=='judul'){
            $data['uu'] = $this->Uu_model->cari_judul($x);
            $data['jumlah'] = $this->Uu_model->cari_judul($x);
            $this->load->view('UU/result',$data); 
          }
          elseif($y=='tahun'){
            $data['uu'] = $this->Uu_model->cari_tahun($x);
            $data['jumlah'] = $this->Uu_model->cari_tahun($x);
            $this->load->view('UU/result',$data); 
          }
          elseif($y=='all'){
            $data['uu'] = $this->Uu_model->cari_all($x);
            $data['jumlah'] = $this->Uu_model->cari_all($x);
            $this->load->view('UU/result',$data); 
          }
          else{
            $data['uu'] = $this->Uu_model->cari_isi($x);
            $data['jumlah'] = $this->Uu_model->cari_isi($x);
            $this->load->view('UU/result',$data); 
          }
        }
      }
      else{
        $data['uu'] = $this->Uu_model->cari_tahun($this->uri->segment(3));
        $data['jumlah'] = $this->Uu_model->cari_tahun($this->uri->segment(3));
        $this->load->view('UU/result',$data); 
      }
    }
    public function form_import(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->Uu_model->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets4/file/import/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$this->load->view('template3/header');
		$this->load->view('UU/form_import', $data);
		$this->load->view('template3/footer');
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets4/file/import/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		$id_uu = $this->Uu_model->getKode();
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport

			if($numrow > 1){
				// Kita push (add) array data ke variabel data		
				array_push($data, [
					'id_uu'=>$id_uu, // Insert data nis dari kolom A di excel
					'judul_uu'=>$row['A'], // Insert data nama dari kolom B di excel
					'id_kategori'=>$row['B'], // Insert data jenis kelamin dari kolom C di excel
					'tahun_terbit'=>$row['C'], // Insert data alamat dari kolom D di excel
					'ringkasan'=>$row['D'],
					'nama_file'=>$row['E'],
					'tanggal_input' => date('Y-m-d H:i:s')
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
			$id_uu++;
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->Uu_model->insert_multiple($data);
		$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Sipp! </strong>Data berhasil di import, silahkan cek data <a href="'.base_url("Uu/lihat_uu").'">disini</a>.<br /></div>' );
		redirect("Uu/form_import"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
		function autocomplete()
	{
		$nama = $this->input->post('kirimNama');
		$data['hasil_semua']=$this->Uu_model->tampil_semua($nama);
		$data['hasil_limit']=$this->Uu_model->tampil_limit($nama);
		if($nama!="")
		{
			echo '<ul>';
				foreach($data['hasil_limit']->result() as $result)
				{
			 		echo '<li class="u-full-width select2" onClick="pilih(\''.$result->judul_uu.'\');">
					<i class="fa fa-list-alt"></i>
					<b><font color="white">'.$result->judul_uu.'</font></b><br><font color="white">Tahun terbit : '.$result->tahun_terbit.'</font></li>';
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
	    redirect('Uu/admin');
	}
}