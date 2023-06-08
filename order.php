<?php include("header.php");
include("connect.php");

    $id=$_GET['id'];
   $sql="SELECT * FROM `tbl_food`WHERE id='$id'";
   $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $title=$row['title'];
    $price=$row['price'];
    $img=$row['image_name'];

 ?>
    
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $img; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="200px" height="100px">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <p class="food-price">Rs <?php echo $price; ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <?php 
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $food=$title;
        $qty=$_POST['qty'];
        $t_price=$qty*$price;
        $date=date("Y-m-d H:i:s");
        $contactname=$_POST['full-name'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];
         
        $sql1="INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES (NULL, '$food', '$price', '$qty', '$t_price', '$date', 'ordered', '$contactname', '$contact', '$email', '$address')";
        $result1=mysqli_query($conn,$sql1);
        if($result){
            session_start();
            $_SESSION['order']="true";
            header("location: index.php");
        }else{
            session_start();
            $_SESSION['unorder']="true";
            header("location: index.php");
        }


       }
    
    
    ?>
    <!-- fOOD sEARCH Section Ends Here -->

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