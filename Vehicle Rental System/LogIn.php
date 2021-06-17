<?php
// Include config file 
require_once "config.php";
// Initialize the session 
session_start();
 // Check if the user is already logged in, if yes then redirect him to welcome page 
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
 {
    header("location: index.php");
    exit;
 }
 ?>
 <html>

<head>
    <title>Log in</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
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
		$email_err = "Please enter email.";
	}
	else if(!filter_var(trim($_POST["regEmail"]), FILTER_VALIDATE_EMAIL))
	{
		$email_err = "Please enter a valid email.";
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
    $sql = "SELECT client_id, email, password, fname, lname FROM client WHERE email = ?";
 
if($stmt = $mysqli->prepare($sql))
{
 // Bind variables to the prepared statement as parameters 
 $stmt->bind_param("s", $param_email);
 // Set parameters 
 $param_email = $email;
 // Attempt to execute the prepared statement 
if($stmt->execute())
{
 // Store result
 $stmt->store_result();
 
 // Check if email exists, if yes then verify password 
if($stmt->num_rows)
{
 // Bind result variables
 $stmt->bind_result( $clid,$email, $hashed_password,$fnamelog, $lnamelog);
 
if($stmt->fetch())
{
 
if(password_verify($password, $hashed_password))
{
        $_SESSION["clid"] = $clid;
		$_SESSION["email"] = $email;
		$_SESSION["fname"] = $fnamelog;
        $_SESSION["lname"] = $lnamelog;
        $_SESSION["loggedin"] = true;
        
        echo "<script>alert('Logged in Successfully');</script>";
		header("location: index.php");
    exit;
 }
 
else
{
 // Display an error message if password is not valid 
 $passwordErr = "The password you entered was not valid.";
 }
 }
 }
 
else
{
 // Display an error message if email doesn't exist 
 $email_err = "No account found with that email.";
}
}
 
else
{
 echo "Oops! Something went wrong. Please try again later.";
 }
 }
 // Close statement
$stmt->close(); 
} 
// Close connection 
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
                    <label for="regEmail">Registered Email</label>
                    <input type="text" class="form-control" name="regEmail" value="<?php echo $email; ?>" id="regEmail"
                        placeholder="Enter your Email ID" />
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
            <br /> <a href="#" id="anc">forgot password?</a>
            <p>Dont have an account <a href="SignUp.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>