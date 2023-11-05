<?php
// Panggil variabel dari form
$nama = $_POST['nama'];
$saran = $_POST['saran'];
// Pengaturan koneksi ke database
$host = "localhost"; // Ganti dengan string "localhost" untuk alamat server MySQL
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
?>
