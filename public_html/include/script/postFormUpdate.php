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
		mysql_select_db("scrummasterdb", $con);	// detta skulle vi kunna sätta i en funtion 
		//Fungerar inte anslutningen dödar vi den.
		if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
		$title =  $_POST["title"];	
		$post = $_POST["post"]; 
		$category =  $_POST["category"];
		$id =  $_POST["id"];
		
		echo $id." - ".$post;
		$sql="UPDATE blog_post SET title='$title', post='$post', post='$category' WHERE id='$id'";
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
		
		$sql = "SELECT * FROM blog_post 
							WHERE id=$id
							LIMIT 1"; 
		$result = mysql_query($sql, $con) or die(mysql_error()); 
		$row = mysql_fetch_assoc($result);	
?>
<!--Här är formuläret med en textarea  -->
<fieldset>
  <legend>Uppdatera blogposten:</legend>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Title <span class="title"><input type="text" name="title" value="<?php echo $row['title']; ?>"/></span><br />
	Bloginnehåll <textarea name="post" cols="40" rows="12" style="resize: none;"><?php echo $row['post']; ?></textarea><br />
	Kategori <span class="submit"> <select name="category" charset="UTF-8">
	<?php while ($row_cat = mysql_fetch_assoc($result)) {  ?>
    <option value="<?php echo $row_cat['id']; ?>" ><?php echo $row_cat['category']; ?></option>
    <?php } // TODO add sellected value ?> 
    </select></span><br/>
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<br/>
	<input type="submit" value="post"/>
</form>
</fieldset>
<?php } ?>
    
