<?php
// Include config file
require_once "config.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>



<link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
	*{
	margin:0;
	padding:0;
	color:white;
	font-family:calibri;
  }
        .body {
            /* The image used */
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(sky.jpg);
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
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});

function logOut(){
	document.location.href='index.php';
}



</script>


</head>

<body class="body"> 

<header class="d-flex justify-content-between align-items-center px-5 py-4">
			<p class="logo m-0">Magic Carpet</p>
			<p class="logo m-0" style="text-align:center;">Admin</p>
			<nav class="d-flex align-items-center">
				<a href="cars.php">Cars</a>
				<button onClick='logOut()' name='logOut' style='background-color:rgba(0,0,0,0.0);' data-toggle='tooltip' title='Log Out'><i class='fas fa-power-off' style='padding:5px;font-size:20px;font-weight:bold;color:white'></i></i><span style='padding:5px;font-weight:bold;color:white'>Log Out</button>
			</nav>
		</header>



<div class="container-fluid maindiv">
<div class="wrapper" style="margin-top:50px;">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
<h2 class="headerhead">All Transactions </h2>
</div>




<?php

$sql = "SELECT * FROM transaction";

if($stmt = $mysqli -> prepare($sql)){
$stmt -> execute();
$stmt -> store_result();
$totalrows=$stmt->num_rows;

$stmt -> bind_result($slno,$cid,$carId,$tid,$pmet,$tfee,$pd,$rd,$pl,$rl);

if($totalrows > 0)
{

echo "<table class='table table-resposive table-borderless' style='box-shadow:2px 4px 8px 10px rgba(0, 0, 0, 0.2), 2px 6px 20px 10px rgba(0, 0, 0, 0.19);padding:30px;border-radius:9px;'>";
echo "<thead>";
echo "<tr>";
echo "<th>SLNO</th>";
echo "<th>Client ID</th>";
echo "<th>Car ID</th>";
echo "<th>Transaction ID</th>";
echo "<th>Payment Method</th>";
echo "<th>Transaction Fees</th>";
echo "<th>Pick Up Date</th>";
echo "<th>Return Date</th>";
echo "<th>Pick Up Location</th>";
echo "<th>Return Location</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$counter=1;
while ($row = $stmt -> fetch()) 
{
echo "<tr>";
echo "<td>" . $slno."</td>";
echo "<td>" . $cid. "</td>";
echo "<td>" . $carId. "</td>";
echo "<td>" . $tid. "</td>";
echo "<td>" . $pmet. "</td>";
echo "<td>" . $tfee. "</td>";
echo "<td>" . $pd. "</td>";
echo "<td>" . $rd. "</td>";
echo "<td>" . $pl. "</td>";
echo "<td>" . $rl. "</td>";

echo "</tr>";
$counter++;
}
echo "</tbody>";                            
echo "</table>";
} 
else
{
echo "<p><em>No records were found.</em></p>";
}
}
?>
</div>
</div>        
</div>
</div>
</div>

</body>
</html>

















