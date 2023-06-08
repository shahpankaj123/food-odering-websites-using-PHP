<?php include("header.php");
  include("connect.php");
 ?>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
           $category_id=$_GET['id'];
           $sql="SELECT * FROM `tbl_food` WHERE category_id='$category_id' AND active='Yes'";
           $result=mysqli_query($conn,$sql);

           while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $title=$row['title'];
            $desc=$row['description'];
            $price=$row['price'];
            $img=$row['image_name'];

    
           ?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $img ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="200px" height="100px" >
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="food-price">Rs <?php echo $price ?></p>
                    <p class="food-detail">
                        <?php echo $desc ?>
                    </p>
                    <br>

                    <a href="order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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