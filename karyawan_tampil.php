<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama_karyawan"])) {
    $nama_karyawan = mysqli_real_escape_string($kon, $_POST["nama_karyawan"]);
    $sqlData = "SELECT k.id_karyawan, k.nama_karyawan, k.jabatan, k.alamat, a.tanggal, a.hadir, a.keterangan 
                FROM karyawan k
                LEFT JOIN absensi a ON k.id_karyawan = a.id_karyawan
                WHERE k.nama_karyawan LIKE '%$nama_karyawan%'
                ORDER BY k.id_karyawan, a.tanggal";
} else {
    $sqlData = "SELECT k.id_karyawan, k.nama_karyawan, k.jabatan, k.alamat, a.tanggal, a.hadir, a.keterangan 
                FROM karyawan k
                LEFT JOIN absensi a ON k.id_karyawan = a.id_karyawan
                ORDER BY k.id_karyawan, a.tanggal";
}

$result = mysqli_query($kon, $sqlData);

if (!$result) {
    die("Gagal query: " . mysqli_error($kon));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan dan Absensi</title>
    <style>
        /* Import font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Gaya umum */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFAF0; /* Warna pastel krem */
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        /* Container */
        .container {
            max-width: 90%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Judul */
        h2 {
            color: #FF6B6B; /* Warna pastel merah muda */
            font-size: 26px;
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #FFDEE9; /* Warna pastel pink */
            color: #333;
        }

        tr:nth-child(even) {
            background: #FDE2E4; /* Warna pastel pink muda */
        }

        tr:hover {
            background: #B5EAEA; /* Warna pastel biru */
        }

        /* Tombol */
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-edit {
            background: #FEC89A; /* Pastel orange */
            color: #333;
        }

        .btn-edit:hover {
            background: #FF9A8B;
        }

        .btn-hapus {
            background: #FF6B6B; /* Pastel merah */
            color: white;
        }

        .btn-hapus:hover {
            background: #E63946;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>📋 Data Karyawan dan Absensi</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>Hadir</th>
                <th>Keterangan</th>
                <th>Operasi</th>
            </tr>

            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['nama_karyawan'] . "</td>";
                echo "<td>" . $row['jabatan'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>" . ($row['hadir'] ? '✅ Ya' : '❌ Tidak') . "</td>";
                echo "<td>" . $row['keterangan'] . "</td>";
                echo "<td>
                        <a href='karyawan_edit.php?id=" . $row['id_karyawan'] . "' class='btn btn-edit'>✏️ Edit</a>
                        <a href='karyawan_hapus.php?id=" . $row['id_karyawan'] . "' class='btn btn-hapus'>🗑 Hapus</a>
                      </td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </table>
    </div>

</body>
</html>
