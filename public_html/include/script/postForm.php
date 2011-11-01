<?php
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		$con = mysql_connect("localhost","root","");
		//kommentar här
		if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
		
		mysql_select_db("scrummasterdb", $con);
		
		$sql="INSERT INTO blog_post (post) VALUES ('$_POST[post]')";	
		//kommentar här
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "Nu är din post inlagd";
		
		mysql_close($con);
	}
	
	else {
?>
<!--kommentar här -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<textarea name="post" cols="40" rows="12" style="resize: none;"></textarea>
	<br/>
	<input type="submit" value="post"/>
</form>
<?php
	}
?>
    

