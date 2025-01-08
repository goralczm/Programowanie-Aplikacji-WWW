<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['matka']) || !isset($_POST['nazwa']) || !isset($_POST['return_url']))
        return;

    $query = "SELECT nazwa FROM categories WHERE categories.nazwa = '{$_POST['nazwa']}'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0)
    {
        $query = "INSERT INTO categories (id, matka, nazwa) VALUES (NULL, '{$_POST['matka']}', '{$_POST['nazwa']}') LIMIT 1";

        mysqli_query($connection, $query);
    }
    
    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>