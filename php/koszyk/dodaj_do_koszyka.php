<?php
    include('shopping_cart_utils.php');

    if (!isset($_POST['id']) ||
        !isset($_POST['return_url']))
            return;

    AddToCart($connection, $_POST['id'], 1);
    
    // Wraca do poprzedniej strony
    header("Location: index.php?idp=koszyk/pokaz_koszyk");
?>