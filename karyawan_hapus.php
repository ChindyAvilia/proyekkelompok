<?php
include "koneksi.php";

if (isset($_GET["id"])) {
    $id_karyawan = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirm_delete"])) {
        if ($_POST["confirm_delete"] === "YA") {
            
            $delete_absensi_sql = "DELETE FROM absensi WHERE id_karyawan = $id_karyawan";
            $delete_absensi_result = mysqli_query($kon, $delete_absensi_sql);

            if (!$delete_absensi_result) {
                die("Gagal query delete absensi: " . mysqli_error($kon));
            }

            
            $delete_karyawan_sql = "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan";
            $delete_karyawan_result = mysqli_query($kon, $delete_karyawan_sql);

            if (!$delete_karyawan_result) {
                die("Gagal query delete karyawan: " . mysqli_error($kon));
            }

           
            header("Location: karyawan_tampil.php");
            exit();
        } else {
            
            header("Location: karyawan_tampil.php");
            exit();
        }
    } else {
       
        echo '<html>
                <body>
                    <h2>Apakah Anda yakin akan menghapus?</h2>
                    <form method="post" action="">
                        <input type="submit" name="confirm_delete" value="YA">
                        <input type="submit" name="confirm_delete" value="TIDAK">
                    </form>
                </body>
              </html>';
    }
}
?>
