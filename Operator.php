<?php
session_start();


function updateStockFromFile() {
    $file = "stock.txt";
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $parts = explode(":", $line);
            $_SESSION['stok'][$parts[0]] = (int)$parts[1];
        }
    }
}


function saveStockToFile() {
    $file = "stock.txt";
    $handle = fopen($file, "w");
    if ($handle) {
        foreach ($_SESSION['stok'] as $barang => $stok) {
            fwrite($handle, "$barang:$stok\n");
        }
        fclose($handle);
    }
}


function emptyCart() {
    if (isset($_SESSION['keranjang'])) {
        unset($_SESSION['keranjang']);
    }
}


function resetStock() {
    updateStockFromFile();
    saveStockToFile();
}


function getHarga($barang) {
   
    $hargaBarang = [
        'komputer' => 5000000,
        'monitor' => 1000000,
        'mouse' => 200000,
        'keyboard' => 300000,
        'headset' => 400000,
        'Pasta' => 10000,
        'Mouse Pad' => 7500
    ];


    return isset($hargaBarang[$barang]) ? $hargaBarang[$barang] : 0;
}


updateStockFromFile();


if (isset($_POST['submit'])) {
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];

   
    if (ctype_digit($jumlah) && $jumlah > 0) {
        
        if ($jumlah <= $_SESSION['stok'][$barang]) {
            
            if (!isset($_SESSION['keranjang'][$barang])) {
                $_SESSION['keranjang'][$barang] = $jumlah;
            } else {
                $_SESSION['keranjang'][$barang] += $jumlah;
            }

            
            $_SESSION['stok'][$barang] -= $jumlah;

         
            saveStockToFile();
        } else {
            echo "<script>alert('Jumlah melebihi stok yang tersedia.');</script>";
        }
    } else {
        echo "<script>alert('Jumlah barang harus di isi.');</script>";
    }
}


if (isset($_POST['reset'])) {
    emptyCart();
    resetStock(); // Tambahkan pemanggilan fungsi resetStock() di sini
}
if (isset($_POST['checkout'])) {
    // Memeriksa apakah keranjang kosong
    if (empty($_SESSION['keranjang'])) {
        echo "<script>alert('Keranjang masih kosong. Silakan tambahkan barang terlebih dahulu.');</script>";
    } else {
        // Memeriksa apakah total harga lebih dari 0
        if ($totalHarga <= 0) {
            echo "<script>alert('Total harga kosong atau tidak valid. Silakan tambahkan barang terlebih dahulu.');</script>";
        } else {
            // Jika total harga valid, lanjutkan ke halaman checkout
            header("Location: operator.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Barang</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style12.css">
  
</head>

<body>
<div id="notification"></div>
<nav>
        <a href="index.html">Home</a> |
        <a href="Operator.php">Operator</a> |
        <a href="kontak.html">Contact</a> |
        <a href="about.html">About me</a> |
        <a href="absen.php">Cinema</a> |
    </nav>
    <h1>Penjualan Barang</h1>
<div class="container">
    <form method="post">
        <label for="barang">Pilih barang:</label>
        <select name="barang" id="barang">
            <option value="komputer">Komputer</option>
            <option value="monitor">Monitor</option>
            <option value="mouse">Mouse</option>
            <option value="keyboard">Keyboard</option>
            <option value="headset">Headset</option>
            <option value="Pasta">Pasta</option>
            <option value="Mouse Pad">Mouse Pad</option>
        </select>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" min="1" max="20">
        <input type="submit" name="submit" value="Tambah ke Keranjang"> <br>
        
    </form>
</div>
    <br>
<div class="product-item">
    <?php
   
    echo "<h2>Stok Barang</h2>";
    echo "<ul>";
    foreach ($_SESSION['stok'] as $barang => $stok) {
        echo "<li>$barang: $stok</li>";
    }
    echo "</ul>";

   
    $totalHarga = 0;
    echo "<h2>Total Harga</h2>";
    if (isset($_SESSION['keranjang'])) {
        echo "<ul>";
        foreach ($_SESSION['keranjang'] as $barang => $jumlah) {
            $harga = getHarga($barang);
            $totalHarga += $harga * $jumlah;
            echo "<li>$barang: $jumlah (Harga: Rp " . number_format($harga, 0, ',', '.') . ")</li>";
        }
        echo "</ul>";
        echo "<p>Total Harga: Rp " . number_format($totalHarga, 0, ',', '.') . "</p>";
    } else {
        echo "<p>0</p>";
    }
    ?>
    
    <div id="checkmark">
    <script>
    function showPopup() {
        alert("Barang berhasil dikirim!");
        document.getElementById("checkmark").style.display = "block"; 
        setTimeout(function () {
            document.getElementById("checkmark").style.display = "none"; 
        }, 2000);
    }
</script>
</div>

<div class="checkout-button">
    <input type="submit" name="checkout" value="Checkout" onclick="showPopup()">
</div>

<div class="reset-button">
    <form method="post">
        <input type="submit" name="reset" value="Kosongkan Keranjang">
    </form>
</div>
</body>
</html>