<?php
require "config.php";

$result = $conn->query("SELECT * FROM siswa ORDER BY id_siswa ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa - Database Ujicoba</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="top-bar">
        <div>
            <h1>Data Siswa</h1>
            <p class="subtitle">Tabel: <b>siswa</b></p>
        </div>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <div class="alert">
            <?php
            if ($_GET['status'] == 'tambah') echo "Data siswa berhasil ditambahkan.";
            if ($_GET['status'] == 'edit') echo "Data siswa berhasil diubah.";
            if ($_GET['status'] == 'hapus') echo "Data siswa berhasil dihapus.";
            ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_siswa']) ?></td>
                    <td><?= htmlspecialchars($row['nis']) ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kelas']) ?></td>
                    <td><?= htmlspecialchars($row['jurusan']) ?></td>
                    <td>
                        <a class="btn btn-edit" href="edit.php?id=<?= $row['id_siswa'] ?>">Edit</a>
                        <a class="btn btn-delete" href="hapus.php?id=<?= $row['id_siswa'] ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6" class="empty">Belum ada data siswa.</td></tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>
<?php $conn->close(); ?>
