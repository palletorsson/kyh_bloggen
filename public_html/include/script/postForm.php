<?php
session_start();
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
		$con = mysql_connect("localhost","root","");
		
		//Fungerar inte anslutningen dödar vi den.
		if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
		
		mysql_select_db("scrummasterdb", $con);
		echo $_SESSION['session_user'];
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
	<br/>
	<input type="submit" value="post"/>
</form>
<?php
	}
?>
    

