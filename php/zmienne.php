<?php
    session_start();

    echo 'Zmienna GET: ';
    print_r($_GET);
    echo '<br>';

    echo 'Zmienna POST: ';
    print_r($_POST);
    echo '<br>';

    echo 'Zmienna SESSION: ';
    print_r($_SESSION);
    echo '<br>';
?>