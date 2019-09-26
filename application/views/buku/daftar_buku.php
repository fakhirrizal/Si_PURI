<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
<script language="JavaScript">
            function selectAll(source) {
              checkboxes = document.getElementsByName('cetak[]');
              for(var i in checkboxes)
                checkboxes[i].checked = source.checked;
            }
        </script>
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
	<form action="<?php echo base_url().'Buku/cetakall' ?>" name="forminput" id="forminput" method="get">
		<table class="table table-bordered table-striped" id="myTable">
			<thead>
				<tr>
				<th style="text-align: center" width="4%"><input type="checkbox" id="selectall" onClick="selectAll(this)" class="md-check"></th>
				<th style="text-align: center" width="4%">No</th>
				<th style="text-align: center" width="16%">Judul Buku</th>
				<th style="text-align: center" width="11%">Penerbit</th>
				<th style="text-align: center" width="13%">Pengarang</th>
				<th style="text-align: center" width="42%">Sinopsis</th>
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
					<td style="text-align: center"><input type="checkbox" class="cek" id="cetak" name="cetak[]" value="<?php echo $id_buku; ?>"></td>
					<td style="text-align: center"><?= $no++."."; ?></td>
					<td><?php echo $nama_buku; ?></td>
					<td><?php echo $penerbit; ?></td>
					<td>
					<?php
					$author = explode(',',$penulis);
					if($penulis==NULL){
						echo'';
					}else{
						$jumlah = count($author);
						for ($i=0; $i < $jumlah; $i++) { 
							$where['id'] = $author[$i];
							$variable = $this->User_model->getSelectedData('author',$where);
							foreach ($variable as $key => $value) {
								echo $value->nama;
							}
							echo ", ";
						}
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
			<tr class="gradeX" >
				<td colspan="7">
					<input type="button" onclick="cek(this.form.cetak)" value="Select All" style="background: #00A65A; padding: 10px; color: #fff; border-radius: 10%; border: #00A65A;"/>
					<input type="button" onclick="uncek(this.form.cetak)" value="Clear All" style="background: #00A65A; padding: 10px; color: #fff; border-radius: 10%; border: #00A65A;"/>
					<input type="submit" value="Cetak" id="btn1" style="background: #00A65A; padding: 10px; color: #fff; border-radius: 10%; border: #00A65A;">
				</td>
			</tr>
		</table>
	</form>
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
	function cek(cetak){
		for(i=0; i < cetak.length; i++){
			cetak[i].checked = true;
		}
	}
	function uncek(cetak){
		for(i=0; i < cetak.length; i++){
			cetak[i].checked = false;
		}
	}
</script>
<script type="text/javascript">
    $('#btn1').click(function(){
      $('#forminput').attr('action', '<?php echo base_url();?>Buku/cetakall');
      $('#forminput').submit();
    });
</script>