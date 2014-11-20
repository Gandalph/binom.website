<?php

include("../baza/db.inc");

$author = $_POST['author'];
$email = $_POST['email'];
$comment_content = $_POST['commentContent'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$postId = $_POST['postId'];
$date = $_POST['date'];

connect();
global $link;

$sql = "insert into wp_comments(comment_author, comment_author_email, comment_content, comment_agent, comment_author_IP, comment_post_ID, comment_date)
values (\"$author\", \"$email\", \"$comment_content\", \"$user_agent\", \"$ip_address\", $postId, timestamp(\"$date\"))";

echo $sql;
mysqli_query($link, $sql) or die(mysqli_error($link));

disconnect();


?>
