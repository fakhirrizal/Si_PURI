<!-- /section:settings.box -->
<div class="page-header">
	<h1>
		Dashboard
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>

			<i class="ace-icon fa fa-check green"></i>

			Selamat Datang
			<!-- <strong class="green">
				di
				<small>(v1.3.3)</small>
			</strong>, -->
			di Aplikasi Si-PURI
		</div>
		<div class="row">
			<div class="col-md-12 infobox-container">
				<!-- #section:pages/dashboard.infobox -->
				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-book"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= number_format(count($data_buku)); ?></span>
						<div class="infobox-content">Total Buku</div>
					</div>

					<!-- #section:pages/dashboard.infobox.stat -->
					<!-- <div class="stat stat-success">8%</div> -->

					<!-- /section:pages/dashboard.infobox.stat -->
				</div>

				<div class="infobox infobox-blue">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-list"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= count($data_kategori); ?></span>
						<div class="infobox-content">Total Kategori Buku</div>
					</div>

					<!-- <div class="badge badge-success">
						+32%
						<i class="ace-icon fa fa-arrow-up"></i>
					</div> -->
				</div>

				<div class="infobox infobox-pink">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-user"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= count($data_author); ?></span>
						<div class="infobox-content">Total Author</div>
					</div>
					<!-- <div class="stat stat-important">4%</div> -->
				</div>

				<div class="infobox infobox-red">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-users"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= count($data_anggota); ?></span>
						<div class="infobox-content">Total Anggota</div>
					</div>
				</div>

				<div class="infobox infobox-orange2">
					<!-- #section:pages/dashboard.infobox.sparkline -->
					<div class="infobox-chart">
						<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas></span>
					</div>

					<!-- /section:pages/dashboard.infobox.sparkline -->
					<div class="infobox-data">
						<span class="infobox-data-number"><?= count($data_peminjaman); ?></span>
						<div class="infobox-content">Total Peminjaman</div>
					</div>

					<!-- <div class="badge badge-success">
						7.2%
						<i class="ace-icon fa fa-arrow-up"></i>
					</div> -->
				</div>

				<!-- <div class="infobox infobox-blue2">
					<div class="infobox-progress">
						<div class="easy-pie-chart percentage" data-percent="42" data-size="46" style="height: 46px; width: 46px; line-height: 45px;">
							<span class="percent">42</span>%
						<canvas height="46" width="46"></canvas></div>
					</div>

					<div class="infobox-data">
						<span class="infobox-text">traffic used</span>

						<div class="infobox-content">
							<span class="bigger-110">~</span>
							58GB remaining
						</div>
					</div>
				</div> -->

				<!-- /section:pages/dashboard.infobox -->
				<div class="space-12"></div>
				<!-- <h2>User paling aktif</h2> -->
				<!-- #section:pages/dashboard.infobox.dark -->
				<?php
				foreach ($peminjaman_terbanyak as $key => $value) {
					if($value->jumlah==0){
						echo '';
					}
					else{
				?>
				<!-- <div class="infobox infobox-green infobox-small infobox-dark" style='height: 200px;width: 500px'>
					<div class="infobox-progress">
						<div class="easy-pie-chart percentage" data-percent="61" data-size="39" style="height: 39px; width: 39px; line-height: 38px;">
							<span class="percent">61</span>%
						<canvas height="39" width="39"></canvas></div>
					</div>
					<div class="infobox-icon">
						<i class="ace-icon fa fa-user"></i>
					</div>
					<div class="infobox-data">
						<div class="infobox-content"><?= $value->nama; ?></div>
						<div class="infobox-content"><?= $value->jumlah.'x pinjam'; ?></div>
					</div>
				</div> -->
				<?php } }?>
				<!-- <div class="infobox infobox-blue infobox-small infobox-dark">
					<div class="infobox-chart">
						<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
					</div>
					<div class="infobox-icon">
						<i class="ace-icon fa fa-user"></i>
					</div>
					<div class="infobox-data">
						<div class="infobox-content">Earnings</div>
						<div class="infobox-content">$32,000</div>
					</div>
				</div>

				<div class="infobox infobox-grey infobox-small infobox-dark">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-user"></i>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Downloads</div>
						<div class="infobox-content">1,205</div>
					</div>
				</div> -->

				<!-- /section:pages/dashboard.infobox.dark -->
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter">
							<i class="ace-icon fa fa-asterisk orange"></i>
							Buku di bawah stok (5 buah)
						</h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>
											<i class="ace-icon fa fa-caret-right blue"></i>Nama Buku
										</th>

										<th>
											<i class="ace-icon fa fa-caret-right blue"></i>Stok
										</th>

										<th class="hidden-480">
											<i class="ace-icon fa fa-caret-right blue"></i>Kategori Buku
										</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($limit_stok as $key => $row) {
									?>
									<tr>
										<td><?= $row->nama_buku; ?></td>

										<td>
											<b class="blue"><?= $row->stok.' buah'; ?></b>
										</td>

										<td class="hidden-480">
											<span class="label label-warning arrowed arrowed-right"><?= $row->nama_kategori; ?></span>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div><!-- /.widget-main -->
					</div><!-- /.widget-body -->
				</div><!-- /.widget-box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
		<!-- #section:custom/extra.hr -->
		<div class="hr hr32 hr-dotted"></div>