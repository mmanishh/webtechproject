
<?php
include_once 'classes/database.php';
include_once 'classes/admin.php';
include_once 'initial.php';



$admin= new Admin($db);

$page_title="Register ";

include_once 'header.php';

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		
		if($admin->create($name,$email,$user,$pass))
		{

		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
		}else{
			echo "Registration unsuccessful";

		}
	}
} else {

?>
	<!-- <form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
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
		</table>
	</form> -->

	<form name="register_form" method="post" action="">
	<table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Full Name</td>
            <td><input type='text' name='name'  class='form-control' placeholder="Full name" required></td>
        </tr>

          <tr>
            <td>Email</td>
            <td><input type='email' name='email'  class='form-control' placeholder="Email" required></td>
        </tr>

          <tr>
            <td>Username</td>
            <td><input type='text' name='username'  class='form-control' placeholder="user name" required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' placeholder="Password" required></td>
        </tr>

        
  

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name="submit">
                    <span class="glyphicon">Register</span>
                </button>

            </td>

        </tr>

    </table>
	</form>
<?php
}
?>
</body>
</html>
