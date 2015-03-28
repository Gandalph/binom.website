    </main>
</div><!-- end content-wrapper -->
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
