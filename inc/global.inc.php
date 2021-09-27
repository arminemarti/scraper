<?
error_reporting(E_ALL ^ E_NOTICE);

define('ROOT', 'inc/');
require_once ROOT.'config.inc.php';
require_once ROOT.'DbConnect.class.php';
if (!$dbh = DbConnect::GetInstance()->mDbh) exit(1);

require_once  ROOT.'Blog.class.php';
require_once  ROOT.'TWords.class.php';
require_once  ROOT.'Page.class.php';
require_once  ROOT.'Scraper.class.php';
?>