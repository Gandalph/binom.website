    </main>
</div><!-- end content-wrapper -->
<div id="pages"> 
    <div id="page_container">
        <?php 
            $i = 1; 
            $post_num = mysqli_fetch_row($post_num)[0];
            $post_num = intval($post_num);
            $post_num = ceil(($post_num)/5);
            debug_to_console('post num '.$post_num);
            while($i <= $post_num): ?>
                <?php  if($i == $temp): ?>
                    <div class="page_num current" onclick="window.location= window.location.pathname.split('/')[2] + '?page_num=<?=$i?><?= $window_location ?>'"><?= $i++ ?></div><!-- end page_num -->
                <?php else: ?>
                    <div class="page_num" onclick="window.location= window.location.pathname.split('/')[2] + '?page_num=<?=$i?><?= $window_location ?>'"><?= $i++ ?></div><!-- end page_num -->
                <?php endif; ?>
            <?php endwhile; ?>
    </div><!-- end page_container -->
</div><!-- end pages -->
<div id="zgrade"></div>
<footer>
    <div class="footer-div">
        <div class="footer-title">
            <p>Најновији коментари</p>
        </div>
        <div class="footer-content">
            <?php
            global $link;
            connect();

            $sql = "select t.comment_author, t.comment_content, t.comment_post_id, wp.post_title "
                . "from (select * from wp_comments where comment_approved = 1 order by comment_date desc limit 4) t "
                . "join wp_posts wp on wp.id = t.comment_post_id "
                . "order by t.comment_date desc";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            ?>
            <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                <div class="recent-comment">
                    <p class="comment-author"><?= $row['comment_author'] ?></p>
                    <p class="comment-content" onclick="window.location = 'ceo_post.php?post=<?= $row['comment_post_id'] ?>'"><?= $row['comment_content'] ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="footer-div">
        <div class="footer-title">
            <p>ТАГОВИ</p>
        </div>
        <?php
        $sql = "select name "
            .  "from wp_terms wt join wp_term_taxonomy wtt "
            .  "on wt.term_id = wtt.term_id "
            .  "where wtt.taxonomy = 'post_tag'";

        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        ?>
        <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
            <div class="tag" onclick="searchTag(this)"><?= $row['name'] ?></div>
        <?php endwhile; disconnect(); ?>
    </div>
    <div class="footer-div">
        <div class="footer-title">
            <p>о нама</p>
        </div>
    </div>
    <div class="copy">
        <p>БИНОМ &copy; 2015 СВА ПРАВА ЗАДРЖАНА</p>
    </div>
</footer>
</div><!-- end wrapper -->
</body>
</html>
