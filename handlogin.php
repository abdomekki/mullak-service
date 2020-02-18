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
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>اتحاد الملاك</title>
</head>
<body>
    
    <?php
        
        include "connection.php";
        $name=$_POST["username"];
        $pass=$_POST["password"];
        $emp=new validuser();
        $result=$emp->valid($name,$pass);
        if($result== true)
        {
            
            $_SESSION["username"]=$name;
            header("location:home.php");
        }

        ob_end_flush(); 
    ?>

    
</body>
</html>