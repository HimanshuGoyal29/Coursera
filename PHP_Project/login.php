<?php
    
    session_start();


    $salt = 'XyZzy12*_';
    $stored_hash= '1a52e17fa899cf40fb04cfc42e6352f1'; // this hash is created using the method: hash('md5', $salt.$pass); where password is "php123" and salt is given above4
    
    
    if ( isset($_POST['email']) && isset($_POST['pass']) ) 
    {
        if(strlen($_POST['email'])<1 || strlen($_POST['pass']) < 1)   // checking if email and password are are not empty
        {
    
            $_SESSION['error'] = "Email and Password are Required";
            header("Location: login.php");
            return;
        }
        else
        {
            $email = htmlentities($_POST['email']);
            $pass = htmlentities($_POST['pass']);

            if(strpos($email,'@') === false)
            {
                $_SESSION['error'] = "Email must have at-sign (@)";
                header("Location: login.php");
                return;
            }
            else
            {
                $hash_check = hash('md5', $salt.$pass);    // for the security reasons we create hash which consist of salt and the password entered by the user
                if($hash_check == $stored_hash && $email.trim() == "himanshu@gmail.com")
                {
                    error_log("Login Success ". $email);

                    $_SESSION['name'] = $email;
                    header("Location: index.php");
                    return;
                }
                else
                {
               
                    error_log("Login fail due to wrogn password:  " . $pass );
    
                    $_SESSION['error'] = "Incorrect password and email";
                    header("Location: login.php");
                    return;
                }
            }
        }
    }
?>

<html lang="en">
  
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <title>Himanshu Goyal</title>

        <style>
            *{
                padding: 4px;
            }
        </style>
    
    </head>
  
  
    <body>
   
    <div class="container">
        
        <div style= "margin: 2% auto ;">
            <h1 style="text-align: center;"> Please Log In </h1>

        

            <div style="width: 70%; margin: 2% auto;">
            <?php
                    if ( isset($_SESSION['error']) ) 
                    {
                        echo(  '<p style="color: red;  text-align: center;" class="col-sm-10 col-sm-offset-2">'. htmlentities($_SESSION['error']). "</p> \n"  );
                        unset($_SESSION['error']);
                    }
            ?>
            
            <form  method="POST">
                
                <div class="form-group">
                    <input class="form-control" type="text" name="email"  placeholder="User name" id="email" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="pass" id="Password"  placeholder="Password" required>    
                </div>

                <div class="form-group">
                    <button type="submit" name= "login_btn" class="btn btn-lg  btn-primary btn-block"> Log In </button>    
                </div>
        
                <a href="first_page.php"> Go Back </a>
            </form>
            
        
            <p>
                For a password hint, view source and find a password hint in the HTML comments.
            </p>
        
        </div>

    </div>
       
  </body>
</html>