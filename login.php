<?php
    session_start();
    $link = mysqli_connect('localhost','root','08061646761','backend2');
    $fetch_user =  $fetch_pass = "";
    if (isset($_POST['signin'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql_check = "SELECT * FROM registration_form WHERE username = '$user' AND password = '$pass' ";
        $check = mysqli_query($link,$sql_check);
       while ($row = mysqli_fetch_assoc($check)) {
           $fetch_user = $row['username'];
           $fetch_pass = $row['password'];
        
        }
            if ( $fetch_user == "" ||  $fetch_pass =="" ) {
            echo "<script>alert('Incorrect Login Citerail')</script>";
            }
            else {
                header("location: index.php");
            }
    
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
    
    <form action=""  style="background-color:lightgreen;" class="mx-auto shadow form-controls col-6 mt-5 py-4 px-3 border" name="login">
        <h3 class="text-center">LOGIN HERE</h3>
        <label for="username" class="form-label">USERNAME:</label>
        <input type="text" name="user" class="form-control" required maxlength="20">
        <br>
        <label for="password" class="form-label">PASSWORD:</label>
        <input type="password" name="pass" class="form-control" required maxlength="20">
        <br>
        <input type="submit" value="LOGIN" name="signin" class="btn btn-success">
    </form>

    <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>