<?php
	$sql="SELECT * FROM comments";
	$result_comments = mysql_query($sql, $con) or die(mysql_error());
	$all_rows = mysql_num_rows($result_comments); 

	//väljer tabelen och sorteras efter descending id
	if(isset($_GET["cat"])){
		$sql = mysql_query("SELECT * FROM blog_post LEFT JOIN user ON blog_post.idnamn = user.id WHERE category = $_GET[cat] ORDER BY blog_post.id DESC") or die(mysql_error());
	}
	else{
		$sql = mysql_query("SELECT * FROM blog_post LEFT JOIN user ON blog_post.idnamn = user.id ORDER BY blog_post.id DESC") or die(mysql_error());
		$num_rows = mysql_num_rows($sql);
		echo "Det finns " .$num_rows. " inlägg i databasen och ". $all_rows. " kommentarer <br /><br /><br />";
	}	
	//går igensom tabelen och skriver ut posterna
	
	
	//går igensom databasen för att skiva ut alla inlägg
		while($result = mysql_fetch_array($sql)) {		
			echo $result["title"] . "<br/>";
			echo $result["post"] . " <br/>";
			echo $result["datum"] . "<br/><br/>";
			echo "<b>Av: " . $result["username"] . "<br/></b>";
			if (!$result["id"] == 0) {
			echo "Email: " . $result["email"] . "<br/>";
			echo "Hemsida: " . $result["website"] . "<br/>";
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
					<?php
					echo"<a href=comments.php>Kommentera</a>";
					?>
				</td>
				</tr>
				</table>				
				<?php
			}
		}
		echo "<br/>";
		echo "<hr size='1' color='#000000' width='75%'><br/>";
	}	
?>
