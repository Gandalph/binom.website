    </main>
</div><!-- end content-wrapper -->
<footer>
    <div class="footer-div">
        <div class="footer-title">
            <p>Најновији коментари</p>
        </div>
        <div class="footer-content">
            <?php
            global $link;
            connect();

            $sql = "select t.comment_author, t.comment_content, t.comment_post_id "
                . "from (select * from wp_comments limit 4) t "
                . "order by t.comment_date desc";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            ?>
            <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                <div class="recent-comment">
                    <span class="comment-author"><?= $row['comment_author'] ?></span>
                    <span class="comment-content" onclick="window.location = 'ceo_post.php?post=<?= $row['comment_post_id'] ?>'"><?= $row['comment_content'] ?></span>
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
        <p>БИНОМ &copy; 2014 СВА ПРАВА ЗАДРЖАНА</p>
    </div>
</footer>
</div><!-- end wrapper -->
</body>
</html>
