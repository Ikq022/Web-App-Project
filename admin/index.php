
<?php include('partials/menu.php'); ?>
        <!-- Main Content Section Starts -->
        <div class="main-content bg-white">
        <style>
            .bg-white{
                background-color: white;
            }
            .bg-orange{
                background-color: orange;
            }
            .bg-curve{
                border-radius: 10px;
            }
            .bg-grey{
                border-radius: 10px;
                background-color: lightgrey;
            }
            .text-w{
                color:white;
            }
        </style>
            <div class="wrapper bg-grey">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center bg-orange text-w bg-curve">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tb_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center bg-orange text-w bg-curve">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_drink";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Drinks
                </div>

                <div class="col-4 text-center bg-orange text-w bg-curve">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center bg-orange text-w bg-curve">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Completed'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>