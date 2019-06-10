<?php
foreach ($variable as $key => $value) {
?>
														<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/ubah_kategori'); ?>" method="post" enctype='multipart/form-data'>
															<!-- #section:elements.form -->
														<h4>Kode Kategori </h4>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											                    <input class="form-control" readonly value="<?= $value->kode_kategori; ?>">
											                    <input name="id" type="hidden" value="<?= $value->id; ?>">
											                </div>

											            <h4>Nama Kategori</h5>

											            <div class="input-group">
									                    	<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
									                    	<input name="nama" type="text" class="form-control" value="<?= $value->nama_kategori ?>" required>
									                    </div>

											            
											              	
											              	<br>

															<div class="modal-footer" style="text-align: center;">								
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
														</form>
<?php
}
?>
