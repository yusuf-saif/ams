<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db = mysqli_connect("localhost", "root", "", "ams_db");

if (!$db) {
    die("ERROR: " . mysqli_connect_error);
} else {
    return true;
}
