<div class="products">
    <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0)
        {
            while ($product = mysqli_fetch_array($result))
            {
                $image = $product['zdjecie'];

                print("<div class=\"container\">");
                print("<article>");
                print("<h1>{$product['nazwa']}</h1>");
                print('<img src="data:image/jpeg;base64,'.base64_encode($image) .'" />');
                print("<p>Opis: {$product["opis"]}</p>");
                print("<p>Data Utworzenia: {$product["data_utworzenia"]}</p>");
                print("<p>Data Modyfikacji: {$product["data_modyfikacji"]}</p>");
                print("<p>Data Wygaśnięcia: {$product["data_wygasniecia"]}</p>");
                print("<p>Sztuki: {$product["sztuki"]}</p>");
                print("<p>Status: {$product["status"]}</p>");
                print("<p>Cena netto: {$product["cena_netto"]}</p>");
                print("<p>VAT: {$product["vat"]}%</p>");
                print("</article>");
                print("</div>");
            }
        }
    ?>
</div>