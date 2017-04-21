<!DOCTYPE html>
<html>
<body>

<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>2)</P>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
<p> Enter the data you would like to send to the database in the following form: </p>

<br>


<form  action="function2.php" method="POST">
  Dept Code:<br>
  <input type="text" name="DeptCode" value="CSCE"><br>
  Course Number:<br>
  <input type="text" name="CourseNum" value="4523"><br>
  Title:<br>
  <input type="text" name="Title" value="Database Management"><br>
  Credit Hours: <br>
  <input type="text" name="Credit" value="3"><br><br>
  <input name="submit" type="submit" >
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $function = escapeshellarg("2");
    $DeptCode = escapeshellarg($_POST[DeptCode]);
    $CourseNum = escapeshellarg($_POST[CourseNum]);
    $Title = escapeshellarg($_POST[Title]);
    $Credit = escapeshellarg($_POST[Credit]);
    
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar DBproject ' . $function .' ' . $DeptCode . ' ' . $CourseNum . ' ' . $Title . ' ' .$Credit;
     echo "<p>command: $command <p>";
    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";
 
    // run jdbc_insert_restaurant.exe
    system($command); 

    echo("executed")       ;  
    
}
?>


