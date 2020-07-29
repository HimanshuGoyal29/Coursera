<?php

    session_start();

  
    if(isset($_SESSION['username']))  //checking the user is already logged in or not
    {
        echo "Your username is: " . $_SESSION['username'] . " and password is " . $_SESSION['password'];
    }
    else
    {
        header("Location: 9_Session_Login.php");  // if the user is not logged in then he need to be first redirected towards login page    
    }

    if(isset($_POST['logout_btn']))
    {
        session_unset();    // unsetting all the variables
        session_destroy();  // destoying the session
        
        header("Location: 9_Session_Login.php");  // and then redirecting him to login page
    }
?>



<html>
    
    <head>
        <title>Session_Welcome</title>        
    </head>
    

    <body>
        <div>
        
            <form method="POST">
                <button type="submit" name= "logout_btn" value="logout"> Logout button</button>
            </form>
        </div>

    </body>

 </html>