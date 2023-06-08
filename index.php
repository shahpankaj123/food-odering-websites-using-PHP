<?php include("header.php");
  include("connect.php");

?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    <!-- CAtegories Section Starts Here -->
    

    <section class="categories">
        <div class="container">
            <?php
            session_start();
              if(isset($_SESSION['order'])){
                echo " <div class='order-success-message'>
                <h2>Order Successful!</h2>
                <p>Thank you for your purchase.</p>
                <p>Your order will be shipped soon.</p>
                </div>";
                unset($_SESSION['order']);
              }
            ?><br><br>
            <h2 class="text-center">Explore Foods</h2>
           <?php
           $sql="SELECT * FROM `tbl_category` WHERE featured='Yes' AND active='Yes' LIMIT 3";
           $result=mysqli_query($conn,$sql);

           while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $title=$row['title'];
            $img=$row['image_name'];

    
           ?>
            <a href="category-foods.php?id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <img src="images/category/<?php echo $img; ?>" alt="Pizza" class="img-responsive img-curve" width="400px" height="500px">

                <h3 class="float-text text-white"><?php echo $title ?></h3>
            </div>
            </a>
            <?php } ?>

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php
           $sql="SELECT * FROM `tbl_food` WHERE featured='Yes' AND active='Yes' LIMIT 6";
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
                    <img src="images/food/<?php echo $img ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="200px" height="100px">
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

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
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
   <?php
   include("footer.php");
   ?>