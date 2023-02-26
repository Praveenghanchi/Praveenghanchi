<?php 
//Connection 
include 'config.php';


$cname = $_POST['cname'];

$sql = "INSERT INTO `class` (`cname`) VALUES ('$cname')" ;



if(isset($_POST['submit'])){

    $res = mysqli_query($conn,$sql);

    if($res  > 0){
        echo "<script>alert('Submit Successfully')</script>";
    }
}

$sql = "SELECT * FROM `class` ORDER BY `class`.`cid` ASC" ;

$res = mysqli_query($conn,$sql);

//======= Header =======
include 'header.php' ;

// ======= Sidebar ======= 
 include 'sidebar.php'; 
 
 ?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Class</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Class</li>
                <li class="breadcrumb-item active">View Class</li>
            </ol>
        </nav>
    </div>

    <!-- Table -->
    <section class="section dashboard">
        <div class="row">
           <h1>Class List</h1>
        <table class="table table-bordered table-info table-striped">
       <thead>
       <th width='80';>Sr. no.</th>
       <th>Class Name</th>
       <th>Action</th>
       </thead>
       <tbody>
        <?php if(mysqli_num_rows($res)>0){

            while($row= mysqli_fetch_assoc($res)){

         ?>
           <tr>
               <td><?php echo $row['cid']  ;?></td>
               <td><?php echo $row['cname']  ;?></td>
               <td width='120'>
                   <a class="mx-2" href='class_edit.php?cid=<?php echo $row['cid']; ?>'><i class="bi bi-pencil-square"></i></a>
                   <a href='deleteclass.php?cid=<?php echo $row['cid']; ?>'><i class="bi bi-trash3-fill"></i></a>
               </td>
               <?php } }?>
           </tr>
       </tbody>
   </table>
        </div>
    </section>


</main>


<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>