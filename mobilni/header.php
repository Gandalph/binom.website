<?php include("../baza/db.inc"); ?>
<?php //include("baza/db.inc"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index normalno</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/mobile.js"></script>
	<script type="text/javascript">
	</script>
</head>
<body>

	<div class="nav-search">
		<img src="images/cancel.png" alt="cancel" class="cancel">
		<form action="search.php" method="get" onsubmit="return checkSearch()">
			<input type="text" class="search-field" name="term">
			<input type="submit" name="submit" value="" class="search-icon-submit">
		</form>
	</div>

	<div class="nav-bar">
		<img src="images/nav_icon.png" alt="nav icon" class="nav-icon">
		<img src="images/search-icon.png" alt="search" class="search-icon">
	</div>


	<div class="nav-categories">
		<h1>Категорије:</h1>
		<ul>
		<?php
           global $link;
           connect();


            $upit = 'select distinct name '
                  . 'from wp_terms wt join wp_term_taxonomy wtt on wt.term_id = wtt.term_id '
                  . 'where wtt.taxonomy = "category"';
            $result = mysqli_query($link, $upit);
            $count = mysqli_num_rows($result);
            for($i = 0; $i < $count; $i++) {
                $row = mysqli_fetch_assoc($result);
                echo "<li class=\"categorie\"><a href=\"search.php?kategorija=$row[name]\">$row[name]</a></li>";
            }
            disconnect();
        ?>
			
		</ul>
	</div>

	<header>
		<div class="header-img"></div>
	</header>
