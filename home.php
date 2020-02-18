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
            $newbalance=new totalamount();
            $balance=$newbalance->i_amount();
            

            $all=new views();
            $data=$all->all();

     ?>
        <section id="jump" class="mt-5">
            <div class="container">

                <div class="jumbotron">
                    <h1 class="display-4">Hello, Mullak</h1>
                    <p class="lead">This is a simple application for show and managae our Home services ,calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>click button to show our Balance or scroll down to show Table content all our data Receivables , you can use other service to import or export Receivables and Expenses and get reports .</p>
                    <button type="button" class="btn btn-lg btn-primary popover-dismiss" data-toggle="popover" title="Balance" data-content="<?php echo $balance;?>  L.E">Click to Show Balance</button>
                </div>
                
            </div>
            
        </section>
                
                        <section id="table" class="mt-5">
                            <div class="container">
                            
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Home Number</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Total Receivables</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($data->num_rows > 0) {
                                                // output data of each row
                                                while($row = $data->fetch_assoc()) {
                                                    echo "<tr>
                                                    <td>". $row["home_no"]."</td>
                                                    <td>". $row["username"]."</td>
                                                    <td>". $row["sum(import.amount)"]."</td>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }

                                        ?>
                                    </tbody>
                                </table>
                                </div>

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
    <script src="js/mine.js"></script>
</body>
</html>