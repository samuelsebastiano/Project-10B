<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input POST</title>
</head>
<body>

<h2>Data yang Dikirim dengan Metode POST</h2>

<?php
// CEK APAKAH FORM BENAR-BENAR DIKIRIM MENGGUNAKAN POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p style='color:red;'>Form belum disubmit!</p>";
    exit;
}

// FUNGSI SANITASI
function clean($data) {
    return htmlspecialchars(trim($data));
}

// Ambil semua data
$nim            = clean($_POST['nim'] ?? '');
$nama           = clean($_POST['nama'] ?? '');
$no_hp          = clean($_POST['no_hp'] ?? '');
$umur           = clean($_POST['umur'] ?? '');
$tempat_lahir   = clean($_POST['tempat_lahir'] ?? '');
$tanggal_lahir  = clean($_POST['tanggal_lahir'] ?? '');
$alamat         = clean($_POST['alamat'] ?? '');
$kota           = clean($_POST['kota'] ?? '');
$jk             = clean($_POST['jk'] ?? '');
$status         = clean($_POST['status'] ?? '');
$email          = clean($_POST['email'] ?? '');
$hobi           = $_POST['hobi'] ?? [];

// VALIDASI
$errors = [];

// Nama harus huruf
if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
    $errors[] = "Nama harus huruf dan spasi saja!";
}

// Umur harus angka
if (!ctype_digit($umur)) {
    $errors[] = "Umur harus angka!";
}

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid!";
}

// TAMPILKAN ERROR JIKA ADA
if (!empty($errors)) {
    echo "<h3 style='color:red;'>Terjadi kesalahan:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li style='color:red;'>$e</li>";
    }
    echo "</ul>";
    echo "<p><a href='form_post.php'>Kembali ke Form</a></p>";
    exit;
}

// Jika tidak ada error - tampilkan data
echo "<p style='color:green;'>Semua data valid ✔</p>";

echo "NIM : $nim <br>";
echo "Nama : $nama <br>";
echo "NO HP : $no_hp <br>";
echo "Umur : $umur <br>";
echo "Tempat Lahir : $tempat_lahir <br>";
echo "Tanggal Lahir : $tanggal_lahir <br>";
echo "Alamat : $alamat <br>";

// KOTA
if (in_array($kota, ['Semarang','Solo','Salatiga','Kudus'])) {
    echo "Kota : " . htmlspecialchars($kota) . "<br>";
} else {
    echo "Kota : Tidak diketahui<br>";
}

// JENIS KELAMIN
if ($jk == "Laki-Laki") {
    echo "Jenis Kelamin : Laki-laki<br>";
} else {
    echo "Jenis Kelamin : Perempuan<br>";
}

// STATUS
if ($status == "Kawin") {
    echo "Status : Kawin<br>";
} else {
    echo "Status : Belum Kawin<br>";
}

// HOBI
echo "Hobi : ";
if (!empty($hobi)) {
    foreach ($hobi as $h) {
        echo clean($h) . " ";
    }
} else {
    echo "Tidak ada hobi yang dipilih";
}

echo "<br>Email : $email <br>";

?>
</body>
</html>
