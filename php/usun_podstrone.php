<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['title']) || !isset($_POST['return_url']))
        return;

    $query = "DELETE FROM pages WHERE pages.Title = '{$_POST['title']}'";
    mysqli_query($connection, $query);

    header("Location: ".$_POST['return_url']);
?>