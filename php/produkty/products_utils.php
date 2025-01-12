<?php
    class Product
    {
        public $id;
        public $name;
        public $description;
        public $creation_date;
        public $modification_date;
        public $expiration_date;
        public $netto_cost;
        public $vat;
        public $total_cost;
        public $status;
        public $count;
        public $image;
        public $category;

        function __construct($connection, $id)
        {
            $query = "SELECT * FROM products WHERE products.id = '{$id}'";
            $result = mysqli_query($connection, $query);

            $product = mysqli_fetch_array($result);
            
            $this->id = $id;
            $this->name = $product['nazwa'];
            $this->description = $product['opis'];
            $this->creation_date = $product['data_utworzenia'];
            $this->modification_date = $product['data_modyfikacji'];
            $this->expiration_date = $product['data_wygasniecia'];
            $this->netto_cost = $product['cena_netto'];
            $this->vat = $product['vat'];
            $this->status = $product['status'];
            $this->count = $product['sztuki'];
            $this->total_cost = $this->GetSingleCost();
            $this->image = 'data:image/jpeg;base64,'.base64_encode($product['zdjecie']);

            $sub_query = "SELECT nazwa from categories WHERE categories.id = '{$product["matka"]}'";
            $sub_result = mysqli_query($connection, $sub_query);
            $category = mysqli_fetch_array($sub_result)[0];

            $this->category = $category;
        }

        public function GetSingleCost()
        {
            return $this->netto_cost + ($this->netto_cost * $this->vat / 100);
        }

        public function GetTotalCost()
        {
            return $this->count * $this->GetSingleCost();
        }

        public function IsAvailable()
        {
            return $this->status == 'Dostępny' && $this->count > 0 && $this->expiration_date > date(date("Y-m-d"));
        }
    }

    function GetAllProducts($connection)
    {
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);
        
        $products = array();

        if (mysqli_num_rows($result) > 0)
        {
            while ($product = mysqli_fetch_array($result))
            {
                array_push($products, new Product($connection, $product['id']));
            }
        }

        return $products;
    }
?>