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
        <div>
            <form action="" method="POST" class="row mt-3 mb-3">
                <div class="col-auto">
                    <input type="text" class="form-control" id="search" name="search"> 
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form> 
            </div>
            <table class="table table-bordered">
        <tr>
            <td>Order Id</td>
            <td>Tanggal Order</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
        include "../config.php";
        if(isset($_POST['search'])) {
            $inputan = $_POST['search'];
            $query = "SELECT * FROM transaksi WHERE id LIKE '%$inputan%' WHERE no_resi IS NULL";
        } else {
            $query = "SELECT * FROM transaksi WHERE no_resi IS NULL";
        }
        $result=mysqli_query($connection, $query);
        $order=mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($order !== null) {
            do {
                $status = 'none';
                if($order['tanggal_bayar'] === null) {
                    $status = 'Menunggu Pembayaran';
                } else if($order['konfirmasi_pembayaran'] === null) {
                    $status = 'Menunggu konfirmasi pembayaran';
                } else if($order['no_resi'] === null) {
                    $status = 'Diproses';
                } else if($order['no_resi'] !== null) {
                    $status = 'Sudah dikirim';
                }
                ?>
                <tr>
                    <td><?php echo $order['id'] ?></td>
                    <td><?php echo $order['tanggal_transaksi'] ?></td>
                    <td><?php echo $status ?></td>
                    <td>
                        <a href="detailorder.php?id=<?= $order['id'] ?>" class="btn btn-primary">Lihat detail</a>
                    </td>
                </tr>
                <?php
                
                $order=mysqli_fetch_array($result, MYSQLI_ASSOC);
            } while ($order !== null);
        }
        ?>
        
    </table>
    <script src="confirmdelete.js"></script>
</body>

</html>