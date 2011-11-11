<?php 
if (isset($_SESSION["session_user"])) { 
$sql = "SELECT * FROM user WHERE id = $_SESSION[session_user]";  
$result = mysql_query($sql, $con) or die(mysql_error());
$row_name = mysql_fetch_assoc($result); 
$user = $row_name["username"]; 
} else {
$user = ""; 	
	}
?>
<ul>
	<li><a href="index.php">Hem</a></li>
	<li><a href="write.php">Skriv Post</a></li>
	<li><a href="loggin.php">Logga in/Logga ut</a></li>
	<?php if (isset($_SESSION["session_user"])) { ?>
	<li><a href="drafts.php">Draft</a></li>
	<li class="right"><?php echo "Användare: ". $user. " "; ?></li>
	<?php } ?>
</ul>		
	
