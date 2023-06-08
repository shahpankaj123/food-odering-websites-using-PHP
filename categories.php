<?php include("header.php");
include("connect.php");
?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            $sql="SELECT * FROM `tbl_category` WHERE active='Yes' ";
            $result=mysqli_query($conn,$sql);

           while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $title=$row['title'];
            $img=$row['image_name'];
    
           ?>
            <a href="category-foods.php?id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <img src="images/category/<?php echo $img; ?>" alt="<?php echo $img; ?>" class="img-responsive img-curve" width="400px" height="400px">

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
            <?php } ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include("footer.php"); ?>