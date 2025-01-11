<?php
    include('shopping_cart_utils.php');

    if (!isset($_POST['id']) ||
        !isset($_POST['return_url']))
            return;

    RemoveFromCart($connection, $_POST['id'], 1);
    
    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>