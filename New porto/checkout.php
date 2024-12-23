<?php
session_start();

// Pastikan keranjang tidak kosong
if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
    // Jika kosong, arahkan kembali ke halaman sebelumnya
    header("Location: index.php");
    exit;
}

// Fungsi untuk mendapatkan harga barang
function getHarga($barang) {
    // Daftar harga barang
    $hargaBarang = [
        'komputer' => 5000000,
        'monitor' => 1000000,
        'mouse' => 200000,
        'keyboard' => 300000,
        'headset' => 400000,
        'Pasta' => 10000,
        'Mouse Pad' => 7500
    ];

    // Mengembalikan harga barang jika tersedia, jika tidak, mengembalikan 0
    return isset($hargaBarang[$barang]) ? $hargaBarang[$barang] : 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Barang yang Berhasil Dibeli</h1>
    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalHarga = 0;
            foreach ($_SESSION['keranjang'] as $barang => $jumlah) {
                $hargaSatuan = getHarga($barang);
                $totalHargaBarang = $hargaSatuan * $jumlah;
                $totalHarga += $totalHargaBarang;
                echo "<tr>";
                echo "<td>$barang</td>";
                echo "<td>$jumlah</td>";
                echo "<td>Rp " . number_format($hargaSatuan, 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($totalHargaBarang, 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Harga</th>
                <td>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>