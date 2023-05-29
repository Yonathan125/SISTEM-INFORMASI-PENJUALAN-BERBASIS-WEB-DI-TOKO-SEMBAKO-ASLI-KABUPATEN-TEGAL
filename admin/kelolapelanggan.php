<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>


<body>
    <?php
    $menuActive = "kelolapelanggan";
    include "menu.php";
    ?>

    <div class="d-flex flex-column w-100" style="padding-left: 300px">
        <div class="container p-3">
        <h2>Kelola Pelanggan</h2>
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
                    <td>Id</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No Telepon</td>
                    <td>Alamat</td>
                    <td>Password</td>
                    <td>Action</td>
                </tr>
                <?php
                include "../config.php";
                if(isset($_POST['search'])) {
                    $inputan = $_POST['search'];
                    $query = "SELECT * FROM users WHERE role != 'admin' and deleted_at is null AND name LIKE '%$inputan%'";
                } else {
                    $query = "SELECT * FROM users WHERE role != 'admin' AND deleted_at is null";
                }
                $result=mysqli_query($connection, $query);
                $kelolapelanggan=mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($kelolapelanggan !== null) { 
                    do {
                ?>
                    <tr>
                        <td><?php echo $kelolapelanggan['id'] ?></td>
                        <td><?php echo $kelolapelanggan['name'] ?></td>
                        <td><?php echo $kelolapelanggan['email'] ?></td>
                        <td><?php echo $kelolapelanggan['phone'] ?></td>
                        <td><?php echo $kelolapelanggan['address'] ?></td>
                        <td><?php echo $kelolapelanggan['password'] ?></td>
                        <td>
                            <a href="editkelolapelanggan.php?id=<?= $kelolapelanggan['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="act_deletekelolapelanggan.php?id=<?= $kelolapelanggan['id'] ?>" class="btn btn-danger" onclick="confirmDelete(event)">Delete</a>
                        </td>
                    </tr>
                <?php
                
                    $kelolapelanggan=mysqli_fetch_array($result, MYSQLI_ASSOC);
                } while ($kelolapelanggan !== null);
            }
            ?>
        
            </table>
       
    <script src="confirmdelete.js"></script>
</body>

</html>