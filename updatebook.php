<?php
  session_start();
  if (!isset($_SESSION['username']))
  header('location:http://localhost/book_management/Admin.php');
  $uname = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>update book details</title>
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
  <li><br><font class="sldtext"><?php echo $_SESSION['username'] ?></font></li>
  <li><a href="Adminmenu.php">Insertbook</a></li>
  <li><a href="viewbook.php?page=1" >View Book</a></li>
  <li><a href="searchbook.php">Search Book</a></li>
  <li><a href="showissuebook.php?page=1" >Issued book</a></li>
  <li><a href="" id="logout" data-uname="<?php echo $uname?>">Logout</a></li>
  </ul>
</div>
<div style="position:fixed;top:30%;left:250px;">
<form action="update.php?bid=<?php echo $_GET['bid'];?>" method="post" id="upbook">
<table style="width:600px;font-size: 20px;height: 150px;">
  <tr><th colspan="6">Update Records</th></tr>
  <tr>
  <th width="110px">B_ID</th>
  <th width="110px">Book Name</th>
  <th width="110px">Author Name</th>
  <th width="90px">Price</th>
  <th width="90px">Quantity</th>
  <th width="90px">Submit</th>
  </tr>
  <?php
     $bid=$_GET['bid'];
     $con=mysqli_connect('localhost','root');
     mysqli_select_db($con,'bms_db');
     $q="select *from book";
     $result=mysqli_query($con,$q);
     while ($raw=mysqli_fetch_array($result)) {
     if($raw['bid']==$bid){ ?>
     <tr>
     <td><?php echo $raw['bid'];?><input type="hidden" name="bid"></td>
     <td><input type="text" name="bname" value="<?php echo $raw['bname'];?>"></td>
     <td><input type="text" name="aname" value="<?php echo $raw['aname'];?>"></td>
     <td><input type="text" name="price" value="<?php echo $raw['price'];?>"></td>
     <td><input type="text" name="quantity" value="<?php echo $raw['quantity'];?>"></td>
     <td><input type="submit" value="update" onclick="update()"></td>
     </tr>
  <?php break; } } ?>
</table>
</form>
</div>
<p align="right"><marquee width="80%"><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>

