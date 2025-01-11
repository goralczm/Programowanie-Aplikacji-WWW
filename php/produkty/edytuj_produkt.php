<?php
    session_start();
    include('../cfg.php');
    include('../admin.php');

    if (!JestAdminem())
        return;

    if (!isset($_POST['nazwa']) ||
        !isset($_POST['nowa_nazwa']) ||
        !isset($_POST['opis']) ||
        !isset($_POST['data_wygasniecia']) ||
        !isset($_POST['cena_netto']) ||
        !isset($_POST['vat']) ||
        !isset($_POST['sztuki']) ||
        !isset($_POST['status']) ||
        !isset($_POST['matka']) ||
        !isset($_POST['return_url']))
        return;

    $data = date("Y-m-d");

    $query = "UPDATE `products` SET `nazwa` = '{$_POST["nowa_nazwa"]}', `opis` = '{$_POST["opis"]}', `data_modyfikacji` = '{$data}', `data_wygasniecia` = '{$_POST["data_wygasniecia"]}', `cena_netto` = '{$_POST["cena_netto"]}', `vat` = '{$_POST["vat"]}', `sztuki` = '{$_POST["sztuki"]}', `matka` = '{$_POST["matka"]}', `status` = '{$_POST['status']}' WHERE `products`.`nazwa` = '{$_POST["nazwa"]}'";

    mysqli_query($connection, $query);
    
    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>