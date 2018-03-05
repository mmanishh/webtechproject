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
	if(isset($_SESSION['valid']))
    {			
            header('Location: home.php');  
    }else{
            header('Location: login.php');   

    } 
	?>
				
	
	
<?php
include_once "footer.php";
?>
