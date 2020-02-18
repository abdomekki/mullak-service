<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php


        //database connection 
        class connect_db{
            private $servername;
            private $username;
            private $password;
            private $dbname;
            protected $conn;

            
            function __construct()
            {
                $this->servername="localhost";
                $this->username="root";
                $this->password="";
                $this->dbname="mullak_service";
                $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
                if ($this->conn->connect_error) {
                    die("Connection failed: " . $this->conn->connect_error);
                }
                
            }
        }



        class validuser extends connect_db{
            //check Login authority
            function valid($name,$pass){
                $sql="SELECT * FROM `users`";
                $result = $this->conn->query($sql);
                $found=false;
                
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($name==$row["username"] && $pass==$row["pass"])
                        {
                            
                            $found=true;
                            break;
                        }
                    }
                    if($found==true)
                    {
                        
                        return true;
                        
                        
                    }
                    else {
                        ?>
                        <div class="cong">
                            <form>
                                <h2 style="color: white">Email Or Password are Wrong , Please Try again!!!</h2>
                                <a href="index.php" style="text-decoration: none">Go back to login page</a>
                                <br><br>
                            </form>
            
                        </div>
                    <?php
                    header("refresh:2;url=index.php");
                    
                    }
        
                } else {
                    ?>
                    <div class="cong">
                        <form>
                            <h2 style="color: white">No Users Data!!!</h2>
                            <a href="index.php" style="text-decoration: none">Go back to login page</a>
                            <br><br>
                        </form>
        
                    </div>
                <?php
                   header("refresh:2;url=index.php");
                    
                    }
            }
        
        
        }

        class getcustomer extends connect_db{
            function getdata($name){
                $query = "SELECT * FROM `users` WHERE username='$name'";
                $result = $this->conn->query($query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       $id= $row["user_id"];
                       return $id;
                    }
                } else {
                    echo "0 results";
                }
            }
        
            function selectcustomer(){
                $query="SELECT * FROM users";
                $result = $this->conn->query($query);
                return $result;
            }

            function getnotadmin($nam)
            {
                $query="SELECT * FROM users WHERE username='$nam'";
                $result = $this->conn->query($query);
                return $result;
            }

            function getadmin($user)
            {
                $query="SELECT * FROM `users` where username='$user' and is_admin=1";
                $result = $this->conn->query($query);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       
                       return true;
                    }
                } else {
                    return false;
                }
            }
        
        }

        
        class import extends connect_db{
            function a_import($id,$desc,$amount)
            {
                if($desc=="monthly" && $id!="all")
                {
                    if($amount==200 )
                    {
                        $sql = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('$desc','$amount','$id')";
                        $this->insertdb($sql);
                    }
                    else {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">please pay 200 per month!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }

                }elseif ($desc=="emergency" && $id!="all") {
                    $sql = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('$desc','$amount','$id')";
                    $this->insertdb($sql);
                }
                elseif ($id=="all" && $desc=="emergency") {

                    $sql = "SELECT * from users";
                    $result = $this->conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $row_id=$row["user_id"];
                        $query = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('$desc','$amount','$row_id')";
                        $this->insertdb($query);
                        }

                    }                    
                    
                }
                elseif($desc=="monthly" && $id=="all")
                {
                    if($amount==200 )
                    {
                        $sql = "SELECT * from users";
                        $result = $this->conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $row_id=$row["user_id"];
                            $query = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('$desc','$amount','$row_id')";
                            $this->insertdb($query);
                            }

                        } 
                        
                    }
                    else {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">please pay 200 per month!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }

                }
                elseif ($desc=="all" && $id!="all") {
                    # code...
                    
                    if($amount>=200 && $amount>2400 )
                    {
                        $month=200;
                        $emargecy=$amount-$month;
                        $sql = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('monthly','$month','$id')";
                        $this->insertdb($sql);
                        $query="INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('emergency','$emargecy','$id')";
                        $this->insertdb($query);
                    }
                    elseif ($amount>=200 && $amount>2400 ) {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">Maximum import 2400!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }
                    else {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">please pay 200 per month!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }


                }elseif ($desc=="all" && $id=="all") {
                    # code...
                    if($amount>=200 && $amount<=2400 )
                    {
                        $month=200;
                        $emargecy=$amount-$month;
                        $sql = "SELECT * from users";
                        $result = $this->conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {

                            $row_id=$row["user_id"];
                            $query1 = "INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('monthly','$month','$row_id')";
                            $this->insertdb($query1);
                            $query2="INSERT INTO `import`(`i_desc`, `amount`, `user_id`) VALUES ('emergency','$emargecy','$row_id')";
                            $this->insertdb($query2);
                            }

                        } 

                    }
                    elseif ($amount>=200 && $amount>2400 ) {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">Maximum import 2400!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }
                    else {
                        ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">please pay 200 per month!!!</h2>
                                    <a href="import.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=import.php");
                    }

                }


                  
            }


            function e_import($id,$desc,$amount,$total)
            {
                if($amount<=$total && $amount>=0)
                {
                    $sql ="INSERT INTO `export`(`e_desc`, `e_amount`, `user_id`) VALUES ('$desc','$amount','$id')";
                    $this->insertdb($sql);
                    
                }
                else {
                    ?>
                            <div class="cong">
                                <form>
                                    <h2 style="color: white">Not Enough Balance!!!</h2>
                                    <a href="export.php" style="text-decoration: none">Go back to page</a>
                                    <br><br>
                                </form>
                
                            </div>
                        <?php
                        header("refresh:2;url=export.php");
                }
            }

            function insertdb($sql)
            {
                if ($this->conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header("location:home.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                }
            }
        }  
        
        
        class totalamount extends connect_db{
            function i_amount()
            {
                $query="SELECT SUM(amount) FROM import";
                $result = $this->conn->query($query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       $i_total= $row["SUM(amount)"];
                       return $this->e_amount($i_total);

                    }
                } else {
                    echo "0 results";
                }
                
            }

            function e_amount($i_total)
            {
                $query="SELECT SUM(e_amount) FROM export";
                $result = $this->conn->query($query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       $e_total= $row["SUM(e_amount)"];
                       $total=$i_total-$e_total;
                       if ($total>=0) {
                           # code...
                           return $total;
                           
                       }
                       else {
                           echo "result less than zero";
                       }
                    }
                } else {
                    echo "0 results";
                }
            }
        }



        class reports extends connect_db
        {
            function viewData()
            {
                $query ="SELECT `users`.*, SUM(amount),import.i_desc FROM `users` LEFT JOIN `import` ON `import`.`user_id` = `users`.`user_id` GROUP BY users.home_no, import.i_desc HAVING  import.i_desc='monthly'";
                $result = $this->conn->query($query);
                return $result;

            }

            function expenses($from,$to)
            {
                $query ="SELECT e_desc,sum(e_amount) FROM `export`where create_at BETWEEN '$from' and '$to' GROUP BY e_desc";
                $result = $this->conn->query($query);
                return $result;
            }

            function expensesusers($from,$to)
            {
                $query ="SELECT users.username,export.e_desc,export.e_amount FROM users JOIN export ON users.user_id =export.user_id WHERE export.create_at BETWEEN '$from' AND '$to'";
                $result = $this->conn->query($query);
                return $result;
            }

            


            
        }


        class views extends connect_db
        {
            function all()
            {
                $query="SELECT users.*,import.*,sum(import.amount)FROM users LEFT JOIN import on users.user_id = import.user_id GROUP BY users.home_no";
                $result = $this->conn->query($query);
                return $result;
            }
        }
    ?>
    



</body>
</html>