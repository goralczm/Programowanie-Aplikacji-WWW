<div class="products">
        <?php
            include('php/koszyk/shopping_cart_utils.php');

            $shopping_products = GetShoppingCartProducts($connection);

            if (count($shopping_products) > 0)
            {
                ?>

                <table>
                    <tr>
                        <th>Zdjęcie</th>
                        <th>Nazwa</th>
                        <th>Sztuki</th>
                        <th>Cena brutto</th>
                        <th>Dodaj sztukę</th>
                        <th>Usuń sztukę</th>
                    </tr>

                <?php
                $shopping_cart_cost = 0;

                foreach ($shopping_products as &$product)
                {
                    if (!$product->IsAvailable())
                    {
                        ForceRemoveFromCart($product->id);
                        continue;
                    }

                    $shopping_cart_cost += $product->total_cost;

                    ?>
                    <tr>
                        <td><?php echo "<image src='{$product->image}'>"; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->count; ?></td>
                        <td><?php echo $product->total_cost; ?> PLN</td>
                        <td>
                            <form action="index.php?idp=koszyk/dodaj_do_koszyka" method="post" enctype="multipart/form-data" class="container">
                                <input type="text" value="<?php echo $product->id; ?>" hidden name="id">
                                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                                <input type="submit" value="Dodaj">
                            </form>
                        </td>
                        <td>
                            <form action="index.php?idp=koszyk/usun_z_koszyka" method="post" enctype="multipart/form-data" class="container">
                                <input type="text" value="<?php echo $product->id; ?>" hidden name="id">
                                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                                <input type="submit" value="Usuń">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Suma brutto: <?php echo $shopping_cart_cost; ?> PLN</td>
                <td>
                    <form action="index.php?idp=koszyk/finalizacja_koszyka" method="post" enctype="multipart/form-data" class="container">
                        <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                        <input type="submit" value="Przejdź do płatności">
                    </form>
                </td>
            </table>

                <?php
            }
            else
            {
                ?>
                <div class="container">
                    <article>
                        <h2>Brak przedmiotów w koszyku</h2>
                    </article>
                </div>
                <?php
            }
        ?>
</div>