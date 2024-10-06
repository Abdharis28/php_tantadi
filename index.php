<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unggah Berkas PDF</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    html, body {
      height: 100%; /* Pastikan halaman memenuhi seluruh tinggi layar */
      margin: 0; /* Hapus margin untuk memastikan gradien menyeluruh */
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #3499ff, #3a3985); /* Gradien biru */
      color: white;
      min-height: 100vh; /* Memastikan background mencakup minimal 100% dari tinggi viewport */
      display: flex;
      flex-direction: column;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      margin-top: 15px;
      flex-grow: 1; /* Buat elemen ini fleksibel agar menyesuaikan tinggi */
    }

    h1 {
      text-align: center;
      color: white;
    }

    h2 {
  text-align: left; /* Ubah rata tengah menjadi rata kiri */
  color: white; /* Pastikan warna teks tetap putih */
  margin-bottom: 10px; /* Tambahkan margin bawah jika perlu */
}

    .form-group {
      margin-bottom: 20px;
    }

    .file-upload-area {
      border: 2px dashed #ddd; /* Gaya border area upload */
      border-radius: 5px; /* Sudut membulat */
      padding: 10px; /* Ruang dalam area */
      text-align: center; /* Rata tengah */
      margin-bottom: 10px; /* Jarak bawah */
      cursor: pointer; /* Kursor pointer */
      transition: background-color 0.3s; /* Transisi untuk latar belakang */
      display: flex;
      flex-direction: row; /* Mengubah menjadi horizontal */
      align-items: center; /* Rata tengah vertikal */
      justify-content: space-between; /* Rata tengah horizontal dengan jarak antara */
    }

    .file-upload-area span {
      margin-right: 10px; /* Spasi antara teks dan tombol */
      text-align: left; /* Rata kiri */
    }

    .file-upload-area.hover {
      background-color: #f0f0f0; /* Latar belakang saat hover atau drag */
      border-color: #3499ff; /* Warna border saat drag */
    }

    input[type="file"] {
      display: none; /* Sembunyikan tombol input file default */
    }

    .browse-button {
      background-color: #3499ff; /* Warna tombol */
      color: white; /* Warna teks */
      border: none; /* Hapus border default */
      border-radius: 5px; /* Sudut membulat */
      padding: 10px 20px; /* Ruang dalam tombol */
      cursor: pointer; /* Kursor pointer */
      font-size: 16px; /* Ukuran teks */
      margin-left: 10px; /* Jarak kiri tombol browse */
    }

    .browse-button:hover {
      background-color: #0056b3; /* Warna tombol saat hover */
    }

    .submit-button {
      width: 100%; /* Lebar tombol */
      padding: 10px; /* Ruang dalam tombol */
      background-color: #3499ff; /* Warna tombol */
      color: white; /* Warna teks */
      border: none; /* Hapus border default */
      cursor: pointer; /* Kursor pointer */
      border-radius: 50px; /* Sudut membulat */
      transition: background-color 0.3s, transform 0.3s; /* Transisi untuk latar belakang dan transformasi */
    }

    .submit-button:hover {
      background-color: #0056b3; /* Warna tombol saat hover */
      transform: scale(1.05); /* Efek zoom saat hover */
    }

    .document-list {
      list-style-type: none;
      padding: 0;
    }

    .document-list li {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .icon-button {
      background: none;
      border: 2px solid transparent; /* Border default */
      cursor: pointer;
      padding: 5px;
      color: #73E3FF;
      transition: border 0.3s; /* Transisi untuk border */
    }

    .icon-button:hover {
      border-color: #73E3FF; /* Ganti border menjadi hijau saat hover */
      background-color: transparent; /* Menghapus background saat hover */
    }

    .button-container {
      display: flex;
      gap: 10px; /* Jarak antara tombol */
      align-items: center; /* Rata tengah vertikal */
    }

    .tooltip {
      position: relative;
      display: inline-block;
    }

    .tooltip .tooltip-text {
      visibility: hidden;
      width: 200px; /* Memperlebar tooltip */
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%; /* Tempatkan tooltip di atas elemen */
      left: 50%;
      margin-left: -100px; /* Mengatur posisi horizontal */
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 12px; /* Ubah ukuran font di sini */
    }

    .tooltip:hover .tooltip-text {
      visibility: visible;
      opacity: 1; /* Tampilkan tooltip saat hover */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>TANTADI</h1> <!-- Judul -->
    <h2>Tanda Tangan Digital RT.36 Kasang Pudak</h2> <!-- Slogan -->
    <br>
    <h2>TEMPLAT BERKAS</h2>
    <div class="form-group">
      <div class="file-upload-area">
        <span id="upload-text-template">Berkas SKTM</span>
        <button type="button" class="browse-button" onclick="window.open('https://docs.google.com/document/d/1YtuOrIPPYTxf07hyLBZES63WgOnUGHhNaaWwlAfv_4g/edit?usp=sharing', '_blank');">Unduh</button>
      </div>
    </div>

    <h2>Unggah Berkas PDF</h2>
    <div class="form-group">
      <form action="sign_pdf.php" method="post" enctype="multipart/form-data">
        <div class="file-upload-area" id="drop-area">
          <span id="upload-text">Unggah berkasmu di sini atau</span>
          <button type="button" class="browse-button" onclick="document.getElementById('pdfFile').click();">Jelajahi</button>
          <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" required>
        </div>
        <button type="submit" class="submit-button">
          Bubuhkan Tanda Tangan
        </button>
      </form>
    </div>

    <h2>Daftar Dokumen</h2>
    <ul class="document-list">
      <?php
      // Koneksi ke database
      require('db.php');

      // Ambil daftar dokumen yang telah ditandatangani dari database
      $result = $conn->query("SELECT * FROM documents ORDER BY upload_date DESC");

      while ($row = $result->fetch_assoc()) {
        $uploadDate = date('d-m-Y H:i', strtotime($row['upload_date'])); // Format tanggal dan waktu
        echo "<li>
                <span>{$row['signed_file_name']}</span>
                <div class='button-container'>
                  <div class='tooltip'>
                    <i class='fas fa-info-circle' style='color: #73E3FF;'></i>
                    <span class='tooltip-text'>Dikirim pada: $uploadDate</span>
                  </div>
                  <button class='icon-button' onclick=\"window.open('signed/{$row['signed_file_name']}', '_blank')\">
                    <i class='fas fa-download'></i>
                  </button>
                  <form action='delete.php' method='post' style='display:inline;'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button class='icon-button' onclick=\"return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')\" type='submit'>
                      <i class='fas fa-trash-alt'></i>
                    </button>
                  </form>
                </div>
              </li>";
      }
      ?>
    </ul>
  </div>

  <script>
    const dropArea = document.getElementById('drop-area');
    const inputFile = document.getElementById('pdfFile');
    const uploadText = document.getElementById('upload-text');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, preventDefaults, false);
      document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight the drop area when item is hovering
    ['dragenter', 'dragover'].forEach(eventName => {
      dropArea.addEventListener(eventName, highlight, false);
    });

    // Unhighlight the drop area when item is no longer hovering
    ['dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    dropArea.addEventListener('drop', handleDrop, false);

    // Update text when a file is selected
    inputFile.addEventListener('change', function() {
      const fileName = this.files.length > 0 ? this.files[0].name : 'Unggah dokumenmu di sini atau';
      uploadText.textContent = fileName; // Update the text with the file name
    });

    function preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    }

    function highlight() {
      dropArea.classList.add('hover');
    }

    function unhighlight() {
      dropArea.classList.remove('hover');
    }

    function handleDrop(e) {
      const dt = e.dataTransfer;
      const files = dt.files;

      handleFiles(files);
    }

    function handleFiles(files) {
      // Set the file input value to the first dropped file
      inputFile.files = files;

      // Update the text with the name of the dropped file
      uploadText.textContent = files[0].name;
    }
  </script>
</body>
</html>
