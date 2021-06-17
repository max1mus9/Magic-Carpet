<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Magic Carpet: Contact us</title>
		<link rel="stylesheet" href="css/header.css" />
		<link rel="stylesheet" href="css/contact.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
	</head>
	<body>
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
		<section class="heading">
			<div class="left">
				<h1>Contact us</h1>
				<p>
					Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
					deserunt exercitationem ipsa, tempora rem maiores qui est
					aspernatur ea magni.
				</p>
			</div>
			<div class="right">
				<div class="need_help">
					<h4>Need immediate help?</h4>
					<form action="">
						<div class="form_row">
							<label for="">Your name</label>
							<input type="text" name="" />
						</div>
						<div class="form_row">
							<label for="">Order number</label>
							<input type="text" name="" />
						</div>
						<div class="form_row">
							<label for="">Active mobile number</label>
							<input type="text" name="" />
						</div>
						<div class="form_row">
							<label for="">Your location</label>
							<input type="text" name="" />
						</div>
						<div class="form_row">
							<label for="">Need another vehicle?</label>
							<label><input type="radio" name="newcar" /> Yes</label>
							<label><input type="radio" name="newcar" /> No</label>
						</div>
						<div class="form_row">
							<button
								type="submit"
								class="btn btn-warning font-weight-bold"
							>
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>
		<section class="contact">
			<div class="container-fluid" style="background: #000;">
				<div class="row py-5">
					<!-- left div start -->
					<div
						class="con-left-div col-md-5 col-12 flex-column my-auto px-5 py-4"
					>
						<div class="py-4">
							<h3>Your feedback is valuable to us</h3>
							<p class="con-big-text">
								<span>We</span> will be in <br /><span>touch</span>
								soon!
							</p>
							<p class="con-p">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
								Sed commodo ut neque hendrerit viverra.
							</p>
							<div class="con-mediabtn py-1 d-flex">
								<a href="#">f</a>
								<a href="#">t</a>
								<a href="#">in</a>
							</div>
						</div>
					</div>
					<!-- left div end -->
					<!-- Right div start -->
					<div class="con-right-div col-md-7 col-12 py-4 px-2">
						<div class="w-100 text-white">
							<h2>Drop your message</h2>
						</div>
						<!-- Form start -->
						<div class="form px-1">
							<form method="POST" action="sendmsg.php">
								<!--Name and Phone-->
								<div class="w100" style="display: inline-block;">
									<div style="float: left;width: 50%;">
										<label>Name:</label>
										<input
											class="input"
											type="text"
											maxlength="40"
											name="firstname"
											placeholder="Name"
											autocomplete="off"
										/>
									</div>
									<div style="float: right;width:50%;">
										<label>Phone:</label>
										<input
											class="input"
											type="text"
											name="lastname"
											placeholder="Phone"
											autocomplete="off"
										/>
									</div>
								</div>
								<!--Email and Subject-->
								<div class="w100">
									<div style="float: left;width: 50%;">
										<label>Email:</label>
										<input
											class="input"
											type="email"
											maxlength="40"
											name="email id"
											placeholder="Email id"
										/>
									</div>
									<div style="float: right;width:50%;">
										<label>Subject:</label>
										<input
											class="input"
											type="text"
											maxlength="40"
											name="subject"
											placeholder="Subject"
											autocomplete="off"
										/>
									</div>
								</div>
								<!--MEssage-->
								<div class="w100">
									<label>Message</label>
									<textarea placeholder="Type yourmessage"></textarea>
								</div>
								<!--Button-->
								<div
									class="w100"
									style="padding: 8px 12px;display: inline-block;"
								>
									<input
										type="submit"
										class="submit"
										name="Drop"
										value="Drop message"
									/>
								</div>
							</form>
						</div>
						<!--form end-->
					</div>
					<!-- right div end -->
				</div>
				<!--row end-->
			</div>
			<!--contact div end-->
		</section>
		<footer>
			<p>Copyright &copy; 2020 Magic Carpet. All rights reserved.</p>
		</footer>
	</body>
</html>
