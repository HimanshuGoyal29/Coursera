<?php
    session_start();
    
    if(isset($_SESSION['username']))   //checking the user is already logged in or not
    {
        header("Location:  9_Session_Welcome.php");  // if the user is already logged in then we redirect him to welcome page  
    }
    else
    {
        if(isset($_POST['login_btn']))
        {
            $username = $_POST['uname'];
            $password = $_POST['pass'];
    
            // set session variable;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
    
            header("Location: 9_Session_Welcome.php");
        }
    }
    
?>
<html>
    
    <head>
        <title>Session_Login</title>        
    </head>
    

    <body>
        <div>
        
            <form method="POST">
                Username: <input type="text" name="uname" id="uname" required> <br><br>
                Password: <input type="password" name="pass" id="pass" required> <br><br>
               
                <button type="submit" name= "login_btn" value="login"> Login button</button>
            </form>
        </div>

    </body>

 </html>