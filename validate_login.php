<?php
include "../inc/dbinfo.inc";
// Grab User submitted information
$name = $_POST["users_name"];
$pass = $_POST["users_pass"];


// Connect to the database
$con = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db(DB_DATABASE,$con);

$result = mysql_query("SELECT userName, pass FROM login WHERE userName = '$name'");

$row = mysql_fetch_array($result);

if($row["userName"]==$name && $row["pass"]==$pass)
   {
    header('Location: welcome.php');}
else
    {
       header('Location: log.php');
   }
?>
