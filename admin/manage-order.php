<?php
ob_start(); // needs to be added here
?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full text-left">
                    <tr>
                        <th class="text-center">S.N.</th>
                        <th class="text-center">Drink</th>
                        <th class="text-center">Drink_Size</th>
                        <th class="text-center">Sugar(mg)</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">QTY.</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Order Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $drink = $row['drink'];
                                $drink_size = $row['drink_size'];
                                $sugar_mg = $row['sugar'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                
                                ?>

                                    <tr>
                                        <td class="text-center"><?php echo $sn++; ?>. </td>
                                        <td class="text-center"><?php echo $drink; ?></td>
                                        <td class="text-center"><?php echo $drink_size; ?></td>
                                        <td class="text-center"><?php echo $sugar_mg; ?></td>
                                        <td class="text-center"><?php echo $price; ?></td>
                                        <td class="text-center"><?php echo $qty; ?></td>
                                        <td class="text-center"><?php echo $total; ?></td>
                                        <td class="text-center"><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="In-Progress")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Completed")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Canceled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>