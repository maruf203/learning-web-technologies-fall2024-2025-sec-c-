<?php
 
    print("<html> <table border='1' width='200' cellspacing='0'> <tr> ");
    print("<td>");
    $item = '*';
    for( $i = 0; $i < 3; $i++ )
    {
        for($j = 0; $j <= $i; $j++)
        {
            echo $item;
        }
        echo "\r\n<br>";
    }
     echo "</td>";
    echo "\r\n";
    print("<td>");
    $num = 1;
    for( $i = 3; $i > 0; $i-- )
    {
        for($j = 0; $j < $i; $j++)
        {
            echo $num + $j;
        }
        echo "\r\n<br>";
    }
    print("</td>");
    echo "\r\n";
 
    print("<td>");
    $char = 'A';
    for( $i = 0; $i < 3; $i++ )
    {
        for($j = 0; $j <= $i; $j++)
        {
            echo $char++;
        }
        echo "\r\n<br>";
    }
    print("</td></tr?</table><html>");
?>