
<?
	$blog_post = 0;
 if (isset($_GET["blog_id"])){
	$blog_post = $_GET["blog_id"];
 }
	include_once ('dbconnect.php');
	mysql_select_db("scrummasterdb", $con);
	$sql="SELECT * FROM comments WHERE blog_id = '$blog_post'";
	$result = mysql_query($sql, $con) or die(mysql_error());

// 	$row_comment = mysql_fetch_assoc($result);
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["submit"]))
	{
		//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
		mysql_select_db("scrummasterdb", $con);
		$sql="INSERT INTO comments (author, body) VALUES ('$_POST[author]', '$_POST[body]')";
		//som kommer att vara blogginläggen.
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "tack för din kommentar";
		
		mysql_close($con);
	}
?>
<fieldset>
  <legend>Skriv en kommentar:</legend>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="commentform">
Ditt namn <input id="author" name="author" type="text" value="" size="30"/><br />
Kommentar <textarea id="comment" name="body" cols="45" rows="8" "></textarea><br />
<input type='hidden' name='comment_post_ID' value="id" id='comment_post_ID' />
<input name="submit" type="submit" id="submit" value="Kommetera" /> <br />						
</form> 
</fieldset>
Kommentarer: <br />
<?php	
	while ($row_comment = mysql_fetch_assoc($result)) { 
	echo "Kommentar av: ". $row_comment['author'] . "<br />";
	echo "\" ". $row_comment['body'] . " \"<br /><br />"; 
} ?> 
