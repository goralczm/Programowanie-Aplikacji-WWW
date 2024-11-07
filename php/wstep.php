<div class="banner">
    <img src="images/zolw-w-wodzie.jpg" alt="" style="transform: translateY(-200px);">
    <h1>Trochę Wstępu o Żółwiach</h1>
</div>

<div class="container">
    <article class="container">
        <h1>Blok PHP</h1>
        <div class="test-block">
            <?php
                $nr_indeksu = '169241';
                $nrGrupy = '1';
                echo 'Autor: Maciej Góralczyk '.$nr_indeksu.' grupa '.$nrGrupy;
            ?>
        </div>
    </article>
</div>

<div class="container">
    <article class="container">
        <h1>Blok testowy</h1>
        <div id="animacjaTestowa1" class="test-block">Kliknij, a się powiększe</div>
        <script>
            $("#animacjaTestowa1").on("click", function() {
                $(this).animate({
                    width: "500px",
                    opacity: 0.4,
                    fontSize: "3em",
                    borderWidth: "10px"
                }, 1500);
            });
        </script>
    </article>

    <article class="container">
        <h1>Blok testowy</h1>
        <div id="animacjaTestowa2" class="test-block">Najedź kursorem, a się powiększe</div>
        <script>
            $("#animacjaTestowa2").on({
            "mouseover" : function() {
                    $(this).animate({
                    width: 300
                }, 800);
            },
            "mouseout" : function() {
                $(this).animate({
                    width: 200
                }, 800);
            }
            });
        </script>
    </article>

    <article class="container">
        <h1>Blok testowy</h1>
        <div id="animacjaTestowa3" class="test-block">Klikaj, abym urósł</div>
        <script>
            $("#animacjaTestowa3").on({
            "click" : function() {
                if (!$(this).is(":animated")) {
                    $(this).animate({
                        width: "+=" + 50,
                        height: "+=" + 10,
                        opacity: "-=" + 0.1,
                        duration: 3000
                    });
                }
            },
            });
        </script>
    </article>

    <article class="background-colors">
        <h1>Kolory Tła</h1>
        <form action="" method="POST" name="background">
            <input type="button" value="Żółty" onclick="changeBackground(`#FFF000`)">
            <input type="button" value="Czarny" onclick="changeBackground(`#000000`)">
            <input type="button" value="Biały" onclick="changeBackground(`#FFFFFF`)">
            <input type="button" value="Zielony" onclick="changeBackground(`#00FF00`)">
            <input type="button" value="Niebieski" onclick="changeBackground(`#0000FF`)">
            <input type="button" value="Pomarańczowy" onclick="changeBackground(`#FF8000`)">
            <input type="button" value="Szary" onclick="changeBackground(`#c0c0c0`)">
            <input type="button" value="Czerwony" onclick="changeBackground(`#FF0000`)">
        </form>
    </article>
    
    <article>
        <h1>Dlaczego warto hodować żółwie wodne?</h1>
        <div class="article-image floating-left">
            <img src="images/zol6.jpg" alt="" style="width: 300px">
        </div>
        <p>
            Żółwie wodne to zwierzęta o <b><i>unikalnych</i></b> cechach, które fascynują miłośników gadów.
        </p>
        <br>
        <p>
            Dzięki swojej <u>długowieczności</u> i spokojnemu trybowi życia, są <b>interesującymi</b> towarzyszami dla opiekunów.
        </p>
        <br>
        <p>
            Ich biologia, łącząca <i>życie w wodzie</i> z potrzebą lądowego wypoczynku, sprawia, że są wyjątkowymi wśród zwierząt domowych.
        </p>
        <br>
        <p>
            <u>W odpowiednich warunkach</u>, żółwie wodne mogą żyć nawet kilkadziesiąt lat, co czyni je długoterminowymi towarzyszami.
        </p>
    </article>

    <article>
        <h1>Czego potrzebują żółwie wodne w domowych warunkach?</h1>
        <div class="article-image floating-right">
            <img src="images/zol7.jpeg" alt="" style="width: 300px">
        </div>
        <p>
            Żółwie wodne wymagają <b><i>odpowiednich</i></b> warunków, aby żyć zdrowo i długo.
        </p>
        <br>
        <p>
            <u>Kluczowym elementem</u> ich hodowli jest zapewnienie im przestrzeni wodnej i lądowej w akwarium.
        </p>
        <br>
        <p>
            <b>Właściwa temperatura</b>, dostęp do <i>światła UVB</i> oraz regularna filtracja wody to niezbędne elementy, które pomagają odwzorować naturalne środowisko żółwia.
        </p>
        <br>
        <p>
            Dzięki temu zwierzęta są zdrowe, pełne energii i unikają problemów zdrowotnych, takich jak choroby skorupy.
        </p>
    </article>

    <article class="date-and-time">
        <h1>Data i Czas</h1>
        <div id="data"></div>
        <div id="zegarek"></div>
    </article>
</div>