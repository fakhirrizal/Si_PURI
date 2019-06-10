<script src="<?=base_url('assets/js/jquery.validate.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript">
    $(function () {
        $("#submit2").click(function () {
            var peminjam = $("#peminjam");
            if (peminjam.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Harap pilih anggota yang akan minjam!");
                return false;
            }
            return true;
        });
    });
</script>
<script type="text/javascript">
 window.onload = function () {
  document.getElementById("pw1").onchange = validatePassword;
  document.getElementById("pw2").onchange = validatePassword;
 }
 function validatePassword(){
  var pass2=document.getElementById("pw2").value;
  var pass1=document.getElementById("pw1").value;
  if(pass1!=pass2)
   document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Harap Ulangi Lagi");
  else
  document.getElementById("pw2").setCustomValidity('');
 }
</script>
<div class="page-header">
							<h1>
								Peminjaman
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Tambah Data Peminjaman Buku
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
<div class="alert alert-block alert-success">
									Catatan
									<br/>
									<strong class="red">* </strong>Isi keterangannya
</div>
<div class="error">
<?= validation_errors() ?>
<?= $this->session->flashdata('error') ?>
<?= $this->session->flashdata('sukses') ?>
</div>


<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Peminjaman/simpan'); ?>">
            <div class="form-group">
                        <label class="control-label col-xs-2">Kategori Buku</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                        <div class="input-group">
	                          <span class="input-group-addon"><i class="fa fa-book"></i></span>
	                          <select class="form-control" id="kategori" name="kategori">
	                            <option value="">Pilih Kategori</option>
	                            <?php
	                            foreach ($data_kategori as $key => $value) {
	                            ?>
	                            <option value="<?php echo $value->kode_kategori ?>"><?php echo $value->nama_kategori ?></option>
	                            <?php                              
	                            }
	                            ?>
	                          </select>
	                        </div>
                        </div>
            </div>
            <div class="form-group" >
                        <label class="control-label col-xs-2">Nama Buku</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-book"></i></span>
                          <select class="form-control" id="buku" name="buku">
                            <option>--Pilih Buku--</option>
                          </select>
                        </div>
                        </div>
            </div> 
            <div id="detail">
                      	<div class="form-group">
	                        <label class="control-label col-xs-2"></label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                         <div class="input-group">
	                            <ul class="list-unstyled">
	                                    <li>
	                                      <i class="ace-icon fa fa-caret-right blue"></i>
	                                      Jumlah Halaman :
	                                    </li>

	                                    <li>
	                                      <i class="ace-icon fa fa-caret-right blue"></i>
	                                      Penulis :
	                                    </li>

	                                    <li>
	                                      <i class="ace-icon fa fa-caret-right blue"></i>
	                                      Penerbit :
	                                    </li>

                                        <li>
                                          <i class="ace-icon fa fa-caret-right blue"></i>
                                          Keterangan :
                                        </li>
	                            </ul> 
	                         </div>
	                        </div>
                      	</div>  
            </div>
<!-- 
<div class="form-group">
                        <label class="control-label col-xs-2">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="pw1" placeholder="Password"/>
                         </div>
                        </div>
</div>
<div class="form-group">
                        <label class="control-label col-xs-2">Repeat Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="pw2" placeholder="Repeat Password"/>
                         </div>
                        </div>
</div>    
-->
            <div class="ln_solid"></div>
                     
            <div class="form-group" >
                        <label class="control-label col-xs-2"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button class="btn btn-white btn-default btn-round">
								<i class="ace-icon fa fa-plus"></i>
								<a type="submit" id="submit">Tambah</a>
						  </button>
						  &nbsp; &nbsp; &nbsp;
																	<button class="btn btn-white btn-default btn-round" type="reset">
																		<i class="ace-icon fa fa-undo"></i>
																		Reset
																	</button>
                        </div>
            </div>
</form>
			
<?php
if(!empty($this->cart->contents())){
?>
<hr/>
<table class="table table-bordered table-striped" id="myTable" width="70%">
				                    <thead>
				                      <tr>
				                        <th style="text-align: center" width="8%">No</th>
				                        <th style="text-align: center" width="16%">Kode Buku</th>
				                        <th style="text-align: center" width="60%">Buku</th>
				                        <th style="text-align: center" width="10%">Jumlah</th>
				                        <th style="text-align: center">Aksi</th>
				                      </tr>
				                    </thead>
                    				<tbody>
                   
				                    <?php $i=1; $no=1;?>

				                    <?php foreach($this->cart->contents() as $items): ?>
				                        <?php echo form_hidden('rowid[]', $items['rowid']); ?>

				                        <tr class="gradeX">
				                            <td><?php echo $no; ?></td>
				                            <td><?php echo $items['id']; ?></td>
				                            <td><?php echo $items['name']; ?></td>
				                            <td><?php echo $items['qty']; ?></td>
				                            <td>
				                                <a class="btn btn-white btn-denger btn-round delbutton" href="#" class="delbutton"
				                                   id="<?php echo $items['rowid']; ?>">
				                                    <i class="ace-icon fa fa-trash"></i> Hapus </a>
				                            </td>
				                        </tr>

				                        <?php $i++; $no++;?>
				                    <?php endforeach; ?>
				                    </tbody>
</table>
<?php
}
else{
	echo "";
}
?>
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
<?php
if(!empty($this->cart->contents())){
?>
<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Peminjaman/pinjam_buku'); ?>">
<br/>
			<div class="form-group">
                        <label class="control-label col-xs-2">Kode Peminjaman</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            <input name="kode_peminjaman" class="form-control" value="<?php echo $kode_peminjaman; ?>" readonly>
                        </div>
                        </div>
            </div>
            <div class="form-group">
                        <label class="control-label col-xs-2">Nama Peminjam</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <select class="form-control" name="peminjam" id="peminjam">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($data_peminjam as $key => $value) {
                            ?>
                            <option value="<?php echo $value->no_anggota ?>"><?php echo $value->nama ?></option>
                            <?php                              
                            }
                            ?>
                          </select>
                        </div>
                        </div>
            </div>
            <div id="status">
			<div class="form-group">
                        <strong class="red">* </strong>Keterangan :
            </div>
			<div class="form-group" >
                        <label class="control-label col-xs-2"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button class="btn btn-white btn-default btn-round" type="submit" id="submit2">
							<i class="ace-icon fa fa-save"></i>
								Simpan
						  </button>
						  &nbsp; &nbsp; &nbsp;
						  <button class="btn btn-white btn-default btn-round">
							<i class="ace-icon fa fa-undo"></i>
								<a href="Peminjaman/remove">Hapus Semua</a>
						  </button>
                        </div>
            </div> 
            </div>
</form>
<?php
}
else{
	echo "";
}
?>

												<!--<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" id="hidup" class="ace">
														<span class="lbl"> Hidup </span>
													</label>
												</div>
												<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" id="mati" class="ace">
														<span class="lbl"> Mati </span>
													</label>
												</div>

<div id="coba">Status : </div>-->
<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[1-8]+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>    

<script language='javascript'>
                    function validHuruf(a)
                    {
                        if(!/^[a-z, A-Z.']+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#kategori").change(function(){
            var kategori = $("#kategori").val();
            var modul = 'kategori';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Peminjaman/ambil_data'); ?>",
                data: { id:kategori, modul:modul },
                cache:false,
                success: function(data){
                    $('#buku').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

        $("#buku").change(function(){
            var buku = $("#buku").val();
            var modul = 'buku';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Peminjaman/ambil_data'); ?>",
                data: { id:buku, modul:modul },
                cache:false,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });

        $("#peminjam").change(function(){
            var peminjam = $("#peminjam").val();
            var modul = 'peminjam';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Peminjaman/ambil_data'); ?>",
                data: { id:peminjam, modul:modul },
                cache:false,
                success: function(data){
                    $('#status').html(data);
                }
            });
        });

        $("#hidup").change(function(){
            var modul = 'hidup';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Peminjaman/ambil_data'); ?>",
                data: { modul:modul },
                cache:false,
                success: function(data){
                    $('#coba').html(data);
                }
            });
        });

        $("#mati").change(function(){
            var mati = $("#mati").val();
            var modul = 'mati';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Peminjaman/ambil_data'); ?>",
                data: { id:mati, modul:modul },
                cache:false,
                success: function(data){
                    $('#coba').html(data);
                }
            });
        });

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                	type: "POST",
                    url: "<?php echo base_url(); ?>Peminjaman/hapus",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });

    })
</script>