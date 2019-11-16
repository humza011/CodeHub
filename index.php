<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: homepage.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codehub - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">CodeHub</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <?php  if (isset($_SESSION['username'])) : ?>
      <ul class="nav navbar-nav navbar-right">
        <li style="color: white">Logged In As : <?php echo $_SESSION['username']; ?></li>
        <li><a href="index.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a> </li>
      </ul>
      <?php endif ?>
    </div>
  </nav>
  <div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>

  	<?php endif ?>
    </div>

    <div class="jumbotron jumbotron-fluid">
  <div class="container" style="text-align:center">
    <h1>Code Hub</h1>      
    <p>A web repository for all your source-code need.</p>
  </div>
  <div class="row">
    <div class="col-sm-12 text-center">
        <a href="search.php"><button class="btn btn-primary btn-md">Search Code</button></a>
        <a href="submit.php"><button class="btn btn-danger btn-md">Submit Code</button></a>
     </div>
</div>
</Search CSubmit Code/body>
</html>