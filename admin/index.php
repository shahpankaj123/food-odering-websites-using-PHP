
<?php include('partials/menu.php');
include("connect.php");
?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                   
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                       $sql="SELECT * FROM tbl_category";
                       $result=mysqli_query($conn,$sql); 
                       $count=mysqli_num_rows($result);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        $sql="SELECT * FROM tbl_food";
                        $result=mysqli_query($conn,$sql); 
                        $count=mysqli_num_rows($result);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql="SELECT * FROM tbl_order";
                        $result=mysqli_query($conn,$sql); 
                        $count=mysqli_num_rows($result);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                       $sql1="SELECT SUM(total) AS Total FROM tbl_order WHERE NOT status='Cancelled' ";
                       $result1=mysqli_query($conn,$sql1); 
                       $row1=mysqli_fetch_assoc($result1);
                       $total=$row1['Total'];
                    ?>

                    <h1>Rs <?php echo $total;  ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>