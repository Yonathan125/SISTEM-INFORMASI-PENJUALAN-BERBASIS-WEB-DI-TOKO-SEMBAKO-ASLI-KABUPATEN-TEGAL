<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Metode Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        
        <form action="act_addmetodepembayaran.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_rekening" class="form-label">Nama Rekening</label>
                <input type="text" class="form-control" id="nama_rekening" name="nama_rekening">
            </div>
            <div class="mb-3">
                <label for="no_rekening" class="form-label">No Rekening</label>
                <input type="number" class="form-control" id="no_rekening" name="no_rekening"> 
            </div>
            <div class="mb-3">
                <label for="atas_nama" class="form-label">Atas Nama</label>
                <input type="text" class="form-control" id="atas_nama" name="atas_nama">
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah Metode Pembayaran</button>
        </form> 
    </div>
</body>
</html>