<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Kantor</title>
    <style>
        /* Gaya umum */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFAF0; /* Warna pastel krem */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Judul */
        h1 {
            color: #FF6B6B; /* Warna pastel merah muda */
            font-size: 32px;
            margin-bottom: 10px;
        }

        /* Deskripsi */
        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }

        /* Kotak menu */
        .menu-container {
            background: #FFDEE9; /* Gradien warna pastel */
            background: linear-gradient(to right, #FFDEE9, #B5FFFC);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Daftar menu */
        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-list li {
            margin: 15px 0;
        }

        /* Gaya tombol menu */
        .menu-list a {
            display: inline-block;
            text-decoration: none;
            background-color: #FF6B6B; /* Warna pastel merah muda */
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 8px;
            transition: 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover tombol */
        .menu-list a:hover {
            background-color: #E63946;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <h1>Welcome to our office</h1>
    <p>Silakan pilih opsi menu di bawah ini:</p>

    <div class="menu-container">
        <ul class="menu-list">
            <li><a href="karyawan_isi.php">➕ Tambahkan Data Karyawan</a></li>
            <li><a href="karyawan_tampil.php">📋 Tampilkan Data Karyawan</a></li>
            <li><a href="karyawan_cari.php">🔍 Cari Data Karyawan</a></li>
        </ul>
    </div>

</body>
</html>
