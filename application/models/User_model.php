<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function manualQuery($q)
            {
                return $this->db->query($q);
            }	
	function cek($email, $password) {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        return $this->db->get("users");
    }
    function cek_login($email, $password) {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        return $this->db->get("anggota");
    }
    function cek_pass($id, $password) {
        $this->db->where("id", $id);
        $this->db->where("password", $password);
        return $this->db->get("users");
    }
    function count($tabel){
        return $this->db->count_all_results($tabel);
    }
    public function getKodeTamu()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_tamu, 4)) as kd_max from tamu");
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
        return "T-".$kd;
    }
    public function getKode($kode)
    {
        $q = $this->db->query("select MAX(RIGHT(id_buku, 3)) as kd_max from buku where id_buku like '$kode%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
    public function getKodePeminjaman()
    {
        $q = $this->db->query("select MAX(RIGHT(id_peminjaman, 6)) as kd_max from peminjaman");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }
        else
        {
            $kd = "000001";
        }
        return "Pjm-".$kd;
    }
    function tambahdata($tabel,$data){
          $res = $this->db->insert($tabel,$data);
          return $res;
        }
    function getDataPeminjam(){
        $q = $this->db->query("SELECT *,(select count(c.id) from peminjaman_detail c where c.id_peminjaman=a.id_peminjaman) as jumlah_buku, (select sum(c.jumlah) from peminjaman_detail c where c.id_peminjaman=a.id_peminjaman) as jumlah_total from peminjaman a left join anggota b on a.no_anggota=b.no_anggota where a.status_peminjaman not in ('3') ORDER BY `a`.`id_peminjaman` ASC");
        return $q->result();
    }
    function sudah_mengembalikan(){
        $q = $this->db->query("SELECT *,(select count(c.id) from peminjaman_detail c where c.id_peminjaman=a.id_peminjaman) as jumlah_buku, (select sum(c.jumlah) from peminjaman_detail c where c.id_peminjaman=a.id_peminjaman) as jumlah_total from peminjaman a left join anggota b on a.no_anggota=b.no_anggota where a.status_peminjaman in ('3') ORDER BY `a`.`id_peminjaman` ASC");
        return $q->result();
    }
    function cek_peminjaman($id){
        $q = $this->db->query("SELECT a.no_anggota,a.nama,(SELECT sum(b.jumlah) from peminjaman_detail b right join peminjaman c on b.id_peminjaman=c.id_peminjaman where c.no_anggota=a.no_anggota and b.status_peminjaman=1) as total from anggota a where a.no_anggota='$id'");
        return $q->result();
    }
    function cek_buku($id){
        $q = $this->db->query("SELECT sum(jumlah) as sisa from peminjaman_detail where id_buku='$id' and status_peminjaman=1");
        return $q->result();
    }
    public function getSelectedData($table,$data)
        {
            return $this->db->get_where($table, $data)->result();
        }
    function kabupaten($provId){

	$kabupaten="<option value='0'>--Select--</pilih>";

	$this->db->order_by('nm_kabupaten','ASC');
	$kab= $this->db->get_where('kabupaten',array('id_provinsi'=>$provId));

	foreach ($kab->result_array() as $data ){
	$kabupaten.= "<option value='".$data['id_kabupaten']."'>".$data['nm_kabupaten']."</option>";
	}

	return $kabupaten;

	}
	function getAlldata($table){ 
            return $this->db->get($table)->result();
        }//query buat nampilin semua data dari sebuah tabel
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function cek_password($password,$username){
    	$q = $this->db->query("SELECT * from users where password='$password' and username='$username'");
    	return $q->result();
    }
    function cek_password_p($password,$id){
        $q = $this->db->query("SELECT * from anggota where password='$password' and id='$id'");
        return $q->result();
    }
    function belum_cetak(){
        $q = $this->db->query("SELECT * from anggota where status_cetak=1");
        return $q->result();
    }
    function proses_cetak(){
        $q = $this->db->query("SELECT * from anggota where status_cetak=2");
        return $q->result();
    }
    function sudah_cetak()
    {
        $data=array(
        'status_cetak'=>'3',
        );
        $this->db->where("status_cetak","2");
        $this->db->update("anggota",$data);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    function kosongkan_log(){
        $q = $this->db->query("TRUNCATE TABLE log_activity");
        return $q;
    }
}
