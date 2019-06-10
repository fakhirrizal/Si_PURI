<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Risalah_model extends CI_Model{
   
    public function getKode()
    {
        $q = $this->db->query("select MAX(RIGHT(id_risalah, 5)) as kd_max from risalah where id_risalah like 'R-%'");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "R-".$kd;
    }
    public function getGambar($id){
        return $this->db->query("SELECT a.* from file_risalah a where a.id_risalah='$id' and a.keterangan='foto'")->result();
    }
    public function getAudio($id){
        return $this->db->query("SELECT a.* from file_risalah a where a.id_risalah='$id' and a.keterangan='audio'")->result();
    }
    public function getPDF($id){
        return $this->db->query("SELECT a.* from file_risalah a where a.id_risalah='$id' and a.keterangan='pdf'")->result();
    }
    public function risalah_lain($id){
        return $this->db->query("SELECT * FROM `risalah` where id_risalah NOT in ('$id') ORDER BY rand() LIMIT 3")->result();
    }
    public function cari_risalah($key){
        return $this->db->query("SELECT * FROM `risalah` where nomor_risalah='$key' or nama_acara='$key' or isi_risalah='$key'")->result();
    }
    public function cari_tahun($tahun){
        $q = $this->db->query("SELECT a.* from risalah a where a.nomor_risalah LIKE '%$tahun%' or a.tanggal_acara LIKE '%$tahun%'");
        return $q->result();
    }
    public function cari_judul($key){
        $q = $this->db->query("SELECT a.* from risalah a where a.nama_acara LIKE '%$key%'");
        return $q->result();
    }
    public function cari_isi($key){
        $q = $this->db->query("SELECT a.* from risalah a where a.isi_risalah LIKE '%$key%'");
        return $q->result();
    }
    public function getRisalah(){
        $q = $this->db->query("SELECT * FROM `risalah` ORDER BY `risalah`.`id_risalah` DESC limit 4");
        return $q->result();
    }
    function data_risalah($number,$offset){
        return $query = $this->db->get('risalah',$number,$offset)->result();     
    }
    function tampil_semua($nama)
    {
        $q = $this->db->query("SELECT a.* from risalah a where a.nomor_risalah like '%$nama%'");
        return $q;
    }
    function tampil_limit($nama)
    {
        $q = $this->db->query("SELECT a.* from risalah a where a.nomor_risalah like '%$nama%' LIMIT 8");
        return $q;
    }
}
