<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/chosen.css');?>">
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/chosen.jquery.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.knob.js');?>"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.css">

 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.js"></script>


		<script type="text/javascript" src="<?=base_url('assets/js/fuelux/fuelux.spinner.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/date-time/bootstrap-datepicker.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/date-time/bootstrap-timepicker.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/date-time/moment.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/date-time/daterangepicker.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/date-time/bootstrap-datetimepicker.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-colorpicker.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.autosize.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.inputlimiter.1.3.1.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.maskedinput.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-tag.js');?>"></script>
							<h1>
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Tambah Data Buku
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		<div class="col-sm-12">
			<!-- #section:elements.tab -->
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#baru">
							<i class="green ace-icon fa fa-plus"></i>
								Buku Baru
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#lama">
							Buku Lama
							<i class="green ace-icon fa fa-refresh"></i>
						</a>
					</li>
				</ul>

				<div class="tab-content">
					<div id="baru" class="tab-pane fade in active">
						<div class="alert alert-block alert-success">
														Catatan
														<br/>
														<strong class="red">* </strong>Ukuran maksimal file buku/dokumen adalah 10MB
														<br/>
														<strong class="blue">* </strong>Ekstensi dokumen yang diizinkan adalah .pdf
														<br/>
														<strong class="black">* </strong>Format gambar yang diizinkan adalah gif, jpg, png, jpeg, dan bmp
														<br/>
														<strong class="green">
														*
														</strong>
														Jika dokumen/buku yang diterbitkan di beberapa edisi maka penulisannya sebagai berikut "Judul Buku (Edisi Kesekian)"
						</div>
							<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/simpan_buku'); ?>" method="post" enctype='multipart/form-data'>
															<!-- #section:elements.form -->
														<h4>Kategori</h5>
														<div class="input-xlarge">
										                <div class="input-group">
										                <span class="input-group-addon"><i class="fa fa-book"></i></span>
										                <select class='form-control' name="kategori" id="kategori">
										                <option value=''>--Pilih--</option>
										                <?php
										                    $no=1;
										                    foreach($data_kategori as $content)
										                    {
										                        foreach ($content as $key => $value ) {
										                        $$key=$value;
										                    }
										                ?>											                
										                <option value="<?php echo $kode_kategori; ?>"><?php echo $nama_kategori; ?></option>
											            <?php
											        	}
											            ?>
										                </select>
										                </div>
										                </div>

										                <h4>Penulis</h5>
														<div class="input-xlarge">
										                <div class="input-group">
										                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
										                <select id="tokens" class="selectpicker form-control" multiple data-live-search="true">
														      <option data-tokens="first">I actually am called "one"</option>
														      <option data-tokens="second">And me "two"</option>
														      <option data-tokens="last">I am "three"</option>
														</select>
										            	</div>
										        		</div>
										               										               										               
											            <h4>Judul Buku<strong class="green"> *</strong></h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
											                    <input name="nama_buku" type="text" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Jumlah Halaman</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
											                    <input name="halaman" type="text" onkeyup="validAngka(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Nama Penulis</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											                    <input name="penulis" type="text" onkeyup="validHuruf(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Penerbit</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
											                    <input name="penerbit" type="text" maxlength="50" class="col-xs-10 col-sm-5" required>
											                </div>

											            <h4>Tanggal Terbit</h5>
											            	<div class="input-xlarge">
											                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										                    <input name="tanggal_terbit" type="date" class="form-control" required="">
										                    </div>
										                    </div>

											            <h4>Sinopsis</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
											                    <textarea name="sinopsis" type="text" class="col-xs-10 col-sm-5" required></textarea>
											                </div>
														
											            <h4>File Buku/Dokumen <strong class="red">*</strong><strong class="blue"> *</strong></h4> 

										                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
										                    <input name="file_dokumen" type="file" class="form-control">
										                </div>

										                <h4>Gambar Cover Depan <strong class="red">*</strong><strong class="black"> *</strong></h4> 

										                <div class="input-group">
										                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
										                    <input name="file_cover" type="file" class="form-control">
										                </div>
										                <br>
										                <div class="input-group">
															<label>
																<input name="switch-field-1" class="ace ace-switch ace-switch-6" onclick="enable_text(this.checked)" type="checkbox" checked>
																<span class="lbl">&nbsp;Jika tidak ada bentuk fisiknya silahkan hilangkan centang bagian ini</span>
															</label>
														</div>
													
														<h4>Stok</h5>

											                <div class="input-group">
											                    <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
											                    <input name="stok" id="stok" type="text" onkeyup="validAngka(this)" maxlength="5" class="col-xs-10 col-sm-5">
											                </div>

															<div class="clearfix form-actions">
																<div class="col-md-offset-4 col-md-10">
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
															</div>
							</form>
					</div>
					<div id="lama" class="tab-pane fade">
						<div class="alert alert-block alert-success">
														Catatan
														<br/>
														<strong class="red">* </strong>Buku yang bisa ditambahkan hanya yang mempunyai bentuk fisik
						</div>
						<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Buku/tambah_stok'); ?>">
				            <div class="form-group">
				                        <label class="control-label col-xs-2">Kategori Buku</label>
				                        <div class="col-md-9 col-sm-9 col-xs-12">
					                        <div class="input-group">
					                          <span class="input-group-addon"><i class="fa fa-book"></i></span>
					                          <select class="form-control" id="kategori_buku" name="kategori_buku">
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
					                                      Stok :
					                                    </li>
					                            </ul> 
					                         </div>
					                        </div>
				                      	</div>  
				            </div>
				                                      
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
					</div>
				</div>
			</div>
			<!-- /section:elements.tab -->
		</div><!-- /.col -->
<script type="text/javascript">
	$("input:checkbox").click(function() {
    $("#stok").attr("disabled", !this.checked); 
});
</script>

<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[0-9]+$/.test(a.value))
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
    $(function () {
        $("#submit").click(function () {
            var kategori = $("#kategori");
            if (kategori.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Harap pilih kategori!");
                return false;
            }
            return true;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#kategori_buku").change(function(){
            var kategori = $("#kategori_buku").val();
            var modul = 'kategori';
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('Buku/ambil_data'); ?>",
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
                url : "<?php echo base_url('Buku/ambil_data'); ?>",
                data: { id:buku, modul:modul },
                cache:false,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });

    })
    
</script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>