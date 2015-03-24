
<?php include("./baza/db.inc"); ?>
<?php include("header.php"); ?>

	<style>



	</style>

    <div id="content-wrapper">
        <main id="content">
        <div style="width:750px; height:5px; border-bottom: 2px solid #666;  margin: auto; margin-top: 50px; "></div>
		<div id="naslov">
			<span>  ГАЛЕРИЈА СЛИКА </span>
		</div>
		<div style="width:750px; height:5px; border-bottom: 2px solid #666;  margin: auto; margin-bottom: 100px; "></div> 
		
		<?php

function curl_download($Url){

	// is cURL installed yet?
	if (!function_exists('curl_init')){
		die('Sorry cURL is not installed!');
	}

	// OK cool - then let's create a new cURL resource handle
	$ch = curl_init();

	// Now set some options (most are optional)

	// Set URL to download
	curl_setopt($ch, CURLOPT_URL, $Url);

	// User agent
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);

	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	// Download the given URL, and return output
	$output = curl_exec($ch);

	// Close the cURL resource, and free system resources
	curl_close($ch);

	return $output;
}

$result = curl_download("https://api.instagram.com/v1/users/self/feed?access_token=1645696403.c2a8340.63726c5a58f84a748101b2d7a42f19bf");
$result = json_decode($result);
$i = 0;
foreach ($result->data as $post) {
	$i++;
	$thumbnail = $post->images->thumbnail->url;
	$standard = $post->images->standard_resolution->url;
	echo "<div class=\"imagewrapper\">";
		echo "<a class=\"fancybox\" href=\"" . $standard . "\" data-fancybox-group=\"gallery\" title=" . $post->caption->text ."><img class=\"thumbnail\" src=\"" . $thumbnail . "\" /></a>";
		echo "<div class=\"imagebottom\" >";
			echo "<a href=\"$post->link\">";
				echo "<div class=\"insta\">" . "</div>";
				echo "<div class=\"heart\">" .  $post->likes->count . "</div>";
			echo "</a>";
		echo "</div>";
	echo "</div>";
}

?>

<?php include("footer.php"); ?>