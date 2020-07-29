<?php


    $case = "update";

    switch ($case) {
        case "insert":  insert(); select(); break;

        case "update":  update(); select(); break;
        
        case "delete":  delete(); select(); break;
        
        default:   echo "Sorry, no such case found!";
    }


    function insert()
    {
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";

        
        $insert_query = $db->query("INSERT INTO `coursera_pdo`.`users`(`id`, `username`, `email`, `password`) VALUES ('4','Himani_552','himani@gmail.com','675')");
   
        if($insert_query->rowCount() )
        {
            echo "<br> <br> Record inserted successfully:" . $insert_query->rowCount() . ' Rows Affected';
        }
        else
        {
            echo "<br> <br> Insertion failed";
        }        
    }

    function update()
    {
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";

        
        $update_query = $db->query("UPDATE `users` SET `id`='6',`username`='Hardik Sanghi',`email`='hardik1020@gmail.com',`password`='564' WHERE `id`='6'");
        
        if($update_query->rowCount() )
        {
            echo "<br> <br> Record updated successfully:" . $update_query->rowCount() . ' Rows Affected';
        }
        else
        {
            echo "<br> <br> The updated record is an alias of old record";
        }
    }


    function delete()
    {
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";

        
        $delete_query = $db->query("DELETE FROM `users` WHERE id='5' ");
        if($delete_query->rowCount() )
        {
            echo  "<br> <br> Record deleted successfully: " .$delete_query->rowCount() . ' Rows Affected';
        }
        else
        {
            echo "<br> <br> Cannot delete a record with given id";
        }
    }

    function select()
    {
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";
        
        
        $query = $db->query("select * from users");  // write your query
       
        echo "<br> <br> <table border='1'>";
        echo "<tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
              </tr>";

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>" . ($row['id']) . "</td>";
            echo "<td>" . ($row['username']) . "</td>";
            echo "<td>" . ($row['email']) . "</td>";
            echo "<td>" . ($row['password']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    }
  

   
?>