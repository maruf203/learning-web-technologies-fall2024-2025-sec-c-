<?php
    $amount = 1500.00;
    $rate = 0.15;
 
    $VAT = $amount * $rate;
    $finalPrice = $amount + $VAT;    
    print ("VAT: ".$VAT." taka\r\n<br>");
    print ("Total Price: ".$finalPrice." taka<br>");
?>
 