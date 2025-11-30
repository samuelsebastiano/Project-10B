<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hasil Input GET</title>
    <style>
      body{font-family:Segoe UI,Roboto,Arial;margin:20px}
      .result{background:#f7f7f7;border:1px solid #ddd;padding:16px;border-radius:6px;max-width:720px}
      .label{font-weight:700}
    </style>
  </head>
  <body>

    <h2>Data yang Dikirim dengan Metode GET</h2>

    <div class="result">
    <?php
    // helper for safe output
    function safe_val($key, $default = '-'){
        if (!isset($_GET[$key]) || $_GET[$key] === '') return $default;
        $v = $_GET[$key];
        if (is_array($v)) {
            return array_map(function($x){ return htmlspecialchars($x, ENT_QUOTES, 'UTF-8'); }, $v);
        }
        return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
    }

    // If no GET data was provided, show a friendly message
    if (empty($_GET)){
        echo "<p>Tidak ada data yang dikirim. Silakan isi form terlebih dahulu.</p>";
        echo '<p><a href="F_GET.php">Kembali ke form</a></p>';
        echo "</div></body></html>";
        exit;
    }

    // Simple sanitized values with defaults
    $nim = safe_val('nim');
    $nama = safe_val('nama');
    $nohp = safe_val('no_hp');
    $umur = safe_val('umur');
    $tempat_lahir = safe_val('tempat_lahir');
    $tanggal_lahir = safe_val('tanggal_lahir');
    $alamat = safe_val('alamat');
    $email = safe_val('email');

    echo "<p><span class=\"label\">NIM:</span> {$nim}</p>";
    echo "<p><span class=\"label\">Nama:</span> {$nama}</p>";
    echo "<p><span class=\"label\">NO HP:</span> {$nohp}</p>";
    echo "<p><span class=\"label\">Umur:</span> {$umur}</p>";
    echo "<p><span class=\"label\">Tempat Lahir:</span> {$tempat_lahir}</p>";
    echo "<p><span class=\"label\">Tanggal Lahir:</span> {$tanggal_lahir}</p>";
    echo "<p><span class=\"label\">Alamat:</span> {$alamat}</p>";

    // Kota: limit to known options and fallback to Pekalongan (original behavior)
    $kota = safe_val('kota', 'Pekalongan');
    $known = ['Semarang','Solo','Salatiga','Kudus','Pekalongan'];
    if (in_array($kota, $known, true)){
        echo "<p><span class=\"label\">Kota:</span> {$kota}</p>";
    } else {
        // still show sanitized value if it's unusual
        echo "<p><span class=\"label\">Kota:</span> {$kota}</p>";
    }

    // Jenis kelamin
    $jk = safe_val('jk', '-');
    if ($jk === 'Laki-laki') {
        echo "<p><span class=\"label\">Jenis Kelamin:</span> Laki-laki</p>";
    } elseif ($jk === 'Perempuan') {
        echo "<p><span class=\"label\">Jenis Kelamin:</span> Perempuan</p>";
    } else {
        echo "<p><span class=\"label\">Jenis Kelamin:</span> {$jk}</p>";
    }

    // Status
    $status = safe_val('status', '-');
    if ($status === 'Kawin') {
        echo "<p><span class=\"label\">Status:</span> Kawin</p>";
    } elseif ($status === 'Belum Kawin'){
        echo "<p><span class=\"label\">Status:</span> Belum Kawin</p>";
    } else {
        echo "<p><span class=\"label\">Status:</span> {$status}</p>";
    }

    // Hobi — sanitize each item and handle both string/array
    echo "<p><span class=\"label\">Hobi:</span> ";
    if (!empty($_GET['hobi'])){
        $hobis = safe_val('hobi');
        if (is_array($hobis)){
            echo implode(', ', $hobis);
        } else {
            echo $hobis;
        }
    } else {
        echo "Tidak ada hobi yang dipilih";
    }
    echo "</p>";

    echo "<p><span class=\"label\">Email:</span> {$email}</p>";

    // Small helpful link back to the form
    echo '<p><a href="F_GET.php">&laquo; Kembali ke form</a></p>';

    ?>
    </div>

  </body>
</html>