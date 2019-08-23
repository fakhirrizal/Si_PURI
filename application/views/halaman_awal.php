<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si-PURI</title>
    <link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
    <style type="text/css">
        html,body { 
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
            }
    </style>
    <style type="text/css">
        *{
            padding: 0;margin: 0;
        }
        html, body{
            height: 100%;
        }
    </style>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

    <!-- Full Bg Start -->
    <div class='full-bg' style='#'>

        <div id='content'>
            <!-- Header Running Text Start -->
            <header>
                <!-- <div class='container'> -->
                    <marquee class='marquee-text'>
                        Selamat Datang di Aplikasi Si-PURI (Sistem Informasi Pustaka Perundangan-undangan dan Risalah)
                    </marquee>
                <!-- </div> -->
            </header>
            <!-- Header Running Text End -->
        
            <!-- Top Content Start -->
            <div id='top-content'>
                <div class='middle'>
                    <div class='container'>
                        <!-- <h1>Selamat Datang!</h1> -->
                        <div class='row'>
                            <div class='four columns'>
                                <a href='<?php echo site_url('Perpustakaan'); ?>' class='kotak'>
                                    <!-- <i class='ion-ios-book'></i>
                                    <h4>Perpustakaan</h4> -->
                                    <img class='#' src='assets3/images/logo_pustaka.png' alt='Pustaka'/>
                                    
                                </a>
                            </div>
                            <div class='four columns'>
                                <a href='<?php echo site_url('Risalah'); ?>' class='kotak'>
                                    <!-- <i class='ion-ios-folder'></i>
                                    <h4>Risalah</h4> -->
                                    <img class='#' src='assets3/images/logo_risalah.png' alt='Risalah'/>
                                </a>
                            </div>
                            <div class='four columns'>
                                <a href='<?php echo site_url('Uu'); ?>' class='kotak'>
                                    <!-- <i class='ion-briefcase'></i>
                                    <h4>Undang-undang</h4> -->
                                    <img class='#' src='assets3/images/logo_uu.png' alt='Perundangan'/>
                                    
                                </a>
                            </div>
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
                    <a href='<?= base_url(); ?>' class='footer-logo' >
                        <img src="<?=base_url('assets/images/Lambang_Kota_Semarang.png');?>"/>
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
    <script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
    <script src="<?=base_url('assets3/js/global.js');?>"></script>
</body>
</html>