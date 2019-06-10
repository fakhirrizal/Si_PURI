<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	
<div class="page-header">
							<h1>
								Author
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Daftar Author
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered table-striped" id="myTable">
				                    <thead>
				                      <tr>
				                        <th style="text-align: center" width="7%">#</th>
				                        <th style="text-align: center" width="30%">Nama</th>
				                        <th style="text-align: center" width="10%">Tanggal Lahir</th>
				                        <th style="text-align: center" width="13%">Asal</th>
				                        <th style="text-align: center" width="30%">Tipe Author</th>
				                        <th style="text-align: center" width="10%">Aksi</th>
				                      </tr>
				                    </thead>
                    				<tbody>
                                  
					                    <?php
					                    
					                    $no=1;
					                    foreach($data_author as $content)
					                    {
					                        foreach ($content as $key => $value ) {
					                        $$key=$value;
					                    }
					                    ?>
					                    <tr class="gradeX">
					                        <td style="text-align: center"><?= $no++."."; ?></td>
					                        <td><?php echo $nama; ?></td>
					                        <td><?php echo date('d-m-Y', strtotime($tanggal_lahir)); ?></td>
					                        <td><?php echo $asal; ?></td>
					                        <td><?php
					                        if($tipe=='p'){
					                        	echo 'Personal Name';
					                        }
					                        elseif($tipe=='o'){
					                        	echo 'Organizational Body';
					                        }
					                        else{
					                        	echo 'Conference';
					                        }
					                        ?></td> 
					                        <td style="text-align: center">                                      
					                        <a data-toggle="modal" data-target="#myModal" id="<?php echo $id; ?>" class="view_data btn btn-mini" title="ubah"><i class="fa fa-pencil"></i></a>                                        
					                        <a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Author/hapus/'.$id)?>" class="btn btn-mini" title="hapus"><i class="fa fa-trash"></i></a>           
					                        </td>
					                    </tr>
						                <?php
						                  }
						                ?>
					                </tbody>
</table>
	
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
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.view_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
			var id = $(this).attr("id");
			
			// memulai ajax
			$.ajax({
				url: '<?php echo base_url(); ?>Author/tampil_ajax',	// set url -> ini file yang menyimpan query tampil detail data gambar
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