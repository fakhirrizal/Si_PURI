<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Peminjaman_model extends CI_Model{
	public function getDataAnggota($id){
		$res = $this->db->query("SELECT a.*,b.id_peminjaman,b.tanggal_pinjam from peminjaman b left join anggota a on b.no_anggota = a.no_anggota where b.id_peminjaman='$id'");
		return $res->result();
	}
	public function status1($id){
		return $this->db->query("SELECT a.*,b.nama_buku from peminjaman_detail a left join buku b on a.id_buku=b.id_buku where a.status_peminjaman=1 and a.id_peminjaman='$id'")->result();
	}
	public function status2($id){
		return $this->db->query("SELECT a.*,b.nama_buku from peminjaman_detail a left join buku b on a.id_buku=b.id_buku where a.status_peminjaman=2 and a.id_peminjaman='$id'")->result();
	}
	public function peminjaman_detail($id){
		return $this->db->query("SELECT * from cache_peminjaman where id_peminjaman_detail='$id'")->result();
	}
	public function status3($id){
		return $this->db->query("SELECT a.*,b.nama_buku from peminjaman_detail a left join buku b on a.id_buku=b.id_buku where a.status_peminjaman=3 and a.id_peminjaman='$id'")->result();
	}
}