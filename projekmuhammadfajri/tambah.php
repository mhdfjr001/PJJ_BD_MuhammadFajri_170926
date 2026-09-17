<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $stmt = $conn->prepare("INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nis, $nama, $kelas, $jurusan);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php?status=tambah");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Siswa</h2>
    <form class="form-box" method="POST">
        <label>NIS</label>
        <input type="text" name="nis" required>

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <input type="text" name="kelas" placeholder="XII PPLG 1" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="PPLG" required>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a class="back-link" href="index.php">&larr; Kembali ke daftar siswa</a>
</div>
</body>
</html>
