</main>
<footer>
    <div class="footer-div">
        <div id="recent-comment-title">
            <p>Најновији коментари</p>
        </div>
        <div>
            <?php
            global $link;
            connect();

            $sql = "select comment_author, comment_content "
                . "from wp_comments  "
                . "order by comment_date "
                . "limit 4";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            ?>
            <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                <p class="recent-comment"><span class="comment-author"><?= $row['comment_author'] ?></span> <span class="comment-content"><?= $row['comment_content'] ?></span></p>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="footer-div">
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
    <div class="footer-div"></div>
    <div class="copy">
        <p>БИНОМ &copy; 2014 СВА ПРАВА ЗАДРЖАНА</p>
    </div>
</footer>
</div><!-- end wrapper -->
</body>
</html>
