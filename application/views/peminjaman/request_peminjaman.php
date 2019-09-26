<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript">
	$(function () {
		$("#cetak_belakang").click(function () {
			var jumlah = $("#jumlah");
			if (jumlah.val() == "") {
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
			Request Peminjaman Buku
		</small>
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="col-sm-12">
            <?= $this->session->flashdata('sukses') ?>
            <?= $this->session->flashdata('gagal') ?>
			<table class="table table-bordered table-striped" id="myTable">
				<thead>
					<tr>
						<th style="text-align: center" width='4%'>No</th>
						<th style="text-align: center">Anggota</th>
                        <th style="text-align: center">Buku</th>
                        <th style="text-align: center">Tanggal</th>
						<th style="text-align: center">Status</th>
						<th style="text-align: center" width='4%'>Aksi</th>
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
                    $gettanggal = explode(' ',$created_date);
                    ?>
					<tr class="gradeX">
						<td style="text-align: center"><?= $no++."."; ?></td>
						<td><?php echo $nama; ?></td>
						<td><?php echo $nama_buku; ?></td>
                        <td style="text-align: center"><?php echo $this->Main_model->convert_tanggal($gettanggal[0]); ?></td>
                        <td style="text-align: center"><?php
                        if($status=='0'){
                            echo'<span class="label label-warning arrowed arrowed-right">Belum Ditanggapi</span>';
                        }else{
                            echo'<span class="label label-success arrowed arrowed-right">Sudah Ditanggapi</span>';
                        }?></td>
						<td style="text-align: center">
                            <a class="btn btn-mini ubahdata" data-toggle="modal" data-target="#ubahdata" id="<?= md5($id_request_peminjaman); ?>" title="Tanggapi Request"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
					<?php
                        }
                    ?>
				</tbody>
			</table>
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
        <div class="modal fade" id="ubahdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Tanggapan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" id='formubahdata' >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    type:"POST",
                    url: "<?php echo site_url(); ?>Perpustakaan/ajax_function",
                    cache: false,
                });
                $('.ubahdata').click(function(){
                var id = $(this).attr("id");
                var modul = 'modul_tanggapan_request_peminjaman';
                $.ajax({
                    data: {id:id,modul:modul},
                    success:function(data){
                    $('#formubahdata').html(data);
                    $('#ubahdata').modal("show");
                    }
                });
                });
            });
        </script>