<?php
//Connection 
include 'config.php';


$cid = $_GET['cid'];

$sql1 = "SELECT * FROM `class` WHERE cid = {$cid}";

$res1 = mysqli_query($conn, $sql1) ;

if (mysqli_num_rows($res1) > 0) {
    while ($row = mysqli_fetch_assoc($res1)) {



        //======= Header =======
        include 'header.php';

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
                        <li class="breadcrumb-item active">Edit Class</li>
                    </ol>
                </nav>
            </div>

            <!-- Form -->
            <section class="section dashboard">
                <div class="row">
                    <form action="updateclass.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Class</label>
                            <div class="col-sm-10">
                            <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>"/>
                                <input type="text" name="cname" value="<?php echo $row['cname'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Save Edit</button>
                            </div>
                        </div>
                <?php }
        }

                ?>
                    </form>
                </div>
            </section>



        </main>

        <!-- ======= Footer ======= -->
        <?php include 'footer.php' ?>