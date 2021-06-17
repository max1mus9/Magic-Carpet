<?php
// Include config file
require_once "config.php";

$name = $dlno = $phno = $mlid = $vin = $vtype = $pltno = $clr = $corg =$mdl = $sd =$km =$icomp = $itype = $ird ="";

?>
<html>

<head>
    <title>Join Us</title>
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
    </style>
    <script language="javascript">
        function goBack(){
            window.history.go(-1);
        }
		function onExec(){
			document.location.href='index.php';
		}
    </script>
</head>

<body>
<?php
if(isset($_POST['join'])){
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	
	if(isset($_POST['DLNo'])){
		$dlno = $_POST['DLNo'];
	}
	
	if(isset($_POST['phno'])){
		$phno = $_POST['phno'];
	}
	
	if(isset($_POST['mail'])){
		$mlid = $_POST['mail'];
	}
	
	if(isset($_POST['VIN'])){
		$vin = $_POST['VIN'];
	}
	
	if(isset($_POST['vtype'])){
		$vtype = $_POST['vtype'];
	}
	
	if(isset($_POST['plateno'])){
		$pltno = $_POST['plateno'];
	}
	
	if(isset($_POST['color'])){
		$clr = $_POST['color'];
	}
	
	if(isset($_POST['countryOfMade'])){
		$corg = $_POST['countryOfMade'];
	}
	
	if(isset($_POST['mdl'])){
		$mdl = $_POST['mdl'];
	}
	
	if(isset($_POST['lastServicingDate'])){
		$sd = $_POST['lastServicingDate'];
	}
	
	if(isset($_POST['kmsDriven'])){
		$km = $_POST['kmsDriven'];
	}
	
	if(isset($_POST['insuranceCompany'])){
		$icomp = $_POST['insuranceCompany'];
	}
	
	if(isset($_POST['insuranceType'])){
		$itype = $_POST['insuranceType'];
	}
	
	if(isset($_POST['renewalDate'])){
		$ird = $_POST['renewalDate'];
	}
	
	$sql = "insert into joinus (name,dlno,phno,mail,vin,vtype,pltno,clr,corigin,model,sdate,kms,icomp,itype,irdate) values('$name','$dlno','$phno','$mlid','$vin','$vtype','$pltno','$clr','$corg','$mdl','$sd','$km','$icomp','$itype','$ird')";
	
	if($mysqli->query($sql) === TRUE)
    {
		echo "<script>swal('Hello world!', {title: 'Thanks for joining us',text: 'We will get back to you soon',icon: 'success',button: false,});setTimeout(function(){ onExec(); }, 5000);</script>";
	}
	else{
		echo "something went wrong!";
	}
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
    <div class="container col-lg-6 offset-lg-3 justify-content-center"
        style='box-shadow:6px 6px 10px 10px rgba(0, 0, 0, 0.2), 6px 6px 20px 10px rgba(0, 0, 0, 0.19);padding:30px;border-radius:9px;background-color: aliceblue;'>
        <h2 style="margin-bottom: 30px;">Join US</h2>
        <form method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required  type="text" class="form-control" name="name" id="name" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="DLNo">DL No.</label>
                        <input required  type="text" class="form-control" name="DLNo" id="DLNo" placeholder="Enter DL Number" />
                    </div>
                </div>
            </div>
			
			  <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="plateno">Phone No.</label>
                        <input required  type="text" class="form-control" name="phno" id="phno"
                            placeholder="Enter Phone No" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="color">Mail</label>
                        <input required  type="text" class="form-control" name="mail" id="mail" placeholder="Enter mail id" />
                    </div>
                </div>
            </div>
            
			
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="VIN">VIN/Chassis No.</label>
                        <input required  type="text" class="form-control" name="VIN" id="VIN"
                            placeholder="Enter VIN/Chassis No." />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="vtype">Vehicle Type</label>
                        <select class="form-control" name="vtype" required id="vtype">
                            <option value="">Select...</option>
                            <option value="">Type 1</option>
                            <option value="">Type 2</option>
                            <option value="">Type 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="plateno">Plate No.</label>
                        <input required  type="text" class="form-control" name="plateno" id="plateno"
                            placeholder="Enter Plate Number" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input required  type="text" class="form-control" name="color" id="color" placeholder="Enter Color" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="countryOfMade">Country of Made</label>
                        <input required  type="text" class="form-control" name="countryOfMade" id="countryOfMade"
                            placeholder="Enter Country of Made" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input required  type="text" class="form-control" name="model" id="model" placeholder="Enter Model" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lastServicingDate">Last Servicing Date</label>
                        <input required  type="date" class="form-control" name="lastServicingDate" id="lastServicingDate" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kmsDriven">KMs Driven</label>
                        <input required  type="number" class="form-control" name="kmsDriven" id="kmsDriven"
                            placeholder="Enter KMs Driven" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="insuranceCompany">Insurance Company</label>
                        <input required  type="text" class="form-control" name="insuranceCompany" id="insuranceCompany"
                            placeholder="Enter Insurance Company Name" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="insuranceType">Type</label>
                        <input required  type="text" class="form-control" name="insuranceType" id="insuranceType"
                            placeholder="Enter Type" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="renewalDate">Renewal Date</label>
                        <input required  type="date" class="form-control" name="renewalDate" id="renewalDate" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="join" class="btn btn-success">Submit</button>
                </div>
                <div class="col-sm-4">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                <div class="col-sm-4">
                    <button type="cancel" class="btn btn-danger" onClick="goBack()">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>