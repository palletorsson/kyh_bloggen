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
		<?php include_once('include/script/menu.php');?>		
	</nav> <!--här slutar nax -->
		<div class="aside">
			<?php include_once('include/script/categories.php');?>
		</div><!-- här slutar categories -->
		<div class="entries">
			<div class="post-anonym">
				<?php
					include_once ('include/script/postForm.php');
				?>
			</div><!-- här slutar post-anonym -->
		</div><!-- här slutar entries -->
	</div><!-- här slutar container -->
</div><!-- här slutar wrapper -->
<footer class="footer">
	<?php include_once('include/script/footer.php'); ?>
</footer><!-- här slutar footer -->
</body>
</html>