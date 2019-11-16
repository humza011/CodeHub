<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codehub - Submit Code</title>
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
        <li><a href="search.php">Search Code</a></li>
        <li><a onclick="fnsubmit()">Submit Code</a></li>
      </ul>
      <?php  if (isset($_SESSION['username'])) : ?>
      <ul class="nav navbar-nav navbar-right">
        <li style="color: white">Logged In As : <?php echo $_SESSION['username']; ?></li>
        <li><a href="index.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a> </li>
      </ul>
      <?php endif ?>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <form action="submit.php" method="post" enctype="multipart/form-data" >
          Program Name : 
          <input type="text" name="pname" class="form-control" required="required">
          Programming Language : 
          <input type="text" name="plang" class="form-control" required="required">
          Time Complexity
          <input type="text" name="timecom" class="form-control" placeholder="Optional"> <br>       
          
          <input type="file" name="myfile" class=""> <br>
          <button type="submit" name="save" class="btn btn-success">upload</button>
        </form>
      </div>
    </div>

</body>
</html>
