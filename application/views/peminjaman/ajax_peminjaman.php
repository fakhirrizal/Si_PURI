														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th class="hidden-xs">Tanggal Kembali</th>
																	<th class="hidden-480">Jumlah</th>
																	<th class="hidden-480">Keterangan</th>
																</tr>
															</thead>

															<tbody>
																<?php
																$no = 1;
																	foreach ($data_pengembalian as $key => $value) {
																?>
																<tr>
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $value->tanggal_kembali; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $value->jumlah; ?> </td>
														
																	<?php
																			$tanggal1 = new DateTime($tanggal_pinjam);
																			$tanggal2 = new DateTime($value->tanggal_kembali);
																			 
																			$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
																			if($perbedaan>$max){
																				echo "<td>Telat ".$perbedaan." hari.</td>";
																			}
																			else{
																				echo "<td>Tepat waktu.</td>";
																			}
																
																echo "</tr>";
																	}
																?>
															</tbody>
														</table>