<?php include("./baza/db.inc"); ?>
<?php include("header.php") ?>

    <div id="content-wrapper">
        <main id="content">
			<style>
				img {
						float:left;
					}
			</style>
	<div>
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
				echo  "<img  src=\"" . $string . "\" />";
			}
			?>  
	</div>
<?php include("footer.php"); ?>