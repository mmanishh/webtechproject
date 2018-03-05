<?php 

class Admin
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "login";

    // object properties
    public $id;
    public $username;
    public $password;
    public $email;
    


    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function login($user,$pass)
    {
			$sql ="SELECT * FROM login WHERE username='$user' AND password=md5('$pass')";

        	$prep_state = $this->db_conn->prepare($sql);
        	$prep_state->execute();

        	$row =$prep_state->fetch(PDO::FETCH_ASSOC);

			/*$result = mysqli_query($db_conn, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
			$row = mysqli_fetch_assoc($result);
		*/
			if(is_array($row) && !empty($row)) {
				$validuser = $row['username'];
				$_SESSION['valid'] = $validuser;
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];

				return true;
			} else {
				return false;
			}

	
		
    }

    function create($name,$email,$user,$pass)
    {
        //write query
       $sql = "INSERT INTO " . $this->table_name . " SET name = ?, email = ?, username = ?, password = ?";

       $encrypt_passs = md5($pass);

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $name);
        $prep_state->bindParam(2, $email);
        $prep_state->bindParam(3, $user);
        $prep_state->bindParam(4, $encrypt_passs);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

}


    
 ?>