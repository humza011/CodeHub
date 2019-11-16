<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<?php include 'filesLogic.php';?>
<html lang="en">
<head>
  <title>Codehub - Search Code</title>
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
        <li><a href="submit.php">Submit Code</a></li>
      </ul>
      <?php  if (isset($_SESSION['username'])) : ?>
      <ul class="nav navbar-nav navbar-right">
        <li style="color: white">Logged In As : <?php echo $_SESSION['username']; ?></li>
        <li><a href="index.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a> </li>
      </ul>
      <?php else  :?>
          <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
      <?php endif ?> 
    </div>
  </nav>
<div class="container-fluid">
  <strong>Search By Program Name:</strong><input type="text" id="myInput1" class="form-control" onkeyup="myFunction1()" placeholder="Program Name">
  <strong>Search By Programming Language:</strong><input type="text" id="myInput2" class="form-control" onkeyup="myFunction2()" placeholder="Programming Language">
</div>
<div class="form-group">
  <div class="input-group">
<table  class="table table-striped">
<thead>
    <th>Program name</th>
    <th>Programming Language</th>
    <th>Time Complexity</th>
    <th>Size (in mb)</th>
    <th>Downloads Till Date</th>
    <th>Submitted By</th>
    <th>Action</th>
</thead>
<tbody id="myTable">
  <?php foreach ($files as $file): ?>
    <tr>
      
      <td><?php echo $file['pname']; ?></td>
      <td><?php echo $file['plang']; ?></td>
      <td><?php echo $file['timecom']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><?php echo $file['subuser']; ?></td>
      <td><a href="search.php?file_id=<?php echo $file['id'] ?>">Download</a></td>

    </tr>
  <?php endforeach;?>

</tbody>
</table>

<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue,value;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0] ;
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue,value;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1] ;
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>

</body>
</html>