<!DOCTYPE html>
<html>
<head>
<title>Admin Menu</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet" href="css/all.css">
</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['username']))
  header('location:http://localhost/book_management/Admin.php');

  $uname = $_SESSION['username'];

if(isset($_POST['bname']) && isset($_POST['aname']) && isset($_POST['price']) && isset($_POST['quantity'])){
  $bname=$_POST['bname'];
  $aname=$_POST['aname'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'bms_db');
  $q="INSERT INTO book(bname,aname,price,quantity) values('$bname','$aname',$price,$quantity)";
  $status=mysqli_query($con,$q);
  mysqli_close($con);
}
?>
<div id="main"></div>
<div id="slider">
  <div id="dot">
  <span></span>
  <span></span>
  <span></span>
  </div> 
  <ul>
  <li><br><font class="sldtext"><?php echo $_SESSION['username'] ?></font></li>
  <li><a href="Adminmenu.php">Insertbook</a></li>
  <li><a href="viewbook.php?page=1" >View Book</a></li>
  <li><a href="searchbook.php" >Search Book</a></li>
  <li><a href="showissuebook.php?page=1" >Issued book</a></li>
  <li><a href="" id="logout" data-uname="<?php echo $uname?>">Logout</a></li>
  </ul>
</div>
<div class="box">
    <font style="left:72px;">Book Data</font>
    <form action="Adminmenu.php" id="ibook" method= "post">
    <input type="text" name="bname" placeholder=" book name" required/>
    <input type="text" name="aname" placeholder=" author name" required/>
    <input type="number" name="price" placeholder=" price" required/>
    <input type="number" name="quantity" id="quantity" placeholder=" quantity" required/>
    <input type="submit" value="Insert">
    </form>
</div>
<p align="right"><marquee width="80%"><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>
