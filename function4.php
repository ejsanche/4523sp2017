<!DOCTYPE html>
<html>
<body>
<center>
<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>View all students</P>
<hr>
<br>

<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
<hr>
<?php
	
	
	include('DB_connection.php'); // include database class
	$myDb_c = new DB_connection('ejsanche','21adonis94','ejsanche'); // create a new object, class php_db()
	$query = "SELECT * FROM Student;";
	
	$Student = $myDb_c->query($query);
	echo '<caption><h2>Student Table</h2></caption>';
	$myDb_c->printTable($Student);
	echo '<hr>';
	$myDb->disconnect();
?>


</body>
</center>
</html>

