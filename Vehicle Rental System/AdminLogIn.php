<?php
// Include config file 
require_once "config.php";
// Initialize the session 
 ?>
 <html>

<head>
    <title>Log in</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
    <style>
        body {
            /* The image used */
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(car.jpg);
            /* Set a specific height */

            height: auto;
            width: auto;
            overflow-x: auto;
            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #anc {
            text-decoration: none;
        }
        .error{
            display:block;
            color:red;
        }
    </style>
    <script>
        function showPass()
	{
		var pass = document.getElementById("password");
		if(pass.type === 'password')
		{
			pass.type = "text";

		}
		else
		{
			pass.type = "password";
		}
	}
	function onExec(){
		document.location.href='dashboard.php';
	}
	
    </script>
</head>

<body>

<?php

 $email = $password = "";
 $email_err = $passwordErr = "";

 if(isset($_POST['login']))
 { 
    if(empty(trim($_POST["regEmail"])))
	{ 
		$email_err = "Please enter Admin ID.";
	}
	else
	{ 
		$email = trim($_POST["regEmail"]);
    }
    
    if(empty(trim($_POST["password"])))
{
 $passwordErr = "Please enter your password.";
}
 
else
{
 $password = trim($_POST["password"]);
}



if(empty($email_err) && empty($passwordErr)){
    $sql = "SELECT uname, pass FROM admin";

   $rest = mysqli_query($mysqli, $sql);
   
   if(mysqli_num_rows($rest)>0)
   {
	   echo "<script>swal('Hello world!', {title: 'Log in Successful',text: 'Redirecting to dashboard..',icon: 'success',button: false,});setTimeout(function(){ onExec(); }, 5000);</script>";
   }
 
} 
$mysqli->close(); 

}

?>

    <header
			class="d-flex justify-content-between align-items-center px-5 py-4"
		>
			<p class="logo m-0">Magic Carpet</p>
			<nav class="d-flex align-items-center">
				<a href="index.php">Home</a>
				<a href="ManageBookingV2.php">Manage Booking</a>
				<a href="about.php">About</a>
				<a href="contact.php">Contact us</a>
				<a href="LogIn.php" class="btn btn-warning text-white">Login</a>
			</nav>
		</header>
    <div style="margin-bottom: 10px;"></div>
    <div class="container col-lg-4 offset-lg-4 justify-content-center"
        style='box-shadow:6px 6px 10px 10px rgba(0, 0, 0, 0.2), 6px 6px 20px 10px rgba(0, 0, 0, 0.19);padding:30px;border-radius:9px;background-color: aliceblue;'>
        <h2 style="margin-bottom: 30px;">Log in</h2>
        <form class="" method="post">
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="regEmail">Admin ID</label>
                    <input type="text" class="form-control" name="regEmail" value="<?php echo $email; ?>" id="regEmail"
                        placeholder="Enter your Admin ID" />
                        <span class="help-block error"><?php echo $email_err;?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" value="<?php echo $password; ?>" name="password" id="password"
                        placeholder="Enter Password" />
                        <span class="help-block error"><?php echo $passwordErr;?></span>
                        <input type="checkbox" onclick="showPass()"> Show Password
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>