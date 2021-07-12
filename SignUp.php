<html>

<head>
    <title>Sign Up</title>
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
        .error{
            color:red;
        }
    </style>
    <script language="javascript">

function onExec()
	{
		document.location.href='LogIn.php';
	}
        function goBack() {
            window.history.go(-1);
        }
        function setDateT() {
            var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
            document.getElementById('validity').setAttribute("min", minDate);
        }


        function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
        var pwd = document.getElementById("pwd");
        if (pwd.value.length == 0) {
			 strength.innerHTML = '';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = '<hr style="margin-top:-6px;background-color:#ff0000;border-radius:7px;width:33%;height:10px;">';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<hr style="margin-top:-6px;background-color:#00ff19;border-radius:7px;width:100%;height:10px;">';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<hr style="margin-top:-6px;background-color:#FFA500;border-radius:7px;width:66%;height:10px;">';
        } else {
            strength.innerHTML = '<hr style="margin-top:-6px;background-color:#ff0000;border-radius:7px;width:33%;height:10px;">';
        }
    }
	
	
    function showPass()
	{
		var pass = document.getElementById("pwd");
        var repass = document.getElementById("repwd");
		if(pass.type === 'password')
		{
			pass.type = "text";

		}
		else
		{
			pass.type = "password";
		}

        if(repass.type === 'password')
		{
			repass.type = "text";

		}
		else
		{
			repass.type = "password";
		}
	}

    function checkPassword(){
        var pass = document.getElementById("pwd").value;
        var repass = document.getElementById("repwd");
        if(pass === repass.value && pass != ""){
            alert("match")
        }
        else{
            // alert("Password is not matching");
        }
    }
    $(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
    </script>
</head>

<body onLoad="setDateT()">
<?php 

// Include config file
require_once "config.php";

$fnmErr = $lnmErr=  $genderErr =  $nationalityErr= $phnoErr = $emailErr = $dlnoErr= $validityErr = $passwordErr=$repasswordErr="";
$fname = $lname= $gender=  $nationality = $phno = $email = $dlno = $validity = $password =$repassword ="";

if (isset($_POST['signupC'])){
    if (!empty(test_input($_POST["fname"]))) {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fnmErr = "Only letters and white space allowed";
        }
        }else{
             $fnmErr = "Please enter First Name";
        }

        if (!empty(test_input($_POST["lname"]))) {
            $lname = test_input($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $lnmErr = "Only letters and white space allowed";
            }
            }else{
                 $lnmErr = "Please enter Last Name";
            }

        if ($_POST["gender"]) {
                $gender = test_input($_POST["gender"]);
                if( $gender == 'NOT')
                    $genderErr = "Please select gender";
            }
            else {
                 $genderErr = "Please select gender";
            }

            if (!empty(test_input($_POST["nationality"]))) {
                $nationality = test_input($_POST["nationality"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$nationality)) {
                $nationalityErr = "Only letters and white space allowed";
                }
                }else{
                     $nationalityErr = "Please enter nationality";
                }

                if (!empty(test_input($_POST["mobileNo"]))) {
                    $phno = test_input($_POST["mobileNo"]);
                if (!preg_match("/^([0-9]{10})*$/",$phno)) {
                $phnoErr = "Only 10 digit number allowed";
                 }
                 else{
                   $sql = "SELECT phone FROM client WHERE phone = '$phno'";
                
               
               $rest = mysqli_query($mysqli, $sql);
               
               if(mysqli_num_rows($rest)>0)
               {
                   $phnoErr="An account already exists with this number";
               }
               }
                }
                else {
                     $phnoErr = "Please enter phone number";
                }

                if (empty($_POST["emailInput"])) {
                    $emailErr = "Email is required";
                    }
                   else if(!empty($_POST["emailInput"])) {
                    $email = test_input($_POST["emailInput"]);
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                    $emailErr = "Invalid email format";
                    }
                    else{
                        
                       $sql = "SELECT email FROM client WHERE email = '$email'";
                    
                   $res = mysqli_query($mysqli, $sql);
                   
                   if(mysqli_num_rows($res)>0)
                   {
                       $emailErr="An account already exists with this email.";
                   }
                    }

                    if (!empty(test_input($_POST["DLNo"]))) {
                        $dlno = test_input($_POST["DLNo"]);
                       $sql = "SELECT dlno FROM client WHERE dlno = '$dlno'";

                   $rest = mysqli_query($mysqli, $sql);
                   
                   if(mysqli_num_rows($rest)>0)
                   {
                       $dlnoErr="An account already exists with this dl number";
                   }
                    }
                    else {
                         $dlnoErr = "Please enter dl number";
                    }

                    if (!empty(test_input($_POST["validity"]))) {
                        $validity = test_input($_POST["validity"]);
                        }else{
                             $validityErr = "Please select validity date";
                        }

                        if (!empty(test_input($_POST["password"]))) {
                            $password = test_input($_POST["password"]);
                        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/",$password)) {
                        $passwordErr = "Minimum 8 charcters<br>At least one uppercase letter<br>One lowercase letter<br>One number<br>One special character";
                         }
                        }
                        else {
                             $passwordErr = "Please enter password";
                        }
                        
                       //validate Re-Password 
                        if (!empty(test_input($_POST["repassword"]))) {
                            $repassword = test_input($_POST["repassword"]);
                        if ($repassword != $password) {
                        $repasswordErr = "password mismatch";
                         }
                        }
                        else {
                             $repasswordErr = "Please re-type password";
                        }

        if($fnmErr == "" && $lnmErr== "" &&  $genderErr == "" &&  $nationalityErr== "" && $phnoErr == "" && $emailErr == "" && $dlnoErr== "" && $validityErr == "" && $passwordErr== "" && $repasswordErr == ""){
          $pwd= password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `client` ( `fname`, `lname`, `gender`, `nationality`, `phone`, `email`, `dlno`, `validity`, `password`) VALUES ( '$fname', '$lname', '$gender', '$nationality', '$phno', '$email', '$dlno', '$validity', '$pwd')";
            $rest = mysqli_query($mysqli, $sql);
                   
                   if($rest == true)
                   {
                    echo "<script>swal('Hello world!', {title: 'Registration Successful',text: 'Redirecting to log in page',icon: 'success',button: false,});setTimeout(function(){ onExec(); }, 5000);</script>";
                   }
        }

}else{

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!--Body-->
    <header class="d-flex justify-content-between align-items-center px-5 py-4">
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
    <div class="container col-lg-6 offset-lg-3 justify-content-center" style='box-shadow:6px 6px 10px 10px rgba(0, 0, 0, 0.2), 6px 6px 20px 10px rgba(0, 0, 0, 0.19);padding:30px;border-radius:9px;background-color: aliceblue;'>
        <h2 style="margin-bottom: 30px;">Sign Up</h2>
        <form name="signup"  enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname?>" placeholder="Enter First Name" />
                        <span class="help-block error" style="display:block;">*<?php echo $fnmErr;?></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $lname?>" placeholder="Enter Last Name" />
                        <span class="help-block error" style="display:block;">*<?php echo $lnmErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="NOT">Select...</option>
                            <option value="male" <?php if($gender == "male") echo "selected";?>>Male</option>
                            <option value="female" <?php if($gender == "female") echo "selected";?>>Female</option>
                            <option value="other" <?php if($gender == "other") echo "selected";?>>Other</option>
                        </select>
                        <span class="help-block error" style="display:block;">*<?php echo $genderErr;?></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $nationality?>" placeholder="Enter Nationality" />
                        <span class="help-block error" style="display:block;">*<?php echo $nationalityErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="mobileNo">Mobile Number</label>
                        <input type="text" class="form-control" name="mobileNo" id="mobileNo" value="<?php echo $phno?>" placeholder="Enter Mobile Number" />
                        <span class="help-block error" style="display:block;">*<?php echo $phnoErr;?></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="emailInput">Email address</label>
                        <input type="email" class="form-control" name="emailInput" id="emailInput" value="<?php echo $email?>" placeholder="Enter email" />
                        <span class="help-block error" style="display:block;">*<?php echo $emailErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="DLNo">DL No.</label>
                        <input type="text" class="form-control" name="DLNo" id="DLNo" value="<?php echo $dlno?>" placeholder="Enter DL Number" />
                        <span class="help-block error" style="display:block;">*<?php echo $dlnoErr;?></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="validity">Valid Till</label>
                        <input type="date" class="form-control" name="validity" value="<?php echo $validity?>" id="validity" />
                        <span class="help-block error" style="display:block;">*<?php echo $validityErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" onkeyup="return passwordChanged();" value="<?php echo $password?>" name="password" id="pwd" id="password" placeholder="Enter Password" />
                        <div id="strength"></div>
                        <span class="help-block error" style="display:block;">*<?php echo $passwordErr;?></span>
                        <input type="checkbox" onclick="showPass()"> Show Password
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="repwd">Confirm Password</label>
                        <input type="password" class="form-control" name="repassword" onkeyup="checkPassword()" value="<?php echo $repassword?>"  id="repwd" placeholder="Confirm your Password" />
                        <span class="help-block error" style="display:block;">*<?php echo $repasswordErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="signupC" class="btn btn-success" >Confirm</button>
                </div>
                <div class="col-sm-4">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                <div class="col-sm-4">
                    <button type="submit"  class="btn btn-danger" onClick="goBack()">Cancel</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>