<?php
    $con = mysql_connect("localhost","root","");
		
		//Fungerar inte anslutningen dödar vi den.
	if (!$con)
		{
	    	die('Could not connect: ' . mysql_error());
	    }
?>
