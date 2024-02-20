<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .content {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="admin.php">Admin</a>
        <a href="pengadaan.php">Pengadaan</a>
    </nav>
    <div class="content">
        <h2>Data Buku</h2>
        <div class="add-button-container">
            <a href="addbuku.php">Add</a>
        </div>
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Kategori</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
                <th>Action</th>
            </tr>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }

            // Query untuk mengambil data dari tabel tb_buku dan tb_penerbit dengan JOIN
            $query = "SELECT tb_buku.id, tb_buku.id_buku, tb_buku.kategori, tb_buku.nama_buku, tb_buku.harga, tb_buku.stok, tb_penerbit.nama_penerbit
                    FROM tb_buku
                    INNER JOIN tb_penerbit ON tb_buku.penerbit_id = tb_penerbit.id";
            $result = mysqli_query($koneksi, $query);

            // Tampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id_buku']."</td>";
                echo "<td>".$row['kategori']."</td>";
                echo "<td>".$row['nama_buku']."</td>";
                echo "<td>".$row['harga']."</td>";
                echo "<td>".$row['stok']."</td>";
                echo "<td>".$row['nama_penerbit']."</td>"; // Menggunakan nama penerbit
                echo "<td class='action-buttons'>";
                echo "<a href='updatebuku.php?id=".$row['id']."'>Update</a>"; // Perubahan disini
                echo "<a href='deletebuku.php?id=".$row['id']."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus buku ini?');\">Delete</a>"; // Perubahan disini
                echo "</td>";
                echo "</tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </table>
    </div>
</body>
</html>
