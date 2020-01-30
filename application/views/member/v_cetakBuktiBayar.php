<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/') ?>css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<?php foreach ($booking as $b) : ?>
<div class="card p-3 mb-3">
<div>
    <a href="<?= base_url() . 'Member'; ?>"><img src="<?php echo base_url('assets/') ?>img/logo.jpg" alt="" title="" / style = "width: 180px; height: 57px;"></a>
</div><hr>
    <table width="100%">
        <tbody class="mb-5">
            <tr>
                <th colspan="2"><h2>Nomor Booking</h2></th><td><h2><?= $b->no_booking ?></h2></td>
            </tr>
            <tr>
                <th colspan="3"><h4 class="text-primary"><hr></th>
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
        </tbody>
    </table>
</div>
<?php endforeach; ?>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>