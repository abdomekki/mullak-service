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

        ?>
            <div class="container">
                <form  action="" method="post">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">From</label>
                        <input class="form-control" type="date" id="example-datetime-local-input" name="date-from">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">To</label>
                        <input class="form-control" type="date" id="example-datetime-local-input" name="date-to">
                    </div>      
                           
                    
                </div>               

                <button class="btn btn-primary" type="submit" name="report">Submit report</button>
                </form>
            </div>

        <?php

                if(isset($_POST["report"]))
                {
                    $from=$_POST["date-from"];
                    $to=$_POST["date-to"];

                    $date=new reports();
                    $view=$date->expensesusers($from,$to);
                    ?>
                        
                        <section id="table" class="mt-5">
                            <div class="container">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Expenses Description</th>
                                        <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($view->num_rows > 0) {
                                                // output data of each row
                                                while($row = $view->fetch_assoc()) {
                                                    echo "<tr>
                                                    <td>". $row["username"]."</td>
                                                    <td>". $row["e_desc"]."</td>
                                                    <td>". $row["e_amount"]."</td>";
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


                }



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