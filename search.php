<?php include("baza/db.inc"); ?>
<?php include("header.php"); ?>

<div id="content-wrapper">
    <main id="content">
    <?php

    global $link;
    connect();
    if(isset($_GET['term'])) {
        $terms = explode(" ", mysqli_real_escape_string($link, $_GET['term']));


        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "where post_status = 'publish' and post_type = 'post' and post_content like \"%$terms[0]%\" ";
        for ($i = 1; $i < count($terms); $i++) {
            $sql .= "or post_content like \"%$terms[$i]%\" ";
        }

        $result = mysqli_query($link, $sql);
    }
    elseif(isset($_GET['tag'])) {
        $tag = mysqli_real_escape_string($link, $_GET['tag']);

        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "join wp_term_relationships wtr on p.id = wtr.object_id "
            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
            . "join wp_terms wt on wt.term_id = wtt.term_id "
            . "where post_status = 'publish' and post_type = 'post' and wt.name = '$tag' and wtt.taxonomy = 'post_tag' ";

        $result = mysqli_query($link, $sql);
    }
    elseif(isset($_GET['kategorija'])) {
        $kategorija = mysqli_real_escape_string($link, $_GET['kategorija']);

        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "join wp_term_relationships wtr on p.id = wtr.object_id "
            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
            . "join wp_terms wt on wt.term_id = wtt.term_id "
            . "where post_status = 'publish' and post_type = 'post' and wt.name = '$kategorija' and wtt.taxonomy = 'category' ";

        $result = mysqli_query($link, $sql);
    }
    ?>
        <div id="regular-article-wrapper">
           <?php include("left_regular_article.php"); ?>
            <div id="left-regular-article">
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="268" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
            </div>
        </div><!-- end regular-article-wrapper -->

<?php include("footer.php"); ?>