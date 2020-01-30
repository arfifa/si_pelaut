<div class="container mt-5">
  <h3>Ketentuan Booking Lapangan</h3>
  <p class="text-danger">* booking dilaksanakan minimal 2 hari sebelum penyewaan dilakukan, jadi tidak bisa booking dihari yang sama dengan hari penyewaan.<br>
  * jam booking yang di pilih harus sesuai dengan ketersediaan jam booking yang ada di daftar jadwal lapangan.<br>
  * pembayaran uang booking harus dilakukan pada hari yang sama. jika pembayaran belum dilakukan maka booking dianggap batal.</p>
  <div style="font-size: 30px; margin-bottom: 15px;" class="font-weight-bold">
  <img src="<?= base_url('assets/').'img/BCA.jpg' ?>" alt="Bank BCA" style="width: 100px; height: 65px; display: inline-block; margin: 7px;">
  Nomor Rekening BCA : 12384293
  </div>
<div class="row">
  <div class="col-lg-7">
    <?php if($keranjang != []): ?>
    <section>
    <div class="card shadow mb-5">
      <div class="card-body">
        <div class="card-header mb-3">
        <h3>Keranjang Booking Anda</h3>
        </div>
        <div class="table-responsive">
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
               foreach ($keranjang as $ker): 
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
                     <a href="<?= base_url().'Member/hapusBooking/'.$ker->id_keranjang_booking.'/1' ?>" class="genric-btn danger-border small">Hapus</a>
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
                  <th>Rp. <?=number_format($uangBooking); ?>
                  </th>
               </tr>
            </tbody>
          </table>        
        </div>
        <div class="card-footer text-right mt-5">
          <form action="<?= base_url().'Member/bookingAct' ?>" method="post">
            <button type="submit" class="genric-btn info circle">Booking Sekarang</button>
          </form>
        </div>
      </div>
    </div>
  <?php endif; ?>
    <section> 
      <h1>Daftar Lapangan<hr></h1>
      <div class="row">
        <?php foreach ($lapangan as $lp): ?>
        <div class="col-md-6">
          <div class="single_team_member single-home-blog mb-5">
            <div class="card">
              <img src="<?= base_url().'assets/img/lapangan/' ?><?= $lp->gambar; ?>" class="card-img-top" alt="blog" style = "width: 250; height: 200px;">
              <div class="card-body">
                <div class="tean_content">
                  <h5 class="card-title"><?= $lp->nama; ?></h5>
                </div>
              </div>
              <a href="" class="genric-btn primary-border circle bookingLapangan"  data-toggle="modal" data-target="#bookingLapangan" data-id="<?= $lp->id_lapangan ?>">Booking</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>
  <div class="col-lg-5">
    <div class="card p-2 mb-5">
      <div class="table-responsive">
        <h3>Jadwal dan harga penyewaan lapangan futsal Kirana Sport Center</h3><br>
        <table class="table table-hover">
           <thead>
              <tr>
                 <th>No</th>
                 <th>Jam</th>
                 <th>Harga</th>
                 <th>Durasi Penyewaan</th>
              </tr>
           </thead>
           <tbody>
              <?php
              $no = 1; 
              foreach ($jadwal as $j): ?>
              <tr>
                 <td><?= $no++ ?></td>
                 <td><?= $j->jam ?></td>
                 <td>Rp. <?= number_format($j->harga); ?></td>
                 <td><?= $j->jams ?></td>
              </tr>
              <?php endforeach ?>
           </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
</div>




<!-- Modal -->
<div class="modal fade" id="bookingLapangan" tabindex="-1" role="dialog" aria-labelledby="bookingLapangan" aria-hidden="true" style="margin-top: 70px;">
    <div class="modal-dialog" role="document" style="margin-bottom: 130px;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               <div class="modal-body">
                  <h4 class="font-weight-normal text-primary">Inputkan tanggal dan waktu booking</h4>
                  <p class="text-danger">* booking dilakukan minimal 2 hari sebelum penyewaan dilakukan</p><br>
                  <form action="" method="post">
                     <div class="form-group">
                        <input type="hidden" name="id_lapangan" id="id_lapangan">
                        <label for="tgl_booking">Tanggal Booking</label>
                        <input type="date" class="form-control" name="tgl_booking" id="tgl_booking" min="<?= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"))) ?>" required title="Inputkan tanggal booking">
                     </div>
               </div>
            <div class="modal-footer">
                  <button type="submit" class="genric-btn primary  circle">Periksa Jadwal</button>
                  <button type="button" class="genric-btn danger circle" data-dismiss="modal">Close</button>
                  </form>
            </div>     
        </div>
    </div>
</div> 
<!-- model end -->





