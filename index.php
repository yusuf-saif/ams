<?php
    session_start();
    include "conn.php";


    if(isset($_POST['login'])){

        //collecting form inputs using the specified method
        $username = mysqli_real_escape_string($db, $_REQUEST['usr']);
        $passw = mysqli_real_escape_string($db, $_REQUEST['pwd']);

        //Collect every user in the database to check if signing in user already exist
        $sql="SELECT * FROM usr WHERE user='$username' AND passwd='".md5($passw)."'";
        $query=mysqli_query($db, $sql);
        //count the rows in the recordset 
        $count=mysqli_num_rows($query);
            //Register sessions and reidrect to about page
            if($count == 1){
                while($row = mysqli_fetch_array($query)){
                    //$role = $row['role'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['username'] = $row['user'];
                    $_SESSION['fname'] = $row['first_name'];   
                    $_SESSION['lname'] = $row['last_name'];
                    $_SESSION['id'] = $row['usr_id'];   

                    }

                    
            if($_SESSION['role']== "Chairman"){

                header("location: /ams/head");

            }elseif ($_SESSION['role']=="officer"){

                header("location: /ams/officer");
            }

            }
            else{
                $error="<div class='alert alert-danger alert-dismissable'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                           Incorrect Login parameters
                </div>";
            }
              
    }
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACILITY MANAGEMENT SYSTEM</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css.css" rel="stylesheet" type="text/css">
    <link href="icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"> <b>FACILITY MANAGEMENT SYSTEM DEMO</b></a>
            <!-- <small>Urban water xxxx</small> -->
        </div>
        <div class="card">  
            <div class="body">

                <?php
                    if(isset($error)){
                        echo $error;
                    }
                ?>
                <form id="sign_in" method="POST" action="index.php" name="login">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usr" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href=""></a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href=""></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>