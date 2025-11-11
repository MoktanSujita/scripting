<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $country=$_POST["country"];
    $message=$_POST["message"];

    $errors=[];
    if(empty($name)||empty($email)||!filter_var($email,FILTER_VALIDATE_EMAIL)||empty($phone)||empty($country))
    {
        $errors[]="Please fill all the required fields";
    }
    if(empty($errors))
    {
        echo"<script>alert('file submission successful!');</script>";
    }
    else
    {
        echo"$error";
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
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br><br>

        <label for="phone">Phone</label>
        <input type="number" name="phone"><br><br>

        <label for="country">Country</label>
        <select name="country">
            <option value="np">Nepal</option>
            <option value="us">United States</option>
            <option value="uk">United Kingdom</option>
        </select><br><br>
        
        <input type="submit" value="submit">
    </form>
</body>
</html>