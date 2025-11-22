<?php
include 'config.php';

$id = $_GET['id'];

# Ambil cover lama untuk dihapus
$stmt = $conn->prepare("SELECT cover FROM buku WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data && $data['cover']) {
    $filePath = "upload/" . $data['cover'];
    if (file_exists($filePath)) {
        unlink($filePath); // hapus file cover
    }
}

# Hapus data buku
$stmt = $conn->prepare("DELETE FROM buku WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
?>
