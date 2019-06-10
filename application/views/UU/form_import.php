<html>
<head>
	<title>Form Import</title>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?=base_url('assets4/vendors/jquery/dist/jquery.min.js');?>"></script>
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>
</head>
<body>
<br>
<br>
<br>
<h4><?= $this->session->flashdata('sukses') ?></h4>
	<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Import File<small>Peraturan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
       
                        <a href="<?php echo base_url("assets4/file/import/Format.xlsx"); ?>" class="btn btn-sm btn-success btn-block">Unduh Format</a>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-circle"></i> 
                            </div>
                            <div class="right">
                              <h3>Ukuran maksimal</h3>
                              <p>8Mb</p>
                            </div>
                          </div>
                        </a>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="right">
                              <h3>Ekstensi yang diizinkan</h3>
                              <p>.xlsx</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
   
                            <div class="col-md-12">
                           
                      <!-- blockquote -->
                      <blockquote>
                      	<h3>Catatan</h3>
                        <p style="text-align: justify;">1. Sebelum memasukkan data, silahkan cek ID Peraturan <a href="<?php echo base_url("Uu/kategori"); ?>">disini</a>.</p>
                        <p style="text-align: justify;">2. Pastikan isian kolom nama file sesuai dengan file pdf yang nantinya akan disimpan (berikut diikuti dengan ekstensinya).</p>
                        <p style="text-align: justify;">3. Setelah selesai import simpan file pdf ke dalam folder berikut.</p>
                        <div class="portlet-body">
                                    <div id="tree_1" class="tree-demo jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_2" aria-busy="false"><ul class="jstree-container-ul jstree-children" role="group"><li role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j1_1_anchor" aria-expanded="true" id="j1_1" class="jstree-node  jstree-open"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_1_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder icon-state-warning icon-lg jstree-themeicon-custom" role="presentation"></i> assets4
                                                </a><ul role="group" class="jstree-children"><li role="treeitem" data-jstree="{ &quot;opened&quot; : true }" aria-selected="false" aria-level="2" aria-labelledby="j1_4_anchor" aria-expanded="true" id="j1_4" class="jstree-node  jstree-open"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_4_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder icon-state-warning icon-lg jstree-themeicon-custom" role="presentation"></i> file
                                                        </a><ul role="group" class="jstree-children"><li role="treeitem" data-jstree="{ &quot;disabled&quot; : true }" aria-selected="false" aria-level="3" aria-labelledby="j1_5_anchor" aria-disabled="true" id="j1_5" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor  jstree-disabled" href="#" tabindex="-1" id="j1_5_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder icon-state-warning icon-lg jstree-themeicon-custom" role="presentation"></i> dokumen </a></li></ul></li></ul></li></ul></div>
                        </div>
                        
                        <footer>Peraturan diciptakan bukan untuk dilanggar <cite title="Source Title">Anonymous</cite>
                        </footer>
                      </blockquote>                                   
                            </div>
                          </div>
                          <div class="sender-info">
                            <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?php echo base_url("Uu/form_import"); ?>" enctype="multipart/form-data">
		<!-- 
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file" class="buttonFinish buttonDisabled btn btn-default">
		
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
		<input type="submit" name="preview" value="Preview" class="buttonPrevious buttonDisabled btn btn-primary">
	</form>
                          </div>
                          <div class="view-mail">
                          <?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("Uu/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		 Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		echo'<p style="text-align: justify;">Kolom yang tidak ada nilainya akan ditandai dengan blok warna merah seperti dibawah ini.</p>
                        <p style="border: solid 1px #aaa; background: #E07171; padding: 15px; -moz-border-radius: 15px; -khtml-border-radius: 15px; -webkit-border-radius: 15px; border-radius: 15px; margin: 0; width: 100px">
                        </p><br>'; 
		echo "<table border='1' cellpadding='8' class='table table-striped table-bordered'>
		<tr>
			<th colspan='5' style='text-align: center;''>Preview Data</th>
		</tr>
		<tr>
			<th>Judul Peraturan</th>
			<th>ID Kategori</th>
			<th>Tahun Terbit</th>
			<th>Ringkasan</th>
			<th>Nama File</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$judul = $row['A']; // Ambil data NIS
			$kategori = $row['B']; // Ambil data nama
			$tahun = $row['C']; // Ambil data jenis kelamin
			$ringkasan = $row['D']; // Ambil data alamat
			$file = $row['E'];
			// Cek jika semua data tidak diisi
			if(empty($judul) && empty($kategori) && empty($tahun) && empty($ringkasan) && empty($file))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$judul_td = ( ! empty($judul))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$kategori_td = ( ! empty($kategori))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$tahun_td = ( ! empty($tahun))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$ringkasan_td = ( ! empty($ringkasan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$file_td = ( ! empty($file))? "" : " style='background: #E07171;'";
				// Jika salah satu data ada yang kosong
				if(empty($judul) or empty($kategori) or empty($tahun) or empty($ringkasan) or empty($file)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$judul_td.">".$judul."</td>";
				echo "<td".$kategori_td.">".$kategori."</td>";
				echo "<td".$tahun_td.">".$tahun."</td>";
				echo "<td".$ringkasan_td.">".$ringkasan."</td>";
				echo "<td".$file_td.">".$file."</td>";
				echo "</tr>";
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
		
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		 // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import' class='buttonFinish buttonDisabled btn btn-default'>Import</button>";
			echo "<a href='".base_url("Uu/import_file")."'>Cancel</a>";
		
		
		echo "</form>";
	}
	?>
                          </div>
                        
                        
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
	
	
	
</body>
</html>