	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	<script type="text/javascript">
    $(function () {
        $("#cetak_belakang").click(function () {
            var jumlah = $("#jumlah");
            if (jumlah.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Harap pilih jumlah terlebih dahulu!");
                return false;
            }
            return true;
        });
    });
	</script>
	
						<div class="page-header">
							<h1>
								Anggota
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Cetak KTA
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="col-sm-12">
										<!-- #section:elements.tab -->
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#belum">
														<i class="green ace-icon fa fa-close"></i>
														Belum Tercetak
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#proses">
														Daftar Yang Akan Dicetak
														<i class="green ace-icon fa fa-print"></i>
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#belakang">
														Cetak Bagian Belakang
														<i class="green ace-icon fa fa-print"></i>
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#sudah">
														Sudah Tercetak
														<i class="green ace-icon fa fa-check"></i>
													</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="belum" class="tab-pane fade in active">
													<!--<p>Daftar KTA yang belum dicetak.</p>-->
													<table class="table table-bordered table-striped" id="myTable">
									                    <thead>
									                      <tr>
									                        <th style="text-align: center">No</th>
									                        <th style="text-align: center">Nama Lengkap</th>
									                        <th style="text-align: center">Nomor Keanggotaan</th>
									                        <th style="text-align: center">Alamat</th>
									                        <th style="text-align: center">Tanggal Daftar</th>
									                        <th style="text-align: center">Aksi</th>
									                      </tr>
									                    </thead>
					                    				<tbody>
					                                  
										                    <?php
										                    $no=1;
										                    foreach($belum as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                    $gabungan = explode(" ", $tanggal_daftar);
										                    ?>
										                    <tr class="gradeX">
										                        <td style="text-align: center"><?= $no++."."; ?></td>
										                        <td><?= $nama; ?></td>
										                        <td><?= $no_anggota; ?></td>
										                        <td><?= $alamat; ?></td>
										                        <td><?= date('d-m-Y', strtotime($gabungan[0])); ?></td> 
										                        <td style="text-align: center">
										                        <a href="<?php echo site_url('Admin/pindah_proses/'.$id)?>" class="btn btn-mini" title="pindah ke daftar cetak"><i class="fa fa-share"></i></a>      
										                        </td>
										                    </tr>
											                <?php
											                  }
											                ?>
										                </tbody>
										            </table>
												</div>
												<div id="proses" class="tab-pane fade">
														
														<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-print"></i>
															<a href="<?= base_url('Admin/cetak'); ?>">Print</a>
														</button>
														<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-check-square-o"></i>
															<a href="<?= base_url('Admin/done'); ?>">Done</a>
														</button>
														<br/>
														<br/>
														<table class="table table-bordered table-striped" id="myTable2">
										                    <thead>
										                      <tr>
										                        <th style="text-align: center">No</th>
										                        <th style="text-align: center">Nama Lengkap</th>
										                        <th style="text-align: center">Nomor Keanggotaan</th>
										                        <th style="text-align: center">Alamat</th>
										                        <th style="text-align: center">Tanggal Daftar</th>
										                        <th style="text-align: center">Aksi</th>
										                      </tr>
										                    </thead>
						                    				<tbody>
						                                  
											                    <?php
											                    $no=1;
											                    foreach($proses as $content)
											                    {
											                        foreach ($content as $key => $value ) {
											                        $$key=$value;
											                    }
											                    $gabungan = explode(" ", $tanggal_daftar);
											                    ?>
											                    <tr class="gradeX">
											                        <td style="text-align: center"><?= $no++."."; ?></td>
											                        <td><?= $nama; ?></td>
										                        	<td><?= $no_anggota; ?></td>
										                        	<td><?= $alamat; ?></td>
										                        	<td><?= date('d-m-Y', strtotime($gabungan[0])); ?></td> 
											                        <td style="text-align: center">
											                        <a href="<?php echo site_url('Admin/pindah_belum/'.$id)?>" class="btn btn-mini" title="batal cetak"><i class="fa fa-close"></i></a>          
											                        </td>
											                    </tr>
												                <?php
												                  }
												                ?>
											                </tbody>
											            </table>
														<p style="color: red">* Catatan : Jika udah selesai proses cetak KTA harap klik tombol "Done" di bagian atas</p>
												</div>
												<div id="belakang" class="tab-pane fade">
													<p>Silahkan pilih terlebih dahulu berapa jumlah bagian yang mau dicetak.
													</p>
													<form action="cetak_belakang" method="post">
									                <div class="row">
									                <div class="col-lg-3">
									                <div class="input-group">
									                <span class="input-group-addon">-</span>
									                <select class='form-control' name="jumlah" id="jumlah">
										                <option value=''>--Pilih--</option>
										                <option value="1">1</option>
										                <option value="2">2</option>
										                <option value="3">3</option>
										                <option value="4">4</option>
										                <option value="5">5</option>
										                <option value="6">6</option>
										                <option value="7">7</option>
										                <option value="8">8</option>
										                <option value="9">9</option>
										                <option value="10">10</option>
										                <option value="11">11</option>
										                <option value="12">12</option>
										                <option value="13">13</option>
										                <option value="14">14</option>
									                </select>
									                </div>
									                </div>
									                </div>
									                <br>
													<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-print"></i>
															<a id="submit">Print</a>
													</button>
													</form>
												</div>
												<div id="sudah" class="tab-pane fade">
													<p>Silahkan unduh link berikut guna melihat data anggota yang telah dicetak KTA-nya, file yang diunduh berupa file excel.
													</p>
													<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-download"></i>
															<a href="download">Unduh</a>
													</button>
												</div>
											</div>
										</div>

										<!-- /section:elements.tab -->
								</div><!-- /.col -->
<script>
      $(function () {
        $("#myTable").DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
</script>
<script>
      $(function () {
        $("#myTable2").DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
</script>									 