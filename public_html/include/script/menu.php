<?php 
$sql = "SELECT * FROM user WHERE id = $_SESSION[session_user]";  
$result = mysql_query($sql, $con) or die(mysql_error());
$row_name = mysql_fetch_assoc($result); 
$user = $row_name["username"]; 
?>
<ul>
	<li><a href="index.php">Startsida</a></li>
	<li><a href="write.php">Skriv Post</a></li>
	<li><a href="loggin.php">Logga in/Logga ut</a></li>
	<span class="float_right"><?php echo $user; ?></span>
</ul>		
