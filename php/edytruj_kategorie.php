<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['matka']) || !isset($_POST['nowa_matka']) || !isset($_POST['nazwa']) || !isset($_POST['nowa_nazwa']) || !isset($_POST['return_url']))
        return;

    $query = "UPDATE categories SET matka = '{$_POST['nowa_matka']}', nazwa = '{$_POST['nowa_nazwa']}' WHERE pages.nazwa = '{$_POST['nazwa']}'";

    mysqli_query($connection, $query);

    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>