<?php
    $arr =  [
            [1, 2, 3, 'A'],
            [1, 2, 'B', 'C'],
            [1, 'D', 'E', 'F'],
        ];
 
    // for( $i = 0; $i < 3; $i++ )
    // {
    //     for($j = 0; $j < 4; $j++)
    //     {
    //         echo $arr[$i][$j]." ";
    //     }
    //     echo "\r\n";
    // }
 
    // echo "\r\n";
    print("<html><table border='1' cellspacing='0' width='200'> <tr><td>");
    $k = 3;
    for( $i = 0; $i < 3; $i++ )
    {
        for($j = 0; $j < $k; $j++)
        {
            echo $arr[$i][$j];
        }
        $k--;
        echo "\r\n<br>";
    }
    echo '</td>';
    echo "\r\n";
    echo '<td>';
    $k = 3;
    for( $i = 0; $i < 3; $i++ )
    {
        for($j = 0; $j < 4; $j++)
        {
            if($j>=$k)
            {
                echo $arr[$i][$j];
            }
        }
        $k--;
        echo "\r\n<br>";
    }
    echo '</td> </tr></table></html>';
?>