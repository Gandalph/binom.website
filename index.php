<?php include("./baza/db.inc"); ?>
<?php include("./baza/functionPHP/functions.php"); ?>
<?php include("header.php") ?>

    <div id="content-wrapper">
        <main id="content">
        
            <!--SLAJDER -->
            <script src="js/jssor.slider.mini.js"></script>
            <!--menjanje ponasanja slajdera se vrsi ovde-->
            <script src="js/sliderDislocated.js"></script>
            <!--menjanje/dodavanje slika slajdera se vrsi ovde-->
            <?php include("slider.php") ?>
            <!--KRAJ SLAJDERA-->
            
            <?php

            global $link;

            connect();

            $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count, name "
                . "from wp_posts p join wp_users u on p.post_author = u.id "
                . "join wp_term_relationships wtr on wtr.object_id = p.id "
                . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
                . "join wp_terms wt on wtt.term_id = wt.term_id "
                . "where post_status = 'publish' and post_type = 'post' and wtt.taxonomy = 'category' and wt.name <> 'Intervju' and wt.name <> 'Reportaza' "
                . "order by post_date desc "
                . "limit 4";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            $i = 0;

            ?>
            <div id="recent-article-title">
                <span> НАЈНОВИЈИ ЧЛАНЦИ </span>
            </div>
            <div id="article-wrapper">
                <?php include("recent_article.php"); ?>
                <div id="regular-article-wrapper">
                    <?php 
                    $temp = 1;
                    if(!isset($_GET['page_num'])) {
                        $post_start = 4;
                    }
                    else {
                        $temp = $_GET['page_num'];
                        if($temp == 1) {
                            $post_start = 4;
                        }
                        else {
                            $post_start = $temp*4 + ($temp - 1);
                        }
                    }

                    $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count, name "
                        . "from wp_posts p join wp_users u on p.post_author = u.id "
                        . "join wp_term_relationships wtr on wtr.object_id = p.id "
                        . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
                        . "join wp_terms wt on wtt.term_id = wt.term_id "
                        . "where post_status = 'publish' and post_type = 'post' and wtt.taxonomy = 'category' and wt.name <> 'Intervju' and wt.name <> 'Reportaza' "
                        . "order by post_date desc "
                        . "limit $post_start,5";

                    
                    $result = mysqli_query($link, $sql); 

                    $sql = "select count(*) from wp_posts where post_status='publish'";
                    $post_num = mysqli_query($link, $sql);
                    ?>
                    <div id="regular-article-title">
                        <span> ЧЛАНЦИ </span>
                    </div>
                    <?php include("left_regular_article.php"); ?>
                    <div id="right-regular-article">
                        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="268" data-height="400" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
                        <div class="weather">
                            <a href="http://www.accuweather.com/sr/rs/belgrade/298198/weather-forecast/298198" class="aw-widget-legal">
                                <!--
                                By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
                                -->
                            </a><div id="awcc1427565057854" class="aw-widget-current"  data-locationkey="298198" data-unit="c" data-language="sr" data-useip="false" data-uid="awcc1427565057854"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
                        </div>
                    </div>
                </div><!-- end regular-article-wrapper -->

            </div><!-- end article-wrapper -->
 <?php include("footer.php"); ?>
