<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Buku Perpustakaan</title>
<link rel="stylesheet" href="style.css">

<?php 
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
</head>

<body>

<div class="container">

    <h2>Data Buku Perpustakaan</h2>

    <div class="top-bar">
        <a href="tambah.php" class="btn">+ Tambah Buku</a>

        <form method="GET" action="" style="display:flex; gap:10px;">
            <input type="text" name="cari" placeholder="Cari judul / penulis...">
            <button type="submit">Cari</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Cover</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Jumlah Halaman</th>
            <th>Aksi</th>
        </tr>

        <?php
        if (isset($_GET['cari'])) {
            $keyword = "%" . $_GET['cari'] . "%";
            $query = $conn->prepare("SELECT * FROM buku WHERE judul LIKE ? OR penulis LIKE ?");
            $query->execute([$keyword, $keyword]);
        } else {
            $query = $conn->prepare("SELECT * FROM buku");
            $query->execute();
        }

        while ($row = $query->fetch(PDO::FETCH_ASSOC)):
        ?>

        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>

            <td>
                <img src="upload/<?= htmlspecialchars($row['cover']) ?>" 
                     class="cover-img" 
                     onerror="this.src='noimage.png'">
            </td>

            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= htmlspecialchars($row['penulis']) ?></td>
            <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
            <td><?= htmlspecialchars($row['kategori']) ?></td>
            <td><?= htmlspecialchars($row['jumlah_halaman']) ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                    Delete
                </a>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>
</div>

</body>
</html>
