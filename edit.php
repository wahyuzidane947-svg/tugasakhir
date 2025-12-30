<?php
// Include koneksi ke database atau fungsi
// functions.php
// functions.php

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_kampus2");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk melakukan query dan mengembalikan hasil sebagai array
function query($query)
{
    global $conn; // Memastikan koneksi digunakan dalam fungsi
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; // Menambahkan setiap baris hasil query ke dalam array
    }
    return $rows; // Mengembalikan array hasil query
}



// Ambil data berdasarkan nim yang dikirim melalui GET
$nim = $_GET['nim'];

// Ambil data mahasiswa berdasarkan nim
$dataMahasiswa = query("SELECT * FROM mahasw WHERE nim = '$nim'")[0]; // Pastikan query mengembalikan satu data

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Update data di database
    $sql = "UPDATE mahasw SET nim = '$nim', nama = '$nama', prodi = '$prodi', jk = '$jk', alamat = '$alamat' WHERE nim = '$nim'";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil diupdate!"); window.location.href = "index.php";</script>';
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="css/c.css">
    <link rel="icon" href="img/Umr.png">
</head>

<body>
    <ul>
        <li><a href="index.php">Home</a>
        </li>
    </ul>
    <center>
        <h2>Edit Data Mahasiswa</h2>
    </center>
    <center>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>No:</td>
                    <td><input type="text" name="id" value="<?= $dataMahasiswa['id']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Npm:</td>
                    <td><input type="text" name="nim" value="<?= $dataMahasiswa['nim']; ?>" required /></td>
                </tr>
                <tr>
                    <td>Nama:</td>
                    <td><input type="text" name="nama" value="<?= $dataMahasiswa['nama']; ?>" required /></td>
                </tr>
                <tr>
                    <td>Prodi:</td>
                    <td><input type="text" name="prodi" value="<?= $dataMahasiswa['prodi']; ?>" required /></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin:</td>
                    <td>
                        <input type="radio" name="jk" value="L" <?= $dataMahasiswa['jk'] == 'L' ? 'checked' : ''; ?> /> Laki-laki
                        <input type="radio" name="jk" value="P" <?= $dataMahasiswa['jk'] == 'P' ? 'checked' : ''; ?> /> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td><input type="text" name="alamat" value="<?= $dataMahasiswa['alamat']; ?>" required /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Simpan" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>