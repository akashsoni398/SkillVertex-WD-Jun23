<?php 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpasswd = "";
    $dbdatabase = "music-hub";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbdatabase);

    if(!$conn) {
        echo "Database error: ",mysqli_connect_error();
    }
?>