<?php

require('fpdf/fpdf.php');
require('fpdi/src/autoload.php'); // Tambahkan autoload FPDI
require('db.php');

use setasign\Fpdi\Fpdi;

if (isset($_FILES['pdfFile'])) {
    $uploadDir = 'uploads/';
    $signedDir = 'signed/';
    
    // Buat folder jika belum ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (!is_dir($signedDir)) {
        mkdir($signedDir, 0777, true);
    }
    
    // Ambil file PDF
    $pdfFile = $_FILES['pdfFile'];
    $pdfFileName = basename($pdfFile['name']);
    $uploadFilePath = $uploadDir . $pdfFileName;

    // Pindahkan file yang diunggah ke folder 'uploads'
    if (move_uploaded_file($pdfFile['tmp_name'], $uploadFilePath)) {
        // Proses penandatanganan (contoh sederhana dengan menambahkan teks)
        $signedFilePath = $signedDir . $pdfFileName;
        signPdf($uploadFilePath, $signedFilePath);

        // Simpan informasi ke database
        $stmt = $conn->prepare("INSERT INTO documents (file_name, signed_file_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $pdfFileName, $pdfFileName);
        $stmt->execute();
        $stmt->close();

        // Kembali ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
} else {
    echo "Tidak ada file yang diunggah.";
}

// Fungsi sederhana untuk menambahkan teks "Tertandatangani" ke PDF (menggunakan FPDF)
function signPdf($inputFile, $outputFile) {

    // Inisialisasi FPDI
    $pdf = new FPDI();

    // Ambil jumlah halaman di PDF asli
    $pageCount = $pdf->setSourceFile($inputFile);

    // Loop setiap halaman dan tambahkan ke dokumen baru
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $tplId = $pdf->importPage($pageNo);
        $pdf->AddPage();
        $pdf->useTemplate($tplId, 10, 10, 200); // Menyesuaikan posisi dan skala

        // Tambahkan tanda tangan di halaman terakhir (atau semua halaman jika diinginkan)
        if ($pageNo == $pageCount) {
            $pdf->Image('tanda-tangan.png', 140, 215, 60); // Tanda tangan pada posisi X=140, Y=215 dengan lebar 60
        }
    }
    
    // require('fpdf/fpdf.php');

    // // Membuat dokumen PDF baru
    // $pdf = new FPDF();
    // $pdf->AddPage();
    // $pdf->SetFont('Arial', 'B', 16);

    // // Tambahkan gambar tanda tangan ke PDF (posisi x, y, dan lebar ditentukan)
    // $pdf->Image('tanda-tangan.png', 10, 10, 50); // X=10, Y=10, lebar gambar=50

    // // Tambahkan teks tanda tangan (opsional)
    // $pdf->Cell(40, 10, 'Tertandatangani!');

    // Simpan PDF yang sudah ditandatangani
    $pdf->Output($outputFile, 'F');
}

?>
