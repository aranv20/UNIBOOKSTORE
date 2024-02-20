<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Buku</title>
</head>
<body>
    <h2>Update Data Penerbit</h2>

<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Periksa apakah ada parameter id
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk mengambil data buku berdasarkan ID
    $query = "SELECT * FROM tb_buku WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Tampilkan formulir untuk memperbarui data buku
?>
<form action="update_process.php" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<label for="id_buku">ID Buku:</label><br>
<input type="text" id="id_buku" name="id_buku" value="<?php echo $row['id_buku']; ?>" required><br>

<label for="kategori">Kategori:</label><br>
<input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required><br>

<label for="nama_buku">Nama Buku:</label><br>
<input type="text" id="nama_buku" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" required><br>

<label for="harga">Harga:</label><br>
<input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required><br>

<label for="stok">Stok:</label><br>
<input type="text" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required><br>

<!-- Perbarui bagian ini untuk menampilkan penerbit dengan menggunakan dropdown -->
<label for="penerbit_id">Penerbit:</label><br>
<select id="penerbit_id" name="penerbit_id" required>
    <?php
    // Query untuk mendapatkan semua nama penerbit dari tabel tb_penerbit
    $query_penerbit = "SELECT nama_penerbit FROM tb_penerbit";
    $result_penerbit = mysqli_query($koneksi, $query_penerbit);
    if(mysqli_num_rows($result_penerbit) > 0) {
        while($row_penerbit = mysqli_fetch_assoc($result_penerbit)) {
            // Tampilkan nama penerbit sebagai pilihan dropdown
            echo "<option value='".$row_penerbit['nama_penerbit']."'>".$row_penerbit['nama_penerbit']."</option>";
        }
    }
    ?>
</select><br><br>

<input type="submit" value="Submit">
</form>

<?php
    } else {
        echo "Data buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak diberikan.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
</body>
</html>