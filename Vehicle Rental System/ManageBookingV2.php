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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <style>
        th,
        td {
            vertical-align: text-top;
            padding: 10px;
            border-bottom: 1px solid lightgray;
        }
        
        table {
            margin-bottom: 20px;
        }
        
        .mainDiv {
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
        }
        
        .carTableAlignAlign {
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

        function onConfirm() {
            swal({
                title: "Good job!",
                text: "Car booked successfully",
                icon: "success",
            });
        }


        function setDateT() {
            let today = new Date().toLocaleString('sv-SE').slice(0, 16).replace(' ', 'T');
            document.getElementById('dateTime1').setAttribute("min", today);

            let today1 = new Date().toLocaleString('sv-SE').slice(0, 16).replace(' ', 'T');
            document.getElementById('dateTime2').setAttribute("min", today1);
        }


        function openDetailsDateTime(form) {
            var formData = form.elements;
            // if()
            var x = formData.dateTime1.value
            x = Date.parse(x.substr(0, 10))
            var y = formData.dateTime2.value
            y = Date.parse(y.substr(0, 10))
            if (y - x < 0) {
                swal("Oops...", "Return date should be greater than pickup date!", "error");
            } else if (formData.dateTime1.value != "" && formData.dateTime2.value != "") {
                btn = document.getElementById("changeBtn");
                btn.type = "submit";
                btn.click();
            }
            //open Divs
        }


    </script>
</head>

<body onload="setDateT()">

<?php 

$pDate = $rDate = $pLoc = $rLoc ="";

$pDateErr = $rDateErr = $pLocErr = $rLocErr ="";


if (isset($_POST['manageBooking'])){
    if(empty(trim($_POST["dateTime1"])))
    {
    $pDateErr = "Please select pick up date.";
    }
    else
    {
    $pDate = trim($_POST["dateTime1"]);
    }

    if(empty(trim($_POST["dateTime2"])))
    {
    $rDateErr = "Please select return date.";
    }
    else
    {
    $rDate = trim($_POST["dateTime2"]);
    }

    if(empty(trim($_POST["pickupL"])))
    {
    $pLocErr = "Please enter pick up address.";
    }
    else
    {
    $pLoc = trim($_POST["pickupL"]);
    }

    if(empty(trim($_POST["returnL"])))
    {
    $rLocErr = "Please select return address.";
    }
    else
    {
    $rLoc = trim($_POST["returnL"]);
    }

    $pD = date_create(substr($pDate,0,10));
    $rD = date_create(substr($rDate,0,10));
    $diff = $rD->diff($pD);
    $rDiff= $diff->days;


    if(empty($pDateErr) && empty($rDateErr) && empty($pLocErr) && empty($rLocErr)){
        $_SESSION["pDate"] = $pDate;
        $_SESSION["rDate"] = $rDate;
        $_SESSION["pLoc"] = $pLoc;
        $_SESSION["rLoc"] = $rLoc;
        $_SESSION["duration"] = $rDiff;
        // header("location: ChooseCar.php");
        // exit;

        echo "<script>document.location.href='ChooseCar.php';</script>";
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
    <header class="d-flex justify-content-between align-items-center px-5 py-4">
        <p class="logo m-0">Magic Carpet</p>
        <nav class="d-flex align-items-center">
            <a href="index.php">Home</a>
            <a href="ManageBookingV2.php">Manage Booking</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact us</a>
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                echo "<form method='post'><button onClick='logOut()' name='logOut' style='background-color:rgba(0,0,0,0.0);' data-toggle='tooltip' title='Log Out'><i class='fas fa-power-off' style='padding:5px;font-size:20px;font-weight:bold;color:white'></i></i><span style='padding:5px;font-weight:bold;color:white'>".htmlspecialchars($_SESSION["fname"]).' '.htmlspecialchars($_SESSION["lname"])."</span></button></form>";
            }
            else{
                echo '<a href="LogIn.php" class="btn btn-warning text-white">Login</a>';
            } ?>
        </nav>
    </header>


    <section class="booking_form" id="manageBooking">
        <h2 class="my-4">Rent your vehicle!</h2>
        <form  id="myform" enctype="multipart/form-data" method="post">
            <div class="d-flex mb-4">
                <div class="col rounded shadow">
                    <label>Pickup Date/Time</label>
                    <input type="datetime-local" name="dateTime1" value="<?php echo $pDate?>" id="dateTime1"  />
                    <span class="help-block error" style="display:block;">*<?php echo $pDateErr;?></span>
                </div>
                <div class="col rounded shadow">
                    <label>Return Date/Time</label>
                    <input type="datetime-local" name="dateTime2" value="<?php echo $rDate?>" id="dateTime2"  />
                    <span class="help-block error" style="display:block;">*<?php echo $rDateErr;?></span>
                </div>
            </div>
            <div class="d-flex area">
                <div class="col rounded shadow">
                    <label>Pickup Location</label>
                    <input type="text" name="pickupL" value="<?php echo $pLoc?>" placeholder="Hata sahi, Nuapada, London" />
                    <span class="help-block error" style="display:block;">*<?php echo $pLocErr;?></span>
                </div>
                <div class="col rounded shadow">
                    <label>Return Location</label>
                    <input type="text" name="returnL" value="<?php echo $rLoc?>" placeholder="Hata sahi, Nuapada, London" />
                    <span class="help-block error" style="display:block;">*<?php echo $rLocErr;?></span>
                </div>
            </div>
            <div class="d-flex justify-content-center py-4">
                <input type="button" id="changeBtn" name="manageBooking" onClick="openDetailsDateTime(this.form)" class="btn btn-warning text-uppercase tewh" value="Make reservation">

                </input>
            </div>
        </form>
    </section>

    
</body>

</html>