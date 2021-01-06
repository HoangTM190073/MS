<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
                  <a class="nav-link" href="cart.php"> <span class="glyphicon glyphicon-user"></span>Song</a>
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
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "tunesource";
$con = mysqli_connect($hostname,$user,$pass,$db);
mysqli_query($con,$db);
mysqli_set_charset($con,"utf8");
$sql = "select * from song ";
$result = mysqli_query($con,$sql);
?>
<div class="infor">
	<h1 style="width: 100%; height: 40px; text-align: center">Danh sách bài hát</h1>
	<div style="margin-left: 230px; margin-top: 20px; ">
	<table  width="900" border="1px solid #f3f3f3;" align="center" style="margin-top: 10px; text-align: center;" >
		<tr>
			<th width="50px;">STT</th>
			<th width="200px;">Name</th>
			<th width="200px;">Audio</th>
			<th width="200px;">Image</th>
			<th width="300px">Actions</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?php echo $row['songID']; ?> </td>
				<td><?php echo $row['songName']; ?></td>
				<td><audio controls loop src="audio/<?php echo $row['songFile']; ?>"></audio></td>
				<td><img src="img/<?php echo $row['songIMG']; ?>" style="max-width: 100px;"></td>
				<td>
					<a href="Add.php">Add</a> |
					<a href="Delete.php">Delete</a> |
					<a href="Repair.php">Repair</a>
				</td>
			</tr>
		<?php } 
		?>
	</table>
		</div>
</div>
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>