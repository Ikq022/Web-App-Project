<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","fr","it","es","th"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
    <?php include('partials-front/menu.php'); ?>

    <!-- drink sEARCH Section Starts Here -->
    <section class="drink-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>drink-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Drink.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- drink sEARCH Section Ends Here -->



    <!-- drink MEnu Section Starts Here -->
    <section class="drink-menu">
        <div class="container">
            <h2 class="text-center">Drink Menu</h2>

            <?php 
                //Display drink that are Active
                $sql = "SELECT * FROM tbl_drink WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the drinks are availalable or not
                if($count>0)
                {
                    //drink Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $drink_size = $row['drink_size'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="drink-menu-box">
                            <div class="drink-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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
                                <!--<p class="drink-price"><?php echo $drink_size; ?></p>-->
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
                    //drink not Available
                    echo "<div class='error'>Drink not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- drink Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>