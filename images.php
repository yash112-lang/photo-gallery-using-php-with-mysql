<?php
 // Include the database configuration file
 include 'connection.php';
?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="gridview">
        <div class="heading">Image Gallery</div>
        <?php
            // Get images from the database
            $query = $db->query("SELECT file_name FROM images ORDER BY uploaded_on DESC");
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    $imageURL = 'images/'.$row["file_name"];
        ?>
        <div class="image">
            <a href="http://localhost/portal/images/<?php echo $row['file_name']?>" target='new'> 
                <img style='' src="<?= $imageURL; ?>"/>
            </a>
        </div>
  <?php }} ?>
    </div>
</body>
</html>



