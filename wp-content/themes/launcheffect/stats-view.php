<?php

	// stats-view.php
	
	$view = $_GET['view'];
	
	$results = getDetail($stats_table, referred_by, $view);
	
	if (!$results) : ?>
    	
	<h1>Stats: <a href="../stats">Sign-ups</a>: 
	
		<?php 
		$emails = getDetail($stats_table, code, $view); 
		foreach ($emails as $email) { 
			
			echo $email->email; 	
			
			if($email->referred_by != 'direct') { 

				echo '<span class="refby"> (referred by: <a href="?view=' . $email->referred_by . '">';
				
				$referred_by = $email->referred_by;
				$referrers = getDetail($stats_table, code, $referred_by);
				foreach ($referrers as $referrer) {
					echo $referrer->email; 
				}
			
				echo '</a>)</span>';
			}
		} ?>
			
	</h1>    	
	<p>Nothing to see here yet. <a href="../stats">Go to Sign-Ups Stats.</a></p>
	
	<?php else: ?>

	<h1>Stats: <a href="../stats">Sign-ups</a>: 
	
		<?php 
		$emails = getDetail($stats_table, code, $view); 
		foreach ($emails as $email) { 
			
			echo $email->email; 	
					
			if($email->referred_by != 'direct') { 

				echo '<span class="refby"> (referred by: <a href="?view=' . $email->referred_by . '">';
				
				$referred_by = $email->referred_by;
				$referrers = getDetail($stats_table, code, $referred_by);
				foreach ($referrers as $referrer) {
					echo $referrer->email; 
				}
			
				echo '</a>)</span>';
			}
		} ?>
			
	</h1> 

	<table id="individual">
		<thead>
			<th class="nosort">ID</th>
			<th class="nosort">Time</th>
			<th class="nosort">Converted To</th>
			<th class="nosort">IP</th>
		</thead>
		
		<?php foreach ($results as $result) : ?>
		
			<tr>
				<td><?php echo $result->id; ?></td>
				<td style="white-space:nowrap;"><?php echo $result->time; ?></td>
				<td><a href="?view=<?php echo $result->code; ?>"><?php echo $result->email; ?></a></td>
				<td><?php echo $result->ip; ?></td>
			</tr>	
	
		<?php endforeach; ?>
	</table> 
<?php endif; ?>