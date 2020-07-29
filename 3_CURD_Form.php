<?php

    if(isset($_POST['insert_button'])){
        echo "inside post";

        $button_value = $_POST['insert_button'];
        echo $button_value; 
        
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";

        
        // using prepared statement
        $insert_query = "INSERT INTO `coursera_pdo`.`users`(`id`, `username`, `email`, `password`) VALUES (:id,:uname,:email,:pass)";
 
        $stmt = $db->prepare($insert_query);
        $stmt->execute(array(
                            ':id' => $_POST['id'],
                            ':uname' => $_POST['username'],
                            ':email' => $_POST['email'],
                            ':pass' => $_POST['password']
                        ));
         
        if ( $stmt->rowCount() ) 
        {
            echo "<br> <br>  Record inserted successfully: 1 Row Affected";
        } 
        else 
        {  
            echo "<br> <br> Insertion failed";
        }
        
    }


    else if(isset($_POST['update_button'])){
        echo "inside post";

        $button_value = $_POST['update_button'];
        echo $button_value;  

        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";


         // using prepared statement
         $update_query = "UPDATE `users` SET `id`=:id,`username`=:uname,`email`=:email,`password`=:pass WHERE `id`=:id";
       

         $stmt = $db->prepare($update_query);
         $stmt->execute(array(
                             ':id' => $_POST['id'],
                             ':uname' => $_POST['username'],
                             ':email' => $_POST['email'],
                             ':pass' => $_POST['password'],
                             ':id' => $_POST['id']
                         ));
          
         if ( $stmt->rowCount() ) 
         {
             echo "<br> <br>  Record updated successfully: 1 Row Affected";
         } 
         else 
         {  
             echo "<br> <br> Updation failed";
         }
 
    }



    else if(isset($_POST['delete_btn'])){
        echo "inside post";
        $button_value = $_POST['delete_btn'];
        echo $button_value;

        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";


        // using prepared statement
        $delete_query = "DELETE FROM `users` WHERE id=:id";


        $stmt = $db->prepare($delete_query);
        $stmt->execute( array( ':id' => $_POST['id'] ));
        
        if ( $stmt->rowCount() ) 
        {
            echo "<br> <br>  Record deleted successfully: 1 Row Affected";
        } 
        else 
        {  
            echo "<br> <br> Cannot delete a record with given id";
        }
          
    }

    
    else if(isset($_POST['show_button'])){
        echo "inside post";
        $button_value = $_POST['show_button'];
        echo $button_value;
       
        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";
        
        
        $query = $db->query("select * from users");  // write your query
  
        echo "<br> <br> <table class='table'>";
        echo "<thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>  
                </tr>
             </thead> <tbody>";

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>" . ($row['id']) . "</td>";
            echo "<td>" . ($row['username']) . "</td>";
            echo "<td>" . ($row['email']) . "</td>";
            echo "<td>" . ($row['password']) . "</td>";
    
           
            echo ' 
                    <td>
                        <form method="POST"> 
                            <input type= "hidden" name="id" value=" ' . ($row['id']) . '">
                            <button type="submit" name="delete_btn" class="btn btn-danger"> 
                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                            </button> 
                        </form>
                    </td> </tr>';
        }

        echo "</tbody> </table>";

    }


    
    else if(isset($_POST['login_btn'])){
        echo "inside post";
        $button_value = $_POST['login_btn'];
        echo $button_value;

        $username = "root";
        $password = ""; 

        $db = new PDO('mysql:host=localhost;dbname=Coursera_PDO', $username , $password);
        echo "Connected Successfully";

        
/*      // on using mysql it will corrupt our database as if the user enters:  p' OR '1' = '1  in the password field then it will always return true
        // hence the hacker can hack anyones account

        $uname = $_POST['username'];
        $password = $_POST['password'];
        
        

        $login_query = $db->query("select id from users where 	username= '$uname' AND 	password= '$password' ");
*/

        // To cure the above problem we use prepared statements

        $sql = "SELECT id FROM users  WHERE username = :um AND password = :pw";

        echo "<p>$sql</p>\n";
       
        $stmt = $db->prepare($sql);
        $stmt->execute(array(
                            ':um' => $_POST['username'], 
                            ':pw' => $_POST['password']
                        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ( $row === FALSE ) {
            echo "<h1>Login incorrect.</h1>\n";
         } else { 
            echo "<h1>Login success.</h1>\n";
         }
        
    }

    

?>


<html>
    
    <head>
        <title> CURD Operations </title>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    

    <body>
        
        <h2 id="heading_2">  Enter your credentials  </h2>
        
        <div>

            <form method="POST">
                <input id="id_1"  name= "id" placeholder= "id" />
        
                <input id="usename_1" name= "username" placeholder= "Username" />

                <input id="email_1" name= "email" placeholder= "email" />

                <input id="password_1" name= "password" placeholder= "Password"  type="password" />

                <button type="submit" name="insert_button"  value="insert" class="btn btn-outline-primary"> insert record </button>
            </form>
    
        </div>

        
    <div class="dropdown-divider"></div>

        <div>
    
            <form method="POST">
                <input id="id_2" name= "id" placeholder= "id" />
        
                <input id="usename_2" name= "username"  placeholder= "Username" />

                <input id="email_2" name= "email"  placeholder= "email" />

                <input id="password_2"  name= "password"  placeholder= "Password"  type="password" />

                <button type="submit" name="update_button" value="update"  class="btn btn-outline-success"> update record </button>
            </form>
        </div>


    <div class="dropdown-divider"></div>

        <div>
    
            <form method="POST">
                <input id="id_3" name= "id" placeholder= "id" />
        
                <button type="submit" name= "delete_btn" value="delete"  class="btn btn-outline-danger"> delete record </button>
            </form>
        </div>


    <div class="dropdown-divider"></div>    

        <div>
        
            <form method="POST">
                <input id="id_4" name= "username" placeholder= "Username" />
        
                <input id="password" name= "password" placeholder= "password" />
        
                <button type="submit" name= "login_btn" value="login"  class="btn btn-outline-success"> Log In </button>
            </form>
        </div>
 

    <div class="dropdown-divider"></div>
        
        <div>
            <form method="POST"> 
                <button type="submit" name= "show_button" value="show"  class="btn btn-outline-info"> Show all record </button>
            </form>
        </div>

    </body>

 </html>