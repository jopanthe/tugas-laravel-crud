<?php
include 'config.php';
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/datatables/datatables.min.css">
    <title><?= $title ?></title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');



        * {
            font-family: 'Poppins', sans-serif;
        }

        @media print {

            .print,
            .navbar {
                display: none;
            }

            .container {
                width: 100%;
            }
        }

        .navbar .nav-item .nav-link:hover {
            color: green;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm fw-bold">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/login_absensi.png" width="70"> Absensi XII RPL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?> fs-6" aria-current="page" href="dasboard.php">Dasboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'siswa' ? 'active' : '' ?>" href="siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'absensi' ? 'active' : '' ?>" href="absen.php">Absen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'laporan' ? 'active' : '' ?>" href="laporan.php">Laporan Siswa</a>
                    </li>
                    <a href="layout/proses_logout.php" class="btn btn-danger">Keluar</a>

                </ul>
            </div>
        </div>
    </nav>