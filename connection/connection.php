<?php
$host='localhost';
$username='root';
$password='';
$database='helpdesk';
$message="";

try {
    $connect=new PDO("mysql:host=$host; dbname=$database", $username,$password);
    $connect->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])){
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message="<label> All Fields Are Required </label>";
                  }
        else {
            $query="SELECT * FROM admin WHERE username=:username AND password=:password";
            $statement=$connect->prepare($query);
            $statement->execute(
                array(
                    'username'=> $_POST["username"],
                    'password'=>$_POST["password"]
                )
            );
            $count=$statement->rowCount();
            if($count>0) {
                $_SESSION["username"]=$_POST["username"];
                header("location:login_success.php");

            }
            else {
                $message="<label> Wrong Details Inserted </label>";
                
            }

        }
    }


}
catch (PDOException $error) {
    $message=$error->getMessage();
}
