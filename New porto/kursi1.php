<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Pemilihan Kursi Bioskop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        .popup {
    display: none; /* sembunyikan pop-up secara default */
    position: fixed; /* letakkan pop-up di atas konten */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4); /* transparansi latar belakang */
}

.popup-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

            /* Garis tebal */
            .bold-line {
            border-top: 2px solid black;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border: 1px solid #aaa;
            display: inline-block;
            margin: 5px;
            cursor: pointer;
        }

        .selected {
            background-color: 	#7FFF00;
        }

        #selectedSeats {
            margin-top: 20px;
        }

        #selectedSeatsList {
            margin-bottom: 10px;
        }

        #totalPrice {
            font-weight: bold;
            font-size: 18px;
        }
        #resultButton button {
    background-color: #4CAF50; /* Warna latar belakang hijau */
    color: white; /* Warna teks putih */
    padding: 10px 20px; /* Ruang bantalan di dalam tombol */
    font-size: 16px; /* Ukuran font */
    border: none; /* Tanpa border */
    border-radius: 5px; /* Tampilan sudut tombol */
    cursor: pointer; /* Pointer mouse berubah saat mengarah ke tombol */
    transition: background-color 0.3s; /* Transisi saat mengubah warna latar belakang */
}

#resultButton button:hover {
    background-color: #45a049; /* Warna latar belakang yang berbeda saat tombol dihover */
}
    </style>
</head>
<body>
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <p>Silakan pilih kursi sebelum melanjutkan!</p>
    </div>
</div>
    <div class="container">
        <h1>CINEMA</h1><br>
        <h1>Unravel Two</h1>
        <p>LAYAR</p>

        <div class="bold-line"></div>

        <div id="seatMap">
            <?php
            // Daftar kursi, misalnya A1, A2, A3, dst.
            $rows = range('A', 'E');
            $columns = range(1, 8);

            // Menampilkan kursi
            foreach ($rows as $row) {
                foreach ($columns as $column) {
                    $seatId = $row . $column;
                    echo '<div class="seat" id="' . $seatId . '" onclick="toggleSeat(\'' . $seatId . '\')">' . $seatId . '</div>';
                }
                echo '<br>';
            }
            ?>
        </div>

        <div id="selectedSeats">
            <h2>Kursi yang Dipilih:</h2>
            <p id="selectedSeatsList">-</p>
            <h2>Total Harga:</h2>
            <p id="totalPrice">-</p>
            <div id="resultButton">
                <button onclick="showResult()">Checkout</button>
                <a href="absen.php"><button>Kembali Ke menu</button></a>
            </div>
        </div>
    </div>

    <script>
        var selectedSeats = [];
        var seatPrice = 35000; // Harga per kursi
        var totalPrice = 0;

        function toggleSeat(seatId) {
            var seat = document.getElementById(seatId);
            if (seat.classList.contains('selected')) {
                seat.classList.remove('selected');
                selectedSeats = selectedSeats.filter(function(value, index, arr) {
                    return value !== seatId;
                });
                calculateTotalPrice();
            } else {
                seat.classList.add('selected');
                selectedSeats.push(seatId);
                calculateTotalPrice();
            }
            updateSelectedSeatsList();
        }

        function calculateTotalPrice() {
            totalPrice = selectedSeats.length * seatPrice;
            document.getElementById('totalPrice').innerText = 'Rp ' + totalPrice;
        }

        function updateSelectedSeatsList() {
            document.getElementById('selectedSeatsList').innerText = selectedSeats.join(', ');
        }
        function showPopup() {
    document.getElementById('popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}
        

function showResult() {
    if (selectedSeats.length === 0) {
        showPopup();
    } else {
        var selectedSeatsQuery = encodeURIComponent(selectedSeats.join(','));
        window.location.href = 'result.php?seats=' + selectedSeatsQuery;
    }
}
    </script>
</body>
</html>