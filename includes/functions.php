<?php 
require_once('connection.php'); 
mysql_select_db($database_db, $conn_db);

$debug = "false"; 

// general for queries
// make the query
function result($query) {
global $conn_db;
$result = mysql_query($query, $conn_db) or die(mysql_error());
return $result;
}		
			
// specific queries
// sellect all 	
function sql_find_all($table_name) {
	$sql = sprintf("SELECT * FROM %s",
           mysql_real_escape_string($table_name));
	return $sql;
}
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

function find_by_categories($category_id) { 
	$query = sql_find_by_categories($category_id);
	$result = result($query);
	$rows = mysql_fetch_assoc($result);
return $rows;  
}
// update

// delete
 function delete($table_name, $id) {
  $sql = "DELETE FROM ".mysql_real_escape_string($table_name);
  $sql .= " WHERE id=". mysql_real_escape_string($id);
  $sql .= " LIMIT 1";
  return ($sql) ? true : false;
}

if ($debug == true "true") {
$b = "<br /><br />";  
// users 
$table_name = "users";
$users_rows = all_rows($table_name); 
print_r($users_rows);
echo $b; 
// posts
$table_name = "blog";
$blog_rows = all_rows($table_name); 
print_r($blog_rows);
echo $b; 
// comments by blog_id
$blog_id = "1";
$blog_comments = get_comments_on($blog_id); 
print_r($blog_comments);
echo $b; 
// comments by id
$table_name = "comments";
$id = 2;
$comment_rows = get_row_by_id($table_name, $id);  
print_r($comment_rows); 
echo $b; 
// blog post by categories
$category = 3;
$blog_by_cat = find_by_categories($category); 
print_r($blog_by_cat);
}
?>
