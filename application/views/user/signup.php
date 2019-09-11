<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

    <!-- 
        Content Start
        Wrapper ini digunakan untuk halaman single
    -->
    <div id='small-content' >
        <!-- Header Top Start -->
        <?php
        foreach ($foto as $key => $value) {
        ?>
        <header class="header-top" style='background-image: url("<?=base_url()?>assets/images/background/<?= $value->keterangan; ?>")'>
        <?php
        }
        ?>
            <div class='header-inner'>
                <div class='container'>
                    <!-- Nav Top Start -->
                    <nav class='nav-top'>
                        <div class='row'>
                            <div class='three columns'>
                                <div id='nav-title'>
                                    <img src="<?=base_url('assets3/images/logo_pustaka.png');?>" alt='Si-PURI | Pustaka'/>
                                    <!-- <img src="<?=base_url('assets3/images/logo_pustaka.jpg');?>" class='image-white' alt='Si-PURI | Pustaka'/> -->
                                </div>
                            </div>
                            <div class='six columns'>
                                <!-- Tengah -->&nbsp;
                            </div>
                            <div class='three columns'>
                                <div id='nav-lang'>
                                    <a href='#!' title='Ubah ke Bahasa'>
                                        <img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
                                    </a>
                                    <a href='#!' title='Change to English'>
                                        <img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- Nav Top End -->
                    <!-- Page Title Start -->
                    <div id='page-title'>
                        <h2>Sign Up</h2>
                    </div>
                    <!-- Page Title End -->
                </div>
            </div>
        </header>
        <!-- Header Top End -->
        <!-- Content Start -->
        <div id='content'>
            <div class='container'>
                <div class='lib-form'>
                    <?= $this->session->flashdata('gagal') ?>
                    <form method='POST' action="<?php echo site_url('Pengguna/signup'); ?>">

                        <label>Full Name</label>
                        <input required class='u-full-width' autofocus type='text' name="nama" maxlength="50" placeholder='John Doe'/>

                        <label>Email</label>
                        <input required class='u-full-width' type='email' maxlength="50" name="email" placeholder='john.doe@gmail.com'/>

                        <label>Password</label>
                        <input required class='u-full-width' type='password' maxlength="32" name="password" placeholder='********'/>

                        <button type='submit' class='button-primary'>Register</button>

                    </form>
                </div>
                <div class='link-form'>
                    Have an account? <a href="<?php echo site_url('Perpustakaan'); ?>">Login</a>
                </div>
            </div>
        </div>
        <!-- Content End -->
        <!-- Footer Start -->
        <footer>
            <div class='container'>
                <div class='u-pull-left'>
                    <div id='footer-image'>
                        <img alt='Footer Logo' src="<?=base_url('assets3/images/logo_alpha_2.png');?>"/>
                    </div>
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
    <!-- Content End -->
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