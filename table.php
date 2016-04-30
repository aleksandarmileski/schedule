<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
		</tr>
	</thead>
	<tbody>                
		<?php        
		for ($i=1; $i < 10 ; $i++) { 
			echo "<tr><td class='hour'>".($i+8)."</td>";
			for ($j=1; $j < 6 ; $j++) { 		
				echo "<td class=".$schedule[$i][$j]['priority'].">".$schedule[$i][$j]['text']."</td>";

			}
			echo "</tr>";
		}
		?>
	</tbody>
</table>