<?php
    $nr_indeksu = '169241';
    $nr_grupy = '1';

    echo 'Maciej Góralczyk '.$nr_indeksu.' grupa ISI '.$nr_grupy.' <br><br>';

    echo 'Metoda include() pozwala importować inne pliki php<br>';
    include('czas.php');

    echo '<br><br>';
    
    echo 'Metoda require_once() również importuje pliki php, przy czym nie zaimportuje pliku, który już wcześniej został dodany';
    require_once('czas.php');

    echo '<br><br>';

    echo 'Warunek if pozwala wykonać blok kodu po wcześniejszym spełnieniu jego warunku.<br>Gdy warunek nie jest spełniony, interpeter przejdzie do kolejnego bloku elseif, jeśli taki istnieje i po spełnieniu jego warunku wykona jego blok kodu.<br>Powtarzać będzie tą czynność dopóki nie wykończy wszystkich warunków.<br>Gdy żaden z nich nie zostanie spełniony, blok else się wykona.';
    echo '<br>';
    include('if_else_switch.php');

    echo '<br><br>';
    
    echo 'Pętla for i while pozwala wykonywać powtarzalne czynności nie powielając kodu.<br>Dzięki nim możemy na przykład \'iterować\' się po kolekcjach, czyli po nich przechodzić.<br>Pętla while będzie wykonywać się dopóki jej warunek jest spełniony, natomiast pętla for wykonuje się zazwyczaj po jakimś zakresie.<br><br>';
    include('petle.php');

    echo '<br><br>';
    echo 'Zmienne $_GET, $_POST i $_SESSION to zarezerwowane zmienne, które są populowane w odpowiednich warunkach.<br>$_GET zwraca listę zmiennych, które zostały wysłane formularzem metodą GET, lub sztucznie stworzone dodając je w adresie strony.<br>$_POST również przyjmuje wartości po wysłaniu ich formularzem metodą POST, dane są bezpieczniejsze, bo nie są widoczne gołym okiem.<br>$_SESSION zwraca wartości sesji, która musi być najpierw rozpoczęta metodą start_session()<br><br>';

    include('zmienne.php');
?>