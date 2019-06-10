<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

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
    public function index(){
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
        $data['data_author'] = $this->User_model->getAlldata('author');
        $this->load->view('template/header');
        $this->load->view('author/daftar_author',$data);
        $this->load->view('template/footer');
        }
    }
    public function tampil_ajax(){
        $where['id'] = $this->input->post('id');
        $data['data_author'] = $this->User_model->getSelectedData('author',$where);
        $this->load->view('author/tampil_ajax',$data);
    }
    public function tambah(){
        if(($this->session->userdata('id'))==NULL){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
        }
        else{
        $this->load->view('template/header');
        $this->load->view('author/tambah');
        $this->load->view('template/footer');
        }
    }
    public function ubah(){
        
            $where = array('id'=>$this->input->post('id'));
            $data = array(
                'nama'=>$this->input->post('nama'),
                'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
                'asal'=>$this->input->post('asal'),
                'tipe'=>$this->input->post('tipe'),
            );
            $this->User_model->updateData('author',$data,$where);
            $data2 = array(
                        'keterangan' => 'Admin mengubah data author',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
            $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ya! </strong>Data Author berhasil diubah.<br /></div>' );
            redirect('Author');
    }   
    public function hapus(){
        $id['id'] = $this->uri->segment(3);
        $this->User_model->deleteData('author',$id);
        $data2 = array(
                        'keterangan' => 'Admin menghapus data author',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Ok! </strong>Data author telah dihapus.<br /></div>' );
                echo "<script>window.location='".base_url()."Author'</script>";
    }
    public function simpan_author(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'asal' => $this->input->post('asal'),
            'tipe' => $this->input->post('tipe'),
        );
        $res = $this->User_model->tambahdata("author",$data); //akses model untuk menyimpan ke database
        $data2 = array(
                        'keterangan' => 'Admin menambah data author',
                        'waktu' => date('Y-m-d H-i-s')
                    );
                    $this->User_model->tambahdata('log_activity',$data2);
                if ($res>=1) {

                echo "<script>alert('Data berhasil disimpan')</script>";
                echo "<script>window.location='".base_url()."Author'</script>";
                }
                        
                else{
                    $this->session->set_flashdata('pesan', 'Maaf, ulangi data gagal di inputkan.');
                    redirect('Admin/tambah');
                }
    }
}