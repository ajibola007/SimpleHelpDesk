<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AceTech Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="view_accounts.php">AceTech Admin</a>
            </div>
            <!-- Top Menu Items -->
             <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php
                        session_start();
                        if(isset($_SESSION["username"])){
                        echo "Welcome, ".ucfirst($_SESSION["username"]);
                          }
                          else {

                          }
                          ?> 
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="view_accounts.php"><i class="fa fa-fw fa-user"></i>   VIEW ACCOUNTS</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>   ADD NEW ACCOUNTS<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="reg_user.php">     User</a>
                            </li>
                            <li>
                                <a href="reg_technician.php">     Technician</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="assign_Tech.php"><i class="fa fa-fw fa-wrench"></i>   ASSIGN TECHNICIAN</a>
                    </li>
                    <li>
                        <a href="remove_users.php"><i class="fa fa-fw fa-wrench"></i>   REMOVE USERS</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-power-off"></i>   LOGOUT</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Add Account</small>
                        </h1>
                    </div>
                </div>

<form action="reg_technician.php" method="POST">
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Username</label>
  <div class="col-xs-3">
    <input class="form-control" type="text" value="" name="username" id="example-text-input">
  </div>
</div>

<div class="form-group row">
  <label for="example-password-input" class="col-2 col-form-label">Password</label>
  <div class="col-xs-3">
    <input class="form-control" type="password" value="" name="password" id="example-password-input">
  </div>
</div>

<div class="form-group row">
    <label for="example-user-select" class="col-2 col-form-label">Select Expertise Strength</label>
    <div class="col-xs-3">
    <select class="form-control" id="example-user-select" name="expertise">
      <option selected>Choose...</option>
      <option>HARD DRIVE</option>
      <option>FLOPPY DISK</option>
      <option>CD ROM</option>
    </select>
  </div>
</div>

<button name = "submit" class="btn btn-primary btn-sm">ADD ACCOUNT</button>
</form>
<?php
 //    include_once "../connection/dbconn.php";
   $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "helpdesk";
        try{
            $connect = new PDO("mysql:host=$servername;dbname=$database", $username , $password);
            // set the PDO error mode to exception
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['submit']))
    {
        $username = $_POST['username'];        
        $password = $_POST['password'];
        $expertise = $_POST['expertise'];

        $data = "INSERT INTO login_technician (username,password,expertise)
    VALUES ('$username','$password','$expertise')";
                 
        if($connect->exec($data)){
            echo "<script> alert('New user account created successfully') </script>";
        }
    }
    // use exec() because no results are returned
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }//here
  ?>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
















