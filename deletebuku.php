<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Periksa apakah parameter id telah diterima dari URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Escape input untuk mencegah serangan SQL injection
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk menghapus data buku berdasarkan ID
    $query = "DELETE FROM tb_buku WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil menghapus, arahkan kembali ke halaman buku
        header("Location: buku.php");
        exit(); // Pastikan tidak ada kode PHP lain yang dieksekusi setelah mengarahkan halaman
    } else {
        // Jika gagal menghapus, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id tidak diterima dari URL, tampilkan pesan kesalahan
    echo "ID buku tidak diberikan.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
