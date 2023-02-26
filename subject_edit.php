<?php 
//Connection 
include 'config.php';

$sub_id = $_GET['sub_id'];


$cid = $_GET['cid'];

$sql1 = "SELECT * FROM `subjects` WHERE sub_id = {$sub_id}";

$res1 = mysqli_query($conn, $sql1) ;

if (mysqli_num_rows($res1) > 0) {
    while ($row = mysqli_fetch_assoc($res1)) {



//======= Header =======
include 'header.php'; 

//======= Sidebar =======
 include 'sidebar.php'; 
 
 ?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Subject</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Subject</li>
                <li class="breadcrumb-item active">Edit Subject</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <form action="updatesubject.php" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Subject Code</label>
                    <div class="col-sm-10">
                        
                        <input type="hidden"  name="sub_id"  value="<?php echo $row['sub_id']; ?>" class="form-control">
                        <input type="text" name="sub_code" value="<?php echo $row['sub_code']; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" name="sub_name" value="<?php echo $row['sub_name']; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Save Edit</button>
                    </div>
                </div>
            </form>
            <?php } } ?>
        </div>
    </section>



</main>

<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>