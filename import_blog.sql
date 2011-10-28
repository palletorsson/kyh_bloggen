--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0;
--
-- Some data for table `users`
--
INSERT INTO `users` VALUES (1,'username','pass','Jenny','Fisher');
--
-- Table structure for table `blog`
--
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(6) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `auther_id` int(6) NOT NULL,
  `category_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0;
--
-- Some default data for table `blog`
--
INSERT INTO `blog` VALUES (1,'First blogpost','Hello World, this is KYHblog','2011-11-01 11:30:39','1','3');
--
-- Table structure for table `comments`
--
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `blog_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blog_id` (`blog_id`)
) AUTO_INCREMENT=0;
--
-- Some default data for table `comments`
--
INSERT INTO `comments` VALUES (1,1,'2011-11-01 11:30:39','Palle','I comment the post, Yes I do'),(2,1,'2011-11-01 20:46:39','Sara','second+'),(3,1,'2011-11-01 21:08:58','Jon','Keep up the good work!');

--
-- Table structure for table `comments`
--
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `categori` varchar(255) NOT NULL,
   PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0;
--
-- Some default data for table `categories`
--
INSERT INTO `categories` VALUES (1,'Art'),(2,'War'),(3,'Love');

