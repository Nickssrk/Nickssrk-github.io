<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Menu Bioskop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #fff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .menu-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .menu-item img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .menu-item h2 {
            margin-bottom: 10px;
        }

        .menu-item p {
            margin-bottom: 20px;
        }
        .menu-item button{
        background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.menu-item button a:hover {
    background: color #444;
}
footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>CINEMA UKK</h1>
</header>

<nav>
        <a href="index.html">Home</a> |
        <a href="Operator.php">Operator</a> |
        <a href="kontak.html">Contact</a> |
        <a href="about.html">About me</a> |
        <a href="absen.php">Cinema</a> |
    </nav>

<div class="menu-container">
    <div class="menu-item">
        <img src="maxresdefault.jpg" alt="Menu 1">
        <h2>Sakura The Movie: Forbidden Code 911</h2>
        <p>Tiket Rp45.000.</p>
        <a href="kursi.php"><button>Pesan</button></a>
    </div>

    <div class="menu-item">
        <img src="unravel.jpg" alt="Menu 2">
        <h2>Unravel Two</h2><br>
        <p>Tiket Rp35.000.</p>
        <a href="kursi1.php"><button>Pesan</button></a>
    </div>

    <div class="menu-item">
        <img src="maxresdefault (1).jpg" alt="Menu 3">
        <h2>Lethal Company</h2><br>
        <p>Tiket Rp50.000.</p>
        <a href="kursi2.php"><button>Pesan</button></a>
    </div>

    <div class="menu-item">
        <img src="maxresdefault (2).jpg" alt="Menu 4">
        <h2>Minecraft: Arc Jayapura Indah</h2>
        <p>Tiket Rp40.000.</p>
        <a href="kursi3.php"><button>Pesan</button></a>
    </div>
</div>

</body>
<footer>
        <p>Copyright &copy; 2024 Zavrel.cop.</p>
    </footer>
</html>