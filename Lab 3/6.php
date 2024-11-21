<?php
    $arr = array('test', 'ok', 12, 4.05);
    $search = 12;
    $flag = false;
 
    for( $i = 0; $i < 4; $i++ )
    {
        if($arr[$i]==$search)
        {
            $flag = true;
        }
    }
 
    if( $flag )
    {
        echo 'element found<br>';
    }
    else
    {
        echo 'element not found<br>';
    }
?>