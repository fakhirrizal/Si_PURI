<?php
foreach ($data_author as $key => $value) {
?>
														<form class="form-horizontal" role="form" action="<?php echo site_url('Author/ubah'); ?>" method="post" enctype='multipart/form-data'>
															<!-- #section:elements.form -->
														<h4>Nama Author </h4>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											                    <input name="nama" type="text" onkeyup="validHuruf(this)" maxlength="50" class="form-control" required value="<?= $value->nama; ?>">
											                    <input name="id" type="hidden" value="<?= $value->id; ?>">
											                </div>

											            <h4>Tanggal Lahir</h5>

											            <div class="input-group">
									                    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									                    	<input name="tanggal_lahir" type="date" class="form-control" value="<?= $value->tanggal_lahir ?>">
									                    </div>

											            <h4>Asal</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
											                    <input name="asal" type="text" onkeyup="validHuruf(this)" maxlength="50" class="form-control" value="<?= $value->asal; ?>">
											                </div>

											            <h4>Tipe Author </h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											                    <select name="tipe" class="form-control" id="tipe">
											                    	<?php
											                    	if($value->tipe=='p'){
											                        	echo '<option value="p">Personal Name</option>';
											                        }
											                        elseif($value->tipe=='o'){
											                        	echo '<option value="o">Organizational Body</option>';
											                        }
											                        else{
											                        	echo '<option value="c">Conference</option>';
											                        }
											                    	?>
											                    	<option value="">--Pilih--</option>
											                    	<option value="p">Personal Name</option>
																	<option value="o">Organizational Body</option>
																	<option value="c">Conference</option>
											                    </select>
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
                    function validHuruf(a)
                    {
                        if(!/^[a-z, A-Z.']+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>