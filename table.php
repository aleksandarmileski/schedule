<?php
$schedule=array();
if (isset($_SESSION['table_userid'])){
	$tasks=getTasks($_SESSION['table_userid']);
}else{
	$tasks=getTasks($_SESSION['userid']);
}
for ($i=1; $i < 10 ; $i++) {
	for ($j=1; $j < 6; $j++) {
		$schedule[$i][$j]=array('taskid'=>'','day'=>'','hour'=>'','priority'=>'','text'=>'');
	}
}
foreach ($tasks as $task) {
	$schedule[$task['hour']][$task['day']]=array('taskid'=>$task['id'],'day'=>$task['day'],'hour'=>$task['hour'],'priority'=>$task['priority'],'text'=>$task['context']);
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
				echo "<td class=".$schedule[$i][$j]['priority'].">
				<a href='#' tid=".$schedule[$i][$j]['taskid']." tnm='".$schedule[$i][$j]['text']."' tpr=".$schedule[$i][$j]['priority']." data-placement='auto top' data-toggle='popover' >"
					.$schedule[$i][$j]['text'].
					"</a></td>";
			}
			echo "</tr>";
		}
		?>
	</tbody>
</table>