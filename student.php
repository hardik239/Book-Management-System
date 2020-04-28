<!DOCTYPE html>
<html>
<head>
<title>student login</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet"  href="css/all.css">
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
  <li><a href="devloper.php"><i class="fas fa-user-cog"></i><font class="sldtext">&emsp;Devloper</font></a></li>
  </ul>
</div>
<div class="box" id="login" style="height:350px;">
<font style="left: 51px;">Student Login</font>
<form  action="student.php" method="post">
<input type="text" name="username" id="username" placeholder="username" required>
<input type="password" name="password" id="password"placeholder="password" required>
<input type="submit" value="Login" name="login"><br>
<button class="bittu" id="hide" >
<pre>                create account?</pre></button><br><br>
<a class="a2" href="forgotpw.php?user=student">forgot password?</a>
</form>
</div>
<div class="box" id="account" style="height: 520px;margin-top: -11px;">
  <font style="left: 37px;padding-top: 10px;">Create Account</font>
  <form action="student.php" method="post" id="disp">
  <input type="text" name="name" placeholder=" username" required>
  <input type="text" name="id" placeholder=" college id" required>
  <input type="email" name="email" placeholder=" email" required>
  <input type="password" name="password" id="pw" placeholder=" password" required>
  <input type="password" name="cnfpassword" id="cpw" placeholder=" confirm password" required>
  <input type="submit" name="login">
  <button class="bittu" id="show" >
<pre>              Already,<br>               have an account?</pre></button>
  </form>
</div>
<p align="right"><marquee width="80%" ><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
<?php

  session_start();
  session_destroy();

  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'bms_db');

  if(isset($_POST['username']) && isset($_POST['password'])){
  session_start();
  $name=$_POST['username'];
  $password=$_POST['password'];
  

  $q="select * from student WHERE name='$name' && password='$password' ";
  $status=mysqli_query($con,$q);
  $num=mysqli_num_rows($status);
  if($num==1){
    $_SESSION['username']=$name;
    echo "?><script>alert('login successfull... welcome to book managment system $name');window.location.href='studentissue.php?page=1'</script> <?php "; }
  else 
   echo " ?><script>alert('username or password may be wrong')</script> <?php ";
}

   if(isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['password'])){
  session_start();
  $name=$_POST['name'];
  $id=$_POST['id'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $p=$_POST['cnfpassword'];

  $q="INSERT INTO student(name,id,email,password) values('$name','$id','$email','$password')";
  $status=mysqli_query($con,$q);
  if ($status==1){
    $_SESSION['username']=$name;
    }
  else{
    echo " ?><script>alert('Account not created')</script> <?php ";
  }
  }
?>
</body>
</html>

