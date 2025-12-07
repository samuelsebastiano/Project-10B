<?php
// Fungsi sanitasi
function bersihkan($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Ambil & sanitasi semua input
$nim            = isset($_POST['nim']) ? bersihkan($_POST['nim']) : '';
$nama           = isset($_POST['nama']) ? bersihkan($_POST['nama']) : '';
$no_hp          = isset($_POST['no_hp']) ? bersihkan($_POST['no_hp']) : '';
$umur           = isset($_POST['umur']) ? bersihkan($_POST['umur']) : '';
$tempat_lahir   = isset($_POST['tempat_lahir']) ? bersihkan($_POST['tempat_lahir']) : '';
$tanggal_lahir  = isset($_POST['tanggal_lahir']) ? bersihkan($_POST['tanggal_lahir']) : '';
$alamat         = isset($_POST['alamat']) ? bersihkan($_POST['alamat']) : '';
$email          = isset($_POST['email']) ? bersihkan($_POST['email']) : '';

$kota           = isset($_POST['kota']) ? $_POST['kota'] : '';
$jk             = isset($_POST['jk']) ? $_POST['jk'] : '';
$status         = isset($_POST['status']) ? $_POST['status'] : '';
$hobi           = isset($_POST['hobi']) ? $_POST['hobi'] : [];

// ===============================
// VALIDASI
// ===============================
$errors = [];
$valid  = [];

// Validasi nama (huruf & spasi)
if (!preg_match("/^[a-zA-Z ]+$/", $nama)) {
    $errors['nama'] = "Nama harus huruf dan spasi!";
} else {
    $valid['nama'] = "Nama valid ✓";
}

// Validasi umur (angka)
if (!ctype_digit($umur)) {
    $errors['umur'] = "Umur harus angka!";
} else {
    $valid['umur'] = "Umur valid ✓";
}

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Format email tidak valid!";
} else {
    $valid['email'] = "Email valid ✓";
}

// ===============================
// Olah hobi menjadi string
// ===============================
$hobi_bersih = [];
if (!empty($hobi)) {
    foreach ($hobi as $h) {
        $hobi_bersih[] = bersihkan($h);
    }
}
$hobi_output = implode(", ", $hobi_bersih);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Data POST</title>
    <style>
        .error { color: red; }
        .valid { color: green; }
        body { font-family: Arial; }
    </style>
</head>
<body>

<h2>Hasil Input Data Mahasiswa (Metode POST)</h2>

<p><b>NIM:</b> <?= $nim ?></p>
<p><b>Nama:</b> <?= $nama ?>
    <?php
        if (isset($errors['nama'])) echo "<span class='error'> - {$errors['nama']}</span>";
        else echo "<span class='valid'> - {$valid['nama']}</span>";
    ?>
</p>

<p><b>No HP:</b> <?= $no_hp ?></p>

<p><b>Umur:</b> <?= $umur ?>
    <?php
        if (isset($errors['umur'])) echo "<span class='error'> - {$errors['umur']}</span>";
        else echo "<span class='valid'> - {$valid['umur']}</span>";
    ?>
</p>

<p><b>Tempat Lahir:</b> <?= $tempat_lahir ?></p>
<p><b>Tanggal Lahir:</b> <?= $tanggal_lahir ?></p>
<p><b>Alamat:</b> <?= $alamat ?></p>

<p><b>Kota:</b>
    <?php
        if ($kota == "Semarang") echo "Semarang";
        elseif ($kota == "Solo") echo "Solo";
        elseif ($kota == "Salatiga") echo "Salatiga";
        elseif ($kota == "Kudus") echo "Kudus";
        else echo "Pekalongan";
    ?>
</p>

<p><b>Jenis Kelamin:</b> <?= $jk ?></p>

<p><b>Status:</b> <?= $status ?></p>

<p><b>Hobi:</b> <?= $hobi_output == "" ? "Tidak ada hobi" : $hobi_output ?></p>

<p><b>Email:</b> <?= $email ?>
    <?php
        if (isset($errors['email'])) echo "<span class='error'> - {$errors['email']}</span>";
        else echo "<span class='valid'> - {$valid['email']}</span>";
    ?>
</p>

</body>
</html>
