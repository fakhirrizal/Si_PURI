
<div class="page-header">
							<h1>
								Peminjaman
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Syarat dan Ketentuan
								</small>
							</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		<div class="col-sm-12">
			<!-- #section:elements.tab -->
			<div class="tab-content">
					<div id="baru" class="tab-pane fade in active">
						<div class="alert alert-block alert-success">
						<?php
						$hari = '';
						$buku = '';
						$denda = '';
						foreach ($syarat_dan_ketentuan as $key => $value) {
							if($value->menu=='buku'){
								$buku = $value->keterangan;
							}elseif($value->menu=='peminjaman'){
								$hari = $value->keterangan;
							}elseif($value->menu=='denda'){
								$denda = $value->keterangan;
							}
						}
						?>
														<b>Berikut adalah syarat dan ketentuan yang berlaku dalam peminjaman buku</b>
														<br/>
														<strong class="red">* </strong>Peminjaman maksimal hanya <?= $buku; ?> buku
														<br/>
														<strong class="red">* </strong><?= $hari; ?> Hari adalah maksimal peminjaman buku, jika lebih dari itu akan dikenakan denda
														<br/>
														<strong class="red">* </strong>Denda keterlambatan pengembalian buku/ hari sebesar Rp. <?= number_format($denda,2); ?>
														<br/>
														<strong class="red">
														*
														</strong>
						</div>
					</div>
			</div>
			<!-- /section:elements.tab -->
		</div><!-- /.col -->