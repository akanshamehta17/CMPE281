<?php
include "../../inc/dbinfo.inc";
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);
  VerifyTenantsTable($connection, DB_DATABASE);
  $Name = htmlentities($_POST['name']);
  $Id = htmlentities($_POST['id']);
  $Grade = htmlentities($_POST['grade']);
  $Status = htmlentities($_POST['status']);
  if (strlen($Name) || strlen($Id) || strlen($Grade) ||  strlen($Status)) {
    AddTenantGrades($connection, $Name, $Id, $Grade, $Status);
  }
 /* Add tenant to the table. */
function AddTenantGrades($connection, $Name, $Id, $Grade, $Status) {
   $n = mysqli_real_escape_string($connection, $Name);
   $i = mysqli_real_escape_string($connection, $Id);
   $g = mysqli_real_escape_string($connection, $Grade);
   $s = mysqli_real_escape_string($connection, $Status);
   $query = "INSERT INTO `Tenant_Data` (`Tenant_Name`, `TENANT_ID`, `Column_1`, `Column_2`, `Column_3`, `Column_4`, `Column_5`, `Column_6`) VALUES ('$n', $i, '$s', '$g', 'null', 'null', 'null', 'null')";
   if(!mysqli_query($connection, $query)) echo("<p>Error adding Tenant data.</p>");
}
/* Check whether the table exists and, if not, create it. */
function VerifyTenantsTable($connection, $dbName) {
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
<input type="radio" name="status" value="Completed" checked> Complete
<input type="radio" name="status" value="Not Completed"> Not Complete
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<br><br><br>
<input type="submit" value="Submit"><br><br>
</form>
</body>
</head>
</html>
