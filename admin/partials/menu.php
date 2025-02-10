<?php 

    include('../config/constants.php'); 
    include('login-check.php');

?>


<html>
    <head>
    <style >
        a{
            color:white;
        }
        li{
            font-size: 30px;
            color:white;
        }
        .menu-color{
            background-color: #eb8325;
            border-radius: 50px;
        }
        .text-white{
            color:white;
        }
        .bg-col{
                background-color: #eb8325;
                border-radius: 50px;
                padding: 10px;
        }
        .text-w{
            color:white;
        }
    </style>
        <title>Drink Order Website - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center ">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php" class="menu-color bg-col text-white">Home</a></li>
                    <li><a href="manage-admin.php" class="menu-color bg-col">Admin</a></li>
                    <li><a href="manage-category.php" class="menu-color bg-col">Category</a></li>
                    <li><a href="manage-drink.php" class="menu-color bg-col">Drink</a></li>
                    <li><a href="manage-stock.php" class="menu-color bg-col">Stock</a></li>
                    <li><a href="manage-order.php" class="menu-color bg-col">Order</a></li>
                    <li><a href="logout.php" class="menu-color bg-col">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->