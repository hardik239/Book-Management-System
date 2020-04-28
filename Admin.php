<!DOCTYPE html>
<html>
<head>
<title>Admin Login Form</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet" href="css/all.css">
</head>
<body>
<div id="main"></div>
<div id="slider">
  <div id="dot">
  <span></span>
  <span></span>
  <span></span>
  </div> 
  <ul>
  <li><a href="home.php"><i class="fas fa-home"></i><font class="sldtext">&emsp;Home</font></a></li>
  <li><a href="student.php"><i class="fas fa-user-graduate"></i><font class="sldtext">&emsp;Student</font></a></li>
  </ul>
</div>
<p align="right"><marquee width="80%"><font class="heading">Welcome To Book Management System</font></marquee></p>
<div class="box" style="height:310px;">
  <font  style="left: 55px;">Admin Login</font>
  <form  action="Admin.php" method="post">
  <input type="text" id="username" name="username" placeholder=" username" required/>
  <input type="password" id="password" name="password" placeholder=" password" required/>
  <input type="submit" name="login"/><br><br>
  <a style="font-size: 20px; margin-left: 70px;"href="forgotpw.php?user=admin">forgot password?</a>
  </form>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
<?php

  session_start();
  session_destroy();

  if(isset($_POST['username']) && isset($_POST['password'])){
  session_start();
  $name=$_POST['username'];
  $password=$_POST['password'];
  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'bms_db');

  $q="select * from admin WHERE username='$name' && password='$password' ";
  $status=mysqli_query($con,$q);
  $num=mysqli_num_rows($status);
  if($num==1){
    $_SESSION['username']=$name;
    echo " ?><script>alert('login successfull... welcome to book managment system $name');window.location.href='Adminmenu.php'</script> <?php ";
  }
  else 
   echo " ?><script>alert('username or password may be wrong')</script> <?php ";
  mysqli_close($con);
}
?>
</body>
</html>

