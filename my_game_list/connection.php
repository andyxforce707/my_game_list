<?php
$connection = mysqli_connect("localhost","root","","phpdasar_test");

if(!$connection) {
    echo 'Connection Succed!';
} else {
    echo mysqli_error($connection);
}

?>