<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Simpan pesan ke dalam database atau kirim melalui email
    // Di sini Anda bisa menambahkan logika untuk menyimpan pesan

    // Redirect kembali ke halaman kontak setelah pengiriman berhasil
    header("Location: kirim_pesan.php");
    exit();
} else {
    // Jika akses langsung ke file ini tanpa melalui POST, kembalikan ke halaman kontak
    header("Location: kontak.html");
    exit();
}
?>