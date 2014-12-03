<?php include("./baza/db.inc"); ?>
<?php include("./header.php"); ?>

    <main id="content">
        <?php
        if(isset($_GET['post'])) {
            connect();
            global $link;

            $post = $_GET['post'];

            $sql = "select post_title, post_content, date(post_date), display_name "
                 . "from wp_posts p join wp_users u on p.post_author = u.id "
                 . "where post_status = 'publish' and post_type = 'post' and p.id = $post";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));


            if(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                <h1 class="post-title"><?= $row['post_title'] ?></h1>
                <p class="post"><?= $row['post_content'] ?></p>
            <?php endif; ?>

    </main>
    <div id="comments">
            <?php

            $sql = "select comment_author, date(comment_date) as date, time(comment_date) as time, comment_content "
                . "from wp_comments "
                . "where comment_post_ID = $post";

            $result = mysqli_query($link, $sql);

            ?>
        <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
        <div class="comment">
            <div class="comment-info">
                <p><?= $row['comment_author'] ?> / <?= $row['date'] ?> at <?= $row['time'] ?></p>
            </div><!-- end comment-info -->
            <div class="comment-content">
                <p><?= $row['comment_content'] ?></p>
            </div><!-- end comment- content -->
        </div><!-- end comment -->
        <?php endwhile; ?>
        <?php } ?>
        <div id="comment-replay">
            <p>Ostavi komentar</p>
            <div id="set-comment">
                <input type="text" name="name" placeholder="Ime" id="ime"/><br />
                <input type="email" name="email" placeholder="Email" id="email"/><br />
                <textarea id="comment-content"></textarea><br />
                <button onclick="setComment(this.parentNode, <?= $post ?>)">Postavi</button>
        </div>
        </div><!-- end comment-replay -->
        <?php disconnect(); ?>
    </div><!-- end comments -->
</div><!-- end wrapper -->
</body>
</html>
