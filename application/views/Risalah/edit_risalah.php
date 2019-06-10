                           
                            
                            <!-- END PAGE BAR -->
                            <!-- BEGIN PAGE TITLE-->
                            <h3 class="page-title"> Form Input
                                <small>data risalah</small>
                            </h3>
                            <!-- END PAGE TITLE-->
                            <!-- END PAGE HEADER-->
                                <div class="portlet-title">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Catatan</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li> The maximum file size for uploads in this demo is
                                                    <strong>8 MB</strong> (default file size is unlimited). </li>
                                                <li> Only image files (
                                                    <strong>JPG, JPEG, PNG, BMP</strong>) are allowed in this demo (by default there is no file type restriction). </li>
                                                <li> Uploaded files will be deleted automatically after
                                                    <strong>5 minutes</strong> (demo setting). </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                <?php
                                foreach ($data_risalah as $key => $value) {
                                ?>
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('Risalah/ubah_risalah'); ?>" method="post" enctype='multipart/form-data'>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input has-info form-md-floating-label">
                                                        <div class="input-icon">
                                                            <input type="text" name="nomor" class="form-control" required value="<?= $value->nomor_risalah; ?>">
                                                            <input type="hidden" name="id" value="<?= $value->id_risalah; ?>">
                                                            <label for="form_control_1">Nomor risalah</label>
                                                            <span class="help-block">Format : xx/xxxx/xxxx/xx</span>
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input has-warning form-md-floating-label">
                                                        <div class="input-icon">
                                                            <input type="text" name="nama_acara" class="form-control" required value="<?= $value->nama_acara; ?>">
                                                            <label for="form_control_1">Nama acara/ agenda</label>
                                                            <span class="help-block">Ini berguna sebagai judul risalah</span>
                                                            <i class="fa fa-list"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-2 control-label" for="form_control_1">Isi risalah</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="3" name="isi" placeholder="Isikan secara rinci bentuk kegiatannya" style="margin: 0px 18.9844px 0px 0px; height: 97px; width: 835px;"><?= $value->isi_risalah; ?></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input has-error form-md-floating-label">
                                                        <div class="input-icon">
                                                            <label for="form_control_1">Tanggal pelaksanaan</label>
                                                            <input type="date" name="tanggal" class="form-control" required value="<?= $value->tanggal_acara; ?>">
                                                            
                                                            <span class="help-block">Format : tanggal/bulan/tahun</span>
                                                            <i class="fa fa-calendar-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                        </div>

                                        <div class="form-actions noborder">
                                            <button type="submit" class="btn blue">Edit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </form>
                                <?php } ?>
                                </div>
                            </div>
