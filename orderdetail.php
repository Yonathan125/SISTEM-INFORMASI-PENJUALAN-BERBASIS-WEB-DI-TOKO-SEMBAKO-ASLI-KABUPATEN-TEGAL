<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Halaman Order Detail</title>
</head>

<body>
    <?php include 'menu.php'; ?>
    
    <div class="container">
        <h2>Order</h2>
        <?php include 'admin/alertsuccess.php' ?>
        <div class="row">
            <div class="col-9">
                <?php
                    include "config.php";
                    $userId = $_SESSION['logged_user']['id'];
                    $transaksiId = $_GET['id'];
                    $query = "SELECT * FROM transaksi tr LEFT JOIN metodepembayaran mp ON tr.metode_pembayaran_id = mp.id WHERE tr.id = $transaksiId";
                    $result = mysqli_query($connection, $query);
                    $transaksi = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $statusTransaksi = 'none';
                    if($transaksi['tanggal_bayar'] === null) {
                        $statusTransaksi = 'Menunggu Pembayaran';
                    } else if($transaksi['no_resi'] !== null) {
                        $statusTransaksi = 'Sudah dikirimkan';
                    } else if($transaksi['konfirmasi_pembayaran'] === null) {
                        $statusTransaksi = 'Pembayaran sedang diverifikasi';
                    } else if($transaksi['no_resi'] === null) {
                        $statusTransaksi = 'Sedang disiapkan';
                    } else if($transaksi['konfirmasi_pembayaran'] !== null) {
                        $statusTransaksi = 'Pembayaran dikonfirmasi';
                    }
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Order ID</td>
                        <td><?php echo $transaksiId; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembelian</td>
                        <td><?php echo $transaksi['tanggal_transaksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Status Transaksi</td>
                        <td><?php echo $statusTransaksi; ?></td>
                    </tr>
                    <tr>
                        <td>No Resi</td>
                        <?php
                            $noResi = 'Menunggu Pembayaran';
                            if($transaksi['no_resi'] !== null) {
                                $noResi = $transaksi['no_resi'];
                            }
                        ?>
                        <td><?php echo $noResi; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembayaran</td>
                        <?php
                            $tanggalBayar = 'Menunggu Pembayaran';
                            if($transaksi['tanggal_bayar'] !== null) {
                                $tanggalBayar = $transaksi['tanggal_bayar'];
                            }
                        ?>
                        <td><?php echo $tanggalBayar; ?></td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <?php
                            $metode = 'Menunggu Pembayaran';
                            if($transaksi['tanggal_bayar'] !== null) {
                                $metode = $transaksi['nama_rekening'].' '.$transaksi['no_rekening'].' a/n '.$transaksi['atas_nama'];
                            }
                        ?>
                        <td><?php echo $metode; ?></td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <td>Gambar</td>
                        <td>Nama Produk</td>
                        <td>Harga</td>
                        <td>Kuantitas</td>
                        <td>Subtotal</td>
                    </tr>
                    <?php
                    $query = "SELECT pr.gambar, pr.nama_produk, pr.harga, cd.jumlah_barang FROM transaksi ct JOIN transaksidetail cd ON ct.id = cd.transaksi_id JOIN produk pr ON pr.id = cd.produk_id WHERE ct.user_id = $userId AND ct.id = $transaksiId";
                    $result = mysqli_query($connection, $query);
                    $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $totalHarga = 0;
                    if ($cart !== null) {
                        do {
                    ?>
                            <tr>
                                <td>
                                    <img width="200px" src="image/<?php echo $cart['gambar'] ?>" alt="Gambar">
                                </td>
                                <td><?php echo $cart['nama_produk'] ?></td>
                                <td><?php echo 'Rp '.number_format($cart['jumlah_barang'] * $cart['harga'], 0, ',', '.'); $cart['harga'] ?></td>
                                <td><?php echo $cart['jumlah_barang'] ?></td>
                                <td><?php echo 'Rp '.number_format($cart['jumlah_barang'] * $cart['harga'], 0, ',', '.'); ?></td>
                            </tr>
                    <?php
                            $totalHarga = $totalHarga + 10000 + ($cart['jumlah_barang'] * $cart['harga']);
                            $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        } while ($cart !== null);
                    }
                    ?>
                </table>
                <table class="table w-100">
                    <tr>
                        <td>Ongkos Kirim</td>
                        <td>Rp. <?php echo number_format(10000, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>Rp. <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-3">
                <?php
                    if($transaksi['tanggal_bayar'] === null) {
                ?>
                        <div>Pembayaran dapat ditransfer ke rekening di bawah ini:</div>
                        <table class="table w-100">
                            <?php
                                $query = "SELECT * FROM metodepembayaran WHERE deleted_at is null";
                                $result = mysqli_query($connection, $query);
                                $metode = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                if ($metode !== null) {
                                    do {
                            ?>
                                    <tr>
                                        <td><?php echo $metode['nama_rekening']; ?></td>
                                        <td><?php echo $metode['no_rekening']; ?></td>
                                        <td><?php echo $metode['atas_nama']; ?></td>
                                    </tr>
                            <?php
                                        $metode = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    } while($metode !== null);
                                }
                            ?>
                        </table>
                        <a href="pembayaran.php?id=<?php echo $transaksiId; ?>" class="btn btn-primary">Bayar Sekarang</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="admin/confirmdelete.js"></script>
</body>

</html>