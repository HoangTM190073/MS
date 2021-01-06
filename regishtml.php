<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <div class="container">
    <form action="" method="POST">
        <img src="anh.png" alt="#">
        <div class="main">
            <h3>Registration</h3>
            <div class="textbox">
                <input type="text" placeholder="Email" id="email">
            </div>
            <div class="textbox">
                <input type="Password" placeholder="Password" id="password">
            </div>
            <div class="textbox">
                <input type="Password" placeholder="Confirm Password" id="passwordconfirm">
            </div>
            <button class="botton0">Registration</button>
        </div>
        <button class="botton1"> <a href="login.php">Back to Login</a></button>
        <button class="botton2"> <a href="index.php">Back to HomePage</a></button>
    </div>
    <?php
    $con = new mysqli('localhost', 'root', '', 'account');
    if (!$con) {
        echo "ket noi that bai";
    }
    if (isset($_POST['register'])) {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $check_exist = mysqli_query($con, "select * from account where username = '$username'");
        $username_count = mysqli_num_rows($check_exist);
        $row_register = mysqli_fetch_array($check_exist);
        if ($username_count > 0) {
            echo "<script>alert('Sorry, your username already exist in our database !')</script>";
        } elseif ($row_register['username'] != $username && $password == $confirm_password) {
            $run_insert = mysqli_query($con, "insert into account values ('$username','$password') ");
            if ($run_insert) {
                echo "<script>alert('Account has been created successfully!')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }
        }
    }
}
?>
</body>
</html>