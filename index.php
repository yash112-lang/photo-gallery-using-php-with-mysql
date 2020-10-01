<!DOCTYPE html>
<html>
<head>
  <title>Upload Image using php</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <center><br>
        <a href='images.php'><button class="btn btn-info">View Images</button></a><br><br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select Image File to Upload:<br><br><br>
            <input type="file" name="file">
            <input class="btn btn-primary" type="submit" name="submit" value="Upload">
        </form>
        <hr>
    </center>  
</body>
</html>    
