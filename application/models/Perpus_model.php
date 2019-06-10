<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perpus_model extends CI_Model{
	function __construct() {
	}
	public function cari_judul($judul){
    	$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.nama_buku LIKE '%$judul%' and a.status='1'");
    	return $q->result();
    }
    public function judul_abjad($judul){
    	$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.nama_buku LIKE '$judul%' and a.status='1'");
    	return $q->result();
    }
    public function cari_tahun($tahun){
    	$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.tahun_terbit LIKE '%$tahun%' and a.status='1'");
    	return $q->result();
    }
    public function cari_penerbit($penerbit){
    	$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.penerbit LIKE '%$penerbit%' and a.status='1'");
    	return $q->result();
    }
    public function cari_author($author){
    	$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.penulis LIKE '%$author%' and a.status='1'");
    	return $q->result();
    }
    public function peminjaman_terbanyak(){
    	$q = $this->db->query("SELECT a.*,(SELECT count(b.id) from peminjaman b where b.no_anggota=a.no_anggota) as jumlah FROM anggota a ORDER BY `jumlah`  DESC LIMIT 3");
    	return $q->result();
    }
    public function limit_stok(){
    	$q = $this->db->query("SELECT a.*,b.nama_kategori FROM buku a left join kategori b on a.kategori=b.kode_kategori WHERE a.stok<=5 ORDER BY `a`.`stok` ASC limit 5");
    	return $q->result();
    }
    function tampil_semua($nama)
    {
        $q = $this->db->query("SELECT a.* from buku a where a.nama_buku like '%$nama%'");
        return $q;
    }
    function tampil_limit($nama)
    {
        $q = $this->db->query("SELECT a.* from buku a where a.nama_buku like '%$nama%' LIMIT 8");
        return $q;
    }
}
