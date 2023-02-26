<?php
  // Connection 
  include 'config.php';

  $sql = "SELECT * FROM `subjects` ORDER BY `subjects`.`sub_id` ASC";

  $res = mysqli_query($conn,$sql);



  

 //<!-- ======= Header ======= -->
 include 'header.php'; 

//  <!-- ======= Sidebar ======= -->
  include 'sidebar.php'; 
  ?>

 <!-- ======= Main ======= -->
 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Student</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                 <li class="breadcrumb-item">Student</li>
                 <li class="breadcrumb-item active">View Student</li>
             </ol>
         </nav>
     </div>

     <!-- Table -->
     <section class="section dashboard">
         <div class="row">
            <h1>Students List</h1>
         <table class="table table-bordered table-info">
        <thead>
        <th width='120';>Subject Code</th>
        <th>Subject Name</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php  

if(mysqli_num_rows($res)>0){

                while($row = mysqli_fetch_assoc($res)){
        
        
        ?> 

            <tr>
                <td><?php echo $row['sub_code'] ;?></td>
                <td><?php echo $row['sub_name'] ;?></td>
                <td width='120'>
                    <a class="mx-2" href='subject_edit.php?sub_id=<?php echo $row['sub_id']; ?>'><i class="bi bi-pencil-square"></i></a>
                    <a href='deletesub.php?sub_id=<?php echo $row['sub_id']; ?>'><i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
         </div>
     </section>


 </main>

 <!-- ======= Footer ======= -->
 <?php include 'footer.php' ?>