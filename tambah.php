<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
    <link rel="stylesheet" href="css/c.css">
    <link rel="icon" href="img/Umr.png">
</head>

<body>
    <ul>
        <li><a href="index.php">Home</a>
        </li>
    </ul>
    <center>

        <form action="proses_tambah.php" method="POST">
            <br>
            <table>


                <tr>
                    <br><label for="id">no: </label></br>
                    <input type="int" name="id" placeholder="id" />
                </tr>

                <tr>
                    <br><label for="nim">npm: </label></br>
                    <input type="varchar" name="nim" placeholder="npm" />
                </tr>

                <tr>
                    <br><label for="nama">nama: </label></br>
                    <input type="char" name="nama" placeholder="nama" />
                </tr>

                <tr>
                    <br><label for="prodi">Prodi: </label></br>
                    <input type="varchar" name="prodi" placeholder="prodi" />
                </tr>

                <tr>
                    <br><label for="jk">jenis kelamin: </label></br>
                    <input type="radio" name="jk" value="L" id="L" /> Laki-laki
                    <input type="radio" name="jk" value="P" id="P" /> Perempuan
                </tr>
                <tr>
                    <br><label for="alamat">Alamat: </label></br>
                    <input type="text" name="alamat" placeholder="alamat" />
                </tr>

                <tr>
                    <br><input type="submit" value="submit" name="submit" /></br>
                </tr>


            </table>
        </form>
    </center>
</body>

</html>