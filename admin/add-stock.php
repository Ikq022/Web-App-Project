<?php ob_start();?>
<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Stock</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Toppingname: </td>
                    <td>
                        <input type="text" name="Toppingname" placeholder="Toppingname">
                    </td>
                </tr>
                <tr>
                    <td>Value: </td>
                    <td>
                        <input type="text" name="value" placeholder="Value">
                    </td>
                </tr>
                

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Stock" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the Drink in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $Toppingname = $_POST['Toppingname'];
                $value = $_POST['value'];
                
                
                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO tbl_stock SET 
                    Toppingname = '$Toppingname',
                    value = $value
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res2 == true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'>Stock Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-stock.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Stock.</div>";
                    header('location:'.SITEURL.'admin/manage-stock.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>