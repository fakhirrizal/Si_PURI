<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	
<div class="page-header">
							<h1>
								Laporan
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Log Activity Pengguna Aplikasi
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
														<button class="btn btn-white btn-default btn-round">
															<i class="ace-icon fa fa-trash"></i>
															<a onclick="return confirm('Anda yakin?')" href="<?= base_url('Admin/kosongkan_log'); ?>" >Kosongkan</a>
														</button>
														<br/>
														<br/>
														<br/>
<?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered table-striped" id="myTable">
				                    <thead>
				                      <tr>
				                        <th style="text-align: center" width="6%">#</th>
				                        <th style="text-align: center" width="70%">Keterangan</th>
				                        <th style="text-align: center" width="12%">Tanggal</th>
				                        <th style="text-align: center" width="12%">Jam</th>
				                      </tr>
				                    </thead>
                    				<tbody>
                                  
					                    <?php
					                    
					                    $no=1;
					                    foreach($variable as $content)
					                    {
					                        foreach ($content as $key => $value ) {
					                        $$key=$value;
					                    }
					                    ?>
					                    <tr class="gradeX">
					                        <td style="text-align: center"><?= $no++."."; ?></td>
					                        <td><?php echo $keterangan; ?></td>
					                        <?php
					                        $string = explode(' ', $waktu);
					                        $tanggal = explode('-', $string[0]);
					                        ?>
					                        <!-- <td><?php echo $tanggal[2]."-".$tanggal[1]."-".$tanggal[0]; ?></td> -->
											<td style="text-align: center"><?= $this->Main_model->convert_tanggal($string[0]); ?></td>
					                        <td><?php echo $string[1]; ?></td>
					                    </tr>
						                <?php
						                  }
						                ?>
					                </tbody>
</table>
		

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