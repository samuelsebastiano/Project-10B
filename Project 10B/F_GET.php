<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<h2> Form Input Data Mahasiswa - GET </h2>
<form action="proses_get.php" method="GET">
    NIM  : <input type="text" name="nim"><br><br>
    Nama : <input type="text" name="nama"><br><br>
    NO HP : <input type="text" name="no_hp"><br><br>
    Umur  : <input type="number" name="umur"><br><br>
    Tempat Lahir : <input type="text" name="tempat_lahir"><br><br>
    Tanggal Lahir : <input type="date" name="tanggal_lahir"><br><br>
    Alamat : <br>
    <textarea name="alamat" rows="4" cols="30"></textarea><br><br>
    Kota :
    <select name="kota">
        <option>Semarang</option>
        <option>Solo</option>
        <option>Salatiga</option>
        <option>Kudus</option>
        <option>Pekalongan</option>
</select><br><br>
Jenis Kelamin :
<input type="radio" name="jk" value="Laki-Laki"> Laki-laki
<input type="radio" name="jk" value="Perempuan"> Perempuan
<br><br>
Status :
<input type="radio" name="jk" value="Kawin"> Kawin
<input type="radio" name="jk" value="Belum Kawin"> Belum Kawin
<br><br>
Pilih Hobi :
<input type="checkbox" name="hobi[]" value="membaca"> Membaca<br>
<input type="checkbox" name="hobi[]" value="olahraga"> Olahraga<br>
<input type="checkbox" name="hobi[]" value="musik"> Musik<br>
<input type="checkbox" name="hobi[]" value="traveling"> Traveling<br>
<br>
Email : <input type="email" name="email"><br><br>
<input type="submit" value="kirim">
</form>   
</body>
</html>