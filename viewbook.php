<?php
  session_start();
  $page=$_GET['page'];
  if (!isset($_SESSION['username']))
  header('location:http://localhost/book_management/Admin.php');
  $uname = $_SESSION['username'];
  if($page=="1")
  $page1=0;
  else
  $page1=($page*5)-5;              
?>
<!DOCTYPE html>
<html>
<head>
<title>view book records</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet" href="css/all.css"">
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
  <li><a  href="Adminmenu.php">Insertbook</a></li>
  <li><a  href="viewbook.php?page=1" >View Book</a></li>
  <li><a  href="searchbook.php" >Search Book</a></li>
  <li><a  href="showissuebook.php?page=1" >Issued book</a></li>
  <li><a  href="" id="logout" data-uname="<?php echo $uname?>">Logout</a></li>
  </ul>
</div>
<div style="position: fixed;top:20%;left:270px;">
<form action="delete.php" method="post">
  <table>
     <tr><th colspan="6">Book Records</th></tr>
     <tr>
     <th width="110px">Book Name</th>
     <th width="110px">Author Name</th>
     <th width="90px">Price</th>
     <th width="90px">Quantity</th>
     <th width="90px">edit</th>
     <th width="90px">Delete</th>
     </tr>
     <?php
     $con=mysqli_connect('localhost','root');
     mysqli_select_db($con,'bms_db');
     $q="select *from book ORDER BY bid limit $page1,5";
     $result=mysqli_query($con,$q);
     $i=1;
		 while($raw=mysqli_fetch_array($result)){
		 ?>
	   <tr>
     <td><?php echo $raw['bname'];?></td>
     <td><?php echo $raw['aname'];?></td>
     <td><?php echo $raw['price'];?></td>
     <td><?php echo $raw['quantity'];?></td>
     <td><a href="updatebook.php?bid=<?php echo $raw['bid'];?>"><i style="color: white;"class="fa fa-edit" aria-hidden="true"></i></a></td>
     <td><input type="checkbox" value="<?php echo $raw['bid'];?>" name="b<?php echo $i;  $i++; ?>"></td>
     </tr>
		 <?php } ?>
     <tr><td colspan="6"><input type="submit"  id="delbook" value="Delete"></td></tr>
     <?php
     $q="select *from book ORDER BY bid";
     $result=mysqli_query($con,$q);
     $num=mysqli_num_rows($result);
     $a=$num/5;
     $a=ceil($a);
     ?>
     <tr><th colspan="6">page no
     <?php for($b=1;$b<=$a;$b++){ ?>
     <a style="text-decoration: underline;" href="viewbook.php?page=<?php echo $b?>"><?php echo "$b";?></a>
     <?php } mysqli_close($con); ?>
     </th></tr>
  </table>
</form>
</div>
<p align="right"><marquee width="80%" ><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>



   