<?php

include "../../inc/dbinfo.inc";
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);


  VerifyTenantTable($connection, DB_DATABASE);

  $Name = htmlentities($_POST['name']);
  $Id = htmlentities($_POST['id']);
  $Points = htmlentities($_POST['points']);
  $Grade = htmlentities($_POST['grade']);
  $Comments = htmlentities($_POST['comments']);

  if (strlen($Name) || strlen($Id) || strlen($Grade) || strlen($Points) || strlen($Comments)) {
    AddTenantGrades($connection, $Name, $Id, $Points, $Grade, $Comments);
  }


 /* Add tenant's data to the table. */
function AddTenantGrades($connection, $Name, $Id, $Points, $Grade, $Comments) {
   $n = mysqli_real_escape_string($connection, $Name);
   $i = mysqli_real_escape_string($connection, $Id);
   $g = mysqli_real_escape_string($connection, $Grade);
   $p = mysqli_real_escape_string($connection, $Points);
   $c = mysqli_real_escape_string($connection, $Comments);

   $query = "INSERT INTO `Tenant_Data` (`Tenant_Name`, `TENANT_ID`, `Column_1`, `Column_2`, `Column_3`, `Column_4`, `Column_5`,`Column_6`) VALUES ('$n', $i, '$p', '$g', '$c', 'null','null', 'null')";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding tenant data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyTenantTable($connection, $dbName) {
  if(!TableExists("Tenant_Data", $connection, $dbName))
  {
     $query = "CREATE TABLE `Tenant_Data` (
         `Record_ID` int(11) NOT NULL AUTO_INCREMENT,
         `Tenant_Name` varchar(45) NOT NULL,
         `TENANT_ID` int(20) NOT NULL, 
         `Column_1` varchar(20) NULL,
         `Column_2` varchar(20) NULL,
         `Column_3` varchar(20) NULL,
         `Column_4` varchar(10) NULL,
         `Column_5` varchar(10) NULL,
         `Column_6` varchar(200) NULL,
         PRIMARY KEY (`Record_ID`)
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
Grade:
<input type="text" name="grade" value="">
&nbsp;&nbsp;&nbsp;&nbsp;
Points:
<input type="text" name="points" value="">
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
