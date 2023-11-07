<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Export MySQL data to CSV file in CodeIgniter 3</title>

	
</head>
<body>

	<!-- Export Data -->
	<a href='<?= base_url() ?>impExpCSV/<?php echo $propertyData[0]['propertyid'] ?>'>Export</a><br><br>

	<!-- User Records -->
	<table border='1' style='border-collapse: collapse;'>
		<thead>
			<tr>
				<th>propertyid</th>
				<th>name</th>
				<th>Capacity</th>
				<th>Description</th>
				<th>PhotoURL</th>
			
				
			</tr>
		</thead>
		<tbody>
			<?php

			foreach($propertyData as $key=>$val){
				
				echo "<td>".$val['propertyid']."</td>";
				echo "<td>".$val['Name']."</td>";
				echo "<td>".$val['Capacity']."</td>";
				echo "<td>".$val['Description']."</td>";
				echo "<td>".$val['PhotoURL']."</td>";
				
				
				echo "</tr>";
			}
			?>
		</tbody>
	</table>

</body>
</html>