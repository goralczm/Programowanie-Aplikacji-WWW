<?php
    session_start();
    include('../cfg.php');
    include('../admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['nazwa']) ||
        !isset($_POST['return_url']))
        return;

    $query = "DELETE FROM products WHERE products.nazwa = '{$_POST['nazwa']}' LIMIT 1";
    mysqli_query($connection, $query);
    
    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>