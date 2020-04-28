<?php     
  if(isset($_POST['username'])){
  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'bms_db');
  $user=$_GET['user'];
  $un=$_POST['username'];
  $pw=$_POST['password']; 
  $cpw=$_POST['cnfpassword']; 
  if($user=="admin") 
      $q="UPDATE admin SET password='$pw' WHERE username='$un' ";  
  else
      $q="UPDATE student SET password='$pw' WHERE name='$un' ";
  $status=mysqli_query($con,$q);
  $num=mysqli_num_rows($status);
  if($user=="admin") 
  header('location:http://localhost/book_management/admin.php');
  else  
  header('location:http://localhost/book_management/student.php');
  mysqli_close($con);     }  
?>

<!DOCTYPE html>
<html>
<head>
<title>forgot password</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet"  href="css/all.css">
</head>
<body>
<p align="right"><marquee><font class="heading">Welcome To Book Management System</font></marquee></p>
<div class="box">
<?php $user=$_GET['user']; ?>    
  <font style="left: 38px;">Forgot Password</font>
  <form action="forgotpw.php?user=<?php  echo($user); ?>" method="post" id="forgotpw"><input type="hidden" id="getu" value="<?php  echo($user); ?>">
  <input type="text"  id="username" name="username" placeholder=" username" required onchange="checkun(this.value)">
  <input type="password" id="pw" name="password" placeholder=" new password" required>
  <input type="password"id="cpw" name="cnfpassword" placeholder=" confirm password" required>
  <input type="submit"><br>
  <a href="http://localhost/book_management/<?php echo($user); ?>.php" class="a2">
  <pre>                      Already,<br>               have an account?</pre></a>
  </form>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>


