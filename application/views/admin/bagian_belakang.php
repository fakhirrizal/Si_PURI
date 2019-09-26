<style type='text/css' media='print'>
	#printbutton {
		display: none
	}
</style>
<style>
	body {
		background-color: white;
	}
</style>
<style>
	body {
		margin: 0px;
	}

	#idc {
		margin-left: -10px;
		width: 325px;
		height: 207px;
		padding-right: 20px;
		padding-top: 8px;

	}

	body {
		margin-left: 25px;
	}

	.nama {
		position: absolute;
		margin-top: 100px;
		margin-left: -345px;
		font-weight: bold;
		font-size: 13px;
	}

	.nuptk {
		position: absolute;
		margin-top: -96px;
		margin-left: -345px;
		font-weight: bold;
	}

	#poto {
		width: 65px;
		height: 80px;
		border-radius: 10px;
		position: absolute;
		margin-top: -115px;
		margin-left: 240px;
	}

	#bar {
		margin-left: 248px;
		margin-top: -35px;
		position: absolute;
		font-size: 14px;
	}

	@font-face {
		font-family: 'barcode';
		src: url('<?= base_url('assets/fonts/BarcodeFont.ttf'); ?>') format('truetype');
	}

	#footer-bottom-inner {
		position: fixed;
		left: 0;
		bottom: 0;
		right: 0;
		height: 30px;
		text-align: center
	}
</style>
<div style="max-width:690px;margin-left:13px">
	<?php
    for($i=0;$i<$jumlah;$i++)
    {
        echo "<img src='".base_url()."assets/images/belakang.png' id='idc'>&nbsp;&nbsp;";
        echo "<span class='nama'>
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