<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
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
    <div id='small-content'>
        <!-- Header Top Start -->
        <header class='header-top' style='background-image: url("<?=base_url()?>assets3/images/3725.jpg")'>
            <div class='header-inner'>
                <div class='container'>
                    <!-- Nav Top Start -->
                    <nav class='nav-top'>
                      <div class='u-pull-left'>
                          <div id='nav-title'>
                              <img src="<?=base_url('assets3/images/logo_pustaka.jpg');?>" class='image-white' alt='Pustaka'/>
                          </div>
                      </div>
                      <div class='u-pull-right'>
                          <!-- <div id='nav-link'>
                              <a href=""><i class='ion-log-in'></i> Logout</a>
                          </div> -->
                          <div id='nav-account'>
                            <div class='prof'>
                              <?php
                              
                              echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" >';
                              ?>
                                <label><?php echo $this->session->userdata('user_name'); ?></label>
                                <i class='ion-ios-arrow-down'></i>
                            </div>
                            <ul class='nav-account-menus'>
                                
                                <li><a href='<?php echo site_url('Pengguna/logout'); ?>'><i class='ion-log-out'></i> Logout</a></li>
                            </ul>
                        </div>
                          <div id='nav-lang'>
                                      <a href='#!' title='Ubah ke Bahasa'>
                                        <img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
                                      </a>
                                      <a href='#!' title='Change to English'>
                                          <img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
                                      </a>
                          </div>
                      </div>
                    </nav>
                    <!-- Nav Top End -->
                    <!-- Page Title Start -->
                    <div id='page-title'>
                        <h2>Hasil Pencarian</h2>
                    </div>
                    <!-- Page Title End -->
                </div>
            </div>
        </header>
        <!-- Header Top End -->
        <!-- Content Start -->
        <div id='content'>
            <div class='container'>
                <!-- Result Wrapper Start -->
                <div id='result-wrapper'>

                    <div class='result-text'>
                        <label>Hasil Pencarian : </label>
                    </div>

                    <div class='rowz'>
                        <?php
                          foreach ($buku as $key => $value) {
                        ?>
                        <div class='four-columns'>
                            <a class='result-box' href='#'>
                                <div id='result-image-wrapper'>
                                    <?php
                                    if(is_null($value->gambar)){
                                      echo "<div class='result-image' style='background-image: url(".base_url('assets/uploads/noimage.jpg').")'></div>";
                                    }
                                    else{ ?>
                                      <div class='result-image' style='background-image: url("<?=base_url()?>assets/uploads/<?=$value->gambar;?>")'></div>
                                    <?php }                                   
                                    ?>
                                    
                                </div>
                                <div class='result-detail'>
                                    <h3><?= $value->nama_buku; ?></h3>
                                    <div class='result-description' style="text-align: justify;">
                                        <?php echo substr($value->sinopsis,0,147); 
                                        $jumlah = strlen($value->sinopsis);
                                        if($jumlah>147){
                                          echo "......";
                                        }
                                        else{
                                          echo "";
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                       
                        
                       
                    </div>

                    <!-- End Result Detail Start -->
                    <div id='result-info'>
                            <div class='u-pull-left'>
                                <div class='result-total'>
                                    <label>Total : </label>
                                    <?= count($buku); ?> entries
                                </div>
                            </div>
                            <div class='u-pull-right'>
                                <div class='pagination'>
                                 
                                    
                                            <?php
                                            echo $this->pagination->create_links();
                                            ?>                                            
                                     
                                    
                                </div>
                            </div>
                    </div>
                    <!-- End Result Detail End -->

                </div>
                <!-- Result Wrapper End -->
            </div>
            <div class='back-button'>
                <a href="<?php echo site_url('Perpustakaan/search/')?>"><i class='ion-android-search'></i> Kembali ke Pencarian</a>
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
                    Copyright &copy; 2017 | Si-PURI
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