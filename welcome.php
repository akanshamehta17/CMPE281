<?PHP

if(isset($_POST['submit']))
{

$part = $_POST["instanceUrl"];
switch ($part)
{

case "1" : header( "Location: http://CMPE281PersonalProject-1115329587.us-west-2.elb.amazonaws.com/Tenant-1/upload.php" );
break;
case "2" : header( "Location: http://CMPE281PersonalProject-1115329587.us-west-2.elb.amazonaws.com/Tenant-2/upload.php" );
break;
case "3" : header( "Location: http://CMPE281PersonalProject-1115329587.us-west-2.elb.amazonaws.com/Tenant-3/upload.php" );
break;
case "4" : header( "Location: http://CMPE281PersonalProject-1115329587.us-west-2.elb.amazonaws.com/Tenant-4/upload.php" );
break;

 }
}

?>

<!DOCTYPE html>
<html>
<body background="HTML-background.png">
<i><h1>Welcome Professor!</h1></i>
<hr>
<br><p><b>Please select CMPE-202 student:</b></p></br>
<form method="POST"  action="">
<select name="instanceUrl" >
<option value="0" >-- Please Select --</option>
<option value="1" >Madhur</option>
<option value="2" >Nivedita</option>
<option value="3" >Raksha</option>
<option value="4" >Pavana</option>
</select><br><br>
<input type="submit" name="submit"/>
</form>
</body>
</html>
