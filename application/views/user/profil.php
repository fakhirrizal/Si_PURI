<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=base_url('assets/profile/css/semantic.min.css');?>" />
    <link rel="stylesheet" href="<?=base_url('assets/profile/css/style.css');?>" />
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
</head>
<body>

    <!-- Outer Wrapper Start -->
    <div id='outer-wrapper'>

        <div class="ui menu">
            <a class="item">
                <i class="home icon"></i>
                Beranda
            </a>
            <div class="ui dropdown item">
                <i class='search icon'></i> Puri <i class="dropdown icon"></i>
                <div class="menu">
                <a class="item" href="<?php echo site_url('Uu'); ?>">Perundang-undangan</a>
                <a class="item" href="<?php echo site_url('Perpustakaan/pencarian'); ?>">Pustaka</a>
                <a class="item" href="<?php echo site_url('Risalah'); ?>">Risalah</a>
                </div>
            </div>
            <div class="right menu">
                <div class="ui dropdown item">
                    Language <i class="dropdown icon"></i>
                    <div class="menu">
                    <a class="item" title='Change to English'><i class='us flag'></i> English</a>
                    <a class="item" title='Ubah ke Bahasa'><i class='id flag'></i> Indonesia</a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui red button" onclick="location.href='<?= base_url("Pengguna/logout"); ?>'"><i class="sign out icon"></i>Logout</div>
                </div>
            </div>
        </div>

        <div class='ui grid'>
            <!-- Left Profile Start -->

            <div class='five wide column'>
                <!-- Profile Card Start -->
                <div class="ui special cards">
                    <div class="card">
                        <div class="blurring dimmable image">

                            <?php
                              $where = array(
                                'id' => $this->session->userdata('id_pengguna')
                                );
                                $query = $this->User_model->getSelectedData('anggota',$where);
                                foreach($query as $value){
                              if(!empty($value->file_foto)){
                                            echo '<img src="'.base_url('assets/uploads/profil/').$value->file_foto.'" >';
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" >';
                                        } }
                            ?>
                        </div>
                        <div class="content">
                            <?php
                              $where = array(
                                'id' => $this->session->userdata('id_pengguna')
                                );
                                $query = $this->User_model->getSelectedData('anggota',$where);
                                foreach($query as $value){
                                echo '<a class="header">'.$value->nama.'</a>';
                            }
                            ?>
                            <!-- <a class="header">Noval Bintang S</a> -->
                            <div class="meta">
                                <!-- <span class="date">mnovalbs</span> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile Card End -->
                <!-- Menu Profile Start -->
                <div class="ui vertical fluid pointing menu">
                    <a class="active item">
                        Profil
                    </a>
                    <a class="item" href="<?php echo site_url('Pengguna/password'); ?>">
                        Password
                    </a>
                    <a class="item" href="<?php echo site_url('Pengguna/email'); ?>">
                        Email
                    </a>
                    <a class="item" href="<?php echo site_url('Pengguna/tentang'); ?>">
                        Tentang
                    </a>
                </div>
                <!-- Menu Profile End -->
            </div>
            <!-- Left Profile End -->

            <!-- Right Content Start -->
            <div class='eleven wide column'>
                <div class='ui fluid segment'>
                    <div class="ui pointing secondary menu">
                        <a class="item active" data-tab="profile">Identitas</a>
                        <a class="item" data-tab="pictures">Foto Profil</a>
                    </div>
                    <div class='ui tab active' data-tab='profile'>
                        <!-- Identitas Start -->
                        <?php
                              $where = array(
                                'id' => $this->session->userdata('id_pengguna')
                                );
                                $query = $this->User_model->getSelectedData('anggota',$where);
                                foreach($query as $value){
                        ?>
                        <?= $this->session->flashdata('sukses') ?>
                        <form class='ui form' method='POST' action="<?php echo site_url('Pengguna/ubah_profil'); ?>">
                            <div class='field'>
                                <label>Nama Lengkap</label>
                                <input type='text' placeholder='Masukkan nama Anda sesuai KTP' name="nama" value='<?= $value->nama; ?>'/>
                                <input type='hidden' name="id" maxlength="50" value='<?= $value->id; ?>'/>
                            </div>
                            <div class='field'>
                                <label>Nomor HP</label>
                                <input type='text' placeholder='6285696303627' maxlength="15" name="no_hp" value='<?= $value->no_hp; ?>'/>
                            </div>
                            
                            <div class='grouped fields'>
                                <label>Jenis Kelamin</label>
                                <div class='field'>
                                    <div class='ui radio checkbox'>
                                        <input type='radio' name='jenis_kelamin' class='hidden' value="Laki-laki" <?php if($value->jenis_kelamin=="Laki-laki"){echo "checked";}else{echo '';} ?>/>
                                        <label>Laki-laki</label>
                                    </div>
                                </div>
                                <div class='field'>
                                    <div class='ui radio checkbox'>
                                        <input type='radio' name='jenis_kelamin' class='hidden' value="Perempuan" <?php if($value->jenis_kelamin=="Perempuan"){echo "checked";}else{echo '';} ?>/>
                                        <label>Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class='field'>
                                <label>Tempat Lahir</label>
                                <input type='text' placeholder='Masukkan daerah tempat lahir Anda' maxlength="50" name="tempat_lahir" value='<?= $value->tempat_lahir; ?>'/>
                            </div>
                            <div class='field'>
                                <label>Tanggal Lahir</label>
                                <div class='fields'>
                                  
                                    <div class='nine wide field'>
                                        <input type='date' name="tanggal_lahir" value="<?= $value->tanggal_lahir; ?>" />
                                    </div>
                                  
                                </div>
                            </div>
                            <div class='field'>
                                <label>Alamat</label>
                                <input type='text' placeholder='Masukkan alamat Anda' maxlength="200" name="alamat" value='<?= $value->alamat; ?>'/>
                            </div>
                            <!-- <div class="inline field">
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" checked tabindex="0" class="hidden">
                                    <label>Sudah Menikah</label>
                                </div>
                            </div> -->
                            <button class="ui primary button" type="submit"><i class='save icon'></i> Simpan</button>
                        </form>
                        <!-- Identitas End -->
                        <?php } ?>
                    </div>
                    <div class='ui tab' data-tab='pictures'>
                        <form class='ui form' method='POST' enctype='multipart/form-data' action="<?php echo site_url('Pengguna/ubah_foto_pengguna'); ?>">
                            <div class='field'>
                               
                                <?php
                                  $where = array(
                                    'id' => $this->session->userdata('id_pengguna')
                                    );
                                    $query = $this->User_model->getSelectedData('anggota',$where);
                                    foreach($query as $value){
                                    echo '<input type="hidden" name="id" value="'.$value->id.'"/>';
                                    echo '<input type="hidden" name="nama" value="'.$value->nama.'"/>';
                                  if(!empty($value->file_foto)){
                                                echo '<img class="ui middle aligned small circular image" src="'.base_url('assets/uploads/profil/').$value->file_foto.'" >';
                                            }
                                            else{
                                                echo '<img class="ui middle aligned small circular image" src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" >';
                                            } }
                                ?>
                                <label for='ambil_foto' class="ui labeled button" tabindex="0">
                                    <div class="ui red button">
                                        <i class="folder open outline icon"></i> Pilih Foto
                                    </div>
                                    <a class="ui basic red left pointing label">
                                        Tidak ada foto terpilih
                                    </a>
                                    <input id='ambil_foto' name="foto" onchange='profile_change(this)' style='display:none;' accept='image/*' type='file'/>
                                </label>
                            </div>
                            <div style='text-align: center;'>
                                <button class='ui primary button'><i class='cloud upload icon'></i> Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Right Content End -->
        </div>

    </div>
    
    <!-- Outer Wrapper End -->
    <script src="<?=base_url('assets/profile/js/jquery-3.2.1.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/dropdown.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/transition.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/dimmer.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/tab.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/checkbox.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/css/components/modal.min.js');?>"></script>
    <script src="<?=base_url('assets/profile/js/script.js');?>"></script>

    
</body>
</html>