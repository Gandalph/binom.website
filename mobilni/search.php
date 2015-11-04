<?php include("header.php") ?>

<div class="content">
	<div class="regular-articles">
		<?php
		connect();
		$temp = 1;
        if(!isset($_GET['page_num'])) {
            $post_start = 0;
        }
        else {
            $temp = $_GET['page_num'];
            if($temp == 1) {
                $post_start = 0;
            }
            else {
                $post_start = ($temp-1)*4 + 1;
            }
        }
		if(isset($_GET['kategorija'])) {
	        $kategorija = mysqli_real_escape_string($link, $_GET['kategorija']);
	        $window_location = "&kategorija=$kategorija";
	        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
	            . "from wp_posts p join wp_users u on p.post_author = u.id "
	            . "join wp_term_relationships wtr on p.id = wtr.object_id "
	            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
	            . "join wp_terms wt on wt.term_id = wtt.term_id "
	            . "where post_status = 'publish' and post_type = 'post' and wt.name = '$kategorija' and wtt.taxonomy = 'category' "
	            . "order by post_date desc "
	            . "limit $post_start, 5";

	        $result = mysqli_query($link, $sql);
	        $sql = "select count(*) "
	            . "from wp_posts p join wp_users u on p.post_author = u.id "
	            . "join wp_term_relationships wtr on p.id = wtr.object_id "
	            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
	            . "join wp_terms wt on wt.term_id = wtt.term_id "
	            . "where post_status = 'publish' and post_type = 'post' and wt.name = '$kategorija' and wtt.taxonomy = 'category' ";
	        $post_num = mysqli_query($link, $sql);
	        $post_num = mysqli_fetch_row($post_num)[0];
            $post_num = intval($post_num);
    	}
    	elseif(isset($_GET['term'])) {
	        $terms = explode(" ", mysqli_real_escape_string($link, $_GET['term']));
	        $terms_temp = str_replace(" ", "+", $_GET['term']);
	        $window_location = "&term=".$terms_temp."&submit=";


	        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count, name "
	            . "from wp_posts p join wp_users u on p.post_author = u.id "
	            . "join wp_term_relationships wtr on wtr.object_id = p.id "
	            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
	            . "join wp_terms wt on wtt.term_id = wt.term_id "
	            . "where post_status = 'publish' and post_type = 'post' and post_content like \"%$terms[0]%\" and wtt.taxonomy = 'category'";
	        for ($i = 1; $i < count($terms); $i++) {
	            $sql .= "or post_content like \"%$terms[$i]%\" ";
	        }
	        $sql .= " order by post_date desc "
	        	 . "limit $post_start, 5";
	        $result = mysqli_query($link, $sql);

	        $sql = "select count(*) " 
	            . "from wp_posts p join wp_users u on p.post_author = u.id "
	            . "join wp_term_relationships wtr on wtr.object_id = p.id "
	            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
	            . "join wp_terms wt on wtt.term_id = wt.term_id "
	            . "where post_status = 'publish' and post_type = 'post' and post_content like \"%$terms[0]%\" and wtt.taxonomy = 'category'";
	        for ($i = 1; $i < count($terms); $i++) {
	            $sql .= "or post_content like \"%$terms[$i]%\" ";
	        }
	        $post_num = mysqli_query($link, $sql);
	        $post_num = mysqli_fetch_row($post_num)[0];
            $post_num = intval($post_num);
	    }
    	?>
    	<?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
        <div class="regular-article" onclick="window.location = 'ceo_post.php?post_id=<?= $row['id'] ?>'">
			<div class="image-window-regular background-image" data-post-id="<?= $row['id']; ?>">
			</div>
			<div class="regular-post">
				<div class="post-title">
					<p><?= $row['post_title']; ?></p>
				</div>
				<div class="post-text" data-post-id="<?= $row['id']; ?>">
				<?php
                	$string = str_replace(array("\r\n", "\n", "\r"), "<br />", $row['post_content']);
                	$flag = preg_match('/<img.*?src[=]"([^"]+).*?\/>/', $row['post_content'], $match);
                ?>
                <script type="text/javascript">
                    var $div = $('<div><?= $string ?></div>');
                    var $text = $("div.post-text[data-post-id=" + <?= $row['id'] ?> + "]");
                    $text.text($div.text());
                    $(".image-window-regular[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[1] ?>)");
                </script>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php disconnect(); ?>
	</div>
</div>
<?php include("footer.php") ?>
