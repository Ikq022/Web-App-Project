
    <?php include('partials-front/menu.php'); ?>

    <!-- drink sEARCH Section Starts Here -->
    <section class="drink-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Drinks on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- drink sEARCH Section Ends Here -->



    <!-- drink MEnu Section Starts Here -->
    <section class="drink-menu">
        <div class="container">
            <h2 class="text-center">Drink Menu</h2>

            <?php 

                //SQL Query to Get drink based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM drink WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM tbl_drink WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether drink available of not
                if($count>0)
                {
                    //drink Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="drink-menu-box">
                            <div class="drink-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/drink/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve image-size">
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

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //drink Not Available
                    echo "<div class='error'>Drink not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- drink Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
