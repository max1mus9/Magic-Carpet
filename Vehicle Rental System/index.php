<?php
// Include config file
require_once "config.php";
// Attempt select query execution

session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });

    function logOut(){
        swal({
                title: "Log Out",
                text: "Logged out successfully",
                icon: "success",
            });
    }
</script>

<body>

<?php

// Check if the user is logged in, if not then redirect him to login page

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

    <section class="home">
        <h1>Rent your vehicle at low price</h1>
        <p>
            That too sanitised and safe. delivery and pick up at the location you want Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, omnis ipsum fugit labore cumque assumenda autem cupiditate nemo ea quia?
        </p>
    </section>
    <section class="offers px-5 py-5">
        <h2 class="text-uppercase text-center my-5">We offer</h2>
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="card">
                    <img src="image/bg2.jpg" class="img-fluid" />
                    <div class="content px-3 py-2">
                        <h5>Family car</h5>
                        <h6>Starting from <span>$400</span></h6>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque placeat, temporibus exceptur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <img src="image/bg2.jpg" class="img-fluid" />
                    <div class="content px-3 py-2">
                        <h5>Two Wheeler</h5>
                        <h6>Starting from <span>$400</span></h6>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque placeat, temporibus exceptur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <img src="image/bg2.jpg" class="img-fluid" />
                    <div class="content px-3 py-2">
                        <h5>Luxury Cars</h5>
                        <h6>Starting from <span>$400</span></h6>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque placeat, temporibus exceptur.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <img src="image/bg2.jpg" class="img-fluid" />
                    <div class="content px-3 py-2">
                        <h5>Prestige cars</h5>
                        <h6>Starting from <span>$400</span></h6>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque placeat, temporibus exceptur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us">
        <h2>About us</h2>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi ullam quidem sapiente, ipsum iusto minima esse mollitia porro aut cupiditate laborum cum doloribus, consequuntur, odit voluptatum. Consectetur sunt veritatis aliquam dicta voluptas nemo
            eligendi! Omnis debitis, hic laborum recusandae sit? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi ullam quidem sapiente, ipsum iusto minima.
        </p>
    </section>
    <section class="our_services">
        <h2 class="text-center">Our Services</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card p-4">
                        <div class="icon"></div>
                        <h3>Car for rent</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, quis reprehenderit tenetur debitis esse, nobis est quibusdam voluptate..</p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <a href="JoinUs.php" class="btn btn-info text-white">Join Us</a>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <a href="AdminLogIn.php" class="btn btn-primary text-white">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright &copy; 2020 Magic Carpet. All rights reserved.</p>
    </footer>
</body>

</html>