<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Form Data Karyawan</h2>
    <form action="karyawan_simpan.php" method="post">
        <label for="nama_karyawan">Nama Karyawan:</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan" required><br><br>

        <label for="jabatan">Jabatan:</label>
        <select id="jabatan" name="jabatan">
            <option value="Direktur">Direktur</option>
            <option value="Manager">Manager</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Staff">Staff</option>
            
        </select><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="absen">Kehadiran:</label>
        <select id="absen" name="absen">
            <option value="1">Hadir</option>
            <option value="0">Tidak Hadir</option>
        </select><br><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
