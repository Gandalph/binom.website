<div id="recent-article-wrapper"><!-- TODO ubaciti u css -->
    <?php while(($row = mysqli_fetch_assoc($result)) && $i < 4): ?>
        <article class="recent-article" >
            <div class="article-image-front" data-post-id="<?= $row['id'] ?>"></div>
            <div class="article-image" data-post-id="<?= $row['id'] ?>"></div>
            <h1 class="caption" title="<?= $row['post_title'] ?>"><?php echo $row['post_title']; $i++; ?></h1>
            <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> /  <?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'a'; ?></p>
            <div style="height: 75px; overflow: hidden;"><!-- TODO style ubaciti u css -->
                <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                    <?php
                    $string = str_replace(array("\r\n", "\n", "\r"), "<br />", $row['post_content']);
                    $flag = preg_match('/<img.*?src[=]"([^"]+).*?\/>/', $row['post_content'], $match);
                    ?>
                    <script type="text/javascript">
                        $(function() {
                            var $div = $('<div><?= $string ?></div>');
                            var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                            $p.text($div.text());
                            $(".article-image-front[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[1]; else echo $flag ?>)");
                            $(".article-image[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[1]; else echo $flag ?>)");
                        })
                    </script>
                </p>
            </div>
            <div class="read-more" onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'">
                <p>прочитај више</p>
            </div>
        </article><!-- end recent-article -->
    <?php endwhile; ?>
</div><!-- end recent-article-wrapper -->