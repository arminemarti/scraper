<?php

class Page
{
    private $DOM;   

    public function __construct(string $page_url)
    {
        $this->DOM = new \DOMDocument;        
        @$this->DOM->loadHTML(file_get_contents($page_url));        
    }

    public function getPosts(): array
    {
        $posts = [];
        $tags = $this->DOM->getElementsByTagName('div');

		foreach ($tags as $tag) 
		{
		  $type = trim($tag->getAttribute('class'));    
		  if (!empty($type) && strpos($type, 'type-post') != false) 
		  {	
			   $date = $tag->getElementsByTagName('time')->item(0);	
			   $name =  trim($date->parentNode->textContent);				   
			   $name = substr($name, 0, strpos($name, "\n", 1));			   
			   $h2 = $tag->getElementsByTagName('h2')->item(0);			  
			   $a = $h2->getElementsByTagName('a')->item(0);
			   $href = trim($a->getAttribute('href'));
			   $img = $tag->getElementsByTagName('img')->item(0);	
			   $src = trim($img->getAttribute('src'));	
			   if(empty($src))
					$src = trim($img->getAttribute('data-src'));	

			   $classname = 'entry-summary';		   
			   $nodes = $tag->getElementsByTagName('div');
			   
			   foreach ($nodes  as $node) 
			   {
				  $content = trim($node->getAttribute('class')); 
				  if (!empty( $content) &&  $content == $classname ) 				
					$text = trim($node->textContent);				
			   }		   
				   
			   $posts[] = [
							'b_title' => trim($h2->textContent), 
							'b_page_url' => $href, 
							'b_created_date' => date("Y-m-d", strtotime($date->textContent)), 
							'b_creator' => $name,
							'b_image_src' => $src,
							'b_blog_text' => $text,						
						];			  
			}            
		}

        return $posts;
    }   
}