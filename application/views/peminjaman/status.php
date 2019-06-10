<?php
foreach ($total_peminjaman as $key => $value) {
if(empty($value->total)){
?>
<div class="form-group">
						<strong class="red">* </strong>Keterangan : Tidak ada tanggungan peminjaman buku.

                        
</div>
<div class="form-group" >
                        <input type="hidden" name="sudah_pinjam" value="<?php echo $value->total; ?>">
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
<?php
}
elseif($value->total>=$max){
?>
<div class="form-group">
						<strong class="red">* </strong>Keterangan : Sudah masuk batas maksimal peminjaman.
</div>
<div class="form-group" >
                        <label class="control-label col-xs-2"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button class="btn btn-white btn-default btn-round" disabled>
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
<?php
}
else{
?> 
<div class="form-group">
                        <strong class="red">* </strong>Keterangan : Masih meminjam buku sebanyak <?php echo $value->total." buah."; ?>
</div>
<div class="form-group" >
						<input type="hidden" name="sudah_pinjam" value="<?php echo $value->total; ?>">
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
<?php
}
}
?>