<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>


<body>
    <?php
    $menuActive = "produk";
    include "menu.php";
    ?>
        <div class="d-flex flex-column w-100" style="padding-left: 300px">
            <div class="container p-3">
            <h2>Daftar Produk</h2>
            <?php
            include 'alertsuccess.php';
            ?>
        <a href="addproduk.php" class="btn btn-primary">Tambah Produk</a>
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
            <td>Id</td>
            <td>Gambar</td>
            <td>Nama Produk</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Action</td>
        </tr>
        <?php
        include "../config.php";
        if(isset($_POST['search'])) {
            $inputan = $_POST['search'];
            $query = "SELECT * FROM produk WHERE deleted_at is null AND nama_produk LIKE '%$inputan%'";
        } else {
            $query = "SELECT * FROM produk WHERE deleted_at is null";
        }
        $result=mysqli_query($connection, $query);
        $produk=mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($produk !== null) {
            do {
                ?>
                <tr>
                    <td><?php echo $produk['id'] ?></td>
                    <td>
                        <img width="200px" src="../image/<?php echo $produk['gambar'] ?>" alt="Gambar">
                    </td>
                    <td><?php echo $produk['nama_produk'] ?></td>
                    <td><?php echo $produk['deskripsi'] ?></td>
                    <td><?php echo $produk['harga'] ?></td>
                    <td>
                        <a href="editproduk.php?id=<?= $produk['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="act_deleteproduk.php?id=<?= $produk['id'] ?>" class="btn btn-danger" onclick="confirmDelete(event)">Delete</a>
                    </td>
                </tr>
                <?php
                
                $produk=mysqli_fetch_array($result, MYSQLI_ASSOC);
            } while ($produk !== null);
        }
        ?>
        
    </table>
    <script src="confirmdelete.js"></script>
</body>

</html>