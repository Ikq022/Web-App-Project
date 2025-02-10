<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Stock</h1>

        <br /><br />

                <!-- Button to Add Drink -->
                <a href="<?php echo SITEURL; ?>admin/add-stock.php" class="btn-primary">Add Stock</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        
                        <th>Title</th>
                        <th>value</th>
                        
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Drink
                        $sql = "SELECT * FROM tbl_stock";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have drinks or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have Drink in Database
                            //Get the Drinks from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $Toppingname = $row['Toppingname'];
                                $value = $row['value'];
                                
                                ?>

                                <tr>
                                    <td><?php echo $Toppingname; ?>. </td>
                                    <td><?php echo $value; ?></td>
                                    
                                    
                                    
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-stock.php?Toppingname=<?php echo $Toppingname; ?>" class="btn-secondary">Update Stock</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-stock.php?Toppingname=<?php echo $Toppingname; ?>" class="btn-danger">Delete Stock</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Drink not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Stock not Added Yet. </td> </tr>";
                        }

                    ?>

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>