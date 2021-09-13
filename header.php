<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <title>Inventory Management System</title>
</head>
<body>
   <div class="container">
        <h2 align="center">Inventory management System</h2>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <?php 
                            if(isset($_SESSION['type']) != NULL){
                            if($_SESSION['type'] == 'master')
                            {
                        ?>
                                <li class="nav-item"><a class="nav-link" href="user.php">User</a></li>
                                <li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>
                                <li class="nav-item"><a class="nav-link" href="brand.php">Brand</a></li>
                                <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
                        <?php
                            }
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>

                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggler" href="#"><span class="badge badge-pill badge-danger count">
                                <?php if(isset($_SESSION["user_name"]) != ''){echo $_SESSION["user_name"];} ?></span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>
   </div> 
</body>
</html>