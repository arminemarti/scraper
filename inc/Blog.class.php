<?php
class Blog
{
	private $_mDbh;
	private $_mTable;
	
    public function __construct()
	{
		global $dbh;
		$this->_mDbh = $dbh;
		$this->_mTable = "blog_pages";
	}    	
	
	public function AddBlog($arr_post)
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
		
		$query_max = "SELECT max(ID) as max_id FROM ".$this->_mTable;
		$sth = $this->_mDbh->prepare($query_max);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		$insert_id = (int)$result['max_id'];
		
		$check['insert_id'] = $insert_id;
		
		return $check;
	}	    

	public function GetBlogs($from_date = '', $to_date  = '')
	{
		$query = "SELECT distinct * FROM ".$this->_mTable." WHERE 1 ";	
		if(!empty($from_date))
			$query .= " and b_created_date >= '".date("Y-m-d", strtotime($from_date))."' ";
		if(!empty($to_date))
			$query .= " and b_created_date <= '".date("Y-m-d", strtotime($to_date))."' ";
		$query .= " order by id desc ";
		
		$sth = $this->_mDbh->prepare($query);

		$sth->execute(array(0));
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}	
}
?>