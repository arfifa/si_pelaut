<div class="container my-5">
 	<h3>Ketentuan Tranfer</h3>
  	<p class="text-danger">
  	* pembayaran uang booking harus dilakukan pada hari yang sama. jika pembayaran belum dilakukan maka booking dianggap batal.<br>
  	* Masukan Nomor Booking pada berita tranfer saat melakukan transaksi pembayaran tranfer ke rekening BCA kami.<br>
  	* Anda dapat melakukan tranfer secara bersamaan untuk penyewaan dengan jadwal yang berbeda dengan cara memasukan Nomor Booking lapangan sekaligus kedalam berita tranfer saat melakukan tranfer pembayaran.<br>
  	* Ikuti pentunjuk diatas agar kami dapat melacak data booking anda.
	</p>
	<div style="font-size: 30px;" class="font-weight-bold">
	<img src="<?= base_url('assets/') . 'img/BCA.jpg' ?>" alt="Bank BCA" style="width: 100px; height: 65px; display: inline-block; margin: 7px;">
	Nomor Rekening BCA : 12384293
	</div>
	<br>
	<h1>Daftar Booking Anda</h1><hr>
	<?php if ($daftarBooking == []) : ?>
	<h3>Anda belum memiliki booking lapangan.</h3>
	<?php endif ?>
	<div class="row">
		<div class="table-responsive col-lg-8">
		<?php foreach ($daftarBooking as $b) : ?>
		<div class="card p-3 mb-3">
			<table width="100%">
				<tbody class="mb-5">
					<tr>
						<th colspan="2"><h2>Nomor Booking</h2></th><td><h2><?= $b->no_booking ?></h2></td>
					</tr>
					<tr>
						<th colspan="3"><h4 class="text-primary">* Catat Nomor Pemesanan Anda Untuk Berita Tranfer Pembayaran Booking.</h4></th>
					</tr>
					<tr>
						<th><h3>Data Booking</h3></th>
					</tr>
					<tr>
						<th width="40%">Nama Pembooking </th><td width="3%"> : </td><td><?= $b->nama ?></td>
					</tr>
					<tr>
						<th>Nama Club </th><td> : </td><td><?= $b->nama_klub ?></td>
					</tr>
					<tr>
						<th>Alamat </th><td> : </td><td><?= $b->alamat ?></td>
					</tr>
					<tr>
						<th>Nomor Telepon </th><td> : </td><td><?= $b->no_telpon ?></td>
					</tr>
					<tr>
						<th>Tanggal Booking </th><td> : </td><td><?= $b->tgl_booking ?></td>
					</tr>
					<tr>
						<th>Jam </th><td> : </td><td><?= $b->jam ?></td>
					</tr>
					<tr>
						<th>Harga </th><td> : </td><td>Rp. <?= number_format($b->harga) ?></td>
					</tr>
					<tr>
						<th>Biaya booking Masuk </th><td> : </td><td>Rp. <?= number_format($b->dp) ?></td>
					</tr>
					<tr>
						<th>Sisa Bayar </th><td> : </td><td>Rp. <?= number_format($b->sisa) ?></td>
					</tr>
					<tr>
						<th>Status </th><td> : </td><td>
							<?php
						if ($b->status == 0) {
							echo "Menunggu Pembayaran Booking";
						} elseif ($b->status == 1) {
							echo "Pembayaran Telah Dikonfirmasi";
						}
						?></td>
					</tr>
					<tr><th colspan="3"><hr></th></tr>
					</tbody>
			</table>
			<h4 class="text-primary">* Print Pembayaran Tersedia Saat Anda Telah Melakukan Tranfer Pembayaran Booking</h4>
			<div class="text-right mt-3">
			<?php if ($b->status == 0) : ?>
				<button href="" class="genric-btn disable circle">Print Pembayaran</button>
				<?php elseif ($b->status == 1) : ?>
				<a href="<?= base_url() . 'Member/printBuktiBayar/' . $b->id_booking ?>" class="genric-btn primary circle">Print Pembayaran</a>	
				<?php endif; ?> 
			</div>
		</div>
		<?php endforeach; ?>
		</div>
		<div class="col-lg-4">
			<h4 class="text-primary">* Jika Bukti Pembayaran Anda Lebih Dari Satu</h4>
			<div class="text-center m-3">
				<a href="<?= base_url() . 'Member/printBuktiBayar' ?>" class="genric-btn info circle">Print Semua Pembayaran</a>
			</div>
		</div>
	</div>
</div>
