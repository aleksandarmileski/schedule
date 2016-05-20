<?php
$schedule=array();
$tasks=getTasks($_SESSION['userid']);
for ($i=1; $i < 10 ; $i++) {
	for ($j=1; $j < 6; $j++) {
		$schedule[$i][$j]=array('priority'=>'','text'=>'');
	}
}
foreach ($tasks as $task) {
	$schedule[$task['hour']][$task['day']]=array('priority'=>$task['priority'],'text'=>$task['context']);
}
?>
<table class="table">
	<thead>
		<tr>
			<th class='hour'></th>
			<th class='hour'>Monday</th>
			<th class='hour'>Tuesday</th>
			<th class='hour'>Wednesday</th>
			<th class='hour'>Thursday</th>
			<th class='hour'>Friday</th>
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