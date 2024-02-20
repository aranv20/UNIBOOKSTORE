<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerbit</title>
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
        <h2>Data Penerbit</h2>
        <div class="add-button-container">
            <a href="addpenerbit.php">Add</a>
        </div>
        <table>
            <tr>
                <th>ID Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "unibookstore");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }

            // Query untuk mengambil data dari tabel tb_penerbit
            $query = "SELECT * FROM tb_penerbit";
            $result = mysqli_query($koneksi, $query);

            // Tampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_penerbit'] . "</td>";
                echo "<td>" . $row['nama_penerbit'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['kota'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='updatepenerbit.php?id=".$row['id']."'>Update</a>";
                echo "<a href='deletepenerbit.php?id=".$row['id']."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data penerbit ini?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
                echo "</tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </table>
    </div>
</body>
</html>
