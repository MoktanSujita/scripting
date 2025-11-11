<?php
include 'config.php';
if(isset($_FILES['myfile'])&& $_FILES['myfile']['error']===0){
$target_dir="upload/";

if(!file_exists($target_dir))
{
    mkdir($target_dir,0777,true);
}

$target_file=$target_dir.basename($_FILES["myfile"]["name"]);

if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$target_file))
{
    echo"file upload successful";
}

else
{
    echo "Failed to upload file";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Upload a File</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">choose file:</label>
        <input type="file" name="myfile" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>