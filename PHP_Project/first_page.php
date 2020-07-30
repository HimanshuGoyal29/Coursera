<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      
        <title>Himanshu Goyal</title>

        <style>
            *{
                padding: 4px;
            }
        </style>
        
        <script type="text/javascript">

            function error_message()
            {
                alert("You need to log in first, only then you can access add.php module");
            
                return false;
            }    

        </script>
    </head>
  
  <body>
    <div class= "container">
        
        <!-- Header -->
        <div class= "container">
            <header class="jumbotron">
                <h1>Welcome to the Autos Database</h1>
        
                <h3> Find New Roads ...... </h3>
                
                <p>
                    <a  class="btn btn-primary"href="login.php"> Please log in </a> 
                </p>
            </header>
        </div>


        <!-- Image Grid -->
        <div class="container">

            <p>
                Attempt to go to 
                <a  href="add.php" onclick=" return error_message()">add.php</a> 
                without logging in - it should fail with an error message. 
            </p>

            <p>
                <a href="https://www.wa4e.com/assn/autosdb/" > Specification for this Application </a>
            </p>
            

        </div>

    </div> 

  </body>
</html>