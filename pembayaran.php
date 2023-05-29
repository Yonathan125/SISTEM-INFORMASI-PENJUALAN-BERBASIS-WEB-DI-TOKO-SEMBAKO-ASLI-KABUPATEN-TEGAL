<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Toko Asli</title>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <?php
        include 'admin/alertsuccess.php';
        ?>

        <div class="mt-3">
            <div class="row">
                <form method="POST" enctype="multipart/form-data" action="actions/pembayaran.php">
                    <?php
                        include "config.php";
                        $query = "SELECT * FROM metodepembayaran WHERE deleted_at is null";
                        $result = mysqli_query($connection, $query);
                        $metode = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    ?>
                    <div class="mb-3">
                        <label for="metode" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" aria-label="Default select example" name="metode">
                            <?php
                                do {
                            ?>
                                    <option value="<?php echo $metode['id']; ?>"><?php echo $metode['nama_rekening'].' '.$metode['no_rekening'].' a/n '.$metode['atas_nama']; ?></option>
                            <?php
                                    $metode = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                } while($metode !== null);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Foto Bukti Transfer Bank</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">
                    <div class="mb-3">
                        <input type="submit" value="Bayar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>