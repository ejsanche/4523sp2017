<!DOCTYPE html>
<html>
<body>

<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>3)</P>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
<p> Enter the data you would like to send to the database in the following form: </p>

<br>


<form  action="function3.php" method="POST">
  Student ID:<br>
  <input type="text" name="StudentID" value="1234"><br>
  Dept Code:<br>
  <input type="text" name="DeptCode" value="CSCE"><br>
  Course Number:<br>
  <input type="text" name="CourseNum" value="4523"><br><br>
  <input name="submit" type="submit" >
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    echo("Is set !");
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $function = escapeshellarg("3");
    $StudentID = escapeshellarg($_POST[StudentID]);
    $DeptCode = escapeshellarg($_POST[DeptCode]);
    $CourseNum = escapeshellarg($_POST[CourseNum]);
    
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar DBproject ' . $function .' ' . $StudentID . ' ' . $DeptCode . ' ' . $CourseNum;
     echo "<p>command: $command <p>";
    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";
 
    // run jdbc_insert_restaurant.exe
    system($command); 

    echo("executed")       ;  
    
}
?>
