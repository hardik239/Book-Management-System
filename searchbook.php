<?php
  session_start();
  if (!isset($_SESSION['username']))
  header('location:http://localhost/book_management/Admin.php');
   $uname = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
<title>search book</title>
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
<?php 
  if(isset($_POST['bname'])){
  $bname=$_POST['bname'];?>
<div style="position: fixed;top:30%;left:20%;">
 <table style="width:900px;font-size: 20px;height: 150px;">
  <tr><th colspan="6">Book Records</th></tr>
  <tr>
  <th width="90px">Book ID</th>
  <th width="110px">Book Name</th>
  <th width="110px">Author Name</th>
  <th width="90px">Price</th>
  <th width="90px">Quantity</th>
  <th width="90px">Update</th>
  </tr>
  <?php
     $con=mysqli_connect('localhost','root');
     mysqli_select_db($con,'bms_db');
     $q="select *from book";
     $result=mysqli_query($con,$q);
     $c="0";
     while ($raw=mysqli_fetch_array($result)) {
     if($raw['bname']==$bname){
     $c="1";
     break;
    } }
    if($c=="1"){ ?>
	    <tr>
	    <td><?php echo $raw['bid'];?></td>
      <td><?php echo $raw['bname'];?></td>
      <td><?php echo $raw['aname'];?></td>
      <td><?php echo $raw['price'];?></td>
      <td><?php echo $raw['quantity'];?></td>
      <td><a href="updatebook.php?bid=<?php echo $raw['bid'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
      </tr>
      <?php } else { ?>
      <tr>
      <td colspan="6">Book Not Found</td>
      </tr>
      <?php  }?>
      <tr><td colspan="6" ><a href="">Click To Search Again.</a></td></tr>
      </table>
      </div>
      <?php  }   else {  ?>
      <div style="position: fixed;top:30%;left:30%;">
      <table style="width: 200px;height: 20px;">
      <tr><th colspan="4">Search Records</th></tr>
      <tr>
      <form action="searchbook.php" method="post">
      <td colspan="3"><input type="text" name="bname" placeholder=" book name" style="width: 400px;height: 20px;"></td>
      <td><input type="submit" value="search"></td>
      </form>
      </tr>
      </table>
      </div>
      <?php } ?>
<p align="right"><marquee width="80%" ><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>