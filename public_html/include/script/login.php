<?php 
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
<fieldset>
	<legend>Logga in:</legend>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		 <table>
		   <tr>
			 <td>Användarnamn:</td>
			 <td>
			   <input type="text" name="username" maxlength="30" placeholder="Användarnamn" />
			 </td>
		   </tr>
		   <tr>
			 <td>Lösenord:</td>
			 <td>
			   <input type="password" name="password" maxlength="30" placeholder="*******" />
			 </td>
		   </tr>
		   <tr>
			 <td colspan="2">
			   <input type="submit" name="submit" value="Login" />
			 </td>
		   </tr>
		 </table>
		</form>
</fieldset>	
<?php
}
?>
<?php 
if (isset($_POST['submit'])) { // Form has been submitted.
	
 $username = trim($_POST['username']);
 $password = trim($_POST['password']);

 // Check database to see if username/password exist whith funnction authenticate()
 $found_user = authenticate($username, $password);
  
 // check if  function authenticate got a name and continue
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
