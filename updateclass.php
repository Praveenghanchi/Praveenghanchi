<?php
include 'config.php';
$cid = $_POST['cid'];
$cname = $_POST['cname'];

$sql = "UPDATE `class` SET `cname`='$cname' WHERE cid = {$cid}";

$result = mysqli_query($conn,$sql) or die('ERROR') ;

header("Location:http://localhost/task/sudent_marksheet/view_class.php");

mysqli_close($conn);

?>