<?php
    $con = mysql_connect("localhost","root","inget1");
		
		//Fungerar inte anslutningen dödar vi den.
	if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
?>
