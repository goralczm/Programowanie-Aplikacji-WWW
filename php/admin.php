<?php
    // Wyświetla formularz logowania
    function FormularzLogowania()
    {
        $wynik = '
        <div class="logowanie">
            <div class="logowanie">
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" name="LoginForm" enctype="multipart/form-data" class="container>
                    <table class="container">
                        <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" id="" class="logowanie"></td></tr>
                        <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" id="" class="logowanie"></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" value="Zaloguj" name="x1_submit" class="logowanie"></td></tr>
                    </table>
                </form>
            </div>
        </div>
        ';

        return $wynik;
    }
    
    // Wyświetla listę podstron znajdujących się w bazie danych
    function ListaPodstron($connection)
    {
        $query = "SELECT Title FROM pages LIMIT 100";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 0)
        {
            print("Brak Podstron<br>");
            return;
        }

        while ($row = mysqli_fetch_array($result))
        {
            print("<a href='?idp={$row["Title"]}'>".$row['Title'].'</a><br>');
        }
    }

    // Czy aktualny użytkownik jest adminem
    function JestAdminem()
    {
        return $_SESSION['Admin'];
    }
?>

