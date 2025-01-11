<div class="grid-layout">
    <div class="container">
        <article>
            <h1>Lista Produktów i Kategorii
            </h1>
            <?php
                function printProductsAndCategories($connection, $matka, $glebokosc)
                {
                    $query = "SELECT id, matka, nazwa FROM categories WHERE matka = {$matka} LIMIT 100";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result))
                        {
                            for ($i = 0; $i < $glebokosc; $i++)
                                print("&nbsp&nbsp&nbsp&nbsp");
                            print("<b>".$row['nazwa']."</b>");
                            
                            $products_query = "SELECT nazwa FROM products WHERE products.matka = {$row['id']}";
                            $products_result = mysqli_query($connection, $products_query);
                            if (mysqli_num_rows($products_result) > 0)
                            {
                                print("<br>");
                                while ($product = mysqli_fetch_array($products_result))
                                {
                                    for ($i = 0; $i < $glebokosc + 1; $i++)
                                        print("&nbsp&nbsp&nbsp&nbsp");
                                    print($product['nazwa']);
                                }
                            }

                            print("<br>");
                            printProductsAndCategories($connection, $row['id'], $glebokosc + 1);
                        }
                    }
                }

                printProductsAndCategories($connection, 0, 0);
            ?>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Dodaj Produkt</h1>
            <form action="php/produkty/dodaj_produkt.php" method="post" enctype="multipart/form-data" class="container">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa">
                <br>
                <label for="opis">Opis</label>
                <input type="text" name="opis">
                <br>
                <label for="data_wygasniecia">Data Wygaśnięcia</label>
                <input type="date" name="data_wygasniecia">
                <br>
                <label for="cena_netto">Cena Netto</label>
                <input type="number" step="0.01" name="cena_netto">
                <br>
                <label for="vat">VAT</label>
                <input type="number" step="0.01" name="vat">
                <br>
                <label for="sztuki">Sztuki</label>
                <input type="number" name="sztuki">
                <br>
                <label for="status">Status</label>
                <input type="text" name="status">
                <br>
                <label for="matka">Matka</label>
                <input type="number" name="matka" value=0>
                <br>
                <label for="zdjecie">Zdjecie</label>
                <input type="file" name="zdjecie">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Dodaj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Edytuj Produkt</h1>
            <form action="php/produkty/edytuj_produkt.php" method="post" enctype="multipart/form-data" class="container">
                <label for="nazwa">Stara Nazwa</label>
                <input type="text" name="nazwa">
                <br>
                <label for="nowa_nazwa">Nowa Nazwa</label>
                <input type="text" name="nowa_nazwa">
                <br>
                <label for="opis">Opis</label>
                <input type="text" name="opis">
                <br>
                <label for="data_wygasniecia">Data Wygaśnięcia</label>
                <input type="date" name="data_wygasniecia">
                <br>
                <label for="cena_netto">Cena Netto</label>
                <input type="number" step="0.01" name="cena_netto">
                <br>
                <label for="vat">VAT</label>
                <input type="number" step="0.01" name="vat">
                <br>
                <label for="sztuki">Sztuki</label>
                <input type="number" name="sztuki">
                <br>
                <label for="status">Status</label>
                <input type="text" name="status">
                <br>
                <label for="matka">Matka</label>
                <input type="number" name="matka" value=0>
                <br>
                <label for="zdjecie">Zdjecie</label>
                <input type="file" name="zdjecie">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Edytuj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Usuń Produkt</h1>
            <form action="php/produkty/usun_produkt.php" method="post" class="container">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Usuń">
            </form>
        </article>
    </div>
</div>

<div class="grid-layout">
    <?php
        include_once('php/produkty/products_utils.php');

        $all_products = GetAllProducts($connection);

        foreach ($all_products as &$product)
        {
            print("<div class=\"container\">");
            print("<article>");
            print("<h1>{$product->name}</h1>");
            print("<img src='{$product->image}'>");
            print("<p>Kategoria: {$product->category}</p>");
            print("<p>Opis: {$product->description}</p>");
            print("<p>Data Utworzenia: {$product->creation_date}</p>");
            print("<p>Data Modyfikacji: {$product->modification_date}</p>");
            print("<p>Data Wygaśnięcia: {$product->expiration_date}</p>");
            print("<p>Sztuki: {$product->count}</p>");
            print("<p>Status: {$product->status}</p>");
            print("<p>Cena netto: {$product->netto_cost} PLN</p>");
            print("<p>VAT: {$product->vat}%</p>");
            print("<p>Cena brutto: {$product->total_cost} PLN</p>");
            ?>
                <form action="index.php?idp=koszyk/dodaj_do_koszyka" method="post" enctype="multipart/form-data" class="container">
                    <input type="text" value="<?php echo $product->id; ?>" hidden name="id">
                    <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                    <input type="submit" value="Dodaj do koszyka" <?php if (!$product->IsAvailable()) echo "disabled"; ?>>
                </form>
            <?php
            print("</article>");
            print("</div>");
        }
    ?>
</div>