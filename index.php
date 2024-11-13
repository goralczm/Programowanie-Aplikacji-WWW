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
            <li><a href="index.php?idp=wstep.php">Trochę wstępu o żółwiach</a></li>
            <li><a href="index.php?idp=jakzaczac.php">Jak zacząć?</a></li>
            <li><a href="index.php?idp=jedenczykilka.php">Jeden żółw czy kilka?</a></li>
            <li><a href="index.php?idp=wskazowki.php">Cenne wskazówki</a></li>
            <li><a href="index.php?idp=akcesoria.php">Akcesoria</a></li>
            <li><a href="index.php?idp=filmy.php">Filmy</a></li>
            <li><a href="index.php?idp=kontakt.php">Kontakt</a></li>
        </ul>
    </nav>

    <?php
        $podstrona = "";
        if (isset($_GET['idp']) && file_exists('php/'.$_GET['idp']))
            $podstrona = $_GET['idp'];
        else
            $podstrona = "wstep.php";

        include('php/'.$podstrona);
    ?>

    <footer>
        Maciej Góralczyk @ Programowanie Aplikacji WWW
    </footer>
</body>
</html>