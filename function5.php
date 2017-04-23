<!DOCTYPE html>
<html>
<body>
<center>
<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>View all courses from a given department</P>
<hr>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
<hr>
<P>Enter the data you would like to send to the database in the following form:<P>
<br>

<form  action="function5.php" method="post">
  Deparment Code:<br>
  <input type="text" name="deptcode" value="CSCE" maxlength = "5" required><br>
  <input name="submit" type="submit" >
</form>
<hr>



<?php

        include('DB_connection.php'); // include database class
        if (isset($_POST['submit'])) 
        {
            $deptcode = escapeshellarg($_POST[deptcode]);
            $myDb_c = new DB_connection('ejsanche','21adonis94','ejsanche'); // create a new object, class php_db()
            $query = "SELECT * FROM Course c WHERE c.deptCode = ".$deptcode.";";
            $Course = $myDb_c->query($query);
            if(!empty($Course)){
                echo'<caption><h2>Student Table</h2></caption>';
                $myDb_c->printTable($Course);
		echo '<hr>';

            }else{
                echo 'The deparment code "'.$deptcode.'" does not exists';
		echo '<hr>';
            }
            $myDb->disconnect();
        }
        

        
?>

</body>
</center>
</html>

