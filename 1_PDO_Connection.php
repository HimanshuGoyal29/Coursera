<?php

   
    $username = "root";
    $password = ""; 

    $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);

    echo "Connected Successfully";

    $query = $db->query("select * from users");  // write your query
  
    echo "<pre>";    

    while($row = $query->fetch()){
        print_r($row);     // fetch the data from it
    }

    

    // Fetch Types

    echo "<br> <br> - FETCH_BOTH  it will same as fetch <br>";
    
    $query = $db->query("select * from users");  
    $row = $query->fetch(PDO::FETCH_BOTH);
    print_r($row);
    

    echo "<br> <br> - FETCH_NUM  it will reference througn column number <br>";
    
    $query = $db->query("select * from users");  
    $row = $query->fetch(PDO::FETCH_NUM);
    print_r($row);
    

    echo "<br> <br> - FETCH_ASSOC  it will reference the object through column name <br>";
    
    $query = $db->query("select * from users");  
    $row = $query->fetch(PDO::FETCH_ASSOC);
    print_r($row);
    


    echo "<br> <br> - FETCH_OBJ  it is used to access a particular column in the table <br>";
    
    $query = $db->query("select * from users");  
    
    while($row = $query->fetch(PDO::FETCH_OBJ)){

        echo '<br> username: ' .  $row->username . ', password: ' . $row->password ;
    }
?>