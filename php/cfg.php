<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'hodowla_zolwi';

    $connection = mysqli_connect($host, $user, $pass, $name);
    if (!$connection)
        return;
?>