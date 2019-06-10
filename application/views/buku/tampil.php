<?php
foreach ($data_buku as $key => $value) {
?>
                            <input type="hidden" name="stok_lama" value="<?php echo $value->stok; ?>">
                      <div class="form-group">
                        <label class="control-label col-xs-2"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <ul class="list-unstyled">
                                    <li>
                                      <i class="ace-icon fa fa-caret-right blue"></i>
                                      <?php echo "Stok : ".$value->stok; ?>
                                    </li>
                            </ul> 
                         </div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-xs-2">Jumlah</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                            <input onkeyup="validAngka(this)" name="jumlah" class="form-control" maxlength="3" placeholder="Masukkan dalam bentuk angka" required>
                         </div>
                        </div>
                      </div>    
                      
<?php
}
?>