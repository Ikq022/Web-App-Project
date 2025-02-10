    <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","fr","it","es","th"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tb_category WHERE id=$category_id"; //d

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- drink sEARCH Section Starts Here -->
    <section class="drink-search text-center">
        <div class="container">
            
            <h2>Drinks on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- drink sEARCH Section Ends Here -->



    <!-- drink MEnu Section Starts Here -->
    <section class="drink-menu">
        <div class="container">
            <h2 class="text-center">Drink Menu</h2>

            <?php 
            
                //Create SQL Query to Get drink based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_drink WHERE category_id=$category_id"; //d

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether drink is available or not
                if($count2>0)
                {
                    //drink is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="drink-menu-box">
                            <div class="drink-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
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
                                <p class="drink-price">$<?php echo $price; ?></p>
                                <p class="drink-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?drink_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //drink not available
                    echo "<div class='error'>Drink not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- drink Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>