<?php 
// Include config file
require_once "config.php";
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
{
   
}
else{
    header("location: LogIn.php");
   exit;
}

if(isset($_POST['logOut'])){
    session_destroy();
    header("location: index.php");
    exit;
}


$renFee =($_SESSION["cost"])*($_SESSION["duration"]);
$gst = $renFee * 0.005;
$tfee= $renFee + $gst + 50;

$tranID = $pMethod = $display = "";
$tranIDErr = $pMethodErr = $chkErr = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Magic Carpet: Car Rental Services</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        th,
        td {
            vertical-align: text-top;
            padding: 10px;
        }
        
        table {
            margin-bottom: 20px;
        }
        
        #mainDiv {
            width: 90%;
            box-shadow: 6px 6px 10px 10px rgba(0, 0, 0, 0.2), 6px 6px 20px 10px rgba(0, 0, 0, 0.19);
            padding: 30px;
            border-radius: 9px;
        }
        
        .tdStyleRight {
            text-align: right;
        }
        
        .carTable {
            width: 100%;
            border: 1px solid grey;
            text-align: center;
        }
        
        .totalPrice {
            font-weight: bold;
            padding: 15px;
            margin-bottom: 5px;
            background-color: lightgrey;
            text-align: center;
            border-radius: 5px;
        }
        .tncs {
            color: rgb(0, 0, 177);
        }
        
        .tncs:hover {
            color: dodgerblue;
            text-decoration: underline;
        }
        .error{
            display:block;
            color:red;
        }
    </style>
    <script>
        function clickMe() {
            swal("Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aperiam. Autem atque amet, exercitationem, ipsam repudiandae laudantium similique magni enim eum velit at pariatur accusantium minus rerum aliquid doloribus! Corporis ullam a amet molestiae error fuga suscipit reprehenderit, illo numquam aperiam quidem eaque autem quae, inventore officiis necessitatibus incidunt atque nostrum pariatur? Veniam amet veritatis natus officia eligendi incidunt repellat nihil deserunt, eaque neque eius quo laboriosam velit mollitia minus cum voluptas, eum, voluptatibus doloribus rem! Illum obcaecati commodi assumenda magni fuga veritatis quaerat illo laboriosam iure ad magnam sunt quod qui consequatur nam laudantium voluptatem, tempore nostrum nihil dicta.");
        }
        
        function onExec()
        {
            document.location.href='index.php';
        }
        function openDetails(ids, hideIds) {
            var elem = document.getElementById(ids);
            elem.style.display = "block"

            hideDetails(hideIds);
            //open Divs
        }

        function hideDetails(ids) {
            var elem = document.getElementById(ids);
            elem.style.display = "none"
                //hide Divs
        }
    </script>
</head>

<body>
<?php
if(isset($_SESSION["success"]) && $_SESSION["success"]){
    
}

$_SESSION["success"] = false;
if(isset($_POST['confirm'])){
    $display = "display:block;";
    $displayP = "display:none;";
    if($_POST["pMethod"] == "select")
    {
        $pMethodErr = "Please select a payment method";
    }
    else
    {
        $pMethod = trim($_POST["pMethod"]);
    }

    if(empty(trim($_POST["tranID"])))
    {
        $tranIDErr = "Please enter your transaction ID";
    }
    else
    {
        $tranID = trim($_POST["tranID"]);
    }

    if(!isset($_POST["check"]))
    {
        $chkErr = "*Please accept the terms and conditions.";
    }

    $pL = $_SESSION["pLoc"];
    $rL = $_SESSION["rLoc"];
    $pD = $_SESSION["pDate"];
    $rD = $_SESSION["rDate"];
    $carId = $_SESSION["choosenCar"];
    $clId = $_SESSION["clid"];
    $ccname = $_SESSION['carName'];


    if(empty($pMethodErr) && empty($tranIDErr) && empty($chkErr)){
        $sql = "insert into transaction (clientid, carid, tranid, pmethod, tfee, pDate, rDate, pLoc, rLoc) values ('$clId', '$carId', '$tranID', '$pMethod', '$tfee', '$pD', '$rD', '$pL', '$rL')";

        // $res = mysqli_query($mysqli, $sql);
                   
        if($mysqli->query($sql) === TRUE)
        {
            $sql = "update cars set status='UnAvailable' where cid='$carId' ";
			
            if($mysqli->query($sql) === TRUE){
                $_SESSION["success"] = true;
                echo "<script>swal('Hello world!', {title: 'Booking Successful',text: 'Please check inbox. Redirecting to homepage..',icon: 'success',button: false,});setTimeout(function(){ onExec(); }, 5000);</script>";
            }
        }
        else{
            echo '<script>swal("Oops...", "Return date should be greater than pickup date!", "error");</script>';
        }
    }
}
?>

    <header class="d-flex justify-content-between align-items-center px-5 py-4">
        <p class="logo m-0">Magic Carpet</p>
        <nav class="d-flex align-items-center">
            <a href="index.php">Home</a>
            <a href="booking.html">Manage Booking</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact us</a>
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                echo "<form method='post'><button onClick='logOut()' name='logOut' style='background-color:rgba(0,0,0,0.0);' data-toggle='tooltip' title='Log Out'><i class='fas fa-power-off' style='padding:5px;font-size:20px;font-weight:bold;color:white'></i><span style='padding:5px;font-weight:bold;color:white'>".htmlspecialchars($_SESSION["fname"]).' '.htmlspecialchars($_SESSION["lname"])."</span></button></form>";
            }
            else{
                echo '<a href="LogIn.php" class="btn btn-warning text-white">Login</a>';
            } ?>
        </nav>
    </header>

    <section class="booking_form">
        <div class="container  justify-content-center" id="mainDiv">
        <section class="booking_form">

<!--Another one-->
<div style="width:68%;float:right;" id="paymentTab">
    <table class="carTable">
        <th colspan="2">Payment</th>
        <tr>
            <td><b>Car Name</b></td>
            <td class="tdStyleRight"><?php echo $_SESSION["carName"];?></td>
        </tr>
        <tr>
            <td><b>Rental Duration</b></td>
            <td class="tdStyleRight"><?php echo $_SESSION["duration"];?></td>
        </tr>
        <tr>
            <td><b>Price per day</b></td>
            <td class="tdStyleRight"><?php echo $_SESSION["cost"].".00";?></td>
        </tr>
        <tr>
            <td><b>Car rental fee</b></td>
            <td class="tdStyleRight"><?php echo $renFee.".00";?></td>
        </tr>
        <tr>
            <td><b>Extra's Price</b></td>
            <td class="tdStyleRight"><?php echo "50".".00";?></td>
        </tr>
        <tr>
            <td><b>GST</b></td>
            <td class="tdStyleRight"><?php echo $gst.".00";?></td>
        </tr>
        <tr style="color:red;background-color: rgb(235, 232, 232);font-weight: bold;">
            <td>Total</td>
            <td class="tdStyleRight"><?php echo $tfee.".00";?></td>
        </tr>
    </table>
    <button type="submit" onclick="openDetails('onPaymentTab','proceed')"style="<?php echo $displayP;?>" id="proceed" class="btn btn-primary">Proceed</button>
</div>
<!--Another one-->
<div class="container  justify-content-center mainDiv" style="display: none;<?php echo $display;?>" id="onPaymentTab">


<form method="post">
<div id="accordion">

<div class="card">
    <div class="card-header" style="font-weight: bold;color:dodgerblue">
        Payment Method
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
            
                <select class="form-control" name="pMethod" style="width:30%">
                <option value="select" <?php if($pMethod == "select") echo "selected";?>>Select Payment Method</option>
                    <option value="PayPal" <?php if($pMethod == "PayPal") echo "selected";?>>PayPal</option>
                    <option value="RazorPay" <?php if($pMethod == "RazorPay") echo "selected";?>>Razor Pay</option>
                    <option value="PhonePe" <?php if($pMethod == "PhonePe") echo "selected";?>>PhonePe</option>
                </select>
                <span class="help-block error" style="display:block;">*<?php echo $pMethodErr;?></span>
                    <label for="tranID">Transaction ID</label>
                    <input type="text" class="form-control" style="width:30%" name="tranID" value="<?php echo $tranID; ?>" id="regEmail" placeholder="Enter your payment transaction ID" />
                    <span class="help-block error" style="display:block;">*<?php echo $tranIDErr;?></span>
        </div>
    </div>
</div>
</div>


<div id="accordion">

<div class="card">
    <div class="card-header" style="font-weight: bold;color:dodgerblue">
        Rental terms
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
            <div class="checkbox">
                <label><input type="checkbox" name="check" value="checked"> &nbsp I have read and agreed all <span onclick="clickMe()" class="tncs">Terms & Conditions.</span></label>
                <span class="help-block error" style="display:block;"><?php echo $chkErr;?></span>
            </div>
            
            <button class="btn btn-primary" type="submit" name="confirm">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

</div>
</form>

</div>




</section>
        </div>
    </section>
</body>

</html>