<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?php echo base_url().'Beranda' ?>" class="btn btn-primary">Kembali Ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h1>Kirana Futsal</h1><hr>
                    <h3>Tempat Penyewaan Futsal yang Lengkap dan Nyaman!</h3>
                    <p class="text-danger">Belum punya akun? Silahkan registrasi dibawah ini!</p>
                </div>
                <div class="hpanel">
                    <?php 
                    if(isset($_GET['pesan']) ){
                        if($_GET['pesan'] == "logout" ){
                        echo "<div class='alert alert-success'>";
                        echo "Anda telah logout.";
                        echo "</div>";
                        }
                    }
                        
                    echo $this->session->flashdata('pendaftaran'); 
                    echo $this->session->flashdata('alert'); 
                    ?>

                    <div class="panel-body">
                        <form action="<?php base_url().'Login' ?>" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Masukan username" title="Masukan username" required="" name="username" id="username" class="form-control" autocomplete="off" autofocus="on">
                                <?php echo form_error('username'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Masukan Passowrd" placeholder="Masukan password" name="password" id="password" class="form-control">
                                <?php echo form_error('password'); ?>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                            <a class="btn btn-custon btn-danger btn-block" href="<?= base_url().'Login/registrasiMember' ?>">Registrasi Member</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   