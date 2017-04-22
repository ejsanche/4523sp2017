<!DOCTYPE html>
<html>
<body>

<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>4)</P>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>


<br>



<table border="1" align="left"  >
	<caption><h2>Student Table</h2></caption>
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Major</th>
			</tr>
		</thead>




<?php

    include 'Conexion.php';
	//query
    $query = "SELECT * FROM Student;";

    $records = mysql_query($query) or die (mysql_error());
    $colunms = array();
	
    while($result =mysql_fetch_array($records , MYSQL_ASSOC)){
        $colunms[] = $result;
    }

   foreach($colunms as $c)
	{
		$studentId=$c['studentId'];
		$studentName = $c['studentName'];
		$major= $c['major'];
		
?>
		<tbody>
				<tr>
					<td><?php echo $studentId;?></td>
					<td><?php echo $studentName;?></td>
					<td><?php echo $major;?></td>
                </tr> 
		</tbody>
		<?php
	}
	
?>
</table>
</body>
</html>

