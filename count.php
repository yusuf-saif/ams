<?php
    session_start();
    include "conn.php";
 $receive = mysqli_query($db, "SELECT * FROM indicate ;");  // query for receive items
 $dispatch = mysqli_query($db, "SELECT * FROM indicate;");  // query for dispatch items
 $store = mysqli_query($db, "SELECT * FROM indicate;");  // query for store number
 $user = mysqli_query($db, "SELECT * FROM usr;");  // query for user number


if($receive){
    $receive_count = '0'; //mysqli_num_rows($receive);
}
if($dispatch){
    $dispatch_count = '0'; //mysqli_num_rows($dispatch);
}
if($store){
    $store_count = '0'; //mysqli_num_rows($store);
}
if($user){
    $user_count = mysqli_num_rows($user);
}
