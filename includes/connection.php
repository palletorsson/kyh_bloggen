<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db = "localhost";
$database_db = "database_name";
$username_db = "database_username";
$password_db = "database_password";
$connect_db = mysql_connect($hostname_db, $username_db, $password_db) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
