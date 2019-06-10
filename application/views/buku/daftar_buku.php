<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	
<div class="page-header">
							<h1>
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Rekap Data Buku
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
				                        <th style="text-align: center" width="7%">No</th>
				                        <th style="text-align: center" width="15%">Judul Buku</th>
				                        <th style="text-align: center" width="10%">Penerbit</th>
				                        <th style="text-align: center" width="13%">Pengarang</th>
				                        <th style="text-align: center" width="45%">Sinopsis</th>
				                        <th style="text-align: center" width="10%">Aksi</th>
				                      </tr>
				                    </thead>
                    				<tbody>
                                  
					                    <?php
					                    
					                    $no=1;
					                    foreach($data_buku as $content)
					                    {
					                        foreach ($content as $key => $value ) {
					                        $$key=$value;
					                    }
					                    ?>
					                    <tr class="gradeX">
					                        <td style="text-align: center"><?= $no++."."; ?></td>
					                        <td><?php echo $nama_buku; ?></td>
					                        <td><?php echo $penerbit; ?></td>
					                        <td>
					                        <?php
					                        $author = explode(',',$penulis);
					                        $jumlah = count($author);
					                        for ($i=0; $i < $jumlah; $i++) { 
					                        	$where['id'] = $author[$i];
					                        	$variable = $this->User_model->getSelectedData('author',$where);
					                        	foreach ($variable as $key => $value) {
					                        		echo $value->nama;
					                        	}
					                        	echo ", ";
					                        }
					                        ?>	
					                        </td>
					                        <td><?php echo substr($sinopsis,0,100); 
					                        $jumlah = strlen($sinopsis);
					                        if($jumlah>100){
					                        	echo "...... <a href='".site_url('Buku/detail/'.$id_buku)."'>[read more]</a>";
					                        }
					                        else{
					                        	echo "";
					                        }
					                        ?></td> 
					                        <td style="text-align: center">
					                        <a href="<?php echo site_url('Buku/detail/'.$id_buku)?>" class="btn btn-mini" title="detail"><i class="fa fa-eye"></i></a>                                          
					                        <a href="<?php echo site_url('Buku/ubah/'.$id_buku)?>" class="btn btn-mini" title="ubah"><i class="fa fa-pencil"></i></a>                                          
					                        <a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Buku/hapus_sementara/'.$id)?>" class="btn btn-mini" title="hapus"><i class="fa fa-trash"></i></a>           
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