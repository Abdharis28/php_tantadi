<?php
$servername = "db";  // Nama layanan MySQL dalam Docker Compose
$username = "root";  // Sesuaikan dengan username MySQL
$password = "";  // Sesuaikan dengan password MySQL
$dbname = "pdf_database";  // Nama database MySQL

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
else {
    echo "Koneksi berhasil!";
}
?>
