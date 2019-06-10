

<?php 
date_default_timezone_set('Asia/Jakarta'); 
$list=$this->db->query("SELECT * from anggota where status_cetak=3")->result();
?>
<div class='entry'>
<table border='1' align='left' width='70%'>
<tr>
<td colspan='5'><b>Data KTA Yang Sudah Di Cetak </b> <br> Update : <font color='red'><?php echo date('d-m-Y')?> | <?php echo date('H:i')?> WIB</font></td>
</tr>
<tr>
<td bgcolor='gren' width='10px'>No</td>
<td bgcolor='gren'>Nama</td>
<td bgcolor='gren' width='260px'>Nomor Anggota</td>
<td bgcolor='gren'>Tempat Lahir</td>
<td bgcolor='gren'>Tanggal Lahir</td>
<td bgcolor='gren'>Email</td>
<td bgcolor='gren'>Alamat</td>

</tr>
<?php

$n=1;
foreach ($list as $dolay)
{
if($dolay->status_cetak=='1')
{
$cek="<img src='".base_url()."assets/images/Belum.gif' class='img' >";
}else
{
$cek="<img src='".base_url()."assets/images/sudah.png' class='img'>";
}
echo"
<tr>
<td>$n</td>
<td>$dolay->nama</td>
<td width='200px'>$dolay->no_anggota</td>
<td>$dolay->tempat_lahir</td>
<td>".date('d-m-Y', strtotime($dolay->tanggal_lahir))."</td>
<td>$dolay->email</td>
<td>$dolay->alamat</td>

</td>
</tr>
";
$n++;}

?>
<?php

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-KTA-Sudah-Cetak.xls");
 
// Tambahkan table
//include "../pilihan_menu/tamu.php";

?>
</table>

</div>
