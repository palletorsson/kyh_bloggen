<!DOCTYPE HTML>
<html>
<head>
	<?php include_once ('include/script/head.php');?>
</head>
<body>	
<div class="wrapper">
	<header class="header">
			<?php include_once ('include/script/logo.php'); ?>
	</header> <!--här slutar header -->
	<nav class="nav">
		<?php include_once ('include/script/menu.php');?>
	</nav> <!--här slutar nax -->
	<div class="container">
		<div class="entries">
			<article class="entrybox">
				<?php 				
				include_once ('include/script/dbconnect.php');	
				//Väljer databasen
				mysql_select_db("scrummasterdb", $con);	
				//Anropa en query som daderaR bort inlägget		
				$sql ="DELETE FROM blog_post WHERE id = $_POST[radera]";
				if (!mysql_query($sql))
		  		{
		  			die('Error: ' . mysql_error());
				}
				echo "Nu har du raderat ett inlägg<br />";
				echo "<a href=index.php>Tillbaka till startsida</a>";
				mysql_close($con);  				
				?>
			</article><!-- här slutar entrybox -->
		</div><!-- här slutar entries -->
		</aside><!-- här slutar categories -->	
	</div><!-- här slutar container -->
</div><!-- här slutar wrapper -->
<footer class="footer">
	Design by: ScrumMasters &copy;2011
</footer><!-- här slutar footer -->
</body>
</html>

<?php
  	