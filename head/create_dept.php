<?php
session_start();
$role = $_SESSION['role'];
$user = $_SESSION['username'];
if (!isset($_SESSION['username']) || $role != "Chairman") {
    header('Location: /ams');
}

include 'head.php';
include 'nav.php';


include('../conn.php');

$time = date("Y-m-d h:i");

if (isset($_POST['ksl_dept'])) {
    //collecting form inputs using the specified method
    $dept_name  = mysqli_real_escape_string($db, trim($_POST['dept_name']));
    $dept_code  = mysqli_real_escape_string($db, trim($_POST['dept_code']));

    //check for empty field
    if (!empty($dept_name) && !empty($dept_code)) {


        //check for duplicate
        $check = "SELECT COUNT(*) FROM ksl_dept WHERE dept_name = '" . $dept_name . "' && dept_code = '" . $dept_code . "'";


        $sql = mysqli_query($db, $check);

        $row = mysqli_fetch_assoc($sql);

        if ($row['COUNT(*)'] == 0) {

            //insert values 
            $query = "INSERT INTO ksl_dept (dept_name, dept_code, user, date) 
         VALUES('$dept_name', '$dept_code', '$user', '$time')";

            $action = mysqli_query($db, $query);
            if ($action) {
                $error = "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden=
                'true'>&times;</button>
                        DEPARTMENT  SAVED SUCCESSFULLY <br> 
                    </div> ";
            } else {
                $error = "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden=
                'true'>&times;</button>
                       Error in Data Entry <br>
                       Please Contact The Web Admin
                    </div>";
            }
        } else {
            $error = "<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss=
            'alert' aria-hidden='true'>&times;</button>
                SORRY DUPLICATION IS NOT ALLOWED <br>
                </div>";
        }
    } else {

        $error = "<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert'
             aria-hidden='true'>&times;</button>
            PLEASE KINDLY FILL ALL REQUIRED FIELDS
        </div>";
    }
}


?>
?>
<section class="content">
    <div class="container-fluid">

        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>DEPARTMENT REGISTRATION</h2>
                    </div>

                    <?php
                    if (isset($error)) {
                        echo $error;
                    }
                    ?>

                    <div class="body">
                        <form id="form_validation" method="POST" action="create_dept.php" name="ksl_dept">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="dept_name" required>
                                    <label class="form-label"> DEPARTMENT NAME </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="dept_code" required>
                                    <label class="form-label"> DEPARTMENT CODE </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line col-lg-6">
                                    <input type="datetime" class="form-control" name="date" value="<?php echo ($time) ?>" disabled="">
                                    <label class="form-label">DATE </label>
                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit" name="ksl_dept">CREATE DEPARTMENT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->

    </div>
    
</section>
<?php
// foreach ($_POST as $key => $value) {
//         echo "<tr>";
//         echo "<td>";
//         echo $key;
//         echo "</td>";
//         echo "<td>";
//         echo $value;
//         echo "<br>";
//         echo "</td>";
// }
    //     echo "<td>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "<br>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "<br>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "<br>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "<br>";
    //     echo "</td>";
    //      echo "</tr>";
    //}

include 'foot.php';
?>