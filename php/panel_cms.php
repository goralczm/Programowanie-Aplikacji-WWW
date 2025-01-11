<div class="banner">
    <img src="images/zolw-w-wodzie.jpg" alt="" style="transform: translateY(-200px);">
    <h1>Panel CMS</h1>
</div>

<?php
    session_start();
    WyslijMailaKontakt('169241@student.uwm.edu.pl');
    PrzypomnijHasloAdmina($admin_email, $admin_pass);
    if (isset($_POST['wyloguj']))
    {
        $_SESSION['login_email'] = '';
        $_SESSION['login_pass'] = '';
        $_SESSION['Admin'] = false;
    }

    if (isset($_POST['login_email']) && $_POST['login_email'])
        $_SESSION['login_email'] = $_POST['login_email'];

    if (isset($_POST['login_pass']) && $_POST['login_pass'])
        $_SESSION['login_pass'] = $_POST['login_pass'];

    if (isset($_POST['login_email']) && isset($_POST['login_pass']))
        $_SESSION['Admin'] = $_SESSION['login_email'] == $admin_email && $_SESSION['login_pass'] == $admin_pass;
?>

<div class="container">
        <article>
            <h1>Formularz Kontaktowy</h1>
            <?php
                echo PokazKontakt();
            ?>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Odzyskiwanie Hasła</h1>
            <?php
                echo FormularzPrzypomnieniaHasla();
            ?>
        </article>
    </div>

    <?php
    if (JestAdminem())
    {
        echo '
        <div class="container">
            <article>
                <h1>Wyloguj</h1>
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="container">
                    <table class="logowanie">
                        <tr><td>&nbsp;</td><td><input type="submit" value="Wyloguj" name="wyloguj" class="logowanie"></td></tr>
                    </table>
                </form>
            </article>
        </div>';
    }
    else
    {
        echo '
        <div class="container">
            <article>
                <h1>Formularz Logowania</h1>
                <div class="article-image floating-left">
                    <img src="images/zol6.jpg" alt="" style="width: 300px">
                </div>'.FormularzLogowania().'
            </article>
        </div>';
    }
    ?>

<?php
if (!JestAdminem())
    exit();
?>

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
                            print("<b>".'{'.$row['id'].'} '.$row['nazwa']."</b>");
                            
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

    <div class="container">
        <article>
            <h1>Lista Kategorii</h1>
            <?php
                function printCategory($connection, $matka, $glebokosc)
                {
                    $query = "SELECT id, matka, nazwa FROM categories WHERE matka = {$matka} LIMIT 100";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result))
                        {
                            for ($i = 0; $i < $glebokosc; $i++)
                                print("&nbsp&nbsp&nbsp&nbsp");
                            print('{'.$row['id'].'} '.$row['nazwa']);
                            print("<br>");
                            printCategory($connection, $row['id'], $glebokosc + 1);
                        }
                    }
                }

                printCategory($connection, 0, 0);
            ?>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Dodaj Kategorie</h1>
            <form action="php/dodaj_kategorie.php" method="post" class="container">
                <label for="matka">Matka Kategori</label>
                <input type="number" name="matka" value=0>
                <br>
                <label for="nazwa">Nazwa Kategori</label>
                <input type="text" name="nazwa">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Dodaj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Edytuj Kategorie</h1>
            <form action="php/edytuj_kategorie.php" method="post" class="container">
            <label for="matka">Matka Kategori</label>
                <input type="number" name="matka" value=0>
                <br>
                <label for="nowa_matka">Nowa Matka Kategori</label>
                <input type="number" name="nowa_matka" value=0>
                <br>
                <label for="nazwa">Nazwa Kategori</label>
                <input type="text" name="nazwa">
                <br>
                <label for="nowa_nazwa">Nowa Nazwa Kategori</label>
                <input type="text" name="nowa_nazwa">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Edytuj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Usuń Kategorie</h1>
            <form action="php/usun_kategorie.php" method="post" class="container">
                <label for="nazwa">Nazwa Kategori</label>
                <input type="text" name="nazwa">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Usuń">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Lista Podstron</h1>
            <?php
                echo ListaPodstron($connection);
            ?>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Dodaj Podstronę</h1>
            <form action="php/dodaj_podstrone.php" method="post" class="container">
                <label for="title">Tytuł Podstrony</label>
                <input type="text" name="title">
                <br>
                <label for="content">Zawartość Podstrony</label>
                <textarea name="content"></textarea>
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Dodaj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Edytuj Podstronę</h1>
            <form action="php/edytuj_podstrone.php" method="post" class="container">
                <label for="title">Tytuł Podstrony</label>
                <input type="text" name="title">
                <br>
                <label for="new_title">Nowy Tytuł Podstrony</label>
                <input type="text" name="new_title">
                <br>
                <label for="content">Zawartość Podstrony</label>
                <textarea name="content"></textarea>
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Edytuj">
            </form>
        </article>
    </div>

    <div class="container">
        <article>
            <h1>Usuń Podstronę</h1>
            <form action="php/usun_podstrone.php" method="post" class="container">
                <label for="title">Tytuł Podstrony</label>
                <input type="text" name="title">
                <br>
                <input type="text" name="return_url" value=<?php echo "{$_SERVER['REQUEST_URI']}"?> hidden>
                <input type="submit" value="Usuń">
            </form>
        </article>
    </div>
</div>