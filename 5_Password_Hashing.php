<?php

    /*
        To make your system more secure we use hashcodes.
        A hashcode is made of two things salt(it is usaaly 8 bit long or more creator define code it can contain any sequence of charac.) and pepper(provided password)  
    
        if we want our database password to be "php123" then we will create the hash using the salt and store it in a variable: Formula: hash('md5' , $salt.$provided_password);

        then whenever the user enters the password on the login page, we will create a new hash of that password and check it with stored hash value if the value matches then we'll give the access of database to the user
    */

    $salt = 'XyZzy12*_';
    $stored_hash= '1a52e17fa899cf40fb04cfc42e6352f1';   // this hash is created using the formula:  $check = hash('md5' , $salt.$pass); where password is "php123"

    $pass1 = "hp1234";
    $pass2 = "php123";

    $check1 = hash('md5' , $salt.$pass1);
    $check2 = hash('md5' , $salt.$pass2);

    echo $check1 . "<br>";
    echo $check2 . "<br>";


    if(isset($_POST['login_btn']) && isset($_POST['password']))
    {
        $check_hash = hash('md5' , $salt.$_POST['password']);
 
        if($check_hash == $stored_hash)
        {
            header("Location: 3_CURD_Form.php");
        }
        else
        {
            echo "wrong password try again";
        }   

      
    }


?>


<html>
    
    <head>
        <title> Password hashing </title>             
    </head>
    

    <body>
        
        <h2 id="heading_2">  Enter your password  </h2>
    
        <div>
        
            <form method="POST">
                
                <input id="password" name= "password" placeholder= "Password"  type="password" />

                <button type="submit" name= "login_btn" value="login"> Log In </button>
            </form>
        </div>

    </body>

 </html>