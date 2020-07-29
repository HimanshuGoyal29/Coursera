<?php
    // setcookie() is use to create a new cookie. Parameters can be: setcookie(name,value,expire,path,domain,secure,httponly)  where nme and value are compulsory parameter

    if(!isset($_COOKIE['username']))
    {
        echo "username cookies is not set yet";
        setcookie("username", "himanshu@29");
    }
    else
    {
        echo "value of the usename cookie is: " . $_COOKIE['username'];
    }

    /*
        Expire cookies can be of two types- Session cookie and persistent cookie
    
        Session cookie- it get destroyed soon soon as browser session over (we close the browser)  
        Persistent cookie- here we fix the time and these cookie will survive for that specified time even if the web browser is closed 
            
        we need to manually destroy the persistent cookies if we want them to get destroyed, before the time they get destroyed

    */
    if(!isset($_COOKIE['password']))
    {
        echo "password cookies is not set yet";
        setcookie("password" , "123" , time() + 60*60*24*3);  // this cookie will last for 3 days from today
    }
    else
    {
        echo "<br> value of the password cookie is: " . $_COOKIE['password'];
    }
   


    // To delete the cookies give the negative time parameter
    if(isset($_POST['delete_uname_cookie']))
    {
        if(isset($_COOKIE['username']))
        {
            setcookie("username", "himanshu@29", time()-3600);  // give the negative time parameter to delete the cookie
            echo "<br><br> username cookie deleted successfully";
        }
        else
        {
            echo "<br><br> username cookie does not exist";
        }    
    }

    
    if(isset($_POST['delete_pass_cookie']))
    {
        if(isset($_COOKIE['password']))
        {
            setcookie("password", "123", time()-3600);  // give the negative time parameter to delete the cookie
            echo "<br><br>  password cookie deleted successfully";
        }
        else
        {
            echo "<br><br> password cookie does not exist";
        }    
    }

?>




<html>
    
    <head>
        <title>Cookies</title>        
    </head>
    

    <body>
        <div>
        
            <form method="POST">
                
                <button type="submit" name= "delete_uname_cookie" value="delete_uname"> Delete username cookie</button>
    
                <button type="submit" name= "delete_pass_cookie" value="delete_pass"> Delete password cookie</button>
            </form>
        </div>

    </body>

 </html>