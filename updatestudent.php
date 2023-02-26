<?php
include 'config.php';

$stu_id = $_POST['stu_id'];
$stu_name = $_POST['stu_name'];
$stu_class = $_POST['stu_class'];
$stu_dob = $_POST['stu_dob'];
$stu_rollno = $_POST['stu_rollno']; 

$sql = "UPDATE `students` SET `stu_name`='$stu_name',`stu_class`='$stu_class',`stu_dob`='$stu_dob',`stu_rollno`='$stu_rollno' WHERE stu_id = {$stu_id}";

$result = mysqli_query($conn,$sql) or die('ERROR') ;
if($result == 1){
    
    header("Location:view_student.php");
    
    mysqli_close($conn);
    echo  "<script>alert('Save Successfully ^_+')</script>";

}else{
    echo  "<script>alert('Save Unsuccessfully ⊙﹏⊙∥')</script>";

}

?>

