<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>Add</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="" style="width: 250px; height: 100px;"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#"> <span class="glyphicon glyphicon-user"></span>Top 100</a>
              </li>
			  <li class="nav-item">
                  <a class="nav-link" href="cart.php"> <span class="glyphicon glyphicon-user"></span>Cart</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Account
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <a class="dropdown-item" href="regishtml.php">Register</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Admin</a>
                  </div>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>
      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/banner4.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner3.jpg" alt="Third slide">
	  </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner1.jpg" alt="Four slide">
	  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "tunesource";      // Khai báo database

// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$songID = "";
$songName = "";
$songFile = "";
$songIMG = "";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["songID"])) { $songID = $_POST['songID']; }
    if(isset($_POST["songName"])) { $songName = $_POST['songName']; }
    if(isset($_POST["songFile"])) { $songFile = $_POST['songFile']; }
    if(isset($_POST["songIMG"])) { $songIMG = $_POST['songIMG']; }
    if(isset($_POST["genreID"])) { $genreID = $_POST['genreID']; }
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO song(songID, songName, songFile, songIMG, genreID)
    VALUES ('$songID', '$songName', '$songFile', '$songIMG','$genreID')";
    if ($connect->query($sql) === TRUE) {
            echo "<script>alert('Add song successfully!')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>
<form action="" method="post">
<fieldset>
<!-- Form Name -->
<legend style="text-align: center;font-size: 50px;">Add Song</legend>
<div style="width: 500px;
    height: 500px;
    border: 1px solid black;
    margin-left: 410px;
    border-radius: 10px;">
        <div class="form-group">
          <label class="col-md-4 control-label">ID:</label>  
          <div class="col-md-4">
          <input name="songID" placeholder="Song ID" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Name:</label>  
          <div class="col-md-4">
          <input name="songName" placeholder="Song Name"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="filebutton">Song File</label>
          <div class="col-md-4">
            <input name="songFile"  type="file">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="filebutton">Song Image</label>
          <div class="col-md-4">
            <input name="songIMG" type="file">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Genre ID:</label>  
          <div class="col-md-4">
          <input name="genreID" placeholder="Genre ID" type="text">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <button type="submit" name="singlebutton" class="btn btn-info">Add</button>
          </div>
        </div>
</div>
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>