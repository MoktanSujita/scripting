<?php

session_start();
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=($_POST['name']);
    $address=($_POST['address']);
    $dob=($_POST['dob']);
    $gender=($_POST['gender']);
    $skills[]=($_POST['skills[]']);

    try
    {
        $stmt=$conn->prepare("INSERT INTO students(name,address,dob,gender,skills) VALUES (:name,:address,:dob,:gender,:skills)");
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':dob',$dob);
        $stmt->bindParam(':gender',$gender);
        $stmt->bindParam(':skills',$skills[]);
        $stmt->execute();

    }
    catch(PDOException $e)
    {
        $error_message="Error:" .$e->getMessage();
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
    <div>
        <form method="POST" action="">
            <table border="0" cellpadding="10" cellspacing="0">
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" name="name" id="name" placeholder="Enter your name" /></td>
                </tr>
                <tr> 
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" name="address" placeholder="Enter your address" /></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of birth:</label></td>
                    <td><input type="date" name="dob" placeholder="Enter your DOB" /></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td>
                        <label> Male
                            <input type="radio" name="gender" value="male" />
                        </label>
                        <label> Female
                            <input type="radio" name="gender" value="female" />
                        </label>
                        <label> Others
                            <input type="radio" name="gender" value="others" />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="skills">Select your skills:</label></td>
                    <td>
                        <input type="checkbox" name="skills[]" value="html" />
                        <label for="html">HTML</label><br>
                        <input type="checkbox" name="skills[]" value="css" />
                        <label for="css">CSS</label><br>
                        <input type="checkbox" name="skills[]" value="javascript" />
                        <label for="javascript">JavaScript</label><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <button type="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

