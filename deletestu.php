<?php 
include 'config.php';

$stu_id =$_GET['stu_id'];

$sql1 = "DELETE FROM students WHERE `stu_id` = $stu_id";



$result1 = mysqli_query($conn,$sql1) or die("Query Unsuccessfully");
if(isset($result1)){
    header("Location:view_student.php");
}


mysqli_close($conn);

?>