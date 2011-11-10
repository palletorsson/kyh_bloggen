<?php
	$sql="SELECT * FROM categories";
	$result = mysql_query($sql, $con) or die(mysql_error());
	$row_cat = mysql_fetch_assoc($result);
	//Här kommer posten att läggas till i databasen om en post är gjort
	if (isset($_POST["post"]))
	{
		if (isset( $_SESSION['session_user'])) {
			$tempUserName = $_SESSION['session_user'];
			$sql="INSERT INTO blog_post (post, idnamn, title, category) VALUES ('$_POST[post]', '$tempUserName', '$_POST[title]', '$_POST[category]')";
		}
		else{
			//Här säger vi åt den att inserta till vårat table blog_post och undervärdet post
			$sql="INSERT INTO blog_post (post, idnamn, title, category) VALUES ('$_POST[post]', '0', '$_POST[title]', '$_POST[category]')";	
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
	Rubrik<br /><span class="title"><input type="text" name="title" placeholder="Mitt blogginlägg" /></span><br />
	Blogginnehåll<br /><textarea name="post" cols="40" rows="12" style="resize: none;" class="textarea" placeholder="Min bloggtext." ></textarea><br />
	Kategori: <span class="submit"><select name="category">
	<?php	do {  ?>
    <option value="<?php echo $row_cat['id']?>" ><?php echo $row_cat['categori']?></option>
    <?php } while ($row_cat = mysql_fetch_assoc($result));?>
	</select></span><br/><br/>
	<input type="submit" value="Publicera" class="submit" />
	</form>
</fieldset>	
<?php } ?>
    

