<?php include 'config.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM buku WHERE id=?");
$stmt->execute([$id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
<title>Edit Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Buku</h2>
<a href="index.php">Kembali</a>
<br><br>


<form action="edit_proses.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $r['id'] ?>">


<label>Judul Buku</label><br>
<input type="text" name="judul" value="<?= $r['judul'] ?>" required><br><br>


<label>Penulis</label><br>
<input type="text" name="penulis" value="<?= $r['penulis'] ?>" required><br><br>


<label>Tahun Terbit</label><br>
<input type="number" name="tahun_terbit" value="<?= $r['tahun_terbit'] ?>" required><br><br>


<label>Kategori</label><br>
<input type="text" name="kategori" value="<?= $r['kategori'] ?>" required><br><br>


<label>Jumlah Halaman</label><br>
<input type="number" name="jumlah_halaman" value="<?= $r['jumlah_halaman'] ?>" required><br><br>


<label>Cover Lama</label><br>
<img src="upload/<?= $r['cover'] ?>" width="100"><br><br>


<label>Ganti Cover Baru (Opsional)</label><br>
<input type="file" name="cover"><br><br>


<button type="submit">Update</button>
</form>
</body>
</html>