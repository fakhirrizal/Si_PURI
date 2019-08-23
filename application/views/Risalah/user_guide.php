<div class="invoice-content-2 bordered">
	<br>
	<div class="row invoice-body">
		<div class="col-xs-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="invoice-title uppercase">Menu Input Risalah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align: center;">
							<img src="<?=base_url('assets3/images/logo_risalah.png');?>" width='150' alt='Risalah'/>
							<!-- <h3>Sistem Informasi Risalah</h3> -->
							<p style="text-align: justify;"> Di menu ini pengguna (dalam hal ini Administrator) dihadapkan dengan form input untuk menambahkan data risalah baru, semua kolom yang tersedia wajib diisi. Untuk mengarsipkan dokumen terkait antara lain file audio file dokumen dan file foto harus dilihat berapa besar file sehingga dapat masuk ke sistem, itu dikarenakan keterbatasan kapasitas dari sistem yang ada. </p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row invoice-body">
		<div class="col-xs-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="invoice-title uppercase">Daftar Risalah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align: center;">
							<!-- <h3>Sistem Informasi Risalah</h3> -->
							<p style="text-align: justify;"> Disini rekapan risalah yang telah diinput oleh administrator akan dimunculkan semua, per halaman dibatasi 10 data yang akan ditampilkan. Dari masing-masing baris tersedia 3 aksi untuk melakukan detail data, ubah data dan hapus data. </p>
							<div class="tab-pane active" id="tab_actions_pending">
								<div class="mt-actions">
									<div class="mt-action">
										<div class="mt-action-body">
											<div class="mt-action-row">
												<div class="mt-action-info ">
													<div class="mt-action-icon ">
														<i class="icon-eye"></i>
													</div>
													<div class="mt-action-details "  style="text-align: justify;">
														<span class="mt-action-author">Lihat Detail Data</span>
														<p class="mt-action-desc">Ketika pengguna meng-klik icon ini, maka akan diarahkan ke halaman yang berisi detail data risalah, bisa mendengarkan file suara yang sebelumnya telah dimasukkan, bisa membaca dokumen yang disediakan dan dapat melihat galeri foto yang dimasukkan ke detail risalah yang dipilih.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-action">
										<div class="mt-action-body">
											<div class="mt-action-row">
												<div class="mt-action-info ">
													<div class="mt-action-icon ">
														<i class="icon-wrench"></i>
													</div>
													<div class="mt-action-details " style="text-align: justify;">
														<span class="mt-action-author">Ubah Data</span>
														<p class="mt-action-desc">Form ubah data sangat penting ketika pengguna ada kesalahan dalam memasukkan data. </p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-action">
										<div class="mt-action-body">
											<div class="mt-action-row">
												<div class="mt-action-info ">
													<div class="mt-action-icon ">
														<i class=" icon-trash"></i>
													</div>
													<div class="mt-action-details "  style="text-align: justify;">
														<span class="mt-action-author">Hapus Data</span>
														<p class="mt-action-desc">Sebelum benar-benar menghapus data suatu risalah, pengguna akan diberikan konfirmasi terlebih dahulu apakah akan menghapus atau membatalkannya, fungsi ini diberikan ketika pengguna tidak sengaja akan menghapus data risalah. Namun ketika telah benar-benar data risalah itu tidak dibutuhkan dan mengurangi beban sistem maka pilihan "Ya" dalam kotak konfirmasi tersebut akan menjalankan fungsi hapus data.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>