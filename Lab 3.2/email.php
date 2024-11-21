<?php 
    $email = $_REQUEST['email'];
    
    if($email ==""){
        echo "null value. input a valid email";
    }
    else{
        echo "your email is: ".$email;
    }
?>



<html>
    <head>
        <title>Email</title>
    </head>
    <body>  
        <form action="Email.php" method="post" enctype="">
            <fieldset>
                <legend>Email</legend>
                <input type="email" name="email" value="" placeholder="sample@example.com" required/><br>
                <input type="submit" name="submit" value="Submit"/>
            </fieldset>
        </form>
</body>

</html>