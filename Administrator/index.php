<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/styles1.css">
<meta charset="UTF-8">
<title>ACETECH ADMIN PAGE</title>
</head>

<body>
<header>
	<div class="h">
	<br>
	<br>
	<br>
		<hr class="style15"></hr>
	</div>
</header>
<div class="logo">
    
</div>

<div class="login-block-tech">
<img class="profile-img" src="img/002-man.png" alt="">
    <h1>ADMIN LOGIN</h1>
    <form method="post">

        <input type="text" name="username" placeholder="Username" id="username" />
        <input type="password" name="password" placeholder="Password" id="password" />

        <button name="login">Login</button>

    </form>
<?php
include_once "../connection/dbconn.php";

try {
  $connect=new PDO("mysql:host=$host; dbname=$database", $username,$password);
  $connect->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST["login"])){
    if (empty($_POST["username"]) || empty($_POST["password"])) {
      $message="<center><font color='red'><b><label>ALL FIELDS ARE REQUIRED </label></b></font> </center>";
    }
    else {
      $query="SELECT * FROM login_admin WHERE username=:username AND password=:password";
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
        header("location:view_accounts.php");

      }
      else {
        $message="<center><font color='red'><b><label>Hey, Dude!!! YOU ARE NOT AN ADMIN </label></b></font> </center>";

      }

    }
  }


}
catch (PDOException $error) {
  $message=$error->getMessage();
}
?>
    <br></br>
 <hr class="style14"></hr>

</div>

</body>

</html>