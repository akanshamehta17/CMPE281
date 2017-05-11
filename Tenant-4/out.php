<?php

shell_exec("java -jar UMLParser-0.0.1-SNAPSHOT.jar /var/www/html/Tenant-4/ outputImg");

 ?>


<html>
<body bgcolor="#ADD8E6">
<b><h2>Output:</h2></b><br><br>
<img src="outputImg.png" width="750" height="650" />
<a href="upload.php"><h2><b>Back</h2></b></a>
</body>
</html>
