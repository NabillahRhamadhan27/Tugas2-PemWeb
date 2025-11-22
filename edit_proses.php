<?php
include 'config.php';


$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun_terbit'];
$kategori = $_POST['kategori'];
$halaman = $_POST['jumlah_halaman'];


if (!is_numeric($tahun)) {
die("Tahun harus angka!");
}


# Ambil cover lama
$stmt = $conn->prepare("SELECT cover FROM buku WHERE id=?");
$stmt->execute([$id]);
$old = $stmt->fetch(PDO::FETCH_ASSOC)['cover'];


$coverName = $old;


if ($_FILES['cover']['name']) {
$coverName = time() . '_' . $_FILES['cover']['name'];
move_uploaded_file($_FILES['cover']['tmp_name'], 'upload/' . $coverName);
}


$stmt = $conn->prepare("UPDATE buku SET judul=?, penulis=?, tahun_terbit=?, kategori=?, jumlah_halaman=?, cover=? WHERE id=?");
$stmt->execute([$judul, $penulis, $tahun, $kategori, $halaman, $coverName, $id]);


header("Location: index.php");
?>