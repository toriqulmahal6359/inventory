<?php
    //login.php
    include("database_connection.php");

    if(isset($_SESSION['type']))
    {
        header("location:index.php");
    }

    $message = "";
    if(isset($_POST["login"]))
    {
        $query = "SELECT * FROM user_details WHERE user_email= :user_email";
        $statement = $conn->prepare($query);

        $statement->execute(
                array(
                    'user_email' => $_POST["user_email"]
                )
            );
        
        $count = $statement->rowCount();
        if($count > 0)
        {
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                // if($_POST["user_password"] != NULL)
                    // {
                        if($_POST["user_password"] == $row["user_password"])
                            {
                                if($row['user_status'] == 'active')
                                {
                                    $_SESSION['type'] = $row['user_type'];
                                    $_SESSION['user_name'] = $row['user_name'];
                                    $_SESSION['user_email'] = $row['user_email'];
                                    header("location:index.php");
                                }
                                else
                                {
                                    $message = "<label>Your account is disabled. Please contact master</label>";
                                }
                            }
                            else
                            {
                                $message= "<label>Wrong Password</label>";
                            }
                    // }
            }
        }
        else
        {
            $message = "<label>Wrong Email Address</label>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>

</head>
<body>
    <div class="container">
        <h2 align="center">Inventory Management System</h2>
        <br>
        <div class="card card-default">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <?php echo $message; ?>
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="text" name="user_email" id="user_email" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-info" required/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>