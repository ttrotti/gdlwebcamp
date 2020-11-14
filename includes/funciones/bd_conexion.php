<?php
    $conn = new mySQLi('localhost', 'root', 'root', 'gdlwebcamp');
    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>