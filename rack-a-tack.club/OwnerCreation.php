<?PHP session_start();
	include("db_connect.php");
 ?>
<?PHP 
	foreach ($_POST as $key => $val) { $t = $key; $$t = $val;
		// echo "POST -- KEYS = " . $t . "AND Values = " . $$t . "<br>";
		$tempK = strtolower($t);
		$tempV = strtolower($$t);
		// echo "POST -- KEYS = " . $tempK . "AND Values = " . $tempV . "<br>";
		if(strpos($tempV,"select") > 0) {
			exit("We are sorry, you are trying to access an invalid area....") ;
			 }
		if(strpos($tempV,"file") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }
		if(strpos($tempV,"rand(") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	 
		if(strpos($tempV,"'0=") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempV,"_schema") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempV,"etc") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempV,"passwd") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempV,"union") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
			 
		if(strpos($tempK,"select") > 0) {
			exit("We are sorry, you are trying to access an invalid area....") ;
			 }
		if(strpos($tempK,"file") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }
		if(strpos($tempK,"rand(") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	 
		if(strpos($tempK,"'0=") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempK,"_schema") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempK,"etc") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempK,"passwd") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ;
			 }	
		if(strpos($tempK,"union") > 0) {
			exit("We are sorry, we are not accepting your input at this time....") ; 
			 }	

	 }
	 function getLeagueID($dbc)
	 {
	
		/*
		// You have to connect to MySQL and select a database before you can do this
			$table_name = "myTable";
			$query = mysql_query("SHOW TABLE STATUS WHERE name='$table_name'");
			$row = mysql_fetch_array($query);
			$next_inc_value = $row["AUTO_INCREMENT"]; 
		*/
 
		$ACC = "SHOW TABLE STATUS WHERE name ='Leagues'";
	
		$results = $dbc->query($ACC);
		  while($row = $results->fetch_array())
		  {
			$next_inc_value = $row["Auto_increment"]; 
			
		  }
		  return $next_inc_value;
		
	 }
	 
	 if((isset($_POST)) && !empty($_POST)) 
	 {
		$NewUsername = cleaning($_POST['Username']);
		$NewPassword = md5(cleaning($_POST['Password']));
		$NewLeagueID = getLeagueID($dbc);
		$NewEMail = cleaning($_POST['EMail']);
		$NewAdminQuery = "INSERT INTO Users (LeagueID, Username, Password, EMail) VALUES($NewLeagueID ,'$NewUsername','$NewPassword','$email')";
		
		$_SESSION['Username'] = $NewUsername;
		$_SESSION['EMail'] = $NewEMail;
		$_SESSION['LeagueID'] = $NewLeagueID;
		
		$dbc->query($NewAdminQuery); 
		if($dbc->error) { echo $dbc->error;}
		else 
		{
			echo "<div id='Nextstep'>Congrats, onto the next step</div>";
			 //header("Location: LeagueCreation.php");  
		}
	 }
	 else
	 {
		echo "Thank you ". $_SESSION['Username']." for registering, Please click the button below to continue";
	 
	  
	 
	 
?>
<?PHP  } printf($_POST); ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>League Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="subpage">
		<div id="page-wrapper">
		<!-- Header -->
						<div id="header-wrapper">
							<header id="header" class="container">
								<div class="row">
									<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">Halcyonic</a></h1>
			<?PHP include("nav.php"); echo menu();?>
									</div>
								</div>
							</header>
						</div>
			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="12u">

									<!-- Main Content -->
										<section>
											<header>
												<h2>Step 1: Owner Registration</h2>
												<h3>Create Your Account</h3>
											</header>
											<p>
												 <form action="OwnerCreation.php" method="post" style="width:50%; margin-left:auto;margin-right:auto; display:block;">  
													<span>Username</span><br>
													<input type="text" name="Username" id="username" required><p></p>
													<span>Password</span><br>
													<input type="password" name="Password" id="Password" required><p></p> 
													<span>Password Again</span><br>
													<input type="password" name="PasswordAgain" id="PasswordAgain" required>
													<p></p>
													<span>EMail</span><br>
													<input type="email" name="email" id="email" required><p></p>
													<input type="hidden" name="cleared" value="submit">
													<input type="submit" name="submit" value="Submit">  
												 </form> 
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">
<pre>

</pre>
								 
						</div>
					</footer>
				</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy; Masterz.us  All rights reserved. | Design: <a href="http://html5up.net">HTML5</a>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>