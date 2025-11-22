<?php
include 'config.php';


$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun_terbit'];
$kategori = $_POST['kategori'];
$halaman = $_POST['jumlah_halaman'];


# VALIDASI TAHUN ANGKA
if (!is_numeric($tahun)) {
die("Tahun terbit harus angka!");
}


# UPLOAD COVER
$coverName = null;
if ($_FILES['cover']['name']) {
$coverName = time() . '_' . $_FILES['cover']['name'];
move_uploaded_file($_FILES['cover']['tmp_name'], 'upload/' . $coverName);
}


$stmt = $conn->prepare("INSERT INTO buku (judul, penulis, tahun_terbit, kategori, jumlah_halaman, cover) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$judul, $penulis, $tahun, $kategori, $halaman, $coverName]);


header("Location: index.php");
?>