<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" content="Maciej Góralczyk" />
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <script src="js/kolorujtlo.js" type="text/javascript"></script>
    <script src="js/timedate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Hodowla Żółwia Wodnego</title>
    <script>
        function start()
        {
            startClock();
            loadSavedBackground();
        }
    </script>
</head>
<body onload="start()">
    <nav>
        <ul>
            <div class="logo">
                <img src="images/logo.png" alt="">
                <b>Turteles</b>
            </div>
            <li><a href="index.php">Trochę wstępu o żółwiach</a></li>
            <li><a href="index.php?idp=jakzaczac">Jak zacząć?</a></li>
            <li><a href="index.php?idp=jedenczykilka">Jeden żółw czy kilka?</a></li>
            <li><a href="index.php?idp=wskazowki">Cenne wskazówki</a></li>
            <li><a href="index.php?idp=akcesoria">Akcesoria</a></li>
            <li><a href="index.php?idp=filmy">Filmy</a></li>
            <li><a href="index.php?idp=panel_cms">Panel CMS</a></li>
            <li><a href="index.php?idp=produkty/pokaz_produkty">Produkty</a></li>
            <li><a href="index.php?idp=koszyk/pokaz_koszyk">Koszyk</a></li>
            <li><a href="index.php?idp=kontakt">Kontakt</a></li>
        </ul>
    </nav>

    <?php
        // Importuje pliki użytkowe
        include('php/cfg.php');
        include('php/admin.php');
        include('php/contact.php');
        
        // Jeśli nazwa strony jest przesłana fomularzem GET
        if (isset($_GET['idp']))
        {
            // Zapobiega Code Injection
            $id_clear = htmlspecialchars($_GET['idp']);

            $query = 'SELECT * FROM pages WHERE Title = "'.$id_clear.'" LIMIT 1';
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);

            // Jeśli zapytanie nie zwróciło żadnych rekordów
            if (mysqli_num_rows($result) == 0)
            {
                $path = 'php/'.$id_clear.'.php';

                // Jeśli ścieżka do pliku istnieje
                if (file_exists($path))
                {
                    // Importuj lokalnie zapisaną stronę
                    include($path);
                }
                else
                {
                    // Importuje domyślną stronę główną
                    echo "ERROR 404: Nie znaleziono szukanej strony!";
                    include('php/wstep.php');
                }

                return;
            }

            // Wyświetla 'ciało' znalezionej strony
            echo $row['Content'];
        }
        else
            include('php/wstep.php');
    ?>

    <footer>
        Maciej Góralczyk @ Programowanie Aplikacji WWW
    </footer>
</body>
</html>