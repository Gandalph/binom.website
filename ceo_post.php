<?php include("./baza/db.inc"); ?>
<?php include("./header.php"); ?>

    <div id="content-wrapper">
        <main id="content">
            <div id="post">
            <?php
            if(isset($_GET['post'])): {
                connect();
                global $link;

                $post = $_GET['post'];

                $sql = "select post_title, post_content, date(post_date), display_name "
                     . "from wp_posts p join wp_users u on p.post_author = u.id "
                     . "where post_status = 'publish' and post_type = 'post' and p.id = $post";

                $result = mysqli_query($link, $sql) or die(mysqli_error($link));


                if(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                    <?php $author = $row['display_name']; ?>
                    <h1 class="post-title"><?= $row['post_title'] ?></h1>
                    <?php
                        preg_match_all("/\bhttps:\/\/www.youtube.com\/watch\?v=(\w+)\b/", $row['post_content'], $out);
                        $br_regexa = count($out[0]);
                        $newphrase = str_replace(array("\n\r", "\n", "\r"), "<br />", $row['post_content']);
                        for($i = 0 ; $i < $br_regexa; $i++)
                        {
                            $tmp = "<iframe width='600px' height='400px' src='https://www.youtube.com/embed/" . $out[1][$i] . "?autoplay=0&showinfo=0&controls=0'> </iframe>";
                            $newphrase = str_replace($out[0][$i], $tmp, $newphrase);
                        }

                    ?>


                    <p class="post"><?= $newphrase ?></p>
                <?php endif; ?>
                <br /><br />
            </div><!-- end post -->
            <div id="right-ceo-post">
                <div class="postovi-sa-strane">
                    <p class="postovi-sa-strane-section">Чланци</p>
                    <?php
                    $sql = "select post_title, display_name, wp.id "
                        .  "from wp_posts wp join wp_users wu on wp.post_author = wu.id "
                        .  "where wp.post_status = 'publish' and post_type = 'post'"
                        .  "limit 5";

                    $result = mysqli_query($link, $sql);

                    while(($row = mysqli_fetch_assoc($result)) != NULL):
                    ?>
                        <div class="post-sa-strane">
                            <span onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'" class="post-sa-strane-title"><?= $row['post_title'] ?> - </span>
                            <span class="post-sa-strane-author"><?= $row['display_name'] ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="postovi-sa-strane">
                    <p class="postovi-sa-strane-section">Још од аутора</p>
                    <?php
                    $sql = "select post_title, display_name, wp.id "
                        .  "from wp_posts wp join wp_users wu on wp.post_author = wu.id "
                        .  "where wp.post_status = 'publish' and post_type = 'post' and display_name = '$author' "
                        .  "limit 5";

                    $result = mysqli_query($link, $sql);

                    while(($row = mysqli_fetch_assoc($result)) != NULL):
                        ?>
                        <div class="post-sa-strane">
                            <span onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'" class="post-sa-strane-title"><?= $row['post_title'] ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="250" data-height="400" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
            </div>


            <div class="tags">

                <span>Тагови: </span>
                    <span>
                        <?php
                        $sql = "select name "
                            . "from wp_posts p join wp_term_relationships wtr on p.id = wtr.object_id "
                            . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
                            . "join wp_terms wt on wt.term_id = wtt.term_id "
                            . "where post_status = 'publish' and post_type = 'post' and p.id = $post and wtt.taxonomy = 'post_tag'";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

                        while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                            <span class="tags-name" onclick="window.location = 'search.php?tag=<?= $row['name'] ?>'"><?= $row['name'] . " " ?></span>
                        <?php endwhile; ?>
                    </span>
            </div>

            <div id="comments">
                <br /><br /><p style="font-size: 24px; color: #595050;">Коментари:</p><br />
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
                    <p style="color: #595050;">Остави коментар</p>
                    <div id="set-comment">
                        <input type="text" name="name" placeholder="Име*" id="ime"/><br />
                        <input type="email" name="email" placeholder="Емаил*" id="email"/><br />
                        <textarea id="comment-content"></textarea><br />
                        <button id="send" onclick="setComment(this.parentNode, <?= $post ?>)">Постави коментар</button>
                </div>
                </div><!-- end comment-replay -->

            </div><!-- end comments -->

            <?php endif; disconnect(); ?>

<?php include("footer.php"); ?>