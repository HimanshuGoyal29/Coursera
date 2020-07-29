<?php
    
    $username = "root";
    $password = ""; 

    $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
    echo "Connected Successfully";

    echo "\n <pre> \n";

    $show_query = "SELECT * FROM `users` WHERE id=:id";
    $stmt = $db->prepare($show_query);
    $stmt->execute( array( ':id' => "3"));


    if ( $stmt->rowCount() ) 
    {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<br> <br>  Record found: 1 Row Affected";
    print_r($row);
    
    } 
    else 
    {  
        echo "<br> <br> No record found with the given id";
    }
    /*  The above code does not contain any error    */
 

    


    /*  Now if the user mistakely made an error while writting the code the we will catch that error internally and show user the content we want to show him not the exact error     */
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try 
    {
        $show_query = "SELECT * FROM `users` WHERE id=:id";
        $stmt = $db->prepare($show_query);
        $stmt->execute( array( ':id_error' => "3"));   // making error

        // NOW THE CODE BELOW THIS LINE WILL NOT BE EXCUTED AS NOW THE CONTROL GOES TO CATCH BLOCK

        if ( $stmt->rowCount() ) 
        {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<br> <br>  Record found: 1 Row Affected";
        print_r($row);
        
        } 
        else 
        {  
            echo "<br> <br> No record found with the given id";
        }
   
    }
    catch (Exception $ex )
    { 
       echo("Internal error, please contact support");
        error_log("4_PDO_Exceptions.php, SQL error=".$ex->getMessage() );
        return;
    }
  
?>