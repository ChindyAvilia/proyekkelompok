<?php
$nama = $_POST['nama_karyawan'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];

$dataValid = "YA";

if (strlen(trim($nama)) == 0) {
    echo "Nama Karyawan Harus Diisi! <br/>";
    $dataValid = "TIDAK";
}
if (strlen(trim($jabatan)) == 0) {
    echo "Jabatan Karyawan Harus Diisi! <br/>";
    $dataValid = "TIDAK";
}
if (strlen(trim($alamat)) == 0) {
    echo "Alamat Karyawan Harus Diisi! <br/>";
    $dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
    echo "Masih Ada Kesalahan, silahkan perbaiki! </br>";
    echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
    exit;
}

include "koneksi.php";

$sqlKaryawan = "INSERT INTO karyawan (nama_karyawan, jabatan, alamat) VALUES ('$nama', '$jabatan', '$alamat')";
$hasilKaryawan = mysqli_query($kon, $sqlKaryawan);

if (!$hasilKaryawan) {
    echo "Gagal Simpan Data Karyawan, silahkan diulangi! <br/>";
    echo mysqli_error($kon);
    echo "<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
    exit;
} else {
    
    $idKaryawanBaru = mysqli_insert_id($kon);

    
    $tanggalSekarang = date("Y-m-d");

    
    if ($_POST['absen'] == '1') {
        $hadir = 1;
        $keterangan = "Hadir";
    } else {
        $hadir = 0;
        $keterangan = $_POST['keterangan']; 
    }

    
    $sqlAbsensi = "INSERT INTO absensi (id_karyawan, tanggal, hadir, keterangan) VALUES ('$idKaryawanBaru', '$tanggalSekarang', '$hadir', '$keterangan')";
    $hasilAbsensi = mysqli_query($kon, $sqlAbsensi);

    if (!$hasilAbsensi) {
        echo "Gagal Simpan Data Absensi Karyawan, silahkan diulangi! <br/>";
        echo mysqli_error($kon);
        echo "<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
        exit;
    } else {
        
        header('Location: karyawan_tampil.php');
        exit;
    }
}
?>
