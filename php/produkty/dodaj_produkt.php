<?php
    session_start();
    include('../cfg.php');
    include('../admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['nazwa']) ||
        !isset($_POST['opis']) ||
        !isset($_POST['data_wygasniecia']) ||
        !isset($_POST['cena_netto']) ||
        !isset($_POST['vat']) ||
        !isset($_POST['sztuki']) ||
        !isset($_POST['matka']) ||
        !isset($_POST['return_url']))
        return;

    $query = "SELECT nazwa FROM products WHERE products.nazwa = '{$_POST['nazwa']}'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0)
    {
        $data = date("Y-m-d");

        $query = "INSERT INTO `products` (`id`, `nazwa`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `vat`, `sztuki`, `status`, `matka`) VALUES (NULL, '{$_POST["nazwa"]}', '{$_POST["opis"]}', '{$data}', '{$data}', '{$_POST["data_wygasniecia"]}', '{$_POST["cena_netto"]}', '{$_POST["vat"]}', '{$_POST["sztuki"]}', 'Dostepny', '{$_POST["matka"]}') LIMIT 1";

        mysqli_query($connection, $query);
    }
    
    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>