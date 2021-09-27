<? 
	require_once 'header.php';
	$blogs = new Blog(); 
	$pages= $blogs->GetBlogs($from_date, $to_date);

	foreach ($pages as $row) { ?>
		<div>                                        	
			<h3><a href="<?=$row['b_page_url']?>" target="_blank"><?=$row['b_title']?></a></h3>
			<p>Author: <?=$row['b_creator']?></p> 
			<p>Scraped date: <?=$row['b_scrap_date']?></p>
			<p>Article date: <?=$row['b_created_date']?></p>
			<? if (!empty($row['b_image_src'])) { ?>
				<img src="<?=$row['b_image_src']?>" height="300">
			<? } ?>		
			<p><?=$row['b_blog_text']?></p>
		</div>			
	<? } ?>
	
</div>
</body>
</html>