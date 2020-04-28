<?php
session_start();
if (!isset($_SESSION['username']))
    header('location:http://localhost/book_management/admin.php');
   $k=1; 
   $size=sizeof($_POST);  
   for ($j=1; $j<=$size ;$j++,$k++){
   	$index="b".$k;
   	if(isset($_POST[$index]))
        $del[$j]=$_POST[$index];
    else
    	$j--;
   }

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'bms_db');
for ($h=1;$h<=$size;$h++) { 
$q="DELETE FROM book WHERE bid=".$del[$h];
$result=mysqli_query($con,$q);
}
  if($result==1)
  header('location:http://localhost/book_management/viewbook.php?page=1');
  mysqli_close($con);
    
?>