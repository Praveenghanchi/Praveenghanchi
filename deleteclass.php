<?php 
include 'config.php';

echo $cid =$_GET['cid'];

$sql = "DELETE FROM class WHERE `class`.`cid` = $cid";


$result = mysqli_query($conn,$sql) ;
if(isset($result)){
    header("Location:view_class.php");
}



mysqli_close($conn);

?>