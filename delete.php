<?php
// Koneksi ke database
require('db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Ambil nama file yang akan dihapus dari database
    $result = $conn->query("SELECT signed_file_name FROM documents WHERE id='$id'");
    $row = $result->fetch_assoc();

    if ($row) {
        // Hapus file dari server
        $filePath = 'signed/' . $row['signed_file_name'];
        if (file_exists($filePath)) {
            unlink($filePath); // Menghapus file
        }

        // Hapus dari database
        $conn->query("DELETE FROM documents WHERE id='$id'");
    }

    // Redirect ke index.php setelah penghapusan
    header('Location: index.php');
    exit(); // Pastikan untuk keluar setelah redirect
}
?>
