<?php
require "config.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $stmt = $conn->prepare("UPDATE siswa SET nis=?, nama=?, kelas=?, jurusan=? WHERE id_siswa=?");
    $stmt->bind_param("ssssi", $nis, $nama, $kelas, $jurusan, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php?status=edit");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM siswa WHERE id_siswa = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$siswa = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$siswa) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Siswa</h2>
    <form class="form-box" method="POST">
        <label>NIS</label>
        <input type="text" name="nis" value="<?= htmlspecialchars($siswa['nis']) ?>" required>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($siswa['nama']) ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= htmlspecialchars($siswa['kelas']) ?>" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="<?= htmlspecialchars($siswa['jurusan']) ?>" required>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
    <a class="back-link" href="index.php">&larr; Kembali ke daftar siswa</a>
</div>
</body>
</html>
