<?php
require 'connection.php';
require 'functions.php';

if(!isset($_GET["judul"]) && !isset($_GET["tahun"]) && !isset($_GET["studio"])) {
    header("Location: index.php");
}

if(isset($_POST["edit"])) {
    edit($_POST);
    if(mysqli_affected_rows($connection) > 0) {
        echo '<script>
            setTimeout(() => {
            document.location.href = "index.php";
        },2000);
        </script>';
        $succed = true;
    } else {
        $failed = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>

        * {
            font-family: arial;
        }
        body {
            width: 100%;
            height: 100vh;
        }

        #container {
            display: flex;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: arial;
            box-sizing: border-box;
        }
        #container h1 {
            color: blue;
        }

        #container form input {
            padding: 5px 10px;
            outline: none;
            margin: 2.5px;
            border: 1px solid blue;
            color: #222;
        }
        #container form button {
            padding: 5px 10px;
            background: blue;
            color: white;
            border: none;
            font-size: 15px;
            cursor: pointer;
            margin-left: 30px;
        }
        #container form a {
            padding: 5px 10px;
            background: white;
            border: 1px solid blue;
            text-decoration: none;
            color: blue;
        }


        #container .succed {
            display: flex;
            justify-content: center;
            position: absolute;
            border-bottom: 2px solid blue;
            text-align: center;
            line-height: 75px;
            width: 400px;
            height: 75px;
            padding: 5px 10px;
            right: 0;
            top: 20px;
            background: white;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
            transition: 0.4s;
            color: blue;
            animation: slide 3s infinite;
        }

        #container .failed {
            display: flex;
            justify-content: center;
            position: absolute;
            border-bottom: 2px solid red;
            text-align: center;
            line-height: 75px;
            width: 400px;
            height: 75px;
            padding: 5px 10px;
            right: 0;
            top: 20px;
            background: white;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
            transition: 0.4s;
            color: red;
            animation: slide 2s 5 forwards;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(-50px);
                opacity:0;
            }
        }

        /* media query */
        @media only screen and (max-width: 600px) {
            #container {
            justify-content: start;
            margin-top: 100px;

            }

            #container form {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                gap: 10px;
                width: 50%;
            }

            #container form input{
                height: 30px;
            }

            #container form button, #container form a {
                padding:0;
                width: 50%;
                margin: 0;
                padding: 10px 0;
                text-align: center;
            }

        }

    </style>
</head>
<body>
    <div id="container">
        
        <?php if(isset($succed)) :?>
            <h3 class="succed">Data Berhasil di Edit</h3>
        <?php endif; ?>

        <?php if(isset($failed)) :?>
            <h3 class="failed">Data Gagal di Edit</h3>
        <?php endif; ?>

        <h1>Edit Data</h1>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"];?>">

            <input type="text" name="judul" placeholder=" judul .. " autocompleted="off" value="<?= $_GET["judul"];?>">
            <input type="text" name="tahun" placeholder=" tahun .. " autocompleted="off" value="<?= $_GET["tahun"];?>">
            <input type="text" name="studio" placeholder=" studio .. " autocompleted="off" value="<?= $_GET["studio"];?>">

            <button type="submit" name="edit" onclick="console.log('OK !');"> Edit </button>
            <a href="index.php"> Kembali </a>
        </form>
    </div>
    
</body>
</html>