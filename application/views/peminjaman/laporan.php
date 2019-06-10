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
								Peminjaman
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Laporan Peminjaman Buku
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
														Belum Mengembalikan
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#sudah">
														Sudah Mengembalikan
														<i class="green ace-icon fa fa-check"></i>
													</a>
												</li>
												<!-- <li>
													<a data-toggle="tab" href="#grafik">
														<i class="green ace-icon fa fa-bar-chart"></i>
														Grafik
													</a>
												</li> -->
											</ul>

											<div class="tab-content">
												<div id="belum" class="tab-pane fade in active">
													<!--<p>Daftar KTA yang belum dicetak.</p>-->
													<table class="table table-bordered table-striped" id="myTable">
									                    <thead>
									                      <tr>
									                        <th style="text-align: center">No</th>
									                        <th style="text-align: center">ID Peminjaman</th>
									                        <th style="text-align: center">Peminjam</th>
									                        <th style="text-align: center">Buku Pinjaman</th>
									                        <th style="text-align: center">Aksi</th>
									                      </tr>
									                    </thead>
					                    				<tbody>
					                                  
										                    <?php
										                    $no=1;
										                    foreach($peminjaman as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                    ?>
										                    <tr class="gradeX">
										                        <td style="text-align: center"><?= $no++."."; ?></td>
										                        <td><?php echo $id_peminjaman; ?></td>
										                        <td><?php echo $nama." (".$no_anggota.")" ?></td>
										                        <td><?php echo $jumlah_buku." judul buku (".$jumlah_total." total buku)"; ?></td> 
										                        <td style="text-align: center">
										                        <a href="<?php echo site_url('Peminjaman/detail/'.$id_peminjaman)?>" class="btn btn-mini" title="Lihat detail buku yang dipinjam"><i class="fa fa-eye"></i></a>
										                        <a href="<?php echo site_url('Peminjaman/kembalikan_semua/'.$id_peminjaman)?>" class="btn btn-mini" title="Kembalikan semua buku"><i class="fa fa-check"></i></a>        
										                        </td>
										                    </tr>
											                <?php
											                  }
											                ?>
										                </tbody>
										            </table>
												</div>
												<div id="sudah" class="tab-pane fade">
														
														<!-- <button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-print"></i>
															<a href="cetak">Print</a>
														</button>
														<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-check-square-o"></i>
															<a href="done">Done</a>
														</button> -->
														<br/>
														<br/>
														<table class="table table-bordered table-striped" id="myTable2">
									                    <thead>
									                      <tr>
									                        <th style="text-align: center">No</th>
									                        <th style="text-align: center">ID Peminjaman</th>
									                        <th style="text-align: center">Peminjam</th>
									                        <th style="text-align: center">Buku Pinjaman</th>
									                        <th style="text-align: center">Aksi</th>
									                      </tr>
									                    </thead>
					                    				<tbody>
					                                  
										                    <?php
										                    $no=1;
										                    foreach($sudah as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                    ?>
										                    <tr class="gradeX">
										                        <td style="text-align: center"><?= $no++."."; ?></td>
										                        <td><?php echo $id_peminjaman; ?></td>
										                        <td><?php echo $nama." (".$no_anggota.")" ?></td>
										                        <td><?php echo $jumlah_buku." judul buku (".$jumlah_total." total buku)"; ?></td> 
										                        <td style="text-align: center">
										                        <a href="<?php echo site_url('Peminjaman/detail2/'.$id_peminjaman)?>" class="btn btn-mini" title="Lihat detail buku yang dipinjam"><i class="fa fa-eye"></i></a>
										                        <!-- <a href="<?php echo site_url('Peminjaman/kembalikan_semua/'.$id_peminjaman)?>" class="btn btn-mini" title="Kembalikan semua buku"><i class="fa fa-check"></i></a>   -->      
										                        </td>
										                    </tr>
											                <?php
											                  }
											                ?>
										                </tbody>
										            </table>
														<!-- <p style="color: red">* Catatan : Jika udah selesai proses cetak KTA harap klik tombol "Done" di bagian atas</p> -->
												</div>
												<!-- <div id="grafik" class="tab-pane fade">
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
												</div> -->
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