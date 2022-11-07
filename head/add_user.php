<?php
    session_start();
    $role = $_SESSION['role'];
    if(!isset($_SESSION['username']) || $role!="Chairman"){
      header('Location: /surwash');
    }

    include ('../conn.php');

    include 'head.php';
    include 'nav.php';

        if(isset($_POST['user'])){
    //collecting form inputs using the specified method
    $Fname  = mysqli_real_escape_string($db, trim($_POST['fname']));
    $Sname  = mysqli_real_escape_string($db, trim($_POST['lname']));
    $role = mysqli_real_escape_string($db, trim($_POST['role']));
    $user = mysqli_real_escape_string($db, trim($_POST['username']));
    $pwd = mysqli_real_escape_string($db, trim($_POST['pass']));

    //check for empty field
    if(!empty($Fname) && !empty($Sname) && !empty($role) && !empty($user) && !empty($pwd)){

        
        //check for duplicate
        $check= "SELECT COUNT(*) FROM usr WHERE first_name = '".$Fname."' && last_name = '".$Sname."' && role = '".$role."' && user = '".$user."' && passwd = '".md5($pwd)."'";

        $sql = mysqli_query($db,$check);
            
        $row = mysqli_fetch_assoc($sql);  

        if($row['COUNT(*)'] == 0) {

            //insert values 
            $query="INSERT INTO usr (first_name, last_name, role, user, passwd) VALUES('$Fname', '$Sname', '$role', '$user', '".md5($pwd)."')";
            
            $action= mysqli_query($db, $query);

            if($action){
                $error="<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden='true'>&times;</button>
                       DATA IS SUCCESSFULLY SUMBITED <br> 
                    </div> "; 
            }
            else{
                $error="<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden='true'>&times;</button>
                       Error in Data Entry <br>
                       Please Contact The Web Admin
                    </div>";
                }
        }
        else{
            $error="<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                SORRY DUPLICATION IS NOT ALLOWED <br>
                </div>";
        }
    }
    else{
    
        $error="<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            PLEASE KINDLY FILL ALL REQUIRED FIELDS
        </div>";

        }
    }


?>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD USER</h2>
                        </div>

                            <?php
                                if(isset($error)){
                                    echo $error;
                                }
                            ?>

                        <div class="body">
                            <form id="form_validation" method="POST" action="add_user.php" name="user">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="fname" required>
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="lname" required>
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <input type="radio" name="role" id="head" value="Head" class="with-gap">
                                    <label for="head" class="m-l-20">ADMINISTRATOR</label>

                                    <input type="radio" name="role" id="officer" value="officer" class="with-gap">
                                    <label for="officer" class="m-l-20">Officer</label>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" required>
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="pass" required>
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit" name="user">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>
<?php
    include 'foot.php';
?>