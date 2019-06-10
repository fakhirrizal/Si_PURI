
<?php
$sisa = "";
foreach ($data_buku as $key => $value) {
  $stok = $value->stok;
?>

                            <input type="hidden" name="stok" value="<?php echo $stok; ?>">
                            <input type="hidden" name="nama_buku" value="<?php echo $value->nama_buku; ?>">
                      <div class="form-group">
                        <label class="control-label col-xs-2"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <ul class="list-unstyled">
                                    <li>
                                      <i class="ace-icon fa fa-caret-right blue"></i>
                                      <?php echo "Jumlah Halaman : ".$value->halaman; ?>
                                    </li>

                                    <li>
                                      <i class="ace-icon fa fa-caret-right blue"></i>
                                      <?php echo "Penulis : ".$value->penulis; ?>
                                    </li>

                                    <li>
                                      <i class="ace-icon fa fa-caret-right blue"></i>
                                      <?php echo "Penerbit : ".$value->penerbit; ?>
                                    </li>
                                    <?php
                                    foreach ($buku_sisa as $key => $nilai) {
                                      $buku_yg_dipinjam = $nilai->sisa;
                                      $sisa = $stok-$buku_yg_dipinjam;
                                    ?>
                                    <li>
                                      <i class="ace-icon fa fa-caret-right blue"></i>
                                      <?php echo "Keterangan : Buku yang tersedia untuk dipinjam sebanyak ".$sisa." buah"; ?>
                                    </li>
                                    <?php
                                    }
                                    ?>
                            </ul> 
                         </div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-xs-2">Jumlah</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                            <input type="hidden" name="sisa" value="<?php echo $sisa; ?>">
                            <input onkeyup="validAngka(this)" name="jumlah" class="form-control" maxlength="1" placeholder="Masukkan dalam bentuk angka" required>
                         </div>
                        </div>
                      </div>   

                      
<?php
}
?>