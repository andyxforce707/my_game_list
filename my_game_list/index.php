<?php
require 'connection.php';
require 'functions.php';

$games = query("SELECT * FROM daftar_games");

if(isset($_POST["cari"])) {
    if($_POST["katakunci"] == 'home' || $_POST["katakunci"] == 'full' || $_POST["katakunci"] == '') {
        $games = query("SELECT * FROM daftar_games");
    } else {
        $games = cari($_POST["katakunci"]);
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Game</title>
    <style>

        * {
            box-sizing: border-box;
            font-family: arial;
        }

        body {
            width: 100%;
            padding: 20px 40px 100px;
            display: flex;
            flex-direction: column;
        }

        #container {
            width: 80%;
            height: 100%;
            padding: 5px 10px;
        }

        #container h1 {
            color: blue;
            margin-bottom: 40px;
            position: relative;
            padding: 5px 10px 15px;
        }

        #container h1::before {
            width: 100%;
            height: 4px;
            background: linear-gradient(45deg, blue, transparent);
            bottom: 0;
            left: 0;
            content: '';
            position:absolute;
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

        #container form {
            position: fixed;
            right: 60px;
            top: 70px;
        }

        #container form input {
            padding: 5px 10px;
            outline: none;
            width: 250px;
        }

        #container form button {
            padding: 7px 30px;
            border: none;
            background: blue;
            color: #fff;
            cursor:pointer;
            font-size: 14px;
            position: relative;
        }

        #container form button::before {
            content: '';
            position: absolute;
            background: blue;
            transform: rotate(45deg);
            width: 10px;
            height: 10px;
            bottom: -5px;
            right: 20px;
        }

        #container form button::after {
            content: '';
            position: absolute;
            background: white;
            transform: rotate(45deg);
            width: 40px;
            height: 40px;
            bottom: -22px;
            right: -28.5px;
        }

        #container form button:hover::before {
            background: darkblue;
        }


        #container form button:hover {
            filter: brightness(1.2);
            background: darkblue;
        }

        #container table {
            margin-top: -20px;
        }

        #container tr th {
            color: red;
            border-bottom: 2px solid red;
            padding: 10px;
        }
        #container tr th:hover {
            background: rgba(0,0,0,0.02);
        }
        #container table tr td{
            border-bottom: 1px solid blue;
            color: #222;
            padding: 10px;
        }
        #container table tr td:hover{
            background: rgba(0,0,0,0.02);

        }
        #container table tr td a{
            margin: 2.5px;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
        }

        #container table tr td a:hover{
            filter: brightness(2);
        }

        #container .mobile {
            display:none;
        }

        footer {
            margin-top: 30px;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, blue, transparent);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            left:0;
            flex-direction:column;
        }

        footer p b a {
            display: inline-block;
            color: white;
            text-decoration: none;
        }

        /* media query */

        @media only screen and (max-width: 600px) {
            body {
                display: flex;
                padding: 20px 10px 120px;
                width: 100%;
                height: auto;
            }

            #container {
            width: 90%;
            height: 100%;
            padding: 5px 5px;
            }

            #container h1 {
            color: blue;
            margin-bottom: 15px;
            }

            #container form {
            position: static;
            right: 60px;
            top: 70px;
            margin-top: 40px;
            }

            #container table {
            margin-top: 15px;
            }

            #container table tr:last-child td a {
            display:none;
            }

            #container .mobile {
            padding: 5px 10px;
            color: white;
            background: blue;
            text-decoration: none;
            display: inline-block;
            }

            #container table tr:last-child {
                border:none;
            }
        }
    
    </style>
</head>
<body>
    <div id="container">
        <h1>Daftar Game</h1>

        <form action="" method="post">
            <input placeholder=" Masukkan kata kunci ..." type="text" name="katakunci">
            <button type="submit" name="cari"> Cari </button>
        </form>

        <table cellpadding="5">
            <tr>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Studio</th>
                <th>Aksi</th>
            </tr>
            <?php foreach($games as $game) :?>
            <tr>
                <td><a style="color: blue;" href="detail.php?judul=<?= $game["judul"];?>&tahun=<?= $game["tahun"];?>&studio=<?= $game["studio"];?>"><?= $game["judul"];?></a></td>
                <td><?= $game["tahun"];?></td>
                <td><?= $game["studio"];?></td>

                <td><a style="background: blue;" href="edit.php?id=<?= $game["id"];?>&judul=<?= $game["judul"];?>&tahun=<?= $game["tahun"];?>&studio=<?= $game["studio"];?>">Edit</a><a style="background: red;" href="hapus.php?id=<?= $game["id"];?>">Hapus</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td><a style="background: blue" href="tambah.php">Tambah Data</a></td>
            </tr>
        </table>

        <!-- for mobile -->
        <a class="mobile" style="background: blue" href="tambah.php">Tambah Data !</a>
        <!-- -->

    </div>

    <footer>
        <p><b>Created by <a href="https://www.instagram.com/andyxforce">@andyxforce</a></b></p>

    <marquee style="font-style:italic; color: white">~ I built this Website from -zero- "HTML, CSS, PHP, and a Little bit JAVASCRIPT" ~</marquee>
    </footer>
    
</body>
</html>