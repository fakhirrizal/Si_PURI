					<script src="<?=base_url('assets2/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
							<!-- END PAGE BAR -->
                            <!-- BEGIN PAGE TITLE-->
                            <h3 class="page-title"> Tabel
                                <small>hasil pencarian data risalah</small>
                            </h3>
                            <!-- END PAGE TITLE-->
                            <!-- END PAGE HEADER-->

            <div class="box">
				<!-- /.box-header -->

				<div class="box-body">
					<?= $this->session->flashdata('sukses') ?>
					<?= $this->session->flashdata('gagal') ?>
					<div class="btn-group btn-group-devided">
                    	<label class="btn btn-transparent blue-salsa btn-circle btn-sm active">
                        	<i class="glyphicon glyphicon-chevron-left"></i><a href="<?php echo site_url('Risalah/daftar_risalah'); ?>""> Kembali ke daftar risalah</a>
                        </label>
                    </div>
					<table id="tabel1" class="table table-bordered table-striped">

						<thead>

			            	<tr>
			            		<th width="5%" style="text-align: center;">#</th>
								<th width="15%" style="text-align: center;">Nomor Risalah</th>
						        <th width="14%" style="text-align: center;">Acara</th>
				                <th width="40%" style="text-align: center;">Isi Risalah</th>
				                <th width="12%" style="text-align: center;">Tanggal Acara</th>
				                <th width="14%" style="text-align: center;">Aksi</th>
				            </tr>

				        </thead>

				        <tbody>

				        	<?php

				                $no=1;

				                if(isset($data_risalah)){

				                foreach($data_risalah as $row){

				            ?>

				            <tr>
				            	<td style="text-align: center;"><?= $no++."."; ?></td>
				            	<td><?php echo $row->nomor_risalah; ?></td>

				                <td><?php echo $row->nama_acara; ?></td>

				                <td><?php echo substr($row->isi_risalah,0,100); 
					                        $jumlah = strlen($row->isi_risalah);
					                        if($jumlah>100){
					                        	echo "...... <a href='".site_url('Risalah/detail/'.$row->id_risalah)."'>[read more]</a>";
					                        }
					                        else{
					                        	echo "";
					                        }
					                        ?>
					                       
					            </td> 
				                <td style="text-align: center;"><?= date('d-m-Y', strtotime($row->tanggal_acara)) ?></td>
				                <td style="text-align: center;">
											<a class="btn btn-circle btn-icon-only green" href="<?php echo site_url('Risalah/detail/'.$row->id_risalah)?>" title="lihat data">
				                                <i class="icon-eye"></i>
				                            </a>
					                        <a class="btn btn-circle btn-icon-only green" href="<?php echo site_url('Risalah/ubah/'.$row->id_risalah)?>" title="ubah data">
				                                <i class="icon-wrench"></i>
				                            </a>
				                            <a class="btn btn-circle btn-icon-only red" href="<?php echo site_url('Risalah/hapus/'.$row->id_risalah)?>" title="hapus data" onclick="return confirm('Anda yakin?')">
				                                <i class="icon-trash"></i>
				                            </a>
				                </td>
				            </tr>
				                   
				                <?php }} ?>

				                                             

				        </tbody>

				    </table>

				</div><!-- /.box-body -->

			</div><!-- /.box -->
                                    
			<script>
		      $(function () {
		        $("#tabel1").DataTable({
		          "paging": true,
		          "lengthChange": false,
		          "searching": false,
		          "ordering": true,
		          "info": true,
		          "autoWidth": false
		        });
		      });
		    </script>
		    <!-- nah, ini buat menampilkan data modal dengan ajax, pantengin ya :) -->
			