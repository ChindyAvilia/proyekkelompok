<?php
include "koneksi.php";

if (isset($_GET["id"])) {
    $id_karyawan = $_GET["id"];

    
    $sql = "SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan";
    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Gagal query: " . mysqli_error($kon));
    }

    $row = mysqli_fetch_assoc($result);

    
    $sql_absensi = "SELECT * FROM absensi WHERE id_karyawan = $id_karyawan";
    $result_absensi = mysqli_query($kon, $sql_absensi);

    if (!$result_absensi) {
        die("Gagal query absensi: " . mysqli_error($kon));
    }

    $row_absensi = mysqli_fetch_assoc($result_absensi);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nama_karyawan = $_POST["nama_karyawan"];
        $jabatan = $_POST["jabatan"];
        $alamat = $_POST["alamat"];

        $update_sql = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', jabatan='$jabatan', alamat='$alamat' WHERE id_karyawan=$id_karyawan";
        $update_result = mysqli_query($kon, $update_sql);

        if (!$update_result) {
            die("Gagal query update: " . mysqli_error($kon));
        }

        
        $hadir = isset($_POST['absen']) && $_POST['absen'] === 'hadir' ? 1 : 0;
        $keterangan = $hadir ? 'Hadir' : 'Tidak Hadir';

        $update_absensi_sql = "UPDATE absensi SET hadir=$hadir, keterangan='$keterangan' WHERE id_karyawan=$id_karyawan";
        $update_absensi_result = mysqli_query($kon, $update_absensi_sql);

        if (!$update_absensi_result) {
            die("Gagal query update absensi: " . mysqli_error($kon));
        }

        
        header("Location: karyawan_tampil.php");
        exit();
    }
}
?>

<form method="post" action="">
    Nama Karyawan: <input type="text" name="nama_karyawan" value="<?php echo $row['nama_karyawan']; ?>"><br>
    Jabatan Karyawan: <input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>"><br>
    Alamat Karyawan: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
    <input type="radio" name="absen" value="hadir" <?php if ($row_absensi['hadir'] == 1) echo 'checked'; ?>> Hadir
    <input type="radio" name="absen" value="tidak_hadir" <?php if ($row_absensi['hadir'] == 0) echo 'checked'; ?>> Tidak Hadir<br>
    <input type="submit" value="Simpan">
</form>
