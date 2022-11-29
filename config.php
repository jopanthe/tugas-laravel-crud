<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'absensi_sudah_jadi';

$conn = mysqli_connect($host, $user, $pass, $db) or die('connection failed');

mysqli_select_db($conn, $db);
