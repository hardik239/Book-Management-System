<!DOCTYPE html>
<html>
<head>
<title>Return Book</title>
<link rel="stylesheet" href="hardikstyle.css">
<link rel="stylesheet"  href="css/all.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username']))
    header('location:http://localhost/book_management/student.php');
    $uname=$_SESSION['username'];
if (isset($_POST['bname'])&&isset($_POST['aname'])){
           $con=mysqli_connect('localhost','root');
            mysqli_select_db($con,'bms_db');
            $bname= $_POST['bname'];
            $aname=$_POST['aname'];
   
            $q="select *from student";
             $result=mysqli_query($con,$q);
                 while ($raw=mysqli_fetch_assoc($result))
                    if($raw['name']==$uname)
                           $id=$raw['id'];

            $q="select *from book";
             $result=mysqli_query($con,$q);
                 while ($raw=mysqli_fetch_assoc($result))
                    if($raw['bname']==$bname)
                           $bid=$raw['bid'];
      
            $q="select *from issuebook";
            $result=mysqli_query($con,$q);
                 while ($raw=mysqli_fetch_assoc($result))
                    if($raw['bname']==$bname && $aname==$raw['aname'] && $raw['id']==$id){
                             $q="UPDATE book SET quantity=quantity+1 WHERE bid=$bid";
                                  $status=mysqli_query($con,$q);
                             $q="DELETE FROM issuebook WHERE bname='$bname' && id='$id'";
                                  $status=mysqli_query($con,$q);  
                             }  
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
  <li><a href="studentissue.php?page=1" >Issue Book</a></li>
  <li><a href="student_search.php" >Search Book</a></li>
  <li><a href="returnbook.php" >Return Book</a></li>
  <li><a href="" id="logout"  data-uname="<?php echo $uname?>">Logout</a></li>
  </ul>
</div>
<div class="box" style="height: 260px;">
<font style="left: 75px;">Book Data</font>
<form action="returnbook.php" method="post" id="retbook">
  <input type="text" name="bname" placeholder=" book name" required>
  <input type="text" name="aname" placeholder=" author name" required>
  <input type="submit" value="Return Book">
</form>
</div>
<p align="right"><marquee width="80%" ><font class="heading">Welcome To Book Management System</font></marquee></p>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
</body>
</html>

