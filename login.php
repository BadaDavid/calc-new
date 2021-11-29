<?php
    
   if (isset($_POST['press'])){
       echo "<script>alert('good boy')</script>";
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="plugins/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
</head>
<body>
    
    <form action="login.php"  style="background-color:lightgreen;" class="mx-auto shadow col-6 mt-5 py-4 px-3" name="login">
        <h3 class="text-center">LOGIN HERE</h3>
        <label for="username" class="form-label">USERNAME:</label>
        <input type="text" name="user" class="form-control" maxlength="20">
        <br>
        <label for="password" class="form-label">PASSWORD:</label>
        <input type="password" name="pass" class="form-control" maxlength="20">
        <br>
        <input type="submit" value="LOGIN" name="press" class="btn btn-success">
    </form>

    <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>