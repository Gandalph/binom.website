<?php
/**
 * Created by PhpStorm.
 * User: Gaf
 * Date: 09-Nov-14
 * Time: 23:02
 */
//if(isset($_POST["submit"])) {
//    $target_path = "../slike/" . basename($_FILES["file"]["name"]);
//    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
//        echo "File uploaded";
//    }
//    else {
//        echo "Error";
//    }

if(isset($_POST["submit"])) {
    if(isset($_POST["file"])) {
        if(move_uploaded_file())
    }
}
?>