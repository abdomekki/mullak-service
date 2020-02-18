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
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>اتحاد الملاك</title>
</head>
<body>

    <?php 
        
        
        if(empty($_SESSION["username"]))
        {
    ?>

        <div class="signin">

            <form action="handlogin.php" method="post">
                <h2>Log In</h2>

                <input type="text" name="username" placeholder="User Name" required/><br /><br />
                <input type="password" name="password" placeholder="Password" required /><br /><br />
                <input type="submit" value="Log In" name="login" class="login-btn"/>
                <br /><br />

                    
            </form>

        </div>

        <?php
        }else {
            header("location:home.php");
        }
        ob_end_flush(); 
    ?>


</body>
</html>