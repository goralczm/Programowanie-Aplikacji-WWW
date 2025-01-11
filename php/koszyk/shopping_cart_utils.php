<?php
    session_start();
    include_once('php/cfg.php');
    include_once('php/admin.php');
    include_once('php/produkty/products_utils.php');

    function AddToCart($connection, $product_id, $diff)
    {
        $key = "product_".$product_id;
        $count = 0;

        $database_product = new Product($connection, $product_id);
    
        if (!isset($_SESSION['shopping_cart']))
            $_SESSION['shopping_cart'] = array();
    
        if (isset($_SESSION['shopping_cart'][$key]))
            $count = $_SESSION['shopping_cart'][$key]['count'];
    
        $product['id'] = $_POST['id'];

        $new_count = min($count + $diff, $database_product->count);

        $product['count'] = $new_count;
    
        if ($product['count'] <= 0)
            unset($_SESSION['shopping_cart'][$key]);
        else
            $_SESSION['shopping_cart'][$key] = $product;
    }

    function RemoveFromCart($connection, $product_id, $diff)
    {
        AddToCart($connection, $product_id, -$diff);
    }

    function ForceRemoveFromCart($product_id)
    {
        $key = "product_".$product_id;
        unset($_SESSION['shopping_cart'][$key]);
    }

    class ShoppingCartProduct extends Product
    {
        function __construct($connection, $id, $count)
        {
            parent::__construct($connection, $id);
            $this->count = $count;
            $this->total_cost = $this->GetTotalCost();
        }
    }

    function GetShoppingCartProducts($connection)
    {
        if (!isset($_SESSION['shopping_cart']))
            return array();

        $products = array();
        $shopping_cart = $_SESSION['shopping_cart'];

        foreach ($shopping_cart as &$cart_product)
        {
            array_push($products, new ShoppingCartProduct($connection, $cart_product['id'], $cart_product['count']));
        }

        return $products;
    }
?>