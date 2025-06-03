<?php
$target_dir="upload/";
$conn=new PDO("mysql:host='localhost';dbname='swastik'",'root','root');
if(!file_exists($target_dir))
{
    mkdir($target_dir,0777,true);    

}

$target_file=$target_dir.basename($_FILES["myfile"]["name"]);

if(move_uploaded_file($_FILES["myfile"]["tempname"],$target_file))
{
    echo"file upload successful";
}

else
{
    echo "Failed to upload file";
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

    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">choose file:</label>
        <input type="file" name="myfile" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>