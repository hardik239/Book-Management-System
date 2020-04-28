<?php
session_start();

$bid=$_GET['bid'];
if (!isset($_SESSION['username']))
  header('location:http://localhost/book_management/student.php');

$uname=$_SESSION['username'];

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'bms_db');

$q="select *from student";
$result=mysqli_query($con,$q);
   while ($raw=mysqli_fetch_array($result))
      if($raw['name']==$uname)
      	   $id=$raw['id'];
   $a="1";
$q="select *from book";
$result=mysqli_query($con,$q);
   while ($raw=mysqli_fetch_array($result))
      if($raw['bid']==$bid){
      	$bname=$raw['bname'];
      	$aname=$raw['aname'];
      	$price=$raw['price'];
      	$a="0";
      }

   if($a=="0"){
$q="INSERT INTO issuebook(bid,bname,aname,price,id) values($bid,'$bname','$aname',$price,'$id')";
  $status=mysqli_query($con,$q);
  
$q="UPDATE book SET quantity=quantity-1 WHERE bid=$bid ";
$result=mysqli_query($con,$q);
  header('location:http://localhost/book_management/studentissue.php?page=1');
  }
  mysqli_close($con);

?>