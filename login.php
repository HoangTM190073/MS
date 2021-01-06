<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <div class="container">
    <form action="" method="POST">
        <img src="anh.png" alt="#">
        <div class="main">
            <h3>Login</h3>
            <div class="textbox">
                <input type="text" placeholder="Username" id="username">
            </div>
            <div class="textbox">
                <input type="Password" placeholder="Password" id="password">
            </div>
            <h6>Forgotten your password?</h6>
            <button class="botton0">Login</button>
         </div>
        <button class="botton2"> <a href="index.html">Back</a></button>
        <button class="botton3"><a href="regishtml.php">Registration</a></button>
    </form>
    <?php
      $con = new mysqli('localhost', 'root', '', 'account');
            if (!$con)
            {
              echo "";
            }
      if(isset($_POST['account']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($con, "select * from account where username='$Username' AND password='$Password' " );
        $check_login = mysqli_num_rows($result);
        $row_login = mysqli_fetch_array($result);
        if($check_login == 0)
        {
         echo "<script>alert(' Please try again!')</script>";
         exit();
        }
        if($check_login > 0)
        {
        echo "<script>alert('Login successfully !')</script>";
        echo "<script>window.open('index.html','_self')</script>";
        }
      }
      ?>
    </div> 
</body>
</html>