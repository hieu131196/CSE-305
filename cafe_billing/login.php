<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
// }
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	   /* background: #007bff;*/

	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}
	.bg-dark{
		/*opacity: 0.25;*/
		
			}
	body{
		background-image: url('../cafe_billing/assets/img/bann.jpg');
		background-repeat: no-repeat;
  		background-attachment: fixed;
		background-size: 100% 100%;
	}
	.row {
		
	}
	.justify-content-center{
		height: 290px;
	}
	.btn-sm{
		padding: 15px;
		border: 10px;

	}
	.pull-right{
		padding-top: 20px;
		margin-bottom: 0px;
	}
	/*.card-body{
		padding-bottom: : 0px;
	}*/
	.card {
		background: rgba(255, 255, 255, 0.1);
    box-shadow: 0 11px 20px 0 rgb(0 0 0 / 50%);
}
	.control-label{
		font-size: 15px;
		color: white;
		font-weight: 900;
	}
	
	.pull-right{
		padding-top: 0px;
	}

	b{
		text-shadow: 4px 4px 3px #000;
		font-family: 'Josefin Slab', serif;
	}
	.form-control{
		background: rgba(0, 0, 0, 0.16);
		box-shadow: 0 6px 12px 0 rgb(0 0 0 / 40%);
		border: 1px solid #00c6d7;
	}
	
	}
</style>

<body class="bg-dark"  >
	<!--  -->
	

  <main id="main" >
  	
  		<div class="align-self-center w-100">
		<h3 class=" text-white text-center "><b style=""><?php echo $_SESSION['system']['name'] ?></b></h3>
		<!-- <div class="wthree-form text-center">
							<h2><?php echo $_SESSION['system']['name'] ?></h2> -->
  		<div id="login-center" class=" row justify-content-center">
  			<div class="card col-md-4">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" placeholder="Username" class="form-control">

  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" placeholder="Password" class="form-control">
  						</div>
  							<input type="checkbox" class="checkbox">
							<span style="color: white;">Remember Me</span>
						

  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  						
  						<div class="checkbox" style="text-align: right;">
  					
                             <label class="pull-right ">
                                    	
                                <a  href="forgot-password.php">Forgot Password?</a>
                            </label>

                        </div>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>