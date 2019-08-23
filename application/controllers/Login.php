<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$this->load->view('user/login');
	}
	public function actionlogin(){
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/login');
		} else {
			$usr = $this->input->post('email');
			$psw = $this->input->post('password');
			$u = mysql_real_escape_string($usr);
			$p = mysql_real_escape_string($psw);
			$cek = $this->User_model->cek($u, $p);
			if ($cek->num_rows() > 0) {
				// login berhasil, buat session
				foreach ($cek->result() as $qad) {
					if($qad->status=='perpus'){
						$sess_data['username'] = $qad->username;
						$sess_data['id'] = $qad->id;
						$this->session->set_userdata($sess_data);

						$data = array(
							'keterangan' => 'Admin login',
							'waktu' => date('Y-m-d H-i-s')
						);
						$this->User_model->tambahdata('log_activity',$data);
						// redirect("Admin");
						echo "<script>window.location='".base_url()."Admin'</script>";
					}
					else{
						$this->session->set_flashdata('result_login', '<br>Maaf Anda bukan admin dari aplikasi ini.');
						// redirect('Login');
						echo "<script>window.location='".site_url()."Login'</script>";
					}
				}
			} else {
				$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
				// redirect('Login');
				echo "<script>window.location='".site_url()."Login'</script>";
			}
		}
	}
}