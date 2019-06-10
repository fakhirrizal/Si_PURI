								<?= $this->session->flashdata('sukses') ?>
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													<i class="ace-icon fa fa-comment blue"></i>
													Pengaturan Background
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<!-- #section:pages/dashboard.conversations -->
													<div class="dialogs ace-scroll"><div class="scroll-track scroll-active" style="display: block; height: 300px;"><div class="scroll-bar" style="height: 215px; top: 0px;"></div></div><div class="scroll-content" style="max-height: 300px;">
														<div class="itemdiv dialogdiv">
															<div class="user">
															
																<img src="<?=base_url('assets/images/image-2282302_960_720.png');?>" alt="">
															</div>

															<div class="body">
																<div class="time">
																	<i class="ace-icon fa fa-clock-o"></i>
																	<span class="green">dimuat dalam {elapsed_time} sec</span>
																</div>

																<div class="name">
																	<a href="#">Gambar Login</a>
																</div>
																<div class="text">Disini kamu bisa mengubah gambar sesuai keiinginanmu dan akan diterapkan di form login bagi pengguna yang akan membaca buku secara online.</div>
																<br>
																<form class="form-horizontal" role="form" action="<?php echo site_url('Perpustakaan/simpan_pengaturan2'); ?>" method="post" enctype='multipart/form-data'>
																	<!-- #section:elements.form -->
																	
																	<h4>Foto (Ukuran File Maksimal 3 MB)</h5> 

													                <div class="input-group">
													                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
													                    <input name="foto" type="file" accept="image/*" class="form-control" required>
													                    <input type="hidden" name="id" value="4">
													                </div>     
																
																	<div class="clearfix form-actions">
																		<div class="col-md-offset-5 col-md-9">
																									<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
																										<i class="ace-icon fa fa-check-square-o"></i>
																										Simpan
																									</button>

																									&nbsp; &nbsp; &nbsp;
																									<button class="btn btn-white btn-default btn-round" type="reset">
																										<i class="ace-icon fa fa-undo"></i>
																										Batal
																									</button>
																		</div>
																	</div>
																</form>
																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only ace-icon fa fa-share"></i>
																	</a>
																</div>
															</div>
														</div>

														<!-- <div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="Bob's Avatar" src="../assets/avatars/user.jpg">
															</div>

															<div class="body">
																<div class="time">
																	<i class="ace-icon fa fa-clock-o"></i>
																	<span class="orange">2 min</span>
																</div>

																<div class="name">
																	<a href="#">Bob</a>
																	<span class="label label-info arrowed arrowed-in-right">admin</span>
																</div>
																<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only ace-icon fa fa-share"></i>
																	</a>
																</div>
															</div>
														</div> -->

														
														
													</div></div>

												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
											<div class="widget-body">
												<div class="widget-main no-padding">
													<!-- #section:pages/dashboard.conversations -->
													<div class="dialogs ace-scroll"><div class="scroll-track scroll-active" style="display: block; height: 300px;"><div class="scroll-bar" style="height: 215px; top: 0px;"></div></div><div class="scroll-content" style="max-height: 300px;">
														<div class="itemdiv dialogdiv">
															<div class="user">
															
																<img src="<?=base_url('assets/images/image-2282302_960_720.png');?>" alt="">
															</div>

															<div class="body">
																<div class="time">
																	<i class="ace-icon fa fa-clock-o"></i>
																	<span class="green">dimuat dalam {elapsed_time} sec</span>
																</div>

																<div class="name">
																	<a href="#">Gambar Login untuk Tamu</a>
																</div>
																<div class="text">Background ini akan terlihat ketika pengguna tidak memiliki akun untuk masuk ke sistem dan memutuskan untuk masuk sebagai tamu.</div>
																<br>
																<form class="form-horizontal" role="form" action="<?php echo site_url('Perpustakaan/simpan_pengaturan2'); ?>" method="post" enctype='multipart/form-data'>
																
																	
																	<h4>Foto (Ukuran File Maksimal 3 MB)</h5> 

													                <div class="input-group">
													                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
													                    <input name="foto" type="file" accept="image/*" class="form-control" required>
													                    <input type="hidden" name="id" value="5">
													                </div>     
																
																	<div class="clearfix form-actions">
																		<div class="col-md-offset-5 col-md-9">
																									<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
																										<i class="ace-icon fa fa-check-square-o"></i>
																										Simpan
																									</button>

																									&nbsp; &nbsp; &nbsp;
																									<button class="btn btn-white btn-default btn-round" type="reset">
																										<i class="ace-icon fa fa-undo"></i>
																										Batal
																									</button>
																		</div>
																	</div>
																</form>
																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only ace-icon fa fa-share"></i>
																	</a>
																</div>
															</div>
														</div>
													</div></div>

												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>
								</div>