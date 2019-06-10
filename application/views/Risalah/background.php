                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Dashboard
                        <small>pengaturan gambar</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="box">
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <?= $this->session->flashdata('sukses') ?>
                            <?= $this->session->flashdata('gagal') ?>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-hide hide"></i>
                                        <span class="caption-subject font-hide bold uppercase">Pengaturan</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body" id="chats">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; "><div class="scroller" style="overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                        <ul class="chats">
                                            
                                            <li class="in">
                                                <img class="avatar" alt="" src="<?=base_url('assets/images/image-2282302_960_720.png');?>">
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> Background Pertama </a>
                                                    <!-- <span class="datetime"> at 20:30 </span> -->
                                                    <span class="body"> Terletak dihalaman pertama sub menu Perundangan, ketika pengguna membuka sub menu Perundangan akan terdapat background yang memenuhi satu layar browser. </span>
                                                </div>
                                                <br>
                                                <form class="form-horizontal" role="form" action="<?php echo site_url('Risalah/simpan_background'); ?>" method="post" enctype='multipart/form-data'>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="foto" multiple="" accept="image/*"> </span>
                                                                <input type="hidden" name="id" value="3">
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                        <br>
                                                        <div class="form-actions noborder">
                                                            <button type="submit" class="btn blue">Submit</button>
                                                            <button type="button" class="btn default">Cancel</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </li>
                                           
                                        </ul>
                                    </div></div>
                                 
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
                    </div>