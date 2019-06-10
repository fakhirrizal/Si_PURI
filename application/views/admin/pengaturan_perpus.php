								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title smaller">
													<i class="ace-icon fa fa-quote-left smaller-80"></i>
													Pengaturan Buku
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													

													<div class="row">
														<div class="col-xs-12">
															<blockquote>
																<p class="lighter line-height-125">
																	Pengaturan ini berfungsi untuk memberikan nilai maksimal terhadap pengunjung yang akan meminjam buku. Tidak dihitung ketika pengguna telah mengembalikan buku.
																</p>

																<small>
																	Maksimal karakter adalah 1.
																	<!-- <cite title="Source Title">Source Title</cite> -->
																</small>
															</blockquote>
															<div class="text-warning bigger-110 orange">
																	<i class="ace-icon fa fa-exclamation-triangle"></i>
																	Pengaturan saat ini : <b>
															<?php
										                    foreach ($batas_pinjam as $key => $row) {
										                    	echo $row->keterangan.' buah buku';
										                    	
										                    }
										                    ?></b>
															</div>
														</div>
													</div>

													<hr>
													<form class="form-horizontal" role="form" action="<?php echo site_url('Perpustakaan/simpan_pengaturan1'); ?>" method="post" >
														<!-- #section:elements.form -->
														<h4 style="text-align: center;">Jumlah maksimal</h5>

										                <div class="input-group col-md-offset-4 col-md-9" >
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										                    <?php
										                    foreach ($batas_pinjam as $key => $value) {
										                    	echo '<input name="nilai" type="text" onkeyup="validAngka(this)" maxlength="1" class="col-xs-10 col-sm-5" value="'.$value->keterangan.'">';
										                    	echo '<input name="id" type="hidden" value="'.$value->id.'">';
										                    }
										                    ?>
										                    
										                </div>

										               
													
														<div class="clearfix form-actions">
															<div class="col-md-offset-5 col-md-9">
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
													<script language='javascript'>
													                    function validAngka(a)
													                    {
													                        if(!/^[0-9]+$/.test(a.value))
													                        {
													                        a.value = a.value.substring(0,a.value.length-1000);
													                        }
													                    }
													</script> 
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title smaller">
													<i class="ace-icon fa fa-quote-left smaller-80"></i>
													Pengaturan Peminjaman
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													

													<div class="row">
														<div class="col-xs-12">
															<blockquote>
																<p class="lighter line-height-125">
																	Pengaturan ini berfungsi untuk memberikan nilai maksimal (hari) terhadap pengunjung yang telah meminjam buku. Berhubungan dengan sanksi administratif untuk pengunjung yang terlambat dalam mengembalikan buku.
																</p>

																<small>
																	Maksimal karakter adalah 2.
																	<!-- <cite title="Source Title">Source Title</cite> -->
																</small>

															</blockquote>
															<div class="text-warning bigger-110 orange">
																	<i class="ace-icon fa fa-exclamation-triangle"></i>
																	Pengaturan saat ini : <b>
															<?php
										                    foreach ($batas_kembali as $key => $row) {
										                    	echo $row->keterangan.' hari';
										                    	
										                    }
										                    ?></b>
															</div>
														</div>
													</div>

													<hr>
													<form class="form-horizontal" role="form" action="<?php echo site_url('Perpustakaan/simpan_pengaturan1'); ?>" method="post" >
														<!-- #section:elements.form -->
														<h4 style="text-align: center;">Hari maksimal</h5>

										                <div class="input-group col-md-offset-4 col-md-9" >
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										                    <?php
										                    foreach ($batas_kembali as $key => $row) {
										                    	echo '<input name="nilai" type="text" onkeyup="validAngka(this)" maxlength="1" class="col-xs-10 col-sm-5" value="'.$row->keterangan.'">';
										                    	echo '<input name="id" type="hidden" value="'.$row->id.'">';
										                    }
										                    ?>
										                    
										                </div>

										               
													
														<div class="clearfix form-actions">
															<div class="col-md-offset-5 col-md-9">
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
													<script language='javascript'>
													                    function validAngka(a)
													                    {
													                        if(!/^[0-9]+$/.test(a.value))
													                        {
													                        a.value = a.value.substring(0,a.value.length-1000);
													                        }
													                    }
													</script> 
												</div>
											</div>
										</div>
									</div>
								</div>