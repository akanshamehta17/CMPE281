<?php 

shell_exec("./umlparser /var/www/html/<tenant_name>/ /var/www/html/<tenant_name>/outputImg.png");

 ?>


<html>
<body bgcolor="#ADD8E6">
<b><h2>Output:</h2></b><br><br>
<img src="outputImg.png" width="600" height="650" />
<a href="upload.php"><h2><b>Back</h2></b></a>
</body>
</html>
