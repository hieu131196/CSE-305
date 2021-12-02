<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['ccmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>CCMS Admin Login</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>
<style >
    body{
        background-image: url('images/bbb.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 900px;
    }
    .login-form{
        background: rgba(0, 0, 0, 0.3);
         box-shadow: 0 6px 12px 0 rgb(0 0 0 / 0%);
}
    .form-control{
        background: rgba(0, 0, 0, 0.16);
        box-shadow: 0 6px 12px 0 rgb(0 0 0 / 40%);
        border: 1px solid #00c6d7;
    }
    h3{
        text-shadow: 4px 4px 3px #000;
         font-family: 'Josefin Slab', serif;
         font-size: 38px;
    }

    }
    
</style>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color: white">Internet Cafe Management System </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-group">
                            <label style="color: #fff;">User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" required="true" name="username">
                        </div>
                            <div class="form-group">
                                <label style="color: #fff;">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                        </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="checkbox">
                                     <span style="color: white;">Remember Me</span>
                                    <label class="pull-right">
                                     <a href="forgot-password.php" >Forgot Password?</a>
                                  </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Sign in</button>
                                
                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
