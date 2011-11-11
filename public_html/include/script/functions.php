<?php 
$debug = "false"; 

// general for queries
// make the query
function result($query) {
global $con;
$result = mysql_query($query, $con) or die(mysql_error());
return $result;
}		
			
// specific queries
// sellect all 	
function sql_find_all($table_name) {
	$sql = sprintf("SELECT * FROM %s",
           mysql_real_escape_string($table_name));
	return $sql;
}

// get all rows
function all_rows($table_name) { 
	$query = sql_find_all($table_name);
	$result = result($query);
	$rows = mysql_fetch_assoc($result);
return $rows;  
}

// sellect by id 
function sql_find_by_id($table_name, $id) {
    $sql = sprintf("SELECT * FROM %s 
					WHERE id=%s 
					LIMIT 1",
           mysql_real_escape_string($table_name),
           mysql_real_escape_string($id));
	return $sql;
}

// get row by id 
function get_row_by_id($table_name, $id) { 
	$query = sql_find_by_id($table_name, $id);
	$result = result($query);
	$rows = mysql_fetch_assoc($result);
return $rows;  
}

// sellect comments by blog_id 
function sql_comments_on($blog_id) {
	 $sql = sprintf("SELECT * FROM comments 
					  WHERE blog_id=%s 
					  ORDER BY blog_id ASC",
			mysql_real_escape_string($blog_id)); 
	 return $sql;
}

// get comment on post
function get_comments_on($blog_id) { 
	$query = sql_comments_on($blog_id);
	$result = result($query);
	$rows = mysql_fetch_assoc($result);
return $rows;  
}

// sellect posts by category
function sql_find_by_categories($category_id) { 
	$sql = sprintf("SELECT * FROM blog 
					  WHERE category_id=%s 
					  ORDER BY created ASC",
			mysql_real_escape_string($category_id)); 
	 return $sql; 
}
// find by category
function find_by_categories($category_id) { 
	$query = sql_find_by_categories($category_id);
	$result = result($query);
	$rows = mysql_fetch_assoc($result);
return $rows;  
}
// update

// delete by id
 function delete($table_name, $id) {
  $sql = "DELETE FROM ".mysql_real_escape_string($table_name);
  $sql .= " WHERE id=". mysql_real_escape_string($id);
  $sql .= " LIMIT 1";
  return ($sql) ? true : false;
}


// check if the user and password is ok   
   function authenticate($username, $password) {
	global $con;
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
	
// Här väljer den värden ifrån tabellen users,  
    $sql  = "SELECT * FROM user ";
    $sql .= "WHERE username = '$username' ";
    $sql .= "AND password = '$password' ";
    $sql .= "LIMIT 1";
    $result = mysql_query($sql, $con) or die(mysql_error());
	
	$row = mysql_fetch_assoc($result);
	$username = $row['id'];
	return $username; 
    
   }
