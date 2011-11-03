<?php
	//Här ansluter vi till mysql med ip localhost och användarnamn root, inget lösenord än så länge.
    $con = mysql_connect("localhost","root",""); 
	//Fungerar inte anslutningen dödar vi den.
	if (!$con)
	{
    	die('Could not connect: ' . mysql_error());
    }	
	//väljer databasen	
	mysql_select_db("scrummasterdb", $con);
	//väljer tabelen och sorteras efter descending id
	$sql = mysql_query("SELECT * FROM blog_post ORDER by id DESC");
	//går igensom tabelen och skriver ut posterna
	while($result = mysql_fetch_array($sql)) {
		echo $result[1] . " <br/><br/><br/>";
	}		
	//stänger serverkopplingen
	mysql_close($con);
?>