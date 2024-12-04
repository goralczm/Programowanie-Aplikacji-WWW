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