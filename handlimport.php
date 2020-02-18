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
    <title>Document</title>
</head>
<body>
    

    <?php

        
        $name=$_POST["user"];
        $desc=$_POST["desc"];
        $amount=$_POST["amount"];
        include "connection.php";
        $newimport= new import();
        $newimport->a_import($name,$desc,$amount);

      
        
        ob_end_flush();
    ?>

</body>
</html>