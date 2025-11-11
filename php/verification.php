<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    try{      
         $conn=new PDO("mysql:host=localhost;dbname=admin",'root','');
         if(!$conn)
         {
             die("Configuration failure!");
         }
         else
         {
          $stmt=$conn->prepare("SELECT * from login_user WHERE user_name=?");
          $stmt->execute([$username]);
          $user=$stmt->fetch(PDO::FETCH_ASSOC);
          $hashed=hash("sha256",$password);

          if($user && $hashed==$user['password'] )
          {
              echo "<p>Login Successful! Hello ".htmlspecialchars($username)."</p>";
          }
          else
          {
              echo"<p>Login failed</p>";
          }
        }
    }
        catch(PDOException $e)
        {
            echo"ERROR: ".$e->getMessage();
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
        <label for="username">Username:</label>
        <input type="text" name="username"><br><br>

        <label for="password">Password</label>
        <input type="password" name="password"><br><br>

        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>