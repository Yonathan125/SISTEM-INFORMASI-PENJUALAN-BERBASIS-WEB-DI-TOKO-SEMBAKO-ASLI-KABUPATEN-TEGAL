<?php
    
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['pesan_berhasil'])) {
?>
        <div class="position-fixed" style="top:35px; right:70px;z-index:9;"> 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                    echo $_SESSION['pesan_berhasil'];
                    unset($_SESSION['pesan_berhasil']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
<?php
    }
?>