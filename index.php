<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orlabags</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style= "background-color:black">
    <div id= "main-wrapper">
     <center>
        <h1>Login Form</h1>
     <img src="C:\xampp\htdocs\Orlabags\download.png" href="bags">
</center>
    <form  class="myform" action="index.php" method="POST"
    <label><b>Username:</b></label><br>
    <input name= "username" type="text" class="input values" placeholder="type your username" required/><br>
    <label><b>Password:</b></label><br>
    <input name= "password" type="password" class="input type" placeholder="type your password"required/><br>
    <input name= "login" type="button" id="login_btn" value="Login"/><br>
<a href="register.php"></a><input type="button" id="register_btn" value="register"/>
</form>
<?php
if(isset($POST['login']));
{
    $username=$POST ['username'];
    $password= $POST ['password'];
    $encrypted_password= md5 ($password);
    $query= "select* from fileuploadtable WHERE username= '$username' and password = '$encrypted_password' ";
    $query_run= mysqli_query ($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $row= mysqli_fetch_assoc($query_run);
        //valid
        $_SESSION['username']=$row ['username'];
        $_SESSION['imglink']= $row ['imglink'];
        header ('location: homepage.php');
    }
    else{
        //invalid
        echo "<script>alert('Invalid credentials')</script>";
    }
}
?>
</div>
</body>
</html>