<?php
header("Content-Type: text/html; charset=UTF-8");
// Kode PHP lainnya
// Koneksi ke database
$servername = "localhost"; // Ganti dengan host Anda jika berbeda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "responsi_pgpb"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel kampus
$sql = "SELECT * FROM kampus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kampus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f1f8;
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            color: #ff85a2;
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            text-align: center;
            padding: 15px;
        }

        .table th {
            background-color: #ff85a2;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f7c1d9;
        }

        .table tbody tr:hover {
            background-color: #ffebf2;
            cursor: pointer;
        }

        .table td {
            font-size: 14px;
            color: #555;
        }

        .table td a {
            color: #ff85a2;
            text-decoration: none;
            font-weight: bold;
        }

        .table td a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 90%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Navbar Style */
        .navbar {
            background-color: #ff85a2;
        }

        .navbar a {
            color: white !important;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .navbar-brand {
            color: white !important;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">JOGJAKUL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Data Kampus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Data Kampus</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kampus</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Akreditasi</th>
                    <th>Lokasi</th>
                    <th>X</th>
                    <th>Y</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["No"] . "</td>";
                        echo "<td>" . $row["Nama_Kampus"] . "</td>";
                        echo "<td>" . $row["Jenis"] . "</td>";
                        echo "<td>" . $row["Status"] . "</td>";
                        echo "<td>" . $row["Akreditasi"] . "</td>";
                        echo "<td>" . $row["Lokasi"] . "</td>";
                        echo "<td>" . $row["X"] . "</td>";
                        echo "<td>" . $row["Y"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
