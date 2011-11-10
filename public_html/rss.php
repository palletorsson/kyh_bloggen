<?php  
include_once ('include/script/init.php');
header('Content-Type: text/xml');  
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>"  ?>
<rss version="2.0">  
<channel>  
<title>KYH blogg</title>  
<description>The KYH Blogg</description>  
<link>/</link>
<?php 
$sql = "SELECT * FROM blog_post ORDER by id DESC LIMIT 5";    
$result = mysql_query($sql, $con) or die(mysql_error());  
while ($blog = mysql_fetch_array($result)) {       
?> 
       <item>  
          <title><?php echo $blog['title']; ?></title>  
          <description><![CDATA[<?php echo $blog['post']; ?> ]]></description>  
          <link>http://www.mysite.com/detail.php?id=<?php echo $blog['id']; ?></link>  
          <pubDate><?php echo $blog['datum']; ?> GMT</pubDate>  
      </item> 
<?php }  ?>
</channel> 
</rss>
