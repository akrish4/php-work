 <!DOCTYPE html>
 <!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <html>

 <head>
     <meta charset="UTF-8">
     <title></title>
 </head>

 <?php
    $con = mysqli_connect("localhost", "admin", "admin4321", "ecommerce") or die(mysqli_error($con));

    $select_query = "SELECT  id ,  first_name ,  last_name , phone  FROM users";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

    ?>
 <!DOCTYPE html>

 <head>
     <title>Users</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!--jQuery library-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <!--Latest compiled and minified JavaScript-->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 </head>

 <body>
     <div class="container">
         <?php while ($row = mysqli_fetch_array($select_query_result)) { ?>
             <div class="row">
                 <div class="col-lg-12">
                     <h4>User</h4>
                 </div>
             </div>
             <div class="row">
                 <div class="col-xs-2">ID</div>
                 <div class="col-xs-10"><?php echo $row['id']; ?></div>
             </div>
             <div class="row">
                 <div class="col-xs-2">First Name</div>
                 <div class="col-xs-10"><?php echo $row['first_name']; ?></div>
             </div>
             <div class="row">
                 <div class="col-xs-2">Last Name</div>
                 <div class="col-xs-10"><?php echo $row['last_name']; ?></div>
             </div>
             <div class="row">
                 <div class="col-xs-2">Phone</div>
                 <div class="col-xs-10"><?php echo $row['phone']; ?></div>
             </div>
             <div class="row">
                 <div class="col-xs-2">Products</div>
                 <div class="col-xs-10"><?php echo number_of_products_purchased($con, $row['id']); ?></div>
             </div>
             <hr />
         <?php } ?>
     </div>
 </body>

 </html>
 <?php

    function number_of_products_purchased($con, $user_id)
    {
        $users_products_query = "SELECT  id FROM users_products WHERE user_id = '$user_id'";
        $users_products_result = mysqli_query($con, $users_products_query);
        $number_of_products = mysqli_num_rows($users_products_result);
        return $number_of_products;
    }
    ?>