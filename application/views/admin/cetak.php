<style type='text/css' media='print'>#printbutton {display : none}</style>
<style>
body{
background-color:white;
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
margin-top:97px;
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
margin-top:-105px;
margin-left:240px;
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

echo "<img src='".base_url()."assets/images/mantep.png' id='idc'>&nbsp;&nbsp;";

echo "<span class='nama'><font face='arial'>$dolay->nama</font><br>
<font size='1' face='arial'>Nomor Anggota</font><br>
<font face='arial'>$dolay->no_anggota</font><br>
<font size='1' face='arial'>Tempat Lahir</font><br>
<font face='arial'>$dolay->tempat_lahir</font><br>
<font size='1' face='arial'>Alamat</font><br>
<font face='arial'>$dolay->alamat</font><br>
<img src='".base_url()."assets/uploads/profil/".$dolay->file_foto."' id='poto'>
<span id='bar'><font style='font-family:barcode'><b>$dolay->no_anggota</font></b></span><br>

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
<a href="javascript:window.print()"><input type='button' id="printbutton" value='cetak'></a> </div>
