<?php
	session_start();
	include_once ('dbconnect.php');
	mysql_select_db("scrummasterdb", $con);
	$sql="SELECT * FROM categories";
	$result = mysql_query($sql, $con) or die(mysql_error());
	$row_cat = mysql_fetch_assoc($result);
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
		
		mysql_select_db("scrummasterdb", $con);
		if (isset( $_SESSION['session_user'])) {
			$tempUserName = $_SESSION['session_user'];
			$sql="INSERT INTO blog_post (post, namn) VALUES ('$_POST[post]', '$tempUserName')";
		}
		else{
			//Här säger vi åt den att inserta till vårat table blog_post och undervärdet post
			$sql="INSERT INTO blog_post (post, namn) VALUES ('$_POST[post]', 'Anonym')";	
		}
		
		//som kommer att vara blogginläggen.
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "Nu är din post inlagd";
		
		mysql_close($con);
	}
	
	else {
?>
<!--Här är formuläret med en textarea  -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<textarea name="post" cols="40" rows="12" style="resize: none;"></textarea>
<select name="cat">
<?php	do {  
?>
        <option value="<?php echo $row_cat['id']?>" ><?php echo $row_cat['categori']?></option>
        <?php
} while ($row_cat = mysql_fetch_assoc($result));
?></select>
	<br/>
	<input type="submit" value="post"/>
</form>
<?php
	}
?>
    

