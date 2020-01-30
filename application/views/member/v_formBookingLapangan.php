<section>
<div class="container mt-5">
      <h3>Ketentuan Booking Lapangan</h3>
      <p class="text-danger">* booking dilaksanakan minimal 2 hari sebelum penyewaan dilakukan, jadi tidak bisa booking dihari yang sama dengan hari penyewaan.<br>
      * jam booking yang di pilih harus sesuai dengan ketersediaan jam booking yang ada di daftar jadwal lapangan.<br>
      * pembayaran uang booking harus dilakukan pada hari yang sama. jika pembayaran belum dilakukan maka booking dianggap batal.</p>
      <div style="font-size: 30px; margin-bottom: 15px;" class="font-weight-bold">
      <img src="<?= base_url('assets/') . 'img/BCA.jpg' ?>" alt="Bank BCA" style="width: 100px; height: 65px; display: inline-block; margin: 7px;">
      Nomor Rekening BCA : 12384293
      </div>
   <?php if ($keranjang != []) : ?>
   <div class="card shadow col-md-8 mb-5">
      <div class="card-body">
         <div class="card-header mb-3">
         <h3>Keranjang Booking Anda</h3>
         </div>
         <table width="100%" class="mb-4">
            <tr>
               <th>Nama Pembooking</th><th> : </th><td><?= $user['nama'] ?></td>
            </tr>
            <tr>
               <th>Nama Club</th><th> : </th><td><?= $user['nama_club'] ?></td>
            </tr>
            <tr>
               <th>Email</th><th> : </th><td><?= $user['email'] ?></td>
            </tr>
            <tr>
               <th>Tanggal Lahirr</th><th> : </th><td><?= $user['tgl_lahir'] ?></td>
            </tr>
            <tr>
               <th>Nomor Telepon</th><th> : </th><td><?= $user['no_telp'] ?></td>
            </tr>
            <tr>
               <th>Alamat</th><th> : </th><td><?= $user['alamat'] ?></td>
            </tr>
         </table>
         <h3>Daftar Lapangan & Jadwal</h3>
         <table width="100%" cellpadding="3">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Lapangan</th>
                  <th>Tgl_Booking</th>
                  <th>Jam Booking</th>
                  <th>Harga</th>
                  <th>Batal Pesan</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                $no = 1;
                $totalbayar = 0;
                $uangBooking = 0;
                foreach ($keranjang as $ker) :
                    $totalbayar += $ker->harga;
                $uangBooking += $ker->harga * 0.6;
                ?>
               <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $ker->nama_lapangan ?></td>
                  <td><?= $ker->tgl_booking ?></td>
                  <td><?= $ker->jam ?></td>
                  <td>Rp. <?= number_format($ker->harga) ?></td>
                  <td>
                     <a href="<?= base_url() . 'Member/hapusBooking/' . $ker->id_keranjang_booking . '/2' ?>" class="genric-btn danger-border small">Hapus</a>
                  </td>
               </tr>
               <?php endforeach; ?>
               <tr>
                  <th colspan="6"><hr></th>
               </tr>
               <tr>
                  <th colspan="4" class="text-center">Total Harga</th>
                  <th>Rp. <?= number_format($totalbayar) ?></th>
               </tr>
               <tr>
               </tr>
               <tr>
                  <th colspan="4" class="text-center">Jumlah Uang Booking yang di Bayar 60%</th>
                  <th>Rp. <?= number_format($uangBooking); ?>
                  </th>
               </tr>
            </tbody>
         </table>
         <div class="card-footer text-right mt-5">
            <form action="<?= base_url() . 'Member/bookingAct' ?>" method="post">
               <button type="submit" class="genric-btn info circle">Booking Sekarang</button>
            </form>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <h1>Jadwal dan harga penyewaan lapangan futsal Kirana Sport Center tanggal <b><?= $tgl_cari ?></b></h1><hr>
   <h2><b><?= $lapangan['nama'] ?></b></h2><br>
   <div class="table-responsive col-md-8 mb-4">
      	<table class="table table-hover">
     	<thead>
            <tr>
               <th>No</th>
               <th>Jam</th>
               <th>Harga</th>
               <th>Durasi Penyewaan</th>
               <th>Status Penyewaan</th>
               <th>Booking</th>
            </tr>
        </thead>
         <tbody>
            <?php
            $no = 1;
            foreach ($jadwal as $j) :
                $status = "Tersedia";
            $id_jadwal = $j->id_jadwal;
            ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $j->jam ?></td>
               <td>Rp. <?= number_format($j->harga); ?></td>
               <td><?= $j->jams ?></td>
               <td><?php
                    if ($booking != []) {
                        foreach ($booking as $b) {

                            if ($id_jadwal == $b->id_jadwal && $b->id_member == $user['id_member']) {
                                $status = "Menunggu pembayaran Booking";
                            } elseif ($id_jadwal == $b->id_jadwal) {
                                $status = "Sudah di booking";
                            }
                        }
                    }
                    if ($keranjang != []) {
                        foreach ($keranjang as $k) {
                            if ($id_jadwal == $k->id_jadwal && $k->tgl_booking == $tgl_cari && $k->id_lapangan == $lapangan['id_lapangan']) {
                                $status = "Daftar booking Anda";
                            }
                        }
                    }
                    echo $status;
                    ?>
               </td>
               <td><?php if ($status == "Sudah di booking" || $status == "Daftar booking Anda") : ?>
               <a href="#" class="genric-btn disable circle"><b>Booked</b></a>
               <?php elseif ($status == "Tersedia") : ?>
               <form method="post" action="<?= base_url() . 'Member/bookingLapanganForm' ?>">
               <input type="hidden" name="id_lapangan" value="<?= $lapangan['id_lapangan']; ?>">
               <input type="hidden" name="tgl_booking" value="<?= $tgl_cari; ?>">
               <input type="hidden" name="id_jadwal" value="<?= $j->id_jadwal ?>">
               <input type="hidden" name="jams" value="<?= $j->jams ?>">
               <input type="hidden" name="nama_lapangan" value="<?= $lapangan['nama']; ?>">
               <input type="hidden" name="harga" value="<?= $j->harga ?>">
               <button type="submit" class="genric-btn success circle">Booking</button>
               </form>              
               <?php endif; ?>
            </tr>
            <?php endforeach ?>
         </tbody>
         </thead>
      </table>
   </div>
</div>
</section>