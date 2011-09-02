<?php
/*
Template Name: Stats
*/

get_header(); 

include('functions/le-functions.php');

?>

<div id="stats-wrapper">

	<?php 
	
	if (isset($_GET['view'])) { 
		
		include('stats-view.php'); 
	
	} else { 
	
	?>

	<h1>Stats: Sign-Ups</h1>

	<a href="../wp-content/themes/launcheffect/csv.php?table=data" target="_blank" class="get-csv-button">&darr; Download CSV</a>

	<table id="signups">
		<thead>
		
			<?php 
				if (isset($_GET['ad'])) { 
					$ad = mysql_real_escape_string($_GET['ad']);
					$ad = ($ad == 'desc') ? 'asc' : 'desc';	
				} else { $ad = 'desc'; }
			?>
		
			<th><a href="../stats/?order=id&ad=<?php echo $ad; ?>">ID</a></th>
			<th><a href="../stats/?order=time&ad=<?php echo $ad; ?>">Time</a></th>
			<th><a href="../stats/?order=mail&ad=<?php echo $ad; ?>">Email</a></th>
			<th><a href="../stats/?order=v&ad=<?php echo $ad; ?>">Visits</a></th>
			<th><a href="../stats/?order=conv&ad=<?php echo $ad; ?>">Conversions</a></th>
			<th class="nosort">Conversion Rate</th>
			<th><a href="../stats/?order=ip&ad=<?php echo $ad; ?>">IP</a></th>
		</thead>
		
		<?php 
		
		// SET UP PAGINATION
		$totalcount = countData($stats_table, email);
		$numrows = $totalcount;
		
		$rowsperpage = 20;
		$totalpages = ceil($numrows / $rowsperpage);
		
		if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
			$currentpage = (int) $_GET['currentpage'];
		} else {
		  	$currentpage = 1;
		}
		
		if ($currentpage > $totalpages) {
			$currentpage = $totalpages;
		}
		
		if ($currentpage < 1) {
			$currentpage = 1;
		}
		
		$offset = ($currentpage - 1) * $rowsperpage;
		
		// GET DATA
		
		if (isset($_GET['order'])) { 
		
			$order = mysql_real_escape_string($_GET['order']);
			$ad = mysql_real_escape_string($_GET['ad']);
			
			switch ($order) {
				case 'id':
					$order_name = 'id';
					break;
				case 'time':
					$order_name = 'id';
					break;
				case 'mail':
					$order_name = 'email';
					break;
				case 'ip':
					$order_name = 'ip';
					break;
				case 'v':
					$order_name = 'visits';
					break;
				case 'conv':
					$order_name = 'conversions';
					break;
			}
			
			$results = getPaginatedData($stats_table, $order_name, $ad, $offset, $rowsperpage);
			
		} else {
			
			$order = 'time';
			$ad = 'desc';
			$results = getPaginatedData($stats_table, id, desc, $offset, $rowsperpage);

		}
		
		foreach ($results as $result) : 
		
		?>
		
		<tr>
			<td><?php echo $result->id; ?></td>
			<td style="white-space:nowrap;"><?php echo $result->time; ?></td>
			<td><a href="?view=<?php echo $result->code; ?>"><?php echo $result->email; ?></a></td>
			<td><?php if($result->visits != 0) { echo $result->visits; }?></td>
			<td><?php if($result->conversions != 0) { echo $result->conversions; } ?></td>
			<td><?php if($result->visits + $result->conversions != 0 ) { $conversionRate = ($result->conversions/$result->visits) * 100; echo round($conversionRate, 2) . '%'; } ?></td>
			<td><?php echo $result->ip; ?></td>
		</tr>	
	
		<?php endforeach;?>
		
	</table>
	
	<ul class="pagination">
		
		<?php 
		
		
		// BUILD PAGINATION
		$range = 8;
		
		if ($currentpage > 1) {	   
		   echo "<li><a href='?order=$order&ad=$ad&currentpage=1'>&laquo; First</a></li>";	   
		   $prevpage = $currentpage - 1;
		   echo "<li><a href='?order=$order&ad=$ad&currentpage=$prevpage' class='prev'>&lsaquo; Prev</a></li>";
		}
		
		for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
		   if (($x > 0) && ($x <= $totalpages)) { 
		      if ($x == $currentpage) {
		         echo "<li><a href=\"#\" class='currentpage'>$x</a></li>";     
		      } else {	         
		         echo "<li><a href='?order=$order&ad=$ad&currentpage=$x'>$x</a></li>";
		      } 
		   } 
		}
		     
		if ($currentpage != $totalpages) {
		   $nextpage = $currentpage + 1;
		   echo "<li><a href='?order=$order&ad=$ad&currentpage=$nextpage' class='next'>Next &rsaquo;</a></li>";
		   echo "<li><a href='?order=$order&ad=$ad&currentpage=$totalpages'>Last &raquo;</a></li>";
		} 
			
		?>
	
	</ul>
	
<?php } ?>

</div>

<?php get_footer(); ?>