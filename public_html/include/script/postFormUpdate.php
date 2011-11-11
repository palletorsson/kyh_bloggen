<?php	
$sql="SELECT * FROM categories";
$result_c = mysql_query($sql, $con) or die(mysql_error());
	//Här kommer posten att läggas till i databasen om en post är gjort
	
	if (isset($_POST["post"]))
	{
	if (isset($_POST["public"])) {
			$public = "1";
		} else {
			$public = "0";
		}
		//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
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
		$sql="UPDATE blog_post SET title='$title', post='$post', category='$category', public='$public' WHERE id='$id'";
		//som kommer att vara blogginläggen.
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "Nu har du uppdaterat posten";
		} else {
		// kolla vilken id som skickades 
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
	<h4>Title</h4><span class="title"><input type="text" name="title" value="<?php echo $row['title']; ?>"/></span>
	<h4>Bloginnehåll </h4><textarea name="post" cols="80" rows="12" style="resize: none;"><?php echo $row['post']; ?></textarea>
	<h4>Kategori </h4><span class="submit"> <select name="category">
	<?php while ($row_cat = mysql_fetch_assoc($result_c)) {  ?>
    <option value="<?php echo $row_cat['id']; ?>" ><?php echo $row_cat['categori']; ?></option>
    <?php } // TODO add sellected value ?> 
    </select></span><br/>
    <?php
    $isPublic = TRUE;
    if($row["public"] == 0){
		$isPublic = FALSE;
	}
    if(!$isPublic){
		?>
		kryssa i för att publicera nu <br /><input type="checkbox" name="public" value="1"  checked="yes"/> 
		<?php
	}
	?>
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<br/>
	<input type="submit" value="Uppdatera"/>

</form>
</fieldset>
<?php } ?>

