<?php

    /*
        we start the session using the keyword: session_start().
        Then this function will look if any session is already present or not:
                        if session not present{
                                            It will store a cookie on the client machine (C:\xampp\tmp)
                                            Cookie_Name- PHPSESSID
                                            Content- (27-32 character long SessionID) 
                                       
                                            Moreover, it also generates a file on the server:
                                            Name- SESS_SessionID
                                            Content- Session_Variable
                                        }
                        if session is present{
                                            It matches PHPSESSID Cokkie's SessionID with the server file and if the both matches then we can access all the session variables
                                        }


    */
    session_start();
    
    if(!isset($_SESSION['username']) || !isset($_SESSION['password']) )
    {
        // set session variable;
        $_SESSION['username'] = "Himanshu_Goyal";
        $_SESSION['password'] = "123456";
    }
    else
    {
        //Access Variables
        echo "Your username is: <b>" . $_SESSION['username'] . "</b> and password is: <b>" . $_SESSION['password'] ."</b>"; 
    }
    
    /*
        unset($_SESSION['username']);  // use to unset a particular session variable

        session_unset() is use to unset all the session variables

        session_destroy(); it destroy all of the data associated with the current session. To use the session variables again session_start has to be called again and assign the variable again.

    */

?>