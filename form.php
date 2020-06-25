<?php 
	$db = mysqli_connect('localhost', 'root', '', 'sb');
	$fname="";
	$sname="";
	$gender="";
	$ig="";
	$rstatus="";
	$fantasy="";
	$meet="";
	$you="";
	$me="";
	$pnumber="";

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";


	if (isset($_POST['submit'])) {
		$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$gender=$_POST['gender'];
	$ig=$_POST['instagram'];
	$rstatus=$_POST['status'];
	$fantasy=$_POST['fantasy'];
	$meet=$_POST['meet'];
	$you=$_POST['you'];
	$me=$_POST['me'];
	$pnumber=$_POST['pnumber'];
	mysqli_query($db, "INSERT INTO slam (fname,sname,gender,ig,rstatus,fantasy,meet,you,me,pnumber) VALUES ('$fname', '$sname','$gender','$ig','$rstatus','$fantasy','$meet','$you','$me','$pnumber')"); 	
}
if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into img (image) VALUES ('$imgContent')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    }  
 
// Display status message 
echo $statusMsg; 
?>