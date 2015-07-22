<?php include("baza/db.inc"); ?>
<?php include("baza/functionPHP/functions.php"); ?>
<?php include("header.php"); ?>

    <div id="content-wrapper">
        <main id="content">
            <div id="content-wrapper">
        <main id="content">
            <?php
			$temp = 1;
			    if(!isset($_GET['page_num'])) {
			        $post_start = 0;
			    }
			    else {
			        $temp = $_GET['page_num'];
			        if($temp == 1)
			            $post_start = 0;
			        else 
			            $post_start = ($temp-1)*5;
			    }

			    global $link;
			    connect();
		        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
		            . "from wp_posts p join wp_users u on p.post_author = u.id "
		            . "join wp_term_relationships wtr on p.id = wtr.object_id "
		            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
		            . "join wp_terms wt on wt.term_id = wtt.term_id "
		            . "where post_status = 'publish' and post_type = 'post' and wt.name = 'reportaza' and wtt.taxonomy = 'category' "
		            . "limit $post_start, 5";

		        $result = mysqli_query($link, $sql);
		        $sql = "select count(*) "
		            . "from wp_posts p join wp_users u on p.post_author = u.id "
		            . "join wp_term_relationships wtr on p.id = wtr.object_id "
		            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
		            . "join wp_terms wt on wt.term_id = wtt.term_id "
		            . "where post_status = 'publish' and post_type = 'post' and wt.name = 'reportaza' and wtt.taxonomy = 'category' ";
		        $post_num = mysqli_query($link, $sql);
			    ?>
        <div id="regular-article-wrapper">
           <?php include("left_regular_article.php"); ?>
            <div id="right-regular-article">
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="268" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
            </div>
        </div><!-- end regular-article-wrapper -->
        </main>
    </div><!-- end content-wrapper -->
        </main>
    </div><!-- end content-wrapper -->
    
<?php include("footer.php"); ?>
