<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>


<body>
    <?php
    $menuActive = "kelolapesanan";
    include "menu.php";
    ?>
    <div class="d-flex flex-column w-100" style="padding-left: 300px">
        <div class="container p-3">
            <h2>Kelola Pesanan</h2>
            <?php
            include 'alertsuccess.php';
            ?>
            <div class="row">
                <div class="col-9">
                    <?php
                    include "../config.php";
                    
                    $transaksiId = $_GET['id'];
                    $query = "SELECT * FROM transaksi tr LEFT JOIN metodepembayaran mp ON tr.metode_pembayaran_id = mp.id WHERE tr.id = $transaksiId";
                    $result = mysqli_query($connection, $query);
                    $transaksi = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $statusTransaksi = 'none';
                    if ($transaksi['tanggal_bayar'] === null) {
                        $statusTransaksi = 'Menunggu Pembayaran';
                    } else if ($transaksi['konfirmasi_pembayaran'] !== null) {
                        $statusTransaksi = 'Pembayaran dikonfirmasi';
                    } else if ($transaksi['no_resi'] === null) {
                        $statusTransaksi = 'Sedang disiapkan';
                    } else if ($transaksi['no_resi'] !== null) {
                        $statusTransaksi = 'Sudah dikirimkan';
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
                            <td><?php echo $transaksi['no_resi']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembayaran</td>
                            <td><?php echo $transaksi['tanggal_bayar']; ?></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td><?php echo $transaksi['nama_rekening'] . ' ' . $transaksi['no_rekening'] . ' a/n ' . $transaksi['atas_nama']; ?></td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td>Gambar</td>
                            <td>Nama Produk</td>
                            <td>Harga</td>
                            <td>Kuantitas</td>
                        </tr>
                        <?php
                        $query = "SELECT pr.gambar, pr.nama_produk, pr.harga, cd.jumlah_barang FROM transaksi ct JOIN transaksidetail cd ON ct.id = cd.transaksi_id JOIN produk pr ON pr.id = cd.produk_id WHERE ct.id = $transaksiId";
                        $result = mysqli_query($connection, $query);
                        $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $totalHarga = 0;
                        if ($cart !== null) {
                            do {
                        ?>
                                <tr>
                                    <td>
                                        <img width="200px" src="../image/<?php echo $cart['gambar'] ?>" alt="Gambar">
                                    </td>
                                    <td><?php echo $cart['nama_produk'] ?></td>
                                    <td><?php echo $cart['harga'] ?></td>
                                    <td><?php echo $cart['jumlah_barang'] ?></td>
                                </tr>
                        <?php
                                $totalHarga = $totalHarga + 10000 + ($cart['jumlah_barang'] * $cart['harga']);
                                $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            } while ($cart !== null);
                        }
                        ?>
                    </table>
                </div>
                <div class="col-3">
                    <table class="table w-100">
                        <tr>
                            <td>Ongkos Kirim</td>
                            <td>Rp. <?php echo number_format(10000, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>Rp. <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Bukti Bayar</td>
                            <td>
                                <?php
                                    if($transaksi['bukti_bayar'] !== null) {
                                ?>
                                        <img width="200px" src="../image/<?php echo $transaksi['bukti_bayar'] ?>" alt="Gambar">        
                                <?php
                                    } else {
                                ?>
                                     <div>Belum bayar</div>   
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                            if($transaksi['bukti_bayar'] !== null && $transaksi['konfirmasi_pembayaran'] === null) {
                        ?>
                                <tr>
                                    <td>Konfirmasi Pembayaran</td>
                                    <td>
                                        <form method="POST" action="act_konfirmasi.php">
                                            <input type="hidden" name="order_id" value="<?php echo $transaksiId; ?>">
                                            <input type="submit" value="Konfirmasi Pembayaran" class="btn btn-primary">
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            } else if($transaksi['bukti_bayar'] !== null && $transaksi['konfirmasi_pembayaran'] !== null && $transaksi['no_resi'] === null) {
                        ?>
                                <tr>
                                    <td>Update Resi</td>
                                    <td>
                                        <form method="POST" action="act_inputresi.php">
                                            <input type="hidden" name="order_id" value="<?php echo $transaksiId; ?>">
                                            <input type="text" name="no_resi" class="form-control">
                                            <input type="submit" value="Update Resi" class="btn btn-primary">
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>