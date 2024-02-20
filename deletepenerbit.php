<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil ID penerbit yang akan dihapus
$id_penerbit = $_GET['id'];

// Periksa apakah ada buku yang terkait dengan penerbit ini
$query_check = "SELECT * FROM tb_buku WHERE penerbit_id = '$id_penerbit'";
$result_check = mysqli_query($koneksi, $query_check);

if(mysqli_num_rows($result_check) > 0) {
    // Jika ada buku terkait, tampilkan pesan kesalahan
    echo "<script>alert('Tidak dapat menghapus penerbit karena masih ada buku terkait.');</script>";
} else {
    // Jika tidak ada buku terkait, lanjutkan dengan penghapusan
    $query_delete = "DELETE FROM tb_penerbit WHERE id = '$id_penerbit'";
    if (mysqli_query($koneksi, $query_delete)) {
        echo "<script>alert('Penerbit berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Error: Gagal menghapus penerbit');</script>";
    }
}

// Redirect ke halaman penerbit
echo "<script>window.location.href = 'penerbit.php';</script>";

// Tutup koneksi database
mysqli_close($koneksi);
?>
