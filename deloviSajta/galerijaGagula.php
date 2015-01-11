<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<style type="text/css">
		body {
			margin: 0;
		}
		td {
			cursor: pointer;
		}
		img {
			height: 100px;			
		}
		span {
			cursor: pointer;
		}
		#imageBox img {
			width: 500px;
			height: 100%;
		}
		#transparentBackground {
			position: fixed;
			width: 100%;
			height: 100%;
			background-color: #000000;
			opacity: 0.7;
			display: none;
		}
		#imageBox {
			position: fixed;
			height: 600px;
			width: 600px;
			margin: 0 auto;
			background-color: #000000;
			display: none;
			box-sizing: border-box;
			padding: 20px;
			color: #ffffff
		}
	</style>
	<?php

		$dir = "./slike";

		$array = array_slice(scandir($dir), 2);

		$json_array = json_encode($array);

	?>
	<script type="text/javascript">
		var array = [];
		array = <?= $json_array ?>;
		$(document).ready(function() {
			var $width = $(this).width();
			var $height = $(window).height();

			$("#imageBox").css("margin-left", (($width - 600) / 2) + "px");	
			$("#imageBox").css("margin-top", (($height - 600) / 2) + "px");	
		});

		function showImage(image) {
			$("#imageBox img").prop("src", $(image).find("img").prop("src"));
			$("#imageBox").css("display", "block");
			$("#transparentBackground").css("display", "block");
		}

		function closeWindow() {
			$("#imageBox").css("display", "none");
			$("#transparentBackground").css("display", "none");
		}

		function next(div) {
			$("#imageBox img").prop("src", "slike/" + array[($.inArray($(div).prev().prop("src").split("/").reverse()[0], array) + 1) % array.length]);
		}

		function prev(div) {
			$("#imageBox img").prop("src", "slike/" + array[(($.inArray($(div).prev().prop("src").split("/").reverse()[0], array) - 1) + array.length) % array.length]);
		}
	</script>
</head>
<body>
	<div id="transparentBackground"></div>
	<div id="imageBox">
		<img src="" alt="" />
		<div id="button">
			<button onclick="prev(this.parentNode)">Predhodna</button>
			<button onclick="next(this.parentNode)">Sledeca</button>
			<span onclick="closeWindow()">X</span>
		</div>
	</div>
	<main>
		<table>
			<tr>
				<!-- Ovde samo zameni src i ubaci neke tvoje slike da vidis -->
				<?php for($i = 0; $i < count($array); $i++): ?>
					<?php if(strcmp($array[$i], ".") != 0 && strcmp($array[$i], "..") != 0): ?>
				<td onclick="showImage(this)"><img src="slike/<?= $array[$i] ?>" alt="slider image" /></td>
					<?php endif; ?>
				<?php endfor; ?>
			</tr>
		</table>
	</main>
</body>
</html>
