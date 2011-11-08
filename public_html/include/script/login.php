<?php 
session_start();
if (isset($_SESSION['session_user'])){
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><input type='submit' name='logout' value='Logga ut'></form>
<?php
	if (isset($_POST['logout'])){
		session_destroy();
		header("location: loggin.php");
	}
}
elseif (!isset($_POST['submit'])){

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <table>
   <tr>
	 <td>Username:</td>
	 <td>
	   <input type="text" name="username" maxlength="30" value="username" />
	 </td>
   </tr>
   <tr>
	 <td>Password:</td>
	 <td>
	   <input type="password" name="password" maxlength="30" value="" />
	 </td>
   </tr>
   <tr>
	 <td colspan="2">
	   <input type="submit" name="submit" value="Login" />
	 </td>
   </tr>
 </table>
</form>

<?php
}
//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
    include_once ('dbconnect.php');
	//väljer databasen	
	mysql_select_db("scrummasterdb", $con);

// check if the user and password is ok   
   function authenticate($username, $password) {
	global $con;
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
	
// Här väljer den värden ifrån tabellen users,  
    $sql  = "SELECT * FROM user ";
    $sql .= "WHERE username = '$username' ";
    $sql .= "AND password = '$password' ";
    $sql .= "LIMIT 1";
    $result = mysql_query($sql, $con) or die(mysql_error());
	
	$row = mysql_fetch_assoc($result);
	$username = $row['id'];
	return $username; 
    
   }
?>
<?php 
if (isset($_POST['submit'])) { // Form has been submitted.
	
 $username = trim($_POST['username']);
 $password = trim($_POST['password']);
// Check database to see if username/password exist.
   $found_user = authenticate($username, $password);
  
// check if  function authenticate got a name

 if ($found_user != NULL) {

	$sql  = "SELECT * FROM user ";
    $sql .= "WHERE id = '$found_user'";
    $sql .= "LIMIT 1";
    $result = mysql_query($sql, $con) or die(mysql_error());
	
	$user = mysql_fetch_assoc($result);
	$user = $user['username'];

	$_SESSION['session_login'] = 1;  
	$_SESSION['session_user'] = $found_user;

      echo $user . " now logged in ";
  
 } else {

    // username/password combo was not found in the database

    $message = "Username/password combination incorrect.";
    echo $message;  
}
} else { // Form has not been submitted.

 $username = "";
 $password = "";

}
?>
