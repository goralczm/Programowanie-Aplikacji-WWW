<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['title']) || !isset($_POST['new_title']) || !isset($_POST['content'])|| !isset($_POST['return_url']))
        return;

    $query = "UPDATE pages SET Title = '{$_POST['new_title']}', Content = '{$_POST['content']}' WHERE pages.Title = '{$_POST['title']}'";

    mysqli_query($connection, $query);

    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>