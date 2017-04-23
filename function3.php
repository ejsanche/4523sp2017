<!DOCTYPE html>
<html>
<body>
<center>
<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>Add an application to the Enrollment table</P>
<hr>
<p> Enter the data you would like to send to the database in the following form: </p>

<br>


<form  action="function3.php" method="POST">
  Student ID:<br>
  <input type="number" name="StudentID" value="1234" maxlength = "9" required><br>
  Dept Code:<br>
  <input type="text" name="DeptCode" value="CSCE" maxlength = "5" required><br>
  Course Number:<br>
  <input type="number" name="CourseNum" value="4523" maxlength = "5" required><br><br>
  <input name="submit" type="submit" >
</form>

<hr>
<?php
if (isset($_POST['submit'])) 
{
 
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $function = escapeshellarg("3");
    $StudentID = escapeshellarg($_POST[StudentID]);
    $DeptCode = escapeshellarg($_POST[DeptCode]);
    $CourseNum = escapeshellarg($_POST[CourseNum]);
    
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar DBproject ' . $function .' ' . $StudentID . ' ' . $DeptCode . ' ' . $CourseNum;

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);

 
    // run jdbc_insert_restaurant.exe
    system($command); 

    
}
?>

<hr>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
</body>
</center>
</html>
