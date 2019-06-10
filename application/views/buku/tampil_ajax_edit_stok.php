<?php
foreach ($variable as $key => $value) {
?>
														<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/tambah_stok'); ?>" method="post" >
															<!-- #section:elements.form -->
														<h4>Jumlah</h4>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
											                    <input name="stok" type="text" onkeyup="validAngka(this)" maxlength="2" class="form-control">
											                    <input name="id" type="hidden" value="<?= $value->id_buku; ?>">
											                    <input name="stok_lama" type="hidden" value="<?= $value->stok; ?>">
											                </div>

											          

											          

											           
											              	
											              	<br>

															<div class="modal-footer" style="text-align: center;">								
																	<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
																		<i class="ace-icon fa fa-check-square-o"></i>
																		Submit
																	</button>

																	&nbsp; &nbsp; &nbsp;
																	<button class="btn btn-white btn-default btn-round" type="reset">
																		<i class="ace-icon fa fa-undo"></i>
																		Reset
																	</button>
															</div>
														</form>
<?php
}
?>
<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[0-9]+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>    