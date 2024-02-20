<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Penerbit</title>
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
        
        // Query untuk mengambil data penerbit berdasarkan ID
        $query = "SELECT * FROM tb_penerbit WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Tampilkan formulir untuk memperbarui data penerbit
    ?>
    <form action="update_process_2.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <label for="id_penerbit">ID Penerbit:</label><br>
    <input type="text" id="id_penerbit" name="id_penerbit" value="<?php echo $row['id_penerbit']; ?>" required><br>
    
    <label for="nama_penerbit">Nama Penerbit:</label><br>
    <input type="text" id="nama_penerbit" name="nama_penerbit" value="<?php echo $row['nama_penerbit']; ?>" required><br>
    
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
    
    <label for="kota">Kota:</label><br>
    <input type="text" id="kota" name="kota" value="<?php echo $row['kota']; ?>" required><br>
    
    <label for="telepon">Telepon:</label><br>
    <input type="text" id="telepon" name="telepon" value="<?php echo $row['telepon']; ?>" required><br><br>
    
    <input type="submit" value="Submit">
</form>

    <?php
        } else {
            echo "Data penerbit tidak ditemukan.";
        }
    } else {
        echo "ID penerbit tidak diberikan.";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
    ?>
</body>
</html>
