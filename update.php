  <?php
  session_start();
      if (!isset($_SESSION['username']))
             header('location:http://localhost/book_management/Admin.php');
   $bid=$_GET['bid'];
   $bname=$_POST['bname']; 
   $aname=$_POST['aname']; 
   $price=$_POST['price']; 
   $quantity=$_POST['quantity']; 
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'bms_db');
$q="UPDATE book SET bname='$bname', aname='$aname', price=$price , quantity=$quantity WHERE bid=$bid ";
$status=mysqli_query($con,$q);
if ($status)
header('location:http://localhost/book_management/viewbook.php?page=1');
mysqli_close($con);    
?>