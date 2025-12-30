<!-- membuat koneksi ke database -->
<?php
// kode koneksi ke database
function query($query)
{
    $conn = mysqli_connect("localhost", "root", "", "db_kampus2");
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


?>