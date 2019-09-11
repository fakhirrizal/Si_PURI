<style type='text/css' media='print'>#printbutton {display : none}</style>
<style>
	body{
		background-color:white;
	}
</style>
<style>
	@font-face{
		font-family:'barcode';
		src: url('<?= base_url('assets/fonts/BarcodeFont.ttf'); ?>') format('truetype');
	}

</style>
<style>
	body{
		margin:0px;
	}
	#idc{
		margin-left:-10px;
		width:325px;
		height:207px;
		padding-right:20px;
		padding-top:8px;

	}
	body{
		margin-left:25px;
	}
	.nama{
		position:absolute;
		margin-top:80px;
		margin-left:-345px;

		font-size:13px;
	}

	.nuptk{
		position:absolute;
		margin-top:-96px;
		margin-left:-345px;
		font-weight:bold;
	}
	#poto{
		width:65px;
		height:80px;
		border-radius:10px;
		position:absolute;
		margin-top:-155px;
		margin-left:167px;
	}
	#bar{
		margin-left:248px;
		margin-top:-23px;
		position:absolute;
		font-size:14px;
	}
	@font-face{
		font-family:'barcode';
		src: url('<?= base_url('assets/fonts/BarcodeFont.ttf'); ?>') format('truetype');
	}
	#footer-bottom-inner {
		position: fixed; left: 0; bottom: 0; right: 0; height: 30px; text-align: center
	}
</style>
<div style="max-width:690px;margin-left:13px">

	<?php

	$cet=$this->db->query("SELECT * from anggota where status_cetak=2")->result();

	foreach($cet as $dolay)
	{

		$nama=$dolay->nama;

		echo "<img src='".base_url()."assets/images/depan.png' id='idc'>&nbsp;&nbsp;";

		// echo "
		// <span class='nama'>
		// 	<font face='arial'>$dolay->nama</font><br>
		// 	<font size='1' face='arial'>Nomor Anggota</font><br>
		// 	<font face='arial'>$dolay->no_anggota</font><br>
		// 	<font size='1' face='arial'>Tempat Lahir</font><br>
		// 	<font face='arial'>$dolay->tempat_lahir</font><br>
		// 	<font size='1' face='arial'>Alamat</font><br>
		// 	<font face='arial'>$dolay->alamat</font><br>
		// 	<img src='".base_url()."assets/uploads/profil/".$dolay->file_foto."' id='poto'>
		// 	<span id='bar'>
		// 		<font style='font-family:barcode'><b>$dolay->no_anggota</font></b>
		// 	</span><br>
		// </span>
		// ";
		echo "
		<span class='nama'>
			<table>
				<tr>
					<td><font size='1' face='arial'>Nomor Anggota</font></td>
					<td><font size='1' face='arial'>:</font></td>
					<td><font size='1' face='arial'>".$dolay->no_anggota."</font></td>
				</tr>
				<tr>
					<td><font size='1' face='arial'>Nama</font></td>
					<td><font size='1' face='arial'>:</font></td>
					<td><font size='1' face='arial'>".$dolay->nama."</font></td>
				</tr>
				<tr>
					<td><font size='1' face='arial'>Alamat</font></td>
					<td><font size='1' face='arial'>:</font></td>
					<td><font size='1' face='arial'>".$dolay->alamat."</font></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan='3' style='text-align:left'>
					<font size='1' face='arial'>Masa Berlaku: ".$this->Main_model->convert_tanggal($dolay->masa_aktif)."</font></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan='3' style='text-align:center'>
					<span><font style='font-family:barcode' size='100em'>".$dolay->no_anggota."</font></span></td>
				</tr>
			</table><br>
			<img src='".base_url()."assets/uploads/profil/".$dolay->file_foto."' id='poto'>
		</span>
		";
	}
	?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div id='footer-bottom-inner'>
	<a href="javascript:window.print()"><input type='button' id="printbutton" value='Cetak Kartu Anggota'></a>
</div>