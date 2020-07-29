<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php
// Include the database configuration file
include 'connection.php';
$statusMsg = '';
$backlink = '<a href="./"><button class="btn btn-success">Go back</button></a>';
// File upload path
$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                if($insert){
                    $statusMsg = "<center>The file <b>".$fileName. "</b> has been uploaded successfully.<br><br>" . $backlink.'</center>';
                }else{
                    $statusMsg = "<center>File upload failed, please try again.<br><br>" . $backlink.'<center>';
                } 
            }else{
                $statusMsg = "<center>Sorry, there was an error uploading your file.<br><br>" . $backlink.'</center>';
            }
        }else{
            $statusMsg = "<center>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.<br><br>" . $backlink.'</center>';
        }
    }else{
            $statusMsg = "<center>The file <b>".$fileName. "</b> is already exist.<br><br>" . $backlink.'</center>';
        }
}else{
    $statusMsg = '<center>Please select a file to upload.<br><br>' .$backlink.'</center>';
}
// Display status message
echo $statusMsg;
?>