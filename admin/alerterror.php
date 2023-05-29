<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['pesan_error'])) {
?>
        <div class="position-fixed" style="top:35px; right:70px;z-index:9;">
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['pesan_error'];
                    unset($_SESSION['pesan_error']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>       
            </div>
        </div>
<?php
    }
?>