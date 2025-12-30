<?php
$conn = mysqli_connect("localhost", "root", "", "db_kampus2");

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// ambil data
//submit di ganti save
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];


    //query
    $sql = "INSERT INTO mahasw (id, nim, nama, prodi, jk, alamat) VALUES ('$id', '$nim', '$nama', '$prodi', '$jk', '$alamat')";
    $query = mysqli_query($conn, $sql);
    // kutip di hapus

    //berhasil?
    if ($sql) {
        echo '<script>';
        echo 'const message = "Data Berhasil Disimpan";';
        echo 'alert(message);';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        echo "Gagal Menyimpan data";
    }
}
