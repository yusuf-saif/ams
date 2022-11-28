<?php
    session_start();
    include "conn.php";
 $dept = mysqli_query($db, "SELECT * FROM ksl_dept ;");  // query for receive items
 $unit = mysqli_query($db, "SELECT * FROM ksl_unit;");  // query for dispatch items
 $office = mysqli_query($db, "SELECT * FROM ksl_office;");  // query for store number
 $asset = mysqli_query($db, "SELECT * FROM ksl_asset;");  // query for user number


if($dept){
    $dept_count = '5'; //mysqli_num_rows($receive);
}
if($unit){
    $unit_count = '56';//mysqli_num_rows($unit);
}
if($office){
    $office_count = mysqli_num_rows($office);
}
if($asset){
    $asset_count = mysqli_num_rows($asset);
}

