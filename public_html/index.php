<?php include_once('include/script/init.php'); ?>
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
		<div class="aside">
			<?php include_once('include/script/categories.php');?>
		</div><!-- här slutar aside -->
		<div class="entries">
			<article>
				<fieldset>
					<legend>ScrumMasters</legend>
						<?php
							include_once ('include/script/viewpost.php')
						?>	
				</fieldset>
			</article><!-- här slutar entrybox -->
		</div><!-- här slutar entries -->
</div><!-- här slutar wrapper -->
<footer class="footer">
	ScrumMasters <a href="index_fun.php">Doughnut</a> | 2011  
	<?php mysql_close($con); ?>
</footer><!-- här slutar footer -->
</body>
</html>
