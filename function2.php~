<!DOCTYPE html>
<html>
<body>

<center><p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P> Add a course to the Course table</P>
<hr>
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

<hr>


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



