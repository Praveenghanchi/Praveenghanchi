<?php 
include 'config.php';

$sub_id =$_GET['sub_id'];

$sql1 = "DELETE FROM subjects WHERE `sub_id` = $sub_id";



$result1 = mysqli_query($conn,$sql1) or die("Query Unsuccessfully");
if(isset($result1)){
    header("Location:view_subject.php");
}


mysqli_close($conn);

?>