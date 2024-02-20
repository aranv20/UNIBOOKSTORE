<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil data dari form update buku
$id = $_POST['id'];
$id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : '';
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$penerbit_id = $_POST['penerbit_id'];

// Query untuk mendapatkan ID penerbit berdasarkan nama penerbit
$query_penerbit = "SELECT id FROM tb_penerbit WHERE nama_penerbit = '$penerbit_id'";
$result_penerbit = mysqli_query($koneksi, $query_penerbit);
if (mysqli_num_rows($result_penerbit) > 0) {
    $row_penerbit = mysqli_fetch_assoc($result_penerbit);
    $penerbit_id = $row_penerbit['id'];
} else {
    // Jika nama penerbit tidak ditemukan, Anda bisa menangani ini sesuai kebutuhan
    // Misalnya, memasukkan nilai default atau menampilkan pesan kesalahan
    $penerbit_id = null;
}

// Query untuk memperbarui data buku
$query = "UPDATE tb_buku SET id_buku='$id_buku', kategori='$kategori', nama_buku='$nama_buku', harga='$harga', stok='$stok', penerbit_id='$penerbit_id' WHERE id='$id'";
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, tampilkan alert sukses dan arahkan ke halaman buku
    echo "<script>alert('Data buku berhasil diperbarui.'); window.location.href = 'buku.php';</script>";
} else {
    // Jika gagal, tampilkan alert gagal dan arahkan ke halaman buku
    echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.location.href = 'buku.php';</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
