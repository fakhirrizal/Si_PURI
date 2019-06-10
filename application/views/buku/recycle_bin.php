
<link rel="stylesheet" href="<?=base_url('assets/css/colorbox.css');?>" />
						<div class="page-header">
							<h1>
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Recycle Bin
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix">
										

										<!-- /section:pages/gallery -->

										<!-- #section:pages/gallery.caption -->
										<?php
										foreach ($variable as $key => $value) {
										?>
										<li>
											<?php

											$q = "SELECT * from file where keterangan='gambar' and id_buku='".$value->id_buku."'";
											$gambar = $this->User_model->manualQuery($q)->result();
											
											if(empty($gambar)){
											?>
											<a href="<?=base_url()?>assets/uploads/noimage.jpg" data-rel="colorbox" class="cboxElement">
												<img width="110" height="150" src="<?=base_url()?>assets/uploads/noimage.jpg">
												<div class="text">
													<div class="inner"><?= $value->nama_buku; ?></div>
												</div>
											</a>
											
											<?php
											}
											else{
												foreach ($gambar as $key => $row) {
											?>
											<a href="<?=base_url()?>assets/uploads/<?=$row->nama_file;?>" data-rel="colorbox" class="cboxElement">
												<img width="110" height="150" src="<?=base_url()?>assets/uploads/<?=$row->nama_file;?>">
												<div class="text">
													<div class="inner"><?= $value->nama_buku; ?></div>
												</div>
											</a>
											<?php
												}
											}
											?>
											<div class="tools tools-bottom">
												
												<a href="<?php echo site_url('Buku/restore/'.$value->id)?>">
													<i class="ace-icon fa fa-refresh" title="restore"></i>
												</a>

												<a onclick="return confirm('Anda yakin?')" href="<?php echo site_url('Buku/hapus/'.$value->id_buku)?>">
													<i class="ace-icon fa fa-trash red" title="hapus permanen"></i>
												</a>
											</div>
										</li>
										<?php
											}
										?>										
									</ul>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div>
<script src="<?=base_url('assets/js/jquery.colorbox.js');?>" type="text/javascript"></script>
<script type="text/javascript">
			jQuery(function($) {
	var $overflow = '';
	var colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
   });
})
</script>