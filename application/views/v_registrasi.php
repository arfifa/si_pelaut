 <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?= base_url() ?>" class="btn btn-primary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registrasi Member</h3><hr>
                </div>
                <div class="hpanel ">
                    <div class="panel-body">
                        <form action="<?= base_url().'Login/registrasiMember' ?>" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="nama">Nama Lengkap</label>
                                    <input class="form-control" name="nama" id="nama" type="text" title="Masukan nama lengkap" value="<?= set_value('nama'); ?>" required>
                                    <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="nama_club">Nama Club</label>
                                    <input class="form-control" name="nama_club" id="nama_club" type="text" title="Masukan Nama Club" value="<?= set_value('nama_club'); ?>" required>
                                    <?= form_error('nama_club','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" id="email" type="email" title="Masukan email yang benar" value="<?= set_value('email'); ?>" required>
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="alamat">Alamat</label>
                                    <textarea type="text-area" class="form-control" name="alamat" id="alamat" title="Masukan Alamat"required><?= set_value('alamat'); ?></textarea>
                                    <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" title="Masukan Tanggal Lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir');?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input class="form-control" type="number" name="no_telp" title="Masukan No.Telepon" value="<?= set_value('no_telp');?>"  id="no_telp" required>
                                    <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="username" name="username" title="Masukan username" value="<?= set_value('username');?>"  id="username" required>
                                    <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" title="Masukan password" id="password" required>
                                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input class="form-control" type="password" name="password2" title="Masukan konfirmasi password" id="password2" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" type="submit">Registrasi Member</button>
                        </form>
                    </div>
                     <a href="<?= base_url().'Login' ?>" class="btn btn-primary">Masuk Member</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>