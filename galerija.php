
<?php include("./baza/db.inc"); ?>
<?php include("header.php"); ?>

	<style>
		.thumbnail{
				margin:10px;
				float:left;
			}
	</style>
	<div id="content-wrapper">
		<main id="content" >
			<?php
				function fetchData($url){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_TIMEOUT, 20);
				$result = curl_exec($ch);
				curl_close($ch);
				return $result;
				}
				$result = fetchData("https://api.instagram.com/v1/users/self/feed?access_token=1645696403.c2a8340.63726c5a58f84a748101b2d7a42f19bf");
				$result = json_decode($result);
					$i = 0;
				foreach ($result->data as $post) {
					$i++;
					$string = $post->images->thumbnail->url;
					echo  "<img class=\"thumbnail\"  src=\"" . $string . "\" />";
				}
 			?>  
			
			
			
        
<?php include("footer.php"); ?>