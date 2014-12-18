<?php //include("baza/db.inc"); ?>
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
            <?php endwhile; disconnect(); ?>
        </div>
    </div>
    <div class="footer-div"></div>
    <div class="footer-div"></div>
    <div class="copy">
        <p>БИНОМ &copy; 2014 СВА ПРАВА ЗАДРЖАНА</p>
    </div>
</footer>
</div><!-- end wrapper -->
</body>
</html>
