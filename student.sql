--Student table: StudentId , StudentName, Major
CREATE TABLE Student
(
    studentId char(9) PRIMARY KEY,
    studentName char(32) NOT NULL,
    major char(32) NOT NULL
);

-- Course: DeptCode, CourseNum, Title, CreditHours

CREATE TABLE Course
(
    
    deptCode char(5) NOT NULL, 
    courseNum char(5) NOT NULL,
    title char (32) NOT NULL,
    creditHours int NOT NULL,
    PRIMARY KEY(deptCode,courseNum)
);

-- Enrollment: StudentID, DeptCode, CourseNum
CREATE TABLE Enrollment
(
    studentId char(9) ,
    deptCode char(5) NOT NULL ,
    courseNum char(5) NOT NULL,
    FOREIGN KEY (studentId) REFERENCES Student(studentId) ON DELETE CASCADE,
    FOREIGN KEY (deptCode,courseNum) REFERENCES Course (deptCode,courseNum)

)ENGINE=InnoDB;


CREATE TABLE Course
(
    
    deptCode char(5) NOT NULL, 
    courseNum char(5) NOT NULL,
    title char (32) NOT NULL, 
    creditHours int NOT NULL,
    PRIMARY KEY(deptCode,courseNum)
);



-- QUERIES 
--1) Add a student to the Student table

INSERT INTO Student VALUES (0);
--2) Add a course to the Course table

INSERT INTO Course VALUES( 0 );
--3) Add an application to the Enrollment table
INSERT INTO Enrollment VALUES( 0);
--4) View all students (display all attributes in the table for each student)
SELECT * FROM Student;


--5) View all courses from a given department (display all attributes in the Course table for each course)
SELECT * FROM Course c WHERE c.deptCode = "CSCE";

--6) View all courses for a given student (given the StudentID, display all attributes in the Course table for each course)
SELECT  deptCode, courseNum, title, creditHours FROM  Student s
NATURAL JOIN Enrollment
NATURAL JOIN Course
WHERE 
s.StudentId = '1234';


SELECT deptCode, courseNum, title, creditHours FROM Course c, Student s, Enrollment e WHERE e.studentId = s.studentId 
AND c.deptCode = e.deptCode
AND c.courseNum = e.courseNum
AND s.StudentId = '1234';

SELECT  title, creditHours FROM Course c, Student s, Enrollment e WHERE e.studentId = s.studentId 
AND c.deptCode = e.deptCode
AND c.courseNum = e.courseNum
AND s.StudentId = '1234';


