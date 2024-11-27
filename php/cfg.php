<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'hodowla_zolwi';

    $admin_email = 'asd';
    $admin_pass = '123';

    $connection = mysqli_connect($host, $user, $pass, $name);
    if (!$connection)
        return;
?>