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
        .search-container {
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }
        .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        .search-container button:hover {
            background: #ccc;
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
        <div class="search-container">
            <form action="#" method="GET">
                <input type="text" placeholder="Cari 'Nama Buku' ... " name="search">
                <button type="submit">Cari</button>
            </form>
        </div>
        <h2>Data Buku</h2>
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Kategori</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
            </tr>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }

            // Query untuk mengambil data dari tabel tb_buku
            $query = "SELECT tb_buku.id_buku, tb_buku.kategori, tb_buku.nama_buku, tb_buku.harga, tb_buku.stok, tb_penerbit.nama_penerbit
                    FROM tb_buku
                    INNER JOIN tb_penerbit ON tb_buku.penerbit_id = tb_penerbit.id";

            // Cek apakah ada parameter pencarian
            if(isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                $query .= " WHERE tb_buku.nama_buku LIKE '%$search%'";
            }

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
                echo "</tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
                    </table>
    </div>
</body>
</html>
