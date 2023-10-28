<?php
session_start();
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
        <h1>HomePage Form</h1>
        <h2>Welcome
            <?php echo $SESSION['username'] ?>
        </h2>
     <?php echo '<img class="avatar" src="". $SESSION[imglink]."">'; ?>
</center>
    <form  class="myform" action="Homepage.php" method="POST"
    <label><b>Username:</b></label><br>
    <input name= "logout" type="submit" id="Logout_btn" value="Logout"/><br>
</form>
<?php
if (isset($POST['logout']))
session_destroy();
header("Location: login.php");
?>
    </div>
</body>
</html>