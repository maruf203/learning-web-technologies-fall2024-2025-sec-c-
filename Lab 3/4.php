<?php
    $a = 41;
    $b = 32;
    $c = 35;
 
    if($a > $b)
    {
        if($a > $c)
        {
            echo $a. " is the largest<br>";
        }
        else
        {
            echo $b. " is the largest<br>";
        }
    }
    else
    {
        if($b > $c)
        {
            echo $b. " is the largest<br>";
        }
        else
        {
            echo $c. " is the largest<br>";
        }
    }
?>