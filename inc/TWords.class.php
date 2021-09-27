<?php
class TWords
{
	private $_mDbh;
	private $_mTable;
	
    public function __construct()
	{
		global $dbh;
		$this->_mDbh = $dbh;
		$this->_mTable = "top_words";
	}    	
	
	public function AddWords($arr_post)
	{		
		$info	= '';
		$t_part = '';
		foreach($arr_post as $key => $value)
		{			
			$value	 = trim($value);					
			$info	.= " '$value',";
			$t_part	.= " $key,";				
		}
		
		$info	= substr($info, 0, -1);
		$t_part = substr($t_part, 0, -1);
			
		$query = "INSERT INTO ".$this->_mTable." (id, $t_part) VALUES (0, $info)"; 
		$sth = $this->_mDbh->prepare($query);
		$sth->execute();		
				
		$check['result'] = true;		
		return $check;
	}

	public function CountWords($string, $blog_date, $len = 4, $limit = 15)
	{
		$string = strtolower($string); 
		$words = str_word_count($string, 1); 
		
		$stop_words = [];
		foreach ($words as $key => $value)
			if(strlen($value) <= $len )
				$stop_words[] = $value;
		
		$words = array_diff($words, $stop_words); 
		$words = array_count_values($words); 
		arsort($words); 

		$all_words = array_slice($words, 0, $limit);		
		foreach ($all_words as $key => $value)
		{
			$line = ['b_word' => $key,	'b_count' => $value, 'b_date' => $blog_date];
			$this->AddWords($line);
		}
		
		return true;
	}	    
   	
	public function GetWords($from_date = '', $to_date  = '')
	{
		$query = "SELECT distinct * FROM ".$this->_mTable." WHERE 1 ";	
		if(!empty($from_date))
			$query .= " and b_date >= '".date("Y-m-d", strtotime($from_date))."' ";
		if(!empty($to_date))
			$query .= " and b_date <= '".date("Y-m-d", strtotime($to_date))."' ";
		$query .= " order by b_date desc,  b_count desc";
		$sth = $this->_mDbh->prepare($query);  

		$sth->execute(array(0));
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}		
}
?>