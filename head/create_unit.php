<?php
 session_start();
 $role = $_SESSION['role'];
 $user = $_SESSION['username'];
 if(!isset($_SESSION['username']) || $role!="Chairman"){
   header('Location: /ams');
 }

 include 'head.php';
 include 'nav.php';


 include ('../conn.php');

     $time=date("Y-m-d h:i") ;

     if(isset($_POST['ksl_unit'])){
 //collecting form inputs using the specified method
 $dept_name = mysqli_real_escape_string($db, trim($_POST['dept_name']));
 $unit_name  = mysqli_real_escape_string($db, trim($_POST['unit_name']));
 $unit_code  = mysqli_real_escape_string($db, trim($_POST['unit_code']));
 
 //check for empty field
 if(!empty($dept_name) && !empty($unit_name) && !empty($unit_code)){

     
     //check for duplicate
     $check= "SELECT COUNT(*) FROM ksl_unit WHERE dept_name = '".$dept_name."'
      && unit_name = '".$unit_name."' && unit_code = '".$unit_code."'";


     $sql = mysqli_query($db,$check);
         
     $row = mysqli_fetch_assoc($sql);  

     if($row['COUNT(*)'] == 0) {

         //insert values 
         $query="INSERT INTO ksl_unit (dept_name, unit_name, unit_code, user, date) 
         VALUES('$dept_name', '$unit_name', '$unit_code', '$user',  '$time')";
         
         $action= mysqli_query($db, $query);
            if($action){
                $error="<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden='true'>&times;</button>
                        UNIT SAVED SUCCESSFULLY <br> 
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
?>
    <section class="content">
        <div class="container-fluid">            

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UNIT REGISTRATION</h2>
                        </div>

                            <?php
                                if(isset($error)){
                                    echo $error;
                                }
                            ?>

                        <div class="body">
                            <form id="form_validation" method="POST" action="create_unit.php" name="kls_unit">
                                
                                <div class="form-group form-float form-line">
                                    <select class="form-control show-tick" name="ksl_dept" required>
                                        <option >Please select a department</option>
                                        <?php
                                            $ksl_dept = mysqli_query($db, "SELECT dept_name From ksl_dept");  // Use select query here 

                                            while($data = mysqli_fetch_array($ksl_dept))
                                            {
                                                echo "<option value='". $data['dept_name'] ."'>" .$data['dept_name'] ."</option>";  // displaying data in option menu
                                            }   
                                            ?>

                                    </select>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="unit_name" required>
                                        <label class="form-label"> UNIT NAME  </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="unit_code" >
                                        <label class="form-label"> UNIT CODE </label>
                                    </div>
                                </div>                           
                                <div class="form-group form-float">
                                    <div class="form-line col-lg-6">
                                        <input type="datetime" class="form-control" name="date" value="<?php echo($time) ?>" disabled="">
                                        <label class="form-label">DATE </label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit" name="ksl_unit">SAVE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>
    <?php
        include'foot.php';
    ?>