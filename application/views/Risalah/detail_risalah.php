					    	<link href="<?=base_url('assets2/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" id="style_components" type="text/css" />
					    	<link href="<?=base_url('assets2/pages/css/blog.min.css');?>" rel="stylesheet" type="text/css" />
        					<link href="<?=base_url('assets2/pages/css/portfolio.min.css');?>" rel="stylesheet" type="text/css" />
							<script src="<?=base_url('assets2/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js');?>" type="text/javascript"></script>
							<script src="<?=base_url('assets2/pages/scripts/portfolio-2.min.js');?>" type="text/javascript"></script>
							<!-- END PAGE BAR -->
                            <!-- BEGIN PAGE TITLE-->
                            <h3 class="page-title"> Detail
                                <small>data risalah</small>
                            </h3>
                            <!-- END PAGE TITLE-->
                            <!-- END PAGE HEADER-->
                            <div class="portfolio-content portfolio-2">
                        <div id="js-filters-mosaic" class="cbp-l-filters-button">
                            
                            <div data-filter=".print" class="cbp-filter-item btn green btn-outline uppercase cbp-filter-item-active"> Foto Kegiatan
                                <div class="cbp-filter-counter"></div>
                            </div>
                          
                          
                        </div>
                        <div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">
                            <?php
                                foreach ($gambar as $key => $value) {
                                    $no = 1;
                            ?>
                            <div class="cbp-item print">

                                <a href="<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>" class="cbp-caption cbp-lightbox" >
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>" alt="" style="width: 331px; left: 0px; top: 0px;"> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <!-- <div class="cbp-l-caption-title"></div> -->
                                                <!-- <div class="cbp-l-caption-desc">by Tiberiu Neamu</div> -->
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            
                            
                           
                            
                           
                        </div>
                        <?php
                                foreach ($pdf as $key => $value) {
                            ?>
                            <div style="text-align: center;">
                                <br>
                                <iframe src="<?=base_url()?>assets2/uploads/document/<?=$value->nama_file;?>" height="600" width="1075"></iframe> 
                            </div>
                            <?php } ?>
                    </div>
                    <div class="blog-page blog-content-2">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="blog-single-content bordered blog-container">
                                    <?php
                                    foreach ($risalah as $key => $value) {
                                        $string = $value->tanggal_buat;
										$waktu = explode(" ", $string);
                                    ?>
                                    <div class="blog-single-head">
                                        <h1 class="blog-single-head-title"><?= $value->nama_acara." (".$value->nomor_risalah.")"; ?></h1>
                                        <div class="blog-single-head-date">
                                            <i class="icon-calendar font-blue"></i>
                                            <a href="javascript:;"><?= date('d-m-Y', strtotime($value->tanggal_acara)); ?></a>
                                        </div>
                                    </div>
                                    
                                    <div class="blog-single-desc" style="text-align: justify;">
                                        <p><?= $value->isi_risalah; ?></p>
                                    </div>
                                    
                                    <div class="blog-single-foot">
                                        <ul class="blog-post-tags">
                                            <li class="uppercase">
                                                <a href="#">Tanggal input : <?= date('d-m-Y', strtotime($waktu[0]))." jam ".$waktu[1]; ?></a>
                                            </li>
                                            <!-- <li class="uppercase">
                                                <a href="javascript:;">Sass</a>
                                            </li>
                                            <li class="uppercase">
                                                <a href="javascript:;">HTML</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="blog-single-sidebar bordered blog-container">
                                    <div class="blog-single-sidebar-search">
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control" placeholder="Search Blog"> </div>
                                    </div>
                                    <div class="blog-single-sidebar-links">
                                        <h3 class="blog-sidebar-title uppercase">Ubah Data</h3>
                                        <ul>
                                            <li>
                                                <a href="javascript:;">Audio</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">PDF</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="blog-single-sidebar-recent">
                                        
                                        <ul>
                                            <li>
                                                <a href="javascript:;">Foto 1</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Foto 2</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Foto 3</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Foto 4</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    
                                    <div class="blog-single-sidebar-tags">
                                        <h3 class="blog-sidebar-title uppercase">Risalah Terkait</h3>
                                        <ul class="blog-post-tags">
                                            <li class="uppercase">
                                                <a href="javascript:;">Risalah 1</a>
                                            </li>
                                            <li class="uppercase">
                                                <a href="javascript:;">Risalah 2</a>
                                            </li>
                                            <li class="uppercase">
                                                <a href="javascript:;">Risalah 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>