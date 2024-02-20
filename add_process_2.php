<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil data dari form tambah penerbit
$id_penerbit = $_POST['id_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];

// Query untuk menambahkan data penerbit baru
$query = "INSERT INTO tb_penerbit (id_penerbit, nama_penerbit, alamat, kota, telepon) VALUES ('$id_penerbit', '$nama_penerbit', '$alamat', '$kota', '$telepon')";
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, tampilkan alert sukses
    echo "<script>alert('Data penerbit berhasil ditambahkan');</script>";
    // Redirect ke halaman awal data penerbit
    echo "<script>window.location.href = 'penerbit.php';</script>";
} else {
    // Jika gagal, tampilkan alert gagal
    echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    // Redirect ke halaman awal data penerbit
    echo "<script>window.location.href = 'penerbit.php';</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
