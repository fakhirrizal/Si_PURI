<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
                //login berhasil, buat session
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
                        redirect("Admin");
                    }
                    else{
                        $this->session->set_flashdata('result_login', '<br>Maaf Anda bukan admin dari aplikasi ini.');
                        redirect('Login');
                    }
                    
                }
                
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('Login');
            }
        }
	}
}
