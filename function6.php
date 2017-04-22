<!DOCTYPE html>
<html>
<body>
<center>
<p>Jason & Adonis's</p>
<img src="databaseproject.png" alt="Database" style="width:204px;height:186px;">
<hr>
<P>View all courses for a given student</P>
<hr>
<form action="main.php">
    <input type="submit" value="Back to Index" />
</form>
<hr>
<P>Enter the data you would like to send to the database in the following form:<P>
<br>

<form  action="function6.php" method="post">
  StudentID:<br>
  <input type="text" name="StudentID" value="1234"><br>
  <input name="submit" type="submit" >
</form>
<hr>

<?php
    include 'Conexion.php';
    if (isset($_POST['submit'])) 
        {
             $StudentID = escapeshellarg($_POST[StudentID]);
             
             $query = "SELECT  deptCode, courseNum, title, creditHours FROM  Student s
                        NATURAL JOIN Enrollment
                        NATURAL JOIN Course
                        WHERE 
                        s.StudentId = " . $StudentID .";";
                   
            $records = mysql_query($query) or die (mysql_error());
            $colunms = array();
            
            while($result =mysql_fetch_array($records , MYSQL_ASSOC)){
                $colunms[] = $result;
            }
            
            if(!empty($colunms)){
                ?>
                <table border="1" align="center"  >
	                <caption><h2>Student Table</h2></caption>
                    <thead>
                        <tr>
                            <th>Deparment code</th>
                            <th>Course Number</th>
                            <th>Title</th>
                            <th>Credit Hours</th>
                        </tr>
                    </thead>
            <?php
                foreach($colunms as $c)
	            {
                    $deptcode=$c['deptCode'];
                    $courseNum = $c['courseNum'];
                    $title= $c['title'];
                    $creditHours = $c['creditHours'];
                    
            ?>
                    <tbody>
                            <tr>
                                <td><?php echo $deptcode;?></td>
                                <td><?php echo $courseNum;?></td>
                                <td><?php echo $title;?></td>
                                <td><?php echo $creditHours;?></td>
                            </tr> 
                    </tbody>
            <?php
                }
            ?>
                </table>
            <?php
            
            }else{
                echo("This student is not Enrolled in any courses yet");
            }
            
        }
        
?>


</body>
</center>
</html>


