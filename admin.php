<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengolahan Data</title>
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
    <h2>Pengolahan Data Tabel</h2>
    <a href="buku.php">Tabel Buku</a>
    <a href="penerbit.php">Tabel Penerbit</a>
    </div>
</body>
</html>
