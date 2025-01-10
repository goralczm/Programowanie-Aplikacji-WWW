<?php
    // Wyświetla formularz kontaktowy
    function PokazKontakt()
    {
        $wynik = '
        <div class="logowanie">
            <div class="logowanie">
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" name="ContactForm" enctype="multipart/form-data" class="container>
                    <table class="container">
                        <tr><td class="log4_t">[temat]</td><td><input type="text" name="temat" id="" class="logowanie"></td></tr>
                        <tr><td class="log4_t">[tresc]</td><td><input type="text" name="tresc" id="" class="logowanie"></td></tr>
                        <tr><td class="log4_t">[email]</td><td><input type="email" name="email" id="" class="logowanie"></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" value="Wyslij Mail" name="x1_submit" class="logowanie"></td></tr>
                    </table>
                </form>
            </div>
        </div>
        ';

        return $wynik;
    }

    // Wyświetla formularz przypomnienia hasła admina
    function FormularzPrzypomnieniaHasla()
    {
        $wynik = '
        <div class="logowanie">
            <div class="logowanie">
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" name="ContactForm" enctype="multipart/form-data" class="container>
                    <table class="container">
                        <tr><td class="log4_t">[email_konta]</td><td><input type="email" name="email_konta" id="" class="logowanie"></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" value="Przypomnij Haslo" name="x1_submit" class="logowanie"></td></tr>
                    </table>
                </form>
            </div>
        </div>
        ';

        return $wynik;
    }

    // Wysyła maila do odbiorcy
    function WyslijMailaKontakt($odbiorca)
    {
        if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
        {
            //echo '[nie_wypelniles_pola]';
            //echo PokazKontakt();
        }
        else
        {
            $mail['subject'] = $_POST['temat'];
            $mail['body'] = $_POST['tresc'];
            $mail['sender'] = $_POST['email'];
            $mail['reciptient'] = $odbiorca;

            $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
            $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding";
            $header .= "X-Sender: <".$mail['sender'].">\n";
            $header .= "X-Mailer: PRapWWW mail 1.2\n";
            $header .= "Return-Path: <".$mail['sender'].">\n";

            mail($mail['reciptient'], $mail['subject'], $mail['body'], $header);

            //echo '[wiadomosc_wyslana]';
        }
    }

    // Wysyła maila z loginem i hasłem admina
    function PrzypomnijHasloAdmina($admin_email, $admin_pass)
    {
        if (empty($_POST['email_konta']))
            return;

        $_POST['temat'] = 'Odzyskiwanie hasla';
        $_POST['tresc'] = $admin_email." ; ".$admin_pass;
        $_POST['email'] = 'system@zolwie.pl';
        WyslijMailaKontakt($_POST['email_konta']);
    }
?>