<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

        
    <?php
            
            include "connection.php";
            if(isset($_SESSION["username"]))
            {
               
            include "navbar.php";
                
            $viewdata=new reports();
            $view=$viewdata->viewData();



                    ?>
                        
                        <section id="table" class="mt-5">
                            <div class="container">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Home Number</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Outstanding balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($view->num_rows > 0) {
                                                // output data of each row
                                                while($row = $view->fetch_assoc()) {
                                                    $total=2400-$row["SUM(amount)"];
                                                    echo "<tr>
                                                    <td>". $row["home_no"]."</td>
                                                    <td>". $row["username"]."</td>
                                                    <td>". $total."</td>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>


                    <?php

                    
                

            }else {
                header("location:index.php");
            }
            ob_end_flush();
        ?>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>