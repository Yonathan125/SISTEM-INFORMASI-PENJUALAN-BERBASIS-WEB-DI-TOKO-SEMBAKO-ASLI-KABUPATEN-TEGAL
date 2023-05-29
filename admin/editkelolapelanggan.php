<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelola Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include "../config.php";
        
        $id = $_GET["id"];
        $result = mysqli_query($connection, "SELECT * FROM users WHERE id = $id");
        $kelolapelanggan = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <div class="container">
        <?php
        include "alerterror.php";
        ?>
        
        <form action="act_editkelolapelanggan.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $kelolapelanggan['id'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $kelolapelanggan['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $kelolapelanggan['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= $kelolapelanggan['phone'] ?>"> 
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kelolapelanggan['address'] ?>">  
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $kelolapelanggan['password'] ?>">  
            </div>
            
            <button type="submit" class="btn btn-primary">Edit Kelola Pelanggan</button>
        </form> 
    </div>
</body>
</html>