<?php
	$sql="SELECT * FROM categories";
	$result = mysql_query($sql, $con) or die(mysql_error());
	$row_cat = mysql_fetch_assoc($result);
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		if (isset($_POST['public'])) {
			$public = "1";
		} else {
			$public = "0";
		}
		if (isset( $_SESSION['session_user'])) {
			$tempUserName = $_SESSION['session_user'];
			$sql="INSERT INTO blog_post (post, idnamn, title, category, public) VALUES ('$_POST[post]', '$tempUserName', '$_POST[title]', '$_POST[category]', '$public')";
		}
		else{
			//Här säger vi åt den att inserta till vårat table blog_post och undervärdet post
			$sql="INSERT INTO blog_post (post, idnamn, title, category, public) VALUES ('$_POST[post]', '0', '$_POST[title]', '$_POST[category]', '$public')";	
		}
		
		//som kommer att vara blogginläggen.
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "Tack för ditt inlägg!";
	}
	
	else {
?>
<!--Här är formuläret med en textarea  -->
<fieldset>
  <legend>Publicera ett blogginlägg:</legend>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<h4>Rubrik</h4><span class="title"><input type="text" name="title" /></span><br />
	<h4>Blogginnehåll</h4><textarea name="post" cols="80" rows="12" style="resize: none;" class="textarea" ></textarea><br />
	<h4>Kategori</h4><span class="submit"><select name="category">
	<?php	do {  ?>
    <option value="<?php echo $row_cat['id']?>" ><?php echo $row_cat['categori']?></option>
    <?php } while ($row_cat = mysql_fetch_assoc($result));?>
    </select></span><br/>
    <input type="checkbox" name="public" value="1"  checked="yes"/> kryssa i för att publicera nu <br />
	<input type="submit" value="Publicera" class="submit" />
	</form>
</fieldset>	
<?php } ?>
    

