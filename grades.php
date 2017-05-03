<?php include "../../inc/dbinfo.inc"; 
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

?>
<html>
<body bgcolor="#BBFFFF">
<p><b><i><h2>View Grades</h2></i></b></p>
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>Name</td>
    <td>Student ID</td>
    <td>Scale</td>
    <td>Points</td>
    <td>Grade</td>
    <td>Complete</td>
    <td>Comments</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM Student");

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>",
       "<td>",$query_data[3], "</td>",
       "<td>",$query_data[4], "</td>",
       "<td>",$query_data[5], "</td>",
       "<td>",$query_data[6], "</td>";
  echo "</tr>";
}


?>
</table><br>
<form action="upload.php">
<input type="submit" value="Back">
</form>
</html>



