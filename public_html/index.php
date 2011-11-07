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
				include_once ('include/script/viewpost.php');
				?>
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