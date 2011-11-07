<?php
	session_start();
	//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
    include_once ('dbconnect.php');
	//väljer databasen	
	mysql_select_db("scrummasterdb", $con);
	//väljer tabelen och sorteras efter descending id
	$sql = mysql_query("SELECT * FROM blog_post ORDER by id DESC");
	//går igensom tabelen och skriver ut posterna
	while($result = mysql_fetch_array($sql)) {
		echo $result[2] . "<br/>";
		echo $result[1] . " <br/>";
		
		if ($_SESSION["session_user"] == $result[2]) {
			
		
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
		<form action="postFormUpdate.php" method="post">
			<input name="redigera" type="hidden" value=<?php echo $result[0]; ?> />
			<input type="submit" value="redigera"/>
		</form>
		</td>
		</tr>
		</table>
		
		
		
		<?php
		}
		echo "<br/>";
	}		
	//stänger serverkopplingen
	mysql_close($con);
?>