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
   
        include('DB_connection.php'); // include database class
        if (isset($_POST['submit'])) 
        {
            $StudentID = escapeshellarg($_POST[StudentID]);
            $myDb_c = new DB_connection('ejsanche','21adonis94','ejsanche'); // create a new object, class php_db()
            
            //firt let verify if the student exists
            $query = "SELECT * FROM Student s where s.studentId =".$StudentID.";";
           
            $student = $myDb_c->query($query);
            if(!empty($student)){
                //sql query to be executed
                $query = "SELECT  deptCode, courseNum, title, creditHours FROM  Student s
                            NATURAL JOIN Enrollment
                            NATURAL JOIN Course
                            WHERE 
                            s.StudentId = " . $StudentID .";";
                //get result from the query
                $Enrrolment = $myDb_c->query($query);
                
                if(!empty($Enrrolment)){
                    echo'<caption><h2>Student Table</h2></caption>';
                    $myDb_c->printTable($Enrrolment);
                    echo '<hr>';

                }else{
                    echo 'The student with ID "'.$StudentID.'" is not enrroll in any clourses yet';
                    echo '<hr>';
                }
            //Student is not in the records    
            }else{
                echo'The student with ID "'.$StudentID.'" does not exist in our records';
                echo '<hr>';
            }
            
            $myDb->disconnect();
        }
        
?>


</body>
</center>
</html>


