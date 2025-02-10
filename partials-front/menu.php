<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J&Q Juicy Juice Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            font-size: 30px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar menu-color">
        <style>
            .bg-col{
                background-color: #eb8325;
                border-radius: 50px;
                padding: 30px;
            }
            .bg-col primary{
                color:white;
                
            }
            .img-res{
                width: 150%;
                
                border-radius: 10px;
            }
            .bg-0{
                background-color:black;
            }
        </style>
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo2.png" alt="Restaurant Logo" class="img-res">
                </a>
            </div>

            <div class="menu text-right">
                <h5>
                <ul>
                    <li>
                        <a id= "Home" href="<?php echo SITEURL; ?>" class="bg-col bg-col primary"> Menu </a>
                    </li>
                    <li>
                        <a id="Categories" href="<?php echo SITEURL; ?>categories.php" class="bg-col bg-col primary"> Categories </a>
                    </li>
                    <li>
                        <a id="Drinks" href="<?php echo SITEURL; ?>drinks.php" class="bg-col bg-col primary"> Drinks </a>
                    </li>
                    
                </ul>
                </h5>
            </div>

            <div class="clearfix"></div>
        </div>
       
    </section>
    <!-- Navbar Section Ends Here -->