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
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Kategori Buku
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="col-sm-12">
										<!-- #section:elements.tab -->
										<?= $this->session->flashdata('sukses') ?>
										<?= $this->session->flashdata('gagal') ?>
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#daftar">
														<i class="green ace-icon fa fa-file"></i>
														Daftar Kategori
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#tambah">
														Tambah Kategori
														<i class="green ace-icon fa fa-plus"></i>
													</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="daftar" class="tab-pane fade in active">
													<!--<p>Daftar KTA yang belum dicetak.</p>-->
													<table class="table table-bordered table-striped" id="myTable" width="70%">
									                    <thead>
									                      <tr>
									                        <th style="text-align: center">No</th>
									                        <th style="text-align: center">Kode Kategori</th>
									                        <th style="text-align: center">Nama Kategori</th>
									                        <th style="text-align: center">Aksi</th>
									                      </tr>
									                    </thead>
					                    				<tbody>
					                                  
										                    <?php
										                    $no=1;
										                    foreach($data_kategori as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                    ?>
										                    <tr class="gradeX">
										                        <td style="text-align: center"><?= $no++."."; ?></td>
										                        <td><?php echo $kode_kategori; ?></td>
										                        <td><?php echo $nama_kategori; ?></td>
										                        <td style="text-align: center">
										                        <a data-toggle="modal" data-target="#myModal" id="<?php echo $id; ?>" class="view_data btn btn-mini" title="ubah kategori"><i class="fa fa-pencil"></i></a>     

										                        <a href="<?php echo site_url('Buku/hapus_kategori/'.$id)?>" onclick="return confirm('Anda yakin?')" class="btn btn-mini" title="hapus kategori"><i class="fa fa-trash"></i></a>     
										                        </td>
										                    </tr>
											                <?php
											                  }
											                ?>
										                </tbody>
										            </table>
												</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-body"><button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
				<div class="bootbox-body" id="data_edit"></div>
			</div>
			
		</div>
	</div>
</div>
	<script>
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.view_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
			var id = $(this).attr("id");
			
			// memulai ajax
			$.ajax({
				url: '<?php echo base_url(); ?>Buku/tampil_ajax_ubah_kategori',	// set url -> ini file yang menyimpan query tampil detail data gambar
				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
				data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
				success:function(data){		// kode dibawah ini jalan kalau sukses
					$('#data_edit').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_gambar">
					$('#myModal').modal("show");	// menampilkan dialog modal nya
				}
			});
		});
	});
	</script> 
												<div id="tambah" class="tab-pane fade">
													<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/simpan_kategori'); ?>" method="post" enctype='multipart/form-data'>
															<!-- #section:elements.form -->
														<h4>Kode Kategori</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											                    <input name="kode" type="text" maxlength="5" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Nama Kategori</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
											                    <input name="nama" type="text" onkeyup="validHuruf(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
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


<script language='javascript'>
                    function validHuruf(a)
                    {
                        if(!/^[a-z, A-Z.']+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>
														<!--<p style="color: red">* Catatan : Jika udah selesai proses cetak KTA harap klik tombol "Done" di bagian atas</p>-->
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
								 