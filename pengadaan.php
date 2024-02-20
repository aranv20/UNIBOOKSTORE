<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Buku yang Perlu Segera Dibeli</title>
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
        <h2>Laporan Buku yang Perlu Segera Dibeli</h2>
        <table>
            <tr>
                <th>Nama Buku</th>
                <th>Nama Penerbit</th>
                <th>Sisa Stok</th>
            </tr>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }

            // Query untuk mendapatkan buku dengan stok paling sedikit
            $query = "SELECT tb_buku.nama_buku, tb_penerbit.nama_penerbit, tb_buku.stok 
                    FROM tb_buku 
                    INNER JOIN tb_penerbit ON tb_buku.penerbit_id = tb_penerbit.id 
                    ORDER BY tb_buku.stok ASC";

            // echo "Query SQL: " . $query . "<br>"; // Cetak query SQL untuk debugging

            $result = mysqli_query($koneksi, $query);

            if ($result) {
                // Tampilkan data dalam tabel
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nama_buku'] . "</td>";
                        echo "<td>" . $row['nama_penerbit'] . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data yang ditemukan.</td></tr>";
                }
            } else {
                // Jika terjadi kesalahan dalam eksekusi query
                echo "<tr><td colspan='3'>Error: " . mysqli_error($koneksi) . "</td></tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </table>
    </div>
</body>
</html>
