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

     if(isset($_POST['ksl_asset'])){
 //collecting form inputs using the specified method
 $asset_no  = mysqli_real_escape_string($db, trim($_POST['asset_no']));
 $asset_name  = mysqli_real_escape_string($db, trim($_POST['asset_name']));
 $asset_category = mysqli_real_escape_string($db, trim($_POST['asset_category']));
 $asset_type = mysqli_real_escape_string($db, trim($_POST['asset_type']));
 $asset_maintenance_type = mysqli_real_escape_string($db, trim($_POST['asset_maintenance_type']));
 $asset_periodic = mysqli_real_escape_string($db, trim($_POST['asset_periodic']));
 $asset_description = mysqli_real_escape_string($db, trim($_POST['asset_description']));
 
 //check for empty field
 if(!empty($asset_no) && !empty($asset_name) && !empty($asset_category) && !empty($asset_type) 
 && !empty($asset_maintenance_type) && !empty($asset_periodic) && !empty($asset_description)){

     
     //check for duplicate
     $check= "SELECT COUNT(*) FROM ksl_asset WHERE asset_no = '".$asset_no."' && asset_name = '".$asset_name.
     "' && asset_category = '".$asset_category."' && asset_type = '".$asset_type."'&& asset_maintenance_type
      = '".$asset_maintenance_type."' &&asset_periodic = '".$asset_periodic."'  && asset_description = '".$asset_description."'";


     $sql = mysqli_query($db,$check);
         
     $row = mysqli_fetch_assoc($sql);  

     if($row['COUNT(*)'] == 0) {

         //insert values 
         $query="INSERT INTO ksl_asset (asset_no, asset_name, asset_category, asset_type, asset_maintenance_type, asset_periodic, asset_description, user, date) 
         VALUES('$asset_no', '$asset_name', '$asset_category', '$asset_type', '$asset_maintenance_type', '$asset_periodic',  '$user',  '$time')";
         
         $action= mysqli_query($db, $query);
            if($action){
                $error="<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert'aria-hidden='true'>&times;</button>
                        ASSET SAVED SUCCESSFULLY <br> 
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
                            <h2>ASSET REGISTRATION</h2>
                        </div>

                            <?php
                                if(isset($error)){
                                    echo $error;
                                }
                            ?>

                        <div class="body">
                            <form id="form_validation" method="POST" action="create_asset.php" name="ksl_asset">
                                
                                <!-- <div class="form-group form-float form-line">
                                    <select class="form-control show-tick" name="state" required>
                                        <option >Please select a state</option>
                                        <?php
                                            // $state = mysqli_query($db, "SELECT name From state");  // Use select query here 

                                            // while($data = mysqli_fetch_array($state))
                                            // {
                                            //     echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
                                            // }   
                                            ?>

                                    </select>
                                </div> -->

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="asset_no" required>
                                        <label class="form-label"> ASSET ID </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="asset_name" >
                                        <label class="form-label"> ASSET NAME </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="asset_category" required>
                                        <label class="form-label"> ASSET CATEGORY </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="asset_type" required>
                                        <label class="form-label">ASSET TYPE</label>
                                    </div>                                    
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="asset_maintenance_type" >
                                        <label class="form-label">ASSET MAINTENANCE TYPE</label>
                                    </div>                                    
                                </div>                                
                                <div class="form-group form-float">
                                    <div class="form-line col-lg-6">
                                        <input type="datetime" class="form-control" name="date" value="<?php echo($time) ?>" disabled="">
                                        <label class="form-label">DATE </label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit" name="ksl_asset">SAVE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>
    <?php
     include'links.php';
     ?>