<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Buku_model extends CI_Model{
	public function cek_kode_kategori($id){
		return $this->db->query("SELECT * from kategori where kode_kategori='$id'")->result();
	}
	public function cek_nama_kategori($nama){
		return $this->db->query("SELECT * from kategori where nama_kategori='$nama'")->result();
	}
	public function getAlldataBuku($id){
		return $this->db->query("SELECT a.*,b.nama_kategori,(SELECT c.id from file c where c.id_buku=a.id_buku and c.keterangan='gambar') as id_gambar,(SELECT c.id from file c where c.id_buku=a.id_buku and c.keterangan='pdf') as id_pdf,(SELECT c.nama_file from file c where c.id_buku=a.id_buku and c.keterangan='gambar') as gambar,(SELECT c.nama_file from file c where c.id_buku=a.id_buku and c.keterangan='pdf') as pdf from buku a left join kategori b on a.kategori=b.kode_kategori where a.id_buku='$id'")->result();
	}
	public function getRecycleBin(){
		return $this->db->query("SELECT a.*,b.nama_file as file from buku a left join file b on a.id_buku=b.id_buku where a.status='0' and b.keterangan='gambar'")->result();
	}
	public function getBukuLain($id){
		return $this->db->query("SELECT a.*,(SELECT b.nama_file from file b WHERE b.id_buku=a.id_buku and b.keterangan='gambar') as nama_file from buku a where a.id_buku NOT in ('$id') ORDER BY rand() LIMIT 3")->result();
	}
	function data_buku($number,$offset,$judul){
		$q = $this->db->query("SELECT a.*,(SELECT b.nama_file from file b where b.id_buku=a.id_buku and b.keterangan='gambar') as gambar from buku a where a.nama_buku LIKE '$judul%' and a.status='1' limit $number,$offset");
		return $q->result();
	}
}