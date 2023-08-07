<?php
require 'functions.php';
require 'connection.php';

if(!isset($_GET["id"])) {
    header("Location: index.php");
}

$id = $_GET["id"];

if($id > 0 ) {
    hapus($id);
    if(mysqli_affected_rows($connection) > 0) {
        $succed = true;
        echo '<script>
                setTimeout(()=>{
                    document.location.href = "index.php";
                },3000);
            </script>';
    } else {
        echo 'Maaf, data gagal dihapus : (';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
    <style>
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: arial;
        }

        .box {
            padding: 10px 20px;
            animation: shine 3s forwards;
            transition: 0.4s;
        }

        @keyframes shine {
            0% {
                box-shadow: 0 0 10px blue;
            }

            50% {
                box-shadow: 0 0 40px blue;

            }

            100% {
                box-shadow: 0 0 80px blue;

            }
        }

        .box h3 {
            color: blue;
        }
    </style>
</head>
<body>
    <?php if(isset($succed)) :?>
        <div class="box">
            <h3> Data Berhasil di Hapus </h3>
        </div>
    <?php endif; ?>
    
</body>
</html>