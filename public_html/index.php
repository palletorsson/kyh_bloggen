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
		</div><!-- här slutar categories -->
		<div class="entries">
			<article>
				<?php
					include_once ('include/script/viewpost.php')
				?>
			</article><!-- här slutar entrybox -->
		</div><!-- här slutar entries -->
</div><!-- här slutar wrapper -->
<footer class="footer">
	<?php include_once ('include/script/footer.php'); ?>
</footer><!-- här slutar footer -->
</body>
</html>
