<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body>
    <h2>Tambah Data Buku</h2>

    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }
    ?>

    <form action="add_process.php" method="POST">
        <label for="id_buku">ID Buku:</label><br>
        <input type="text" id="id_buku" name="id_buku" required><br>
        
        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori" required><br>
        
        <label for="nama_buku">Nama Buku:</label><br>
        <input type="text" id="nama_buku" name="nama_buku" required><br>
        
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" required><br>
        
        <label for="stok">Stok:</label><br>
        <input type="text" id="stok" name="stok" required><br>
        
        <!-- Perbarui bagian ini untuk menggunakan ID penerbit sebagai nilai -->
        <label for="penerbit_id">Penerbit:</label><br>
        <select id="penerbit_id" name="penerbit_id" required>
            <?php
            // Query untuk mendapatkan semua data penerbit dari tabel tb_penerbit
            $query_penerbit = "SELECT id, nama_penerbit FROM tb_penerbit";
            $result_penerbit = mysqli_query($koneksi, $query_penerbit);
            if(mysqli_num_rows($result_penerbit) > 0) {
                while($row_penerbit = mysqli_fetch_assoc($result_penerbit)) {
                    // Tampilkan ID penerbit sebagai value dan nama penerbit sebagai teks dropdown
                    echo "<option value='".$row_penerbit['id']."'>".$row_penerbit['nama_penerbit']."</option>";
                }
            }
            ?>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
