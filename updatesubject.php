<?php
include 'config.php';
$sub_id = $_POST['sub_id'];
$sub_code = $_POST['sub_code'];
$sub_name = $_POST['sub_name'];

$sql = "UPDATE `subjects` SET `sub_code`='$sub_code',`sub_name`='$sub_name' WHERE sub_id = {$sub_id}";

$result = mysqli_query($conn,$sql) or die('ERROR') ;

header("Location:http://localhost/task/sudent_marksheet/view_subject.php");

mysqli_close($conn);

?>