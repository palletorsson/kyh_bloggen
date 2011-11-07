<?php	
session_start();
include_once ('dbconnect.php');	

	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
		mysql_select_db("scrummasterdb", $con);	
		//Fungerar inte anslutningen dödar vi den.
		if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
		$post = $_POST["post"]; 
		$id =  $_POST["id"];
		echo $id." - ".$post;
		$sql="UPDATE blog_post SET post='$post' WHERE id='$id'";
		//som kommer att vara blogginläggen.
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "Nu har du uppdaterat posten";
		mysql_close($con);
		
	} else {
		// kolla vilken id som skickades tex 3 
		mysql_select_db("scrummasterdb", $con);

		$id = $_POST["redigera"];
		// echo $id;
		$sql = "SELECT * FROM blog_post 
							WHERE id=$id
							LIMIT 1"; 
		$result = mysql_query($sql, $con) or die(mysql_error()); 
		$row = mysql_fetch_assoc($result);	
					echo $row['post'];
?>
<!--Här är formuläret med en textarea  -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<textarea name="post" cols="40" rows="12" style="resize: none;"><?php echo $row['post']; ?></textarea>
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<br/>
	<input type="submit" value="post"/>
</form>
<?php } ?>
    
