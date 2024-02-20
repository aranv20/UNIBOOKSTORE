<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penerbit</title>
</head>
<body>
    <h2>Tambah Data Penerbit</h2>
    <form action="add_process_2.php" method="POST">
        <label for="id_penerbit">ID Penerbit:</label><br>
        <input type="text" id="id_penerbit" name="id_penerbit" required><br>
        
        <label for="nama_penerbit">Nama Penerbit:</label><br>
        <input type="text" id="nama_penerbit" name="nama_penerbit" required><br>
        
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br>
        
        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota" required><br>
        
        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
