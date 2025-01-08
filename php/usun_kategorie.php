<?php
    session_start();
    include('cfg.php');
    include('admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['nazwa']) || !isset($_POST['return_url']))
        return;

    $query = "SELECT matka FROM categories WHERE categories.nazwa = '{$_POST['nazwa']}'";
    $result = mysqli_query($connection, $query);
    $matka = 0;

    if (mysqli_num_rows($result) > 0)
    {
        $matka = mysqli_fetch_array($result)[0];

        $query = "DELETE FROM categories WHERE categories.nazwa = '{$_POST['nazwa']}'";
        mysqli_query($connection, $query);

        if ($matka != 0)
            $query = "DELETE FROM categories WHERE categories.matka = {$matka}";
    }

    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>