<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Risalah</title>
    <link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/jquery-ui.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/select2.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

    <!-- Full Bg Start -->
    <div class='full-bg no-filter' style='background-image:url("<?=base_url()?>assets3/images/perpustakaan-ilustrasi-reuters.jpg");'>

        <div id='content'>
            <!-- Header Running Text Start -->
            <header class='container'>
                <!-- <div class='container'> -->
                <nav class='nav-top'>
                    <div class='u-pull-left'>
                        <div id='nav-title'>
                            <img src="<?=base_url('assets3/images/logo_risalah.png');?>" alt='Si-PURI | Risalah'/>
                            <!-- <img src="<?=base_url('assets3/images/logo_risalah.png');?>" class='image-white' alt='Si-PURI | Risalah'/> -->
                        </div>
                    </div>
                    <div class='u-pull-right'>
                        <div id='nav-lang'>
                                    <a href='#!' title='Ubah ke Bahasa'>
                                        <img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
                                    </a>
                                    <a href='#!' title='Change to English'>
                                        <img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
                                    </a>
                        </div>
                        <!-- <div id='nav-link'>
                            <a href='login.html'><i class='ion-log-in'></i> Login</a>
                        </div> -->
                    </div>
                </nav>
                <!-- </div> -->
            </header>
            <!-- Header Running Text End -->
        
            <!-- Top Content Start -->
            <div id='top-content'>
                <div class='middle'>
                    <div class='container'>

                        <!-- Home Result Start -->
                        <div id='home-result' class='active'>
                            <div class='rowz'>
                                <div class='six-columns'>
                                    <div class='detail-risalah'>
                                        <div class='slider-risalah'>
                                            <label class='btn-to btn-to-left' onclick='slider_kekiri()'><i class='ion-chevron-left'></i></label>
                                            <?php
                                            foreach($gambar as $key => $value){
                                            ?>
                                            <div class='slider-image active' style='background-image: url("<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>")'></div>
                                            <!-- <div class='slider-image active' style='background-image:url("images/bookcover3.png")'></div>
                                            <div class='slider-image' style='background-image:url("images/bookcover1.png")'></div>
                                            <div class='slider-image' style='background-image:url("images/bookcover2.png")'></div> -->
                                            <?php } ?>
                                            <label class='btn-to btn-to-right' onclick='slider_kekanan()'><i class='ion-chevron-right'></i></label>
                                        </div>
                                        <!-- <audio controls controlsList="nodownload">
                                            <source src='song/lyd.mp3' type='audio/mp3'>
                                        </audio> -->
                                        <div class='text-risalah'>
                                            <?php
                                            foreach ($risalah as $key => $value) {
                                            echo $value->isi_risalah;
                                            }?>
                                        </div>
                                    </div><br>
									<?php
                                        foreach ($audio as $key => $row) {
                                    ?>
                                    <!-- <audio controls controlsList="nodownload">
                                        <source src='<?=base_url()?>assets2/uploads/audio/<?=$row->nama_file;?>' type='audio/mp3'>
                                    </audio>
                                    <p style="text-align: justify;"><strong>Note:</strong> The audio tag is not supported in Internet Explorer 8 and earlier versions.</p> -->
                                    <?php } ?>
									<div class='download-button'>
                                            <?php
                                            foreach ($risalah as $key => $value) {
                                            ?>
                                        <a href="<?php echo site_url('Risalah/download_risalah/'.$value->id_risalah)?>"><i class='ion-ios-cloud-download-outline'></i> Unduh Risalah</a>
                                            <?php
                                            }
                                                foreach ($pdf as $key => $value) {
                                            ?>
                                        <a href="<?=base_url()?>assets2/uploads/document/<?=$value->nama_file;?>#page=1&toolbar=0&scrollbar=0" onclick='pdf_read(this, event)' class='pdf-read'><i class='ion-ios-book-outline'></i> Baca Lengkap</a>
                                            <?php } ?>
                                    </div>
                                </div>
                                <!-- <div class='six-columns' >
                                    <a href='#' class='res' style="height: 280px;">
                                        <div class='bg-transparent-image' style="background-color: white;"></div>
                                        <div class='detail' style="height: 280px;text-align: justify;">
                                            
                                        </div>
                                    </a>
                                </div> -->

                                <div class='six-columns'>
                                    <div class='res-detail'>
                                        <table class='no-border table'>
                                            <tbody>
                                            <div class="blog-single-content bordered blog-container">
                                                <?php
                                                foreach ($risalah as $key => $value) {
                                                ?>                                    
                                                <tr>
                                                    <td width='80'>No. Risalah</td>
                                                    <td width='10'>:</td>
                                                    <td><?= $value->nomor_risalah; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tgl. Acara</td>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($value->tanggal_acara)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Acara</td>
                                                    <td>:</td>
                                                    <td><?= $value->nama_acara; ?></td>
                                                </tr>
												<?= $value->link; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class='rowz'>
                                <div class='six-columns'>
                                    
                                </div>  
                                <div class='six-columns'>
                                    
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <!-- <div class='download-button'>
                                            <?php
                                            foreach ($risalah as $key => $value) {
                                            ?>
                                        <a href="<?php echo site_url('Risalah/download_risalah/'.$value->id_risalah)?>"><i class='ion-ios-book-outline'></i> Baca Isi Risalah</a>
                                            <?php } ?>
                                    </div> -->
                                </div>

                            </div>

                        </div>
                        <!-- Home Result End -->
                        <div class="back-to-search">
                            <a href="<?php echo site_url('Risalah/')?>"><i class="ion-chevron-left"></i> Kembali ke Pencarian</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Content End -->
    
            <!-- Footer Start -->
            <footer>
                <div class='container'>
                    <div class='u-pull-left'>
                        Copyright &copy; 2019 | Si-PURI
                    </div>
                    <a href='<?= base_url(); ?>' class='footer-logo'>
                        <img src="<?=base_url('assets3/images/logo_puri.png');?>"/>
                    </a>
                    <div class='u-pull-right' id="clock">
                    </div>
                    <div class='u-pull-right'>
                                    <?php
                                    $hari = date('l');
                       
                                    if ($hari=="Sunday") {
                                     echo "Minggu";
                                    }elseif ($hari=="Monday") {
                                     echo "Senin";
                                    }elseif ($hari=="Tuesday") {
                                     echo "Selasa";
                                    }elseif ($hari=="Wednesday") {
                                     echo "Rabu";
                                    }elseif ($hari=="Thursday") {
                                     echo("Kamis");
                                    }elseif ($hari=="Friday") {
                                     echo "Jum'at";
                                    }elseif ($hari=="Saturday") {
                                     echo "Sabtu";
                                    }
                                    ?>,
                                   
                                    <?php
                                    $tgl =date('d');
                                    echo $tgl;
                                    $bulan =date('F');
                                    if ($bulan=="January") {
                                     echo " Januari ";
                                    }elseif ($bulan=="February") {
                                     echo " Februari ";
                                    }elseif ($bulan=="March") {
                                     echo " Maret ";
                                    }elseif ($bulan=="April") {
                                     echo " April ";
                                    }elseif ($bulan=="May") {
                                     echo " Mei ";
                                    }elseif ($bulan=="June") {
                                     echo " Juni ";
                                    }elseif ($bulan=="July") {
                                     echo " Juli ";
                                    }elseif ($bulan=="August") {
                                     echo " Agustus ";
                                    }elseif ($bulan=="September") {
                                     echo " September ";
                                    }elseif ($bulan=="October") {
                                     echo " Oktober ";
                                    }elseif ($bulan=="November") {
                                     echo " November ";
                                    }elseif ($bulan=="December") {
                                     echo " Desember ";
                                    }
                                    $tahun=date('Y');
                                    echo $tahun;
                                    ?>
                                    &nbsp; 
                    </div>
                </div>
            </footer>
            <!-- Footer End -->
        </div>

    </div>
    <!-- Full Bg End -->
    <script type="text/javascript">        
    function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    var waktu = new Date();            //membuat object date berdasarkan waktu saat 
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
    </script>
    <!-- Full Bg End -->
    <script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
    <script src="<?=base_url('assets3/js/jquery-ui.min.js');?>"></script>
    <script src="<?=base_url('assets3/js/select2.min.js');?>"></script>
    <script src="<?=base_url('assets3/js/global.js');?>"></script>
</body>
</html>