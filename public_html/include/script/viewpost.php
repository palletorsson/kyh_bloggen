<?php
	$sql=sql_find_all("comments"); 
	$result_comments = mysql_query($sql, $con) or die(mysql_error());
	$all_rows = mysql_num_rows($result_comments); 

	//väljer tabelen och sorteras efter descending id

	$sql = mysql_query("SELECT * FROM blog_post WHERE public = 1") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);

	if (isset($_GET['cat'])){
	$sql = mysql_query("SELECT * FROM categories WHERE id = $_GET[cat]") or die(mysql_error());
	$cat_name = mysql_fetch_array($sql); 
	echo "<h4>Kategori: ".$cat_name["categori"]." </h4>";  
	}
	else 
	{
	echo "Bloggen har " .$num_rows. " inlägg och ". $all_rows. " kommentarer.<br />";	
	}
	if (isset($_GET['pagenumber'])){
	$startFromRow = ($_GET['pagenumber'] - 1) * 5; 
	} 
	else {
	$startFromRow = 0;  
	} 
	if(isset($_GET["cat"])){

		$sql = mysql_query("SELECT * FROM blog_post 
							LEFT JOIN user 
							ON blog_post.idnamn = user.id 
							WHERE category = $_GET[cat] AND public = 1 
							ORDER BY blog_post.id DESC") or die(mysql_error());

		$num_rows = mysql_num_rows($sql);

		$sql = mysql_query("SELECT * FROM blog_post 
							LEFT JOIN user 
							ON blog_post.idnamn = user.id 
							WHERE category = $_GET[cat] AND public = 1 
							ORDER BY blog_post.id DESC LIMIT $startFromRow, 5") or die(mysql_error());


	}
	else{
		$sql = mysql_query("SELECT * FROM blog_post 
							LEFT JOIN user 
							ON blog_post.idnamn = user.id 
							WHERE public = 1 
							ORDER BY blog_post.id DESC LIMIT $startFromRow, 5") or die(mysql_error());
	}	
	//går igensom tabelen och skriver ut posterna


	//går igensom databasen för att skiva ut alla inlägg
		while($result = mysql_fetch_array($sql)) {		
			echo "<h3>" . $result["title"] . "</h3>";
			echo "<h5>" . $result["datum"]." | <b>Av: " . $result["username"] . "</b></h5>";
			echo "<span class=\"postbody\">". $result["post"] . "</span><br/><br/>";
			
			
			if (!$result["id"] == 0) {
			// echo "Email: " . $result["email"] . "<br/>";
			// echo "Hemsida: " . $result["website"] . "<br/>";
			}

			if (isset($_SESSION["session_user"])) {
				if ($_SESSION["session_user"] == $result["idnamn"])
				{	
				?>						
				<table>
					<tr>
						<td>
				<form action="raderapost.php" method="post">
					<input name="radera" type="hidden" value=<?php echo $result[0]; ?> />
					<input type="submit" value="radera"/>
				</form>
				</td>
				<td>
				<form action="update.php" method="post">
					<input name="redigera" type="hidden" value=<?php echo $result[0]; ?> />
					<input type="submit" value="redigera"/>
				</form>
				</td>
				<td>
				</td>
				</tr>
				</table>				
				<?php
			}
		} 	
		$table_name = "blog_post";
		$id = $result[0];
		$post = sql_find_by_id($table_name, $id); 
		$result = mysql_query("SELECT * FROM comments WHERE blog_id = $id") or die(mysql_error());
		$num_rows_comments = mysql_num_rows($result);
		echo"<a href=comments.php?blog_id=".$id.">Kommentera ( " .$num_rows_comments. " )</a>";
		echo "<br/>";
		echo "<br/><hr />";
	}	
	echo "Sida:";
	$page = "0";

	for($i = 0; $i <= (($num_rows - 1) / 5); $i++){
		$page = $i + 1;
		if(isset($_GET["cat"])){
			echo "<a href=\"index.php?pagenumber=".$page."&cat=". $_GET["cat"] ."\"> ".$page."</a>";
		}
		else {	
			echo "<a href=\"index.php?pagenumber=".$page."\"> ".$page."</a>";
		}
	}

?>
