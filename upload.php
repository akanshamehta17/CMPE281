<?php  
if($_FILES["zip_file"]["name"]) {
        $filename = $_FILES["zip_file"]["name"];
        $source = $_FILES["zip_file"]["tmp_name"];
        $type = $_FILES["zip_file"]["type"];

        $name = explode(".", $filename);
        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
        foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                        $okay = true;
                        break;
                }
        }

        $continue = strtolower($name[1]) == 'zip' ? true : false;
        if(!$continue) { 
                $message = "The file you are trying to upload is not a .zip file. Please try again.";
        }
       
       

        $target_path = "/var/www/html/Madhur/".$filename;  // change this to the correct site path
        chmod($target_path,0777);
         
           if(move_uploaded_file($source, $target_path)) {  
           $message = "Your .zip file is uploaded and extracted!";
          shell_exec("rm *.java");
          shell_exec("unzip $target_path");}
        else {
                $message = "There was a problem with the upload. Please try again.";
        }
             
      } 
//if (isset($_POST['run'])){

//shell_exec("./umlparser /var/www/html/ /var/www/html/");

//      }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body bgcolor="#F0E68C">
<center><p><b><h2>Madhur Khandelwal</h2></b></p></center>
<center><p><b>Student ID:011440507</b></p></center><hr color="red"/>
<?php if($message) echo "<p>$message</p>"; ?>
<form enctype="multipart/form-data" method="post" action="">
<label><b><i><h2>Choose a zip file to upload:</h2></i></b> <input type="file" name="zip_file" /></label>
<br /><br>
<input type="submit" name="upload" value="Upload" /><br><br>
</form><br>
<form enctype="multipart/form-data" method="post" action="out.php">
<input type="submit" name="run" value="Run Code" /><br><br><br><br>
</form>
<iframe src="grading_page.php" height="300" width="1400" align="bottom"></iframe><br><br>
<form action="grades.php">
<input type="submit" value="View Grades"><br><br>
</body>
</html>
