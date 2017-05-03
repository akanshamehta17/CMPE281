<?php

include "../../inc/dbinfo.inc";
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

	
  VerifyStudentsTable($connection, DB_DATABASE);

  $Name = htmlentities($_POST['name']);
  $Id = htmlentities($_POST['id']);
  $Scale = htmlentities($_POST['scale']);
  $Points = htmlentities($_POST['points']);
  $Grade = htmlentities($_POST['grade']);
  $Status = htmlentities($_POST['status']);
  $Comments = htmlentities($_POST['comments']);

  if (strlen($Name) || strlen($Id) || strlen($Scale) || strlen($Grade) || strlen($Points) || strlen($Status) || strlen($Comments)) {
    AddStudentGrades($connection, $Name, $Id, $Scale, $Points, $Grade, $Status, $Comments);
  }
  

 /* Add student to the table. */
function AddStudentGrades($connection, $Name, $Id, $Scale, $Points, $Grade, $Status, $Comments) {
   $n = mysqli_real_escape_string($connection, $Name);
   $i = mysqli_real_escape_string($connection, $Id);
   $sc = mysqli_real_escape_string($connection, $Scale);
   $g = mysqli_real_escape_string($connection, $Grade);
   $p = mysqli_real_escape_string($connection, $Points);
   $s = mysqli_real_escape_string($connection, $Status);
   $c = mysqli_real_escape_string($connection, $Comments);

   $query = "INSERT INTO `Student` (`Name`, `ID`, `Scale`, `Points`, `Grade`, `Complete`, `Comments`) VALUES ('$n', $i, '$sc', '$p', 'null', '$s', '$c')";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding student data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyStudentsTable($connection, $dbName) {
  if(!TableExists("Student", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `Student` (
         `Name` varchar(45) NOT NULL,
         `ID` int(11) NOT NULL,
         `Scale` varchar(20) NULL,
         `Points` varchar(20) NULL,
         `Grade` varchar(20) NULL,
         `Complete` varchar(10) NULL,
         `Comments` varchar(200) NULL,
         PRIMARY KEY (`ID`)
       ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}



?>

<!DOCTYPE html>
<html>
<head>
<body bgcolor="">
<i><h2>Enter Grades:</h2></i><br>
<form method="POST"  action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>">
Student Name:
<input type="text" name="name" value="">
Student ID:
<input type="text" name="id" value="">
Scale:
<input type="text" name="scale" value="">
&nbsp;&nbsp;&nbsp;&nbsp;
Points:
<input type="text" name="points" value="">
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="status" value="Y" checked> Complete
<input type="radio" name="status" value="N"> Not Complete
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<br><br>Comments:&nbsp;<textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;">
</textarea>
<br><br><br>
<input type="submit" value="Submit"><br><br>
</form>
</body>
</head>
</html>
