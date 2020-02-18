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
                <form  action="handlexport.php" method="post">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Descripe of export</label>
                        <select class="custom-select" id="validationTooltip05" name="desc" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="Salary of the guard">Salary of the guard</option>
                            <option value="Electricity" >Electricity</option>
                            <option value="Junk">Junk</option>
                            <option value="Water motor">Water motor</option>
                            <option value="Maintenance of elevators">Maintenance of elevators</option>
                            <option value="Wash the water tank">Wash the water tank</option>
                            <option value="Cleanliness of the ladder">Cleanliness of the ladder</option>
                            
                                    
                        </select>
                    </div>      
                           
                    
                </div>
                
                <div class="form-row">                
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">amount</label>
                        <input type="number" class="form-control" id="validationTooltip03" name="amount" required>
                    </div>
                </div>                

                <button class="btn btn-primary" type="submit">Submit Export</button>
                </form>
            </div>


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