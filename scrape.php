<?
	require_once 'inc/global.inc.php';

	$scrap = new Scraper();
	$scrap->handleRequest();
	
	echo 'OK';
?>
