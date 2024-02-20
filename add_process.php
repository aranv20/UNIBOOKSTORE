<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari form tambah buku
$id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
$kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
$nama_buku = mysqli_real_escape_string($koneksi, $_POST['nama_buku']);
$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
$stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
$penerbit_id = mysqli_real_escape_string($koneksi, $_POST['penerbit_id']);

// Query untuk menambahkan data buku baru
$query = "INSERT INTO tb_buku (id_buku, kategori, nama_buku, harga, stok, penerbit_id) VALUES ('$id_buku', '$kategori', '$nama_buku', '$harga', '$stok', '$penerbit_id')";
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, tampilkan alert sukses
    echo "<script>alert('Data buku berhasil ditambahkan');</script>";
} else {
    // Jika gagal, tampilkan alert gagal
    echo "<script>alert('Error: Gagal menambahkan data buku');</script>";
}

// Redirect ke halaman awal data buku
echo "<script>window.location.href = 'buku.php';</script>";

// Tutup koneksi database
mysqli_close($koneksi);
?>
