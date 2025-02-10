<?php
ob_start(); // needs to be added here
?>
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","fr","it","es","th"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
<?php include('partials-front/menu.php'); ?>
<?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
?>
    <?php 
        //CHeck whether drink id is set or not
        if(isset($_GET['drink_id']))
        {
            //Get the drink id and details of the selected drink
            $drink_id = $_GET['drink_id'];
            //Get the DEtails of the SElected drink
            $sql = "SELECT * FROM tbl_drink WHERE id=$drink_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $drink_size = $row['drink_size'];
            }
            else
            {
                //drink not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>
    <style>
        .bg-drink{
            background-color:orange;
        }
        .bg-drink2{
            background-color: black;
        }
        .bg-curve{
            border-radius: 10px;
        }
        .text-b{
            color: black;
        }
        .bgn{
        margin: 5px;
        width: 30%;
        padding: 2%;
        }
        .bgn-primary{
        background-color: black;
        padding: 1%;
        color: white;
        text-decoration: none;
        font-weight: bold;
        }
        .bgn-primary:hover{
        background-color: blue;
        }
    </style>
    <!-- drink sEARCH Section Starts Here -->
    <section class="drinkdonk">
        <div class="container bg-drink text-b bg-curve">
            <h3 class="text-center text-white bg-drink2 bg-curve">Fill this form to confirm your order.</h3>
            <form action="" method="POST" class="order">
                <fieldset>
                    <!--<div class = "text-center">Selected Drink</div>-->
                    <div class="drink-menu-img">
                        <?php 
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/drink/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve bg-drink">
                                <?php
                            }
                        ?>
                    </div>
                    <div class="drink-menu-desc bg-drink text-center ">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="drink" value="<?php echo $title; ?>">
                        <div class="order-label">Size</div>
                        <p class="drink-price"><?php echo $drink_size; ?></p>
                        <input type="hidden" name="drink_size" value="<?php echo $drink_size; ?>">
                        <div class="order-label">Price</div>
                        <p class="drink-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        <div class="order-label">Sugar</div>
                        <input type="number" name="sugar" class="input-responsive" value="1" required>
                        
                        
                        <input type="submit" name="submit" value="Confirm Order" class="bgn bgn-primary bg-curve">
                    </div>
                </fieldset>
                <!--<fieldset>
                    <legend class="text-center">Orders Details</legend>
                    <div class="order-label text-center">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. qqqq" class="input-responsive" required>
                    
                    <div class="drink-menu-desc bg-drink text-center ">
                </div>
                </fieldset>-->
            </form>
            <?php 
                //CHeck whether submit button is clicked or not
                
                date_default_timezone_set("Asia/Bangkok");
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form
                    $drink = $_POST['drink'];
                    $drink_size = $_POST['drink_size'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $sugar = $_POST['sugar'];
                    $total = $price * $qty; // total = price x qty 
                    $order_date = date("Y-m-d h:i:sa"); //Order DAte
                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
                    //Save the Order in Databaase
                    //Create SQL to save the data
                    
                    
                    
                        
            
                    $sql6 = "SELECT * FROM tbl_stock WHERE Toppingname='sugar'";
            
                    $res6 = mysqli_query($conn, $sql6);
            
                    $count1 = mysqli_num_rows($res6);
            //CHeck whether the data is available or not
                    if($count1==1)
                    {
                //WE Have DAta
                //GEt the Data from Database
                    $row1 = mysqli_fetch_assoc($res6);
                    $value = $row1['value'];
                    
                    }
                    else
                    {
                //drink not Availabe
                //REdirect to Home Page
                        header('location:'.SITEURL);
                    }
                    if($qty*$sugar <=$value){
                        $sql5 = "UPDATE tbl_stock SET value = (value - $sugar*$qty) WHERE Toppingname='sugar'";
                        $res5 = mysqli_query($conn, $sql5);
                        
                    }else{
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Drink(Out of Sugars).</div>";
                        header("location:http://jq-juicyjuice.zya.me/order.php?drink_id=$drink_id");
                        die();
                    }
                    $sql2 = "INSERT INTO tbl_order SET
                        drink = '$drink',
                        drink_size = '$drink_size',
                        price = $price,
                        qty = $qty,
                        sugar = $sugar,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status'
                    ";
                    
                    //echo $sql2; die();
                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true){
                        $_SESSION['order'] = "<div class='success text-center'>Drink Ordered Successfully.<?php echo $total; ?></div>";
                        header('location:'.SITEURL);
                        
                        //Query Executed and Order Saved
                        
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Drink.</div>";
                        header('location:'.SITEURL);
                        
                    }
                }
            ?>
        </div>
    </section>
    <!-- drink sEARCH Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>