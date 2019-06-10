<div class="page-header">
							<h1>
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Ubah Data Buku
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/simpan_buku'); ?>" method="post" enctype='multipart/form-data'>
															<!-- #section:elements.form -->
														<h4>Kategori</h5>
														<div class="input-xlarge">
										                <div class="input-group">
										                <span class="input-group-addon"><i class="fa fa-book"></i></span>
										                <select class='form-control' name="kategori" id="kategori">
										                <option value=''>--Pilih--</option>
										                <?php
										                    $no=1;
										                    foreach($data_kategori as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                ?>											                
										                <option value="<?php echo $kode_kategori; ?>"><?php echo $nama_kategori; ?></option>
											            <?php
											        	}
											            ?>
										                </select>
										                </div>
										                </div>
										                
											            <h4>Judul Buku<strong class="green"> *</strong></h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
											                    <input name="nama_buku" type="text" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Jumlah Halaman</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
											                    <input name="halaman" type="text" onkeyup="validAngka(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Nama Penulis</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											                    <input name="penulis" type="text" onkeyup="validHuruf(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>
											               
											            <h4>Penerbit</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
											                    <input name="penerbit" type="text" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Tanggal Terbit</h5>
											            	<div class="input-xlarge">
											                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										                    <input name="tanggal_terbit" type="date" class="form-control" required="">
										                    </div>
										                    </div>

											            <h4>Sinopsis</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
											                    <textarea name="sinopsis" type="text" class="col-xs-10 col-sm-5" required></textarea>
											                </div>
														
											            <h4>File Buku/Dokumen <strong class="red">*</strong><strong class="blue"> *</strong></h4> 

										                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
										                    <input name="file_dokumen" type="file" class="form-control">
										                </div>

										                <h4>Gambar Cover Depan <strong class="red">*</strong><strong class="black"> *</strong></h4> 

										                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
										                    <input name="file_cover" type="file" class="form-control">
										                </div>
										                <br>
										                <div class="input-group">
															<label>
																<input name="switch-field-1" class="ace ace-switch ace-switch-6" onclick="enable_text(this.checked)" type="checkbox" checked>
																<span class="lbl">&nbsp;Jika tidak ada bentuk fisiknya silahkan hilangkan centang bagian ini</span>
															</label>
														</div>

														<h4>Stok</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
											                    <input name="stok" id="stok" type="text" onkeyup="validAngka(this)" maxlength="5" class="col-xs-10 col-sm-5">
											                </div>

															<div class="clearfix form-actions">
																<div class="col-md-offset-4 col-md-10">
																	<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
																		<i class="ace-icon fa fa-check-square-o"></i>
																		Submit
																	</button>

																	&nbsp; &nbsp; &nbsp;
																	<button class="btn btn-white btn-default btn-round" type="reset">
																		<i class="ace-icon fa fa-undo"></i>
																		Reset
																	</button>
																</div>
															</div>
	</form>