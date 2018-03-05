<?php session_start(); 

//include database and object files
include_once 'classes/database.php';
include_once 'classes/user.php';
include_once 'classes/category.php';
include_once 'initial.php';

// instantiate database and user object
$user = new User($db);
$category = new Category($db);



?>


<body>
	<div id="header">
		WLogin
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		//$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	
<?php
include_once "footer.php";
?>
