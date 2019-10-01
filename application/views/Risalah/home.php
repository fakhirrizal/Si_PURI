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
    <script type="text/javascript">
      function cariWilayah(keyword) {
        if(keyword.length == 0) {
          $('#hasilPencarian').hide();
        } else {
          $.post("<?php echo base_url(); ?>Risalah/autocomplete", {kirimNama: ""+keyword+""}, function(data){
            if(data.length >0) {
              $('#hasilPencarian').fadeIn();
              $('#dataPencarian').html(data);
            }
          });
        }
      } 
      function pilih(thisValue) {
        $('#keyword').val(thisValue);
        setTimeout("$('#hasilPencarian').fadeOut();", 100);
      }
    </script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

    <!-- Full Bg Start -->
        <?php
        foreach ($foto as $key => $value) {
        ?>
        <div class='full-bg no-filter' style='background-image: url("<?=base_url()?>assets2/uploads/background/<?= $value->keterangan; ?>")'>
        <?php
        }
        ?>
 <!--    <div class='full-bg no-filter' style='background-image: url("<?=base_url()?>assets3/images/bg1.jpg")'> -->

        <div id='content'>
            <!-- Header Running Text Start -->
            <header class='container' >
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
                    </div>
                </nav>
                <!-- </div> -->
            </header>
            <!-- Header Running Text End -->
        
            <!-- Top Content Start -->
            <div id='top-content'>
                <div class='middle'>
                    <div class='container'>
                        <div id='home-search'>

                            <!-- Form Animation Start -->
                            <form method='GET' action="<?php echo site_url('Risalah/pencarian'); ?>">

                                <div id='form-hide'>
                                    <div class='row'>
                                        <div class='seven columns'>
                                            <input type='text' class='u-full-width' name='param1' placeholder='ex: Something' onkeyup="cariWilayah(this.value);" onblur="pilih();" onfocus="if(this.value=='ex: Something') this.value='';" id="keyword"/>
                                        </div>
                                        <div class='five columns'>
                                            <!-- Dropdown Forms -->
                                            <select class='u-full-width select2' name='param2'>
                                                <option value=''>-- Pilih Parameter --</option>
                                                <option value='judul'>Judul</option>
                                                <option value='isi'>Isi Risalah</option>
                                            </select>
                                        </div>
                                        <div class='seven columns' id="hasilPencarian" style="display: none;">
                                                    <div style="border: dashed 2px #eceff5; padding: 15px; margin: 0; line-height: 23px; color: #1a356e" id="dataPencarian">
                                                      
                                                    </div>
                                        </div>
                                    </div>
                                </div>

                                <div id='form-show'>
                                    <button data-search='false' onclick='open_search(this, event)' type='button' class='loop-animation'>
                                        <i class='ion-android-search'></i>
                                    </button>
                                </div>
                            </form>
                            <!-- Form Animation End -->

                            <div id='alpha-search'>
                                <!-- <a href='2c.html'>A</a> -->
                                <script>
                                    for(i=2013; i<=2019; i++){
                                        document.write("<a href='<?= site_url(); ?>Risalah/pencarian/"+i+"'>"+i+"</a>");
                                    }
                                </script>
                            </div>
                        </div>

                        <!-- Home Result Start -->
                        <div id='home-result'>
                            <div class='rowz'>
                                <?php
                                foreach($risalah as $row){
                                ?>
                                <div class='six-columns'>
                                    <a href="<?php echo site_url('Risalah/baca/'.$row->id_risalah)?>" class='res'>

                                        <?php
                                        $get_gambar = $this->Main_model->getSelectedData('file_risalah  a', 'a.*', array('a.id_risalah' => $row->id_risalah,'a.keterangan'=>'foto'),'','1')->row();
                                        if($get_gambar==NULL){
                                        ?>
                                        <div class='bg-transparent-image' style='background-image: url("<?=base_url()?>assets3/images/bg6.jpg")'></div>
                                        <?php
                                        }else{
                                        ?>
                                        <div class='bg-transparent-image' style='background-image: url("<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$get_gambar->nama_file;?>")'></div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <div class='detail'>
                                            <p><?= $row->nomor_risalah; ?></p> 
                                            <p><?= $row->nama_acara." (Tanggal : ".date('d-m-Y', strtotime($row->tanggal_acara))." )"; ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                <!-- <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("assets3/images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div>

                                <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("assets3/images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div>

                                <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("assets3/images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div> -->

                                <!-- <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("assets3/images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div>

                                <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("assets3/images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div> -->

                                <!-- <div class='six-columns'>
                                    <a href='3b.html' class='res'>
                                        <div class='bg-transparent-image' style='background-image:url("images/book.jpg");'></div>
                                        <div class='detail'>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                            Odit praesentium impedit iste corrupti beatae animi ullam labore 
                                            quisquam deleniti minus totam, amet placeat odio pariatur optio, sapiente est omnis esse?
                                        </div>
                                    </a>
                                </div> -->

                            </div>
                        </div>
                        <!-- Home Result End -->
                        <div id='result-info' class='result-info-luar'>
                            <div class='u-pull-left'>
                                <div class='result-total'>
                                    <label>Total : </label>
                                    <?= count($jumlah); ?> entries
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