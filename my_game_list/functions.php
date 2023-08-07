<?php
require 'connection.php';

function query($query) {
    global $connection;

    $result = mysqli_query($connection,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data) {
    global $connection;

    $judul = htmlspecialchars($data["judul"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $studio = htmlspecialchars($data["studio"]);

    $query = "INSERT INTO daftar_games VALUES ('','$judul','$tahun','$studio')";

    mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
}

function hapus($id) {
    global $connection;

    mysqli_query($connection, "DELETE FROM daftar_games WHERE id = $id");

    return mysqli_affected_rows($connection);

}

function edit($recent) {
    global $connection;

    $id = $recent["id"];
    $judul = htmlspecialchars($recent["judul"]);
    $tahun = htmlspecialchars($recent["tahun"]);
    $studio = htmlspecialchars($recent["studio"]);

    $query = "UPDATE daftar_games SET judul = '$judul',tahun='$tahun',studio='$studio' WHERE id=$id";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function cari($keyword) {
    global $connection;

    $query = "SELECT * FROM daftar_games WHERE judul LIKE '%$keyword%' OR tahun LIKE '%$keyword%' OR studio LIKE '%$keyword%'";

    return mysqli_query($connection, $query);
}

?>