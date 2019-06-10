	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	
						<div class="page-header">
							<h1>
								Anggota
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Rekap Data Anggota
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<?= $this->session->flashdata('sukses') ?>
								<!-- PAGE CONTENT BEGINS -->
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
					                    foreach($data_anggota as $content)
					                    {
					                        foreach ($content as $key => $value ) {
					                        $$key=$value;
					                    }
					                    $gabungan = explode(" ", $tanggal_daftar);
					                    ?>
					                    <tr class="gradeX">
					                        <td style="text-align: center"><?= $no++."."; ?></td>
					                        <td><?php echo $nama; ?></td>
					                        <td><?php echo $no_anggota; ?></td>
					                        <td><?php echo $alamat; ?></td>
					                        <td><?php echo date('d-m-Y', strtotime($gabungan[0])); ?></td> 
					                        <!--<td><?php echo $dapil1; ?>, <?php echo $dapil2; ?></td>--> 
					                        <td style="text-align: center">
					                        <a href="<?php echo site_url('Admin/detail/'.$id)?>" class="btn btn-mini" title="detail"><i class="fa fa-eye"></i></a>                                          
					                        <a href="<?php echo site_url('Admin/ubah_data_anggota/'.$id)?>" class="btn btn-mini" title="ubah"><i class="fa fa-pencil"></i></a>                                          
					                        <a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Admin/hapus/'.$id)?>" class="btn btn-mini" title="hapus"><i class="fa fa-trash"></i></a>           
					                        </td>
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