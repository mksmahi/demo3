<div>
	<h1>Indian Funds Tracking System</h1>
	<h3>Welcome! <em><?php echo $state; ?></em> <?php echo $role; ?></h3>
</div>
<!-- navigation bar -->
<ul>
	<li>Manage <?php echo $managing; ?> </li>
	<li>Allocate Funds</li>
	<li>Track Funds</li>
	<li>Generate Reports</li>
	<li>Settings</li>
	<li>Logout</li>
</ul>
</div>

<div>
<!-- list of all districts by funds -->
<table border="1">
	<tr>
		<th>Scheme</th>
		<th>Allocated Funds</th>
		<th>Allocation Date</th>
		<th>Used Funds</th>
	</tr>
	<?php

		foreach($db_data as $row)
		{
			echo "<tr>";
			echo "<td>".$row->scheme."</td>";
			echo "<td>".$row->allocated_funds."</td>";
			echo "<td>".$row->allocation_date."</td>";
			echo "<td>".$row->used_funds."</td>";
			echo "</tr>";
		}
	?>
</table>
</div>
