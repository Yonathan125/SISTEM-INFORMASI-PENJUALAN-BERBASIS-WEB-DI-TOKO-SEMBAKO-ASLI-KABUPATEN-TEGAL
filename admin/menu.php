<style>
    html {
        height: -webkit-fill-available;
    }

    body {
        display: flex;
        flex-wrap: nowrap;
        min-height: 100vh;
        min-height: -webkit-fill-available;
        height: -webkit-fill-available;
        overflow-x: auto;
    }

    .b-example-divider {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .bi {
        vertical-align: -.125em;
        pointer-events: none;
        fill: currentColor;
    }

    .dropdown-toggle {
        outline: 0;
    }

    .nav-flush .nav-link {
        border-radius: 0;
    }

    .btn-toggle {
        display: inline-flex;
        align-items: center;
        padding: .25rem .5rem;
        font-weight: 600;
        color: rgba(0, 0, 0, .65);
        background-color: transparent;
        border: 0;
    }

    .btn-toggle:hover,
    .btn-toggle:focus {
        color: rgba(0, 0, 0, .85);
        background-color: #d2f4ea;
    }

    .btn-toggle::before {
        width: 1.25em;
        line-height: 0;
        content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
        transition: transform .35s ease;
        transform-origin: .5em 50%;
    }

    .btn-toggle[aria-expanded="true"] {
        color: rgba(0, 0, 0, .85);
    }

    .btn-toggle[aria-expanded="true"]::before {
        transform: rotate(90deg);
    }

    .btn-toggle-nav a {
        display: inline-flex;
        padding: .1875rem .5rem;
        margin-top: .125rem;
        margin-left: 1.25rem;
        text-decoration: none;
    }

    .btn-toggle-nav a:hover,
    .btn-toggle-nav a:focus {
        background-color: #d2f4ea;
    }

    .scrollarea {
        overflow-y: auto;
    }

    .fw-semibold {
        font-weight: 600;
    }

    .lh-tight {
        line-height: 1.25;
    }
</style>

<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['logged_user']) || $_SESSION['logged_user']['role'] !== 'admin') {
        $_SESSION['pesan_error'] = 'Harus login dulu';
        header('Location: ../login.php');
        exit;
    }
    ?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; position: fixed; min-height: 100vh !important;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Toko Asli - Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= $menuActive === 'home' ? 'active' : 'text-white' ?>" aria-current="page">
                Home
            </a>
        </li>
        <li>
            <a href="produk.php" class="nav-link <?= $menuActive === 'produk' ? 'active' : 'text-white' ?>">
                Produk
            </a>
        </li>
        <li>
            <a href="metodepembayaran.php" class="nav-link <?= $menuActive === 'metodepembayaran' ? 'active' : 'text-white'?>">
                Metode Pembayaran
            </a>
        </li>
        <li>
            <a href="kelolaadmin.php" class="nav-link <?= $menuActive === 'kelolaadmin' ? 'active' : 'text-white'?>">
                Kelola Admin
            </a>
        </li>
       <li> 
            <a href="kelolapelanggan.php" class="nav-link <?= $menuActive === 'kelolapelanggan' ? 'active' : 'text-white'?>"> 
                Kelola Pelanggan 
              </a> 
        </li> 
        <li>
            <a href="kelolapesanan.php" class="nav-link <?= $menuActive === 'kelolapesanan' ? 'active' : 'text-white'?>">
                Kelola Pesanan
            </a>
        </li>
        <li>
            <a href="historypesanan.php" class="nav-link <?= $menuActive === 'historypesanan' ? 'active' : 'text-white'?>">
                History Pesanan
            </a>
        </li>
        <li>
            <a href="../logout.php" class="nav-link <?= $menuActive === 'logout' ? 'active' : 'text-white'?>">
                Logout
            </a>
        </li>
    </ul>
</div>