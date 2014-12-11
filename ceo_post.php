<?php include("./baza/db.inc"); ?>
<?php include("./header.php"); ?>

    <main id="content">
        <div id="post">
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
                <?php 
					preg_match_all("/\bhttps:\/\/www.youtube.com\/watch\?v=(\w+)\b/", $row['post_content'], $out);
					$br_regexa = count($out[0]);
					$newphrase = str_replace(array("\n\r", "\n", "\r"), "<br />", $row['post_content']);
					for($i = 0 ; $i < $br_regexa; $i++)
					{
						$tmp = "<iframe width='600px' height='400px' src='https://www.youtube.com/embed/" . $out[1][$i] . "'> </iframe>";
						$newphrase = str_replace($out[0][$i], $tmp, $newphrase);
					}
                
                ?>
                
                
                <p class="post"><?= $newphrase ?></p>
            <?php endif; ?>
        </div><!-- end post -->
        <div id="right-ceo-post">

        </div>
        <div id="comments">
            <br /><br /><p style="font-size: 24px">Коментари:</p><br />
            <?php

            $sql = "select comment_author, date(comment_date) as date, time(comment_date) as time, comment_content "
                . "from wp_comments "
                . "where comment_post_ID = $post";

            $result = mysqli_query($link, $sql);

            ?>
            <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
            <div class="comment">
                <div class="comment-info">
                    <p><?= $row['comment_author'] ?> / <?= $row['date'] ?> у <?= $row['time'] ?></p>
                </div><!-- end comment-info -->
                <div class="comment-content">
                    <p><?= $row['comment_content'] ?></p>
                </div><!-- end comment- content -->
            </div><!-- end comment -->
            <?php endwhile; ?>
            <?php } ?>
            <div id="comment-replay">
                <p>Остави коментар</p>
                <div id="set-comment">
                    <input type="text" name="name" placeholder="Име*" id="ime"/><br />
                    <input type="email" name="email" placeholder="Емаил*" id="email"/><br />
                    <textarea id="comment-content"></textarea><br />
                    <button id="send" onclick="setComment(this.parentNode, <?= $post ?>)">Постави коментар</button>
            </div>
            </div><!-- end comment-replay -->
            <?php disconnect(); ?>
        </div><!-- end comments -->

<?php include("footer.php"); ?>