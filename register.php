<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orlabags</title>
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript">
        function previewimage(){
            var oFReader= new FileReader();
            oFReader.readAsDataURL(document.getElementById) ("imglink").files[0];

            oFReader.onload= function (oFREvent){
                document.getElementById("uploadpreview").src=oFREvent.target.result
            };
        };
        </script>
</head>
<body style= "background-color:black">
<form  class="myform" action="register.php" method="POST" enctype="multipart/form-data>"
    <div id= "main-wrapper">
     <center>
        <h1>Register Form</h1>
     <img id="uploadpreview" src="C:\xampp\htdocs\Orlabags\download.png" href="bags"> <br>
     <input name=imglink type="file" id="uploadpreview" accept="...jpeg, ...png, ...jpg" onclick="previewimage:"/> 
</center>

    label><b>Fullname:</b></label><br>
    <input name="fullname" type="text" class="input values" placeholder="type your fullname"/><br>
    <label><b>Gender:</b></label><br>
    <input name="gender" type="radio" class="radiobtn" value="male" checked required/>Male<br>
    <input name="gender" type="radio" class="radiobtn" value="female" />Female<br>
    <label><b>Qualifications:</b></label><br>
    <select name="qualification" class="dropdown">
        <option value="BIT">BIT</option>
        <option value="BBA">BBA</option>
        <option value="BBIT">BBIT</option>
        <option value="BIS">BIS</option>
    </select><br>
    <label><b>Username:</b></label><br>
    <input name="username" type="text" class="input values" placeholder="type your username"/><br>
    <label><b>Password:</b></label><br>
    <input name="password" type="password" class="input type" placeholder="your password"/>
    <label><b>Confirm Password</b></label><br>
    <input name="cpassword" type="password" class="input type" placeholder="confirm your password"/>
    <input name="submit_btn" type="button" id="signup_btn" value="Sign Up"/>
<a href="index.php"></a><input type="button" id="back_btn" value="Back"/>
</form>
    <?php
    if(isset($POST['submit_btn']))
    {
    //echo '<script type= text/javascript> alert("sign up button clicked")</script>';
    $fullname= $POST['fullname'];
    $gender= $POST['gender'];
    $qualification= $POST['qualification'];

    $username= $POST['username'];
    $password= $POST['password'];
    $cpassword= $POST['cpassword'];

    $imgname=$_FILES['imglink'] ['name'];
    $imgsize=$_FILES['imglink'] ['size'];
    $imgtemp= $_FILES['imglink'] ['temp_name'];

    $directory= 'uploads/';
    $target_file= $directory. $img_name;


    if($password==$cpassword)
    {
        $encrypted_password= md5($password);
        $query= "select* from fileuploadtable WHERE username= '$username'";
        $query_run= mysqli_query ($con, $query);
        if (mysqli_num_rows($query_run)>0){
           // there's already a user with the same username
            echo "<script>alert('User already exists')</script>";
        }
         else if(file_exists($target_file));
         {
          echo "<script>alert('Image file already exists...try another image file')</script>";
         }
         
         else if ($img_size>2097352);
         {
           echo "<script>alert('Image file is larger than 2MB...Try another image')</script>";
         }
    }
        else
        {
            move_uploaded_file($img_temp, $target_file);

            $query="insert into fileuploadtable values('','$username', '$fullname', '$qualification', '$gender' '$encrypted_password''target_file')";
            $query_run= mysqli_query($con, $query);
            if($query_run){
                echo "<script>alert('User already registered...go to login page')</script>";
            }
                else
            {
                echo "<script>alert('Error!')</script>";
            }
        }
    }
    else{
        echo "<script>alert('password and confirm password do not match!')</script>";
    }

    ?>
</div>
</body>
</html>