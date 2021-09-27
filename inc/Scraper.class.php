<?php

class Scraper
{
    protected $url = 'https://10web.io/blog/page/';
	
    public function handleRequest(): void
    {        
		$this->cliRequest();
    }

    /**
     * handle request coming from the cli
     * @return void
     */
    private function cliRequest(): void
    {
        global $argv;    
        $pageLimit = intval($argv[1]) ?? 1;

		$blog = new Blog();
		$tword = new TWords();		
		for ($i = 1; $i <= $pageLimit; )
		{
			$doc = new Page($this->url.$i++);
			$pages  = $doc->getPosts(); 
			foreach($pages as $page)
			{
				$blog->AddBlog($page); 
				$tword->CountWords($page['b_blog_text'], $page['b_created_date']);					
			}
		}
	}	
}
