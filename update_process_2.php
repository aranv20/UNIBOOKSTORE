<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil data dari form update penerbit
$id = $_POST['id'];
$id_penerbit = isset($_POST['id_penerbit']) ? $_POST['id_penerbit'] : '';
$nama_penerbit = $_POST['nama_penerbit'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];

// Query untuk memperbarui data penerbit
$query = "UPDATE tb_penerbit SET id_penerbit='$id_penerbit', nama_penerbit='$nama_penerbit', alamat='$alamat', kota='$kota', telepon='$telepon' WHERE id='$id'";
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, tampilkan alert sukses dan arahkan ke halaman penerbit
    echo "<script>alert('Data penerbit berhasil diperbarui.'); window.location.href = 'penerbit.php';</script>";
} else {
    // Jika gagal, tampilkan alert gagal dan arahkan ke halaman penerbit
    echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.location.href = 'penerbit.php';</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
