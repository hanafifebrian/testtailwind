<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan data ada sebelum menyimpan ke database
    if (isset($_POST['email']) && isset($_POST['message'])) {
        $nama = $_POST['email'];
        $saran = $_POST['message'];

        // Pengaturan koneksi ke database
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "tailwind";

        // Membuka koneksi ke MySQL
        $koneksi = mysqli_connect($host, $user, $pass, $db);

        // Periksa koneksi
        if (!$koneksi) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }

        // Query SQL untuk menyimpan komentar ke dalam tabel
        $sql = "INSERT INTO komen (nama, saran) VALUES ('$nama', '$saran')";

        if (mysqli_query($koneksi, $sql)) {
            echo "Komentar berhasil disimpan ke database.";
        } else {
            echo "Gagal: " . $sql . "<br>" . mysqli_error($koneksi);
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo "Data tidak lengkap. Pastikan email dan message tersedia.";
    }
} else {
    echo "Metode request bukan POST.";
}
?>
