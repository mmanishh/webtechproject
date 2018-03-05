<?php session_start(); 

//include database and object files
include_once 'classes/database.php';
include_once 'classes/admin.php';
include_once 'initial.php';





$admin = new Admin($db);
$page_title="Login";
include_once 'header.php';

if(isset($_POST['submit'])) {
	$user =  $_POST['username'];
	$pass =  $_POST['password'];

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		
		
		if($admin->login($user,$pass)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {

	echo 'not submitted';
}
?>
	<!-- <p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table> -->
	<form name="login_form" method="post" action="">
	<table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Username</td>
            <td><input type='text' name='username'  class='form-control' placeholder="Username" required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' placeholder="Password" required></td>
        </tr>

        
  

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name="submit">
                    <span class="glyphicon">Login</span>
                </button>
            </td>
        </tr>

    </table>
	</form>
</body>
</html>