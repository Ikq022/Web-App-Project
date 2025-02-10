    <?php include('partials-front/menu.php'); ?>
    <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","fr","it","es","th"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
    <!-- drink sEARCH Section Starts Here -->
    <section class="drink-search text-center">
        <div class="container">
        <style>
            .btn{
                padding: 1%;
                border: none;
                font-size: 1rem;
                border-radius: 5px;
            }
            .btn-primary{
                background-color: orange;
                color: white;
                cursor: pointer;
            }
            .btn-primary:hover{
                color: black;
                background-color: red;
            }
        </style>
            
            <form action="<?php echo SITEURL; ?>drink-search.php" method="POST">
                <input id ="search" type="search" name="search" placeholder="Search for Drink.." required>
                <input id ="submit" type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- drink sEARCH Section Ends Here -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 id = "ExploreDrinks"class="text-center">Explore Drinks</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tb_category WHERE active='Yes' AND featured='Yes' LIMIT 10";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-drinks.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- drink MEnu Section Starts Here -->
    <section class="drink-menu">
        <div class="container">
            <h2 class="text-center">Drink Menu</h2>

            <?php 
            
            //Getting drinks from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_drink WHERE active='Yes' AND featured='Yes'";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether drink available or not
            if($count2>0)
            {
                //drink Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $drink_size = $row['drink_size']; // d
                   //  $extra_sugar(mg) = $row['extra_sugar(mg)']; // d
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="drink-menu-box">
                        <div class="drink-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div id ='Not available' class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/drink/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="drink-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <!--<p class = "drink-price"><?php echo $drink_size; ?> </p>-->
                            <p class="drink-price">$<?php echo $price; ?></p>
                            <p class="drink-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a id="OrderNow" href="<?php echo SITEURL; ?>order.php?drink_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //drink Not Available 
                echo "<div id='Notavailable' class='error'>Drink not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- drink Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>