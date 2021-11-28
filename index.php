<?php
    session_start();
    $link = mysqli_connect('localhost','root','08061646761','backend2');
    $found_name = "";
    if (isset($_POST['reg_submit'])) {
        $reg_name = $_POST['reg_name'];
        $reg_address = $_POST['reg_address'];
        $reg_email = $_POST['reg_email'];
        $reg_date = $_POST['reg_date'];
        $reg_gender = $_POST['reg_gender'];

        $sql_select = "SELECT * FROM registration_form WHERE name = '$reg_name'";
        $result_select = mysqli_query($link,$sql_select);
        while ($row = mysqli_fetch_assoc($result_select)) {
            $found_name = $row['name'];
        }
        if ($found_name !="") {
            echo"<script>alert('$reg_name already exists')</script>";
        }
        else {
            $sql_insert = "INSERT INTO registration_form (name,address,email,dob,gender) VALUES ('$reg_name', '$reg_address', '$reg_email','$reg_date','$reg_gender')";
            $insert = mysqli_query($link,$sql_insert);
            printf("Errormessage: %s/n", mysqli_error($link));
            if ($insert == true) {
                echo "<script>alert('Your Details Have Been Updated Successfully')</script>";
            }
            else {
                echo "<script>alert('An Error Occured Please Contact Our Support Team On 08025462234')</script>";
            }
        }
    }

    //To Search
    $fetched_name = $fetched_address = $fetched_email = $fetched_date = $fetched_gender ="";
    if (isset($_POST['submit_search'])) {
        $search = $_POST['search'];
        $sql_search = "SELECT * FROM registration_form WHERE name = '$search'";
        $result_search = mysqli_query($link,$sql_search);
        while ($row = mysqli_fetch_assoc($result_search)) {
            $fetched_id = $row ['id'];
            $fetched_name = $row['name'];
            $fetched_address = $row['address'];
            $fetched_email = $row['email'];
            $fetched_date = $row['dob'];
            $fetched_gender = $row['gender'];
        }
        $_SESSION['store_id'] = $fetched_id;
        if ($fetched_name =="") {
            echo "<script>alert('$search Doesnt Exist')</script>";
        }
    }

    //To Update
    if (isset($_POST['update_info'])) {
        $get_id = $_SESSION['store_id'];
        $reg_name = $_POST['reg_name'];
        $reg_address = $_POST['reg_address'];
        $reg_email = $_POST['reg_email'];
        $reg_date = $_POST['reg_date'];
        $reg_gender = $_POST['reg_gender'];

        $sql_update = "UPDATE registration_form SET name = '$reg_name', address = '$reg_address', email = '$reg_email', dob = '$reg_date', gender = '$reg_gender' WHERE id = '$get_id'";
        $result_update = mysqli_query($link, $sql_update);
        printf("Errormessage: %s/n", mysqli_error($link));
        if ($result_update == true) {
            echo"<script>alert('Update Successful')</script>";
        }
        else {
            echo"<script>alert('An Error Occured During Update')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="plugins/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">

</head>
<body>
    <center>    
        <h2>REGISTRATION FORM</h2>
        <form action="" method="POST" name="search_name">
            <input type="text" class="form-control col-md-7" maxlength="100" placeholder="Enter Name Search" name="search">
            <br>
            <input type="submit" value="Search" class="btn btn-success col-md-3" name="submit_search">
        </form>
        <br><br><br>
        <form name="test_form" action="index.php" method="POST" enctype="multipart/form-data" class="col-8">
            <b class="float-left">Name:</b>
            <input type="text" value="<?php echo "$fetched_name" ?>" placeholder="enter your name here" maxlength="100" name="reg_name" required="true" class="form-control">          
            <br>
           
             <b class="float-left">Address:</b>
            <input type="text" placeholder="enter your address here" value="<?php echo "$fetched_address" ?>"   name="reg_address" maxlength="100" required="true" class="form-control">
            <br>
             <b class="float-left">Email:</b>
            <input type="email" placeholder="enter your email here" value="<?php echo "$fetched_email" ?>"   name="reg_email"  maxlength="100" required="true" class="form-control">
            <br>
          <b class="float-left">DOB:</b>
            <input type="text" onfocus="this.type='date'" value="<?php echo "$fetched_date"?>"   placeholder="enter date of birth" name="reg_date" required="true" class="form-control">
            <br>
            <b class="float-left">Gender:</b>
            <select name="reg_gender" required="true"  class="form-control">
                <option  value="<?php echo "$fetched_gender"?>"><?php echo "$fetched_gender"?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            <br>
            <input type="submit" value="UPDATE" name="update_info" class="btn mt-3 btn-danger">
            <input type="submit" class="btn btn-success" value="REGISTER" name="reg_submit" style=" border-radius: 10px; cursor: pointer; margin-left: 25px; margin-top: 15px;">
        </form>
    </center>

    <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>