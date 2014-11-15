<?php
/**
 * Created by PhpStorm.
 * User: Gaf
 * Date: 11-Nov-14
 * Time: 23:27
 */

include("../php/db.inc");

connect();

$sql = "select post_content from wp_posts where id = 20";
$result = mysqli_query($link, $sql);
echo mysqli_fetch_row($result)[0];

disconnect();
?>