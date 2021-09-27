<? 
	require_once 'header.php';
	$word = new TWords(); 
	$tops= $word->GetWords($from_date, $to_date);
?>
	<table width="70%" align="center">
		<tr>
			<th>Word</th>
			<th>Count</th>
			<th>Date</th>
		</tr>
	<?
		foreach ($tops as $row) { ?>
			<tr>                                        	
				<td><?=$row['b_word']?></td>
				<td><?=$row['b_count']?></td>
				<td><?=$row['b_date']?></td>
			</tr>			
		<? } ?>
	</table>
	
</div>
</body>
</html>