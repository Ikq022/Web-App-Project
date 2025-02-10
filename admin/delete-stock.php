<?php ob_start();?>
<?php 
    //Include COnstants Page
    include('../config/constants.php');

    //echo "Delete Stock Page";

    
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
    $Toppingname = $_GET['Toppingname'];
        

        //2. Remove the Image if Available
        //CHeck whether the image is available or not and Delete only if available
        

        

        //3. Delete Drink from Database
    $sql = "DELETE FROM tbl_stock WHERE Toppingname = '$Toppingname'";
        //Execute the Query
    $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Drink with Session Message
    if($res==true)
    {
            //Drink Deleted
        $_SESSION['delete'] = "<div class='success'>Stock Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-stock.php');
    }
    else
    {
            //Failed to Delete Drink
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Stock.</div>";
        header('location:'.SITEURL.'admin/manage-stock.php');
    }

        

    
?>