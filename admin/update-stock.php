<?php
ob_start(); // needs to be added here
?>
<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['Toppingname']))
    {
        //Get all the details
        $Toppingname = $_GET['Toppingname'];

        //SQL Query to Get the Selected Drink
        $sql2 = "SELECT * FROM tbl_stock WHERE Toppingname='$Toppingname'";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Drink
        $name = $row2['Toppingname'];
        $value = $row2['value'];
        

    }
    else
    {
        //Redirect to Manage Drink
        header('location:'.SITEURL.'admin/manage-stock.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Stock</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>ToppingName: </td>
                <td>
                    <input type="text" name="Toppingname" value="<?php echo $name; ?>">
                </td>
            </tr>

            

            <tr>
                <td>Value: </td>
                <td>
                    <input type="number" name="value" value="<?php echo $value; ?>">
                </td>
            </tr>

            

            <tr>
                <td>
                    <input type="submit" name="submit" value="Update Stock" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";

                //1. Get all the details from the form
               
                $name = $_POST['Toppingname'];
            
                $value = $_POST['value'];
                
                //2. Upload the image if selected

                //CHeck whether upload button is clicked or not
                

                //4. Update the Food in Database
                $sql3 = "UPDATE tbl_stock SET Toppingname = '$name', value=$value  WHERE Toppingname = '$Toppingname'";

                //Execute the SQL Query
                $res3 = mysqli_query($conn, $sql3);

                //CHeck whether the query is executed or not 
                if($res3==true)
                {
                    //Query Exectued and Drink Updated
                    $_SESSION['update'] = "<div class='success'>Stock Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-stock.php');
                }
                else
                {
                    //Failed to Update Drink
                    $_SESSION['update'] = "<div class='error'>Failed to Update Stock.</div>";
                    header('location:'.SITEURL.'admin/manage-stock.php');
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>