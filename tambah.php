<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Tambah Buku</h2>
<a href="index.php">Kembali</a>
<br><br>


<form action="tambah_proses.php" method="POST" enctype="multipart/form-data">
<label>Judul Buku</label><br>
<input type="text" name="judul" required><br><br>


<label>Penulis</label><br>
<input type="text" name="penulis" required><br><br>


<label>Tahun Terbit</label><br>
<input type="number" name="tahun_terbit" required><br><br>


<label>Kategori</label><br>
<input type="text" name="kategori" required><br><br>


<label>Jumlah Halaman</label><br>
<input type="number" name="jumlah_halaman" required><br><br>


<label>Cover Buku</label><br>
<input type="file" name="cover" accept="image/*"><br><br>


<button type="submit">Simpan</button>
</form>
</body>
</html>