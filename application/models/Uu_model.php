
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uu_model extends CI_Model{
	public function getKode()
	{
		$q = $this->db->query("select RIGHT(id_uu, 8) as kd_max from uu where id_uu like 'U-%'");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}
		return "U-".$kd;
	}
	public function getKodeKategori()
	{
		$q = $this->db->query("select MAX(RIGHT(id_kategori, 4)) as kd_max from kategori_uu");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}
		else
		{
			$kd = "0001";
		}
		return "P-".$kd;
	}
	function data_uu($number,$offset){
		return $query = $this->db->get('uu',$number,$offset)->result();
	}
	public function getPDF($id){
		return $this->db->query("SELECT a.* from file_uu a where a.id_uu='$id'")->result();
	}
	public function uu_lain($id){
		return $this->db->query("SELECT * FROM `uu` where id NOT in ('$id') ORDER BY rand() LIMIT 2")->result();
	}
	public function cari_tahun($tahun){
		$q = $this->db->query("SELECT a.* from uu a where a.tahun_terbit LIKE '%$tahun%'");
		return $q->result();
	}
	public function cari_judul($key){
		$q = $this->db->query("SELECT a.* from uu a where a.judul_uu LIKE '%$key%'");
		return $q->result();
	}
	public function cari_all($key){
		$q = $this->db->query("SELECT a.* from uu a where a.judul_uu LIKE '%$key%' or a.tahun_terbit LIKE '%$key%' or a.ringkasan LIKE '%$key%'");
		return $q->result();
	}
	public function cari_isi($key){
		$q = $this->db->query("SELECT a.* from uu a where a.ringkasan LIKE '%$key%'");
		return $q->result();
	}
	public function getAlldataUU($id){
		$q = $this->db->query("SELECT a.*,b.kategori from uu a left join kategori_uu b on a.id_kategori=b.id_kategori where a.id='$id'");
		return $q->result();
	}
	public function dataTerbanyak(){
		$q = $this->db->query("SELECT a.*,(SELECT count(b.id) from uu b where b.id_kategori=a.id_kategori) as jumlah FROM kategori_uu a ORDER BY `jumlah` DESC LIMIT 5");
		return $q->result();
	}
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './assets4/file/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '8192';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('uu', $data);
	}
	function tampil_semua($nama)
	{
		$q = $this->db->query("SELECT a.* from uu a where a.judul_uu like '%$nama%'");
		return $q;
	}
	function tampil_limit($nama)
	{
		$q = $this->db->query("SELECT a.* from uu a where a.judul_uu like '%$nama%' LIMIT 8");
		return $q;
	}
}