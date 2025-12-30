<?php
// Include functions.php or database connection
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

// Check if 'nim' is set in the URL query parameters
if (isset($_GET['nim'])) {
    $nim = $_GET['nim']; // Get the nim from the URL query

    // Delete query
    $sql = "DELETE FROM mahasw WHERE nim = '$nim'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the main page after deletion
        echo '<script>alert("Data berhasil dihapus!"); window.location.href = "index.php";</script>';
    } else {
        // Display error if deletion fails
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    // If 'nim' is not provided in the URL, redirect to the main page
    header('Location: index.php');
}
