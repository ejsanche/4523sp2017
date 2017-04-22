<!DOCTYPE html>
<html>
<body>
<center>
<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>Add a student to the Student table</P>
<hr>

<p> Enter the data you would like to send to the database in the following form: </p>

<br>


<form  action="function1.php" method="post">
  StudentID:<br>
  <input type="text" name="StudentID" value="1234"><br>
  Student Name:<br>
  <input type="text" name="StudentName" value="John Doe"><br>
  Major:<br>
  <input type="text" name="Major" value="Computer Science"><br><br>
  <input name="submit" type="submit" >
</form>
<hr>


<?php
if (isset($_POST['submit'])) 
{
    
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $function = escapeshellarg("1");
    $StudentID = escapeshellarg($_POST[StudentID]);
    $StudentName = escapeshellarg($_POST[StudentName]);
    $Major = escapeshellarg($_POST[Major]);
    
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar DBproject ' . $function .' ' . $StudentID . ' ' . $StudentName . ' ' . $Major;
  
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

