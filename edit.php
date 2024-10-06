<?php
require('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dokumen berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM documents WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $document = $result->fetch_assoc();
    $stmt->close();
}

// Proses pembaruan dokumen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_name = $_POST['file_name']; // Nama file baru (jika diperlukan)
    
    // Update nama file (jika ingin memungkinkan perubahan)
    $stmt = $conn->prepare("UPDATE documents SET file_name = ? WHERE id = ?");
    $stmt->bind_param("si", $file_name, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect ke halaman utama setelah pembaruan
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokumen</title>
</head>
<body>
    <h1>Edit Dokumen</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="file_name">Nama File:</label>
        <input type="text" name="file_name" value="<?php echo $document['file_name']; ?>" required>
        <button type="submit">Perbarui</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
