<?php
require 'connection.php';
require 'functions.php';

if(!isset($_GET["judul"]) && !isset($_GET["tahun"]) && !isset($_GET["studio"])) {
    echo '<script>document.location.href = "index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Games</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
        }

        #container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 30px 50px;
        }

        #container h1 {
            margin-bottom: 40px;
            color: blue;
            padding-bottom: 15px;
            position: relative;
        }

        #container h1::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            width: 100%;
            background: linear-gradient(45deg, blue, transparent);
        }

        #container h1::after {
            width: 12px;
            height: 12px;
            background: white;
            border: 3px solid blue;
            border-radius: 50%;
            bottom: -7px;
            left: -7px;
            content: '';
            position:absolute;
        }

        #container .stats {
            display: flex;
            gap: 10px;
        }

        #container .stats ul {
            margin-left: 20px;
        }

        #container .stats ul li {
            list-style: none;
            margin-top: 3px;
            padding: 7px 5px;
            position: relative;
        }

        #container .stats ul li::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 1.5px;
            width: 100%;
            background: linear-gradient(45deg, blue, black, transparent);
        }

        #container .stats ul li::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: -5px;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            border: 1.1px solid blue;
            background: white;
        }

        #container a {
            text-decoration: none;
            color: white;
            background: blue;
            padding: 10px 10px;
            display: inline-block;
            width: 120px;
            text-align: center;
            margin-top: 20px;
        }

        /* media query */
        @media only screen and (max-width: 600px) {
            #container .stats {
            flex-direction: column;
            }

            #container .stats ul {
                margin-left: -20px;
            }
        }

    </style>
</head>
<body>
    <div id="container">
        <h1>Detail Games</h1>
        <div class="stats">
            <img src="asset/gow.jpg" width="200" height="200" alt="god of war ragnarok">
            <ul>
                <li>Judul : <?= $_GET["judul"];?></li>
                <li>Tahun : <?= $_GET["tahun"];?></li>
                <li>Studio : <?= $_GET["studio"];?></li>
        </ul>
        </div>

        <a href="index.php"> Kembali </a>
    </div>
    
</body>
</html>