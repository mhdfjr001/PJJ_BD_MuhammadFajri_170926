<?php
$host = "localhost";
$user = "root";     
$pass = "";          
$dbname = "ujicoba";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error .
        "<br>Pastikan database 'ujicoba' sudah dibuat (import ujicoba.sql lewat phpMyAdmin).");
}

$conn->set_charset("utf8");
?>
