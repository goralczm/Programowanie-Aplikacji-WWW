<?php
    $a = 5;
    $b = 7;

    echo 'A = '.$a.'<br>';
    echo 'B = '.$b.'<br>';

    if ($a > $b)
        echo $a.' jest większe niż '.$b;
    elseif ($a == $b)
        echo $a.' jest równe '.$b;
    else
        echo $b.' jest większe niż '.$a;

    echo '<br>';

    $c = 1;
    switch ($c)
    {
        case 1:
            echo 'Ala ma kota';
            break;
        case 2:
            echo 'Kot ma ale';
            break;
        case 3:
            echo 'Nikt nie ma nikogo';
            break;
    }
?>