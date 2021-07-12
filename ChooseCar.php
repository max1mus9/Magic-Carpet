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

$id = "";

if(isset($_POST['bookCars'])){
    $id = $_POST["cid"];
    $ccname = $_POST["cname"];
    $cst = $_POST["cost"];

    if(!empty($id)){
        $_SESSION["choosenCar"] = $id;
        $_SESSION["carName"] = $ccname;
        $_SESSION["cost"] = $cst;
        echo "<script>document.location.href='payment.php';</script>";
    }
    
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
    </style>
</head>

<body>
    <header class="d-flex justify-content-between align-items-center px-5 py-4">
        <p class="logo m-0">Magic Carpet</p>
        <nav class="d-flex align-items-center">
            <a href="index.php">Home</a>
            <a href="booking.html">Manage Booking</a>
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

    <section class="booking_form">
        <div class="container  justify-content-center" id="mainDiv">
            <div style="width:30%;float:left;">
                <table style="border:1px solid grey;">
                    <th colspan="2" style="width:50%;border:1px solid grey;">Booking Details</th>
                    <tr>
                        <td>Time and Place</td>
                        <td class="tdStyleRight"><a href="#">Change</a></td>
                    </tr>
                    <tr>
                        <td>Pick-up:</td>
                        <td class="tdStyleRight"><?php echo $_SESSION["pLoc"];?></td>
                    </tr>
                    <tr>
                        <td>Return:</td>
                        <td class="tdStyleRight"><?php echo $_SESSION["rLoc"];?></td>
                    </tr>
                    <tr>
                        <td>Return Duration:</td>
                        <td class="tdStyleRight"><?php echo $_SESSION["duration"];?></td>
                    
                    </tr>
                </table>
            </div>
            <div style="width:68%;float:right;">
                <!--Car Table-->
                <h5>Choose Car</h5>
                <?php 
                $sql = "select * from cars";
                if($stmt = $mysqli -> prepare($sql)){
                    $stmt -> execute();
                    $stmt -> store_result();
                    $totalrows=$stmt->num_rows;
                    
                    $stmt -> bind_result($cid, $cname, $ctype, $image, $cost, $capacity,$bag, $status);
                    if($totalrows > 0)
                    {
                            $counter=1;
                            while ($row = $stmt -> fetch()) 
                            {
                                if($status == "Available"){
                                    echo '<form method="post">';
                                    echo '<table class="carTable">';
                                    echo '<tr>';
                                    echo '<td><img src="carImg/'.$image.'" width="200px" height="150px"><input type="text" value="'.$cid.'" hidden name="cid"/> <input type="text" value="'.$cname.'" hidden name="cname"/> <input type="text" value="'.$cost.'" hidden name="cost"/></td>';
                                    echo '<td><h4>'.$cname.'</h4><div><b>Type :</b></div><span>'.$ctype.'</span><div><i class="fas fa-user"> '.$capacity.'</i> &nbsp <i class="fas fa-suitcase-rolling"> '.$bag.'</i></div></td>';
                                    echo '<td><div class="totalPrice"><span>Total Price :</span><div>'.$cost.'.00 ₹</div></div><button type="submit" name="bookCars" class="btn btn-primary">Continue</button></td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    echo '</form>';
                                }
                                $counter++;
                            }
                        }
                        else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                            
                            // Free result set
                            $stmt->close();
                            
                } 
                else
                    {
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                        
                        // Close connection
                        $mysqli->close();
                ?>
                
            </div>
        </div>
    </section>
</body>

</html>