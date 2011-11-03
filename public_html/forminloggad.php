<!DOCTYPE HTML5>
<html>
<head>
	<?php
	include_once ('include/script/head.php');
	?>
</head>
<body>
<div class="wrapper">
	<header class="header">
		<?php include_once ('include/script/logo.php'); ?>
	</header> <!--här slutar header -->
	<nav class="nav">
		<?php
		include_once ('include/script/menu.php')
		?>
	</nav> <!--här slutar nax -->
	<div class="container">
		<div class="entries">
			<article class="entrybox">
				<form>
					<p>Skriv en ny bloggpost</p>
					
					<p>Rubrik: <input type="text" name="Title" placeholder="skriv din rubrik här"></p>
				 
				 	<p>Kategori: 
					<select name="kategori" size="1">
					<option value="Träning">Träning</option>
					<option value="Spel">Spel</option>
					<option value="Mode">Mode</option>
					</select></p>
					
					<p>Inlägg<br /><textarea name="message" rows="6" cols="25"></textarea></p>
					<input type="submit" value="Skicka"><input type="reset" value="Rensa">
				</form>  
			</article><!-- här slutar entrybox -->
		</div><!-- här slutar entries -->
		<aside class="categories">
			<?php include_once('include/script/categories.php');?>
			
		</aside><!-- här slutar categories -->	
	</div><!-- här slutar container -->
</div><!-- här slutar wrapper -->
<footer class="footer">
	<?php include_once ('include/script/footer.php'); ?>
</footer><!-- här slutar footer -->
</body>
</html>