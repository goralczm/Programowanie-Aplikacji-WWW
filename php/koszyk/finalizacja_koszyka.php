<?php
    include('shopping_cart_utils.php');

    if (!isset($_POST['return_url']))
        return;

    $shopping_cart_products = GetShoppingCartProducts($connection);

    foreach ($shopping_cart_products as &$product)
    {
        $query = "UPDATE products SET sztuki = sztuki - $product->count WHERE id = $product->id";
        mysqli_query($connection, $query);
    }

    unset($_SESSION['shopping_cart']);

    // Wraca do poprzedniej strony
    header("Location: ".$_POST['return_url']);
?>