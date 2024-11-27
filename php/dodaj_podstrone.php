<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['title']) || !isset($_POST['content']) || !isset($_POST['return_url']))
        return;

    $query = "INSERT INTO pages (ID, Title, Content, Status) VALUES (NULL, '{$_POST['title']}', '{$_POST['content']}', '1') LIMIT 1";

    mysqli_query($connection, $query);

    header("Location: ".$_POST['return_url']);
?>