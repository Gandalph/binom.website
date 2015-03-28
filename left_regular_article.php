<div id="left-regular-article">
    <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
        <article class="regular-article">
            <div class="r-article-image-front" data-post-id="<?= $row['id'] ?>"></div>
            <div class="r-article-image-black"></div>
            <div class="r-article-image" data-post-id="<?= $row['id'] ?>"></div>
            <div class="right-side">
                <h1 class="caption" title="<?= $row['post_title'] ?>"><?= $row['post_title'] ?></h1>
                <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> /  <?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'a'; ?></p>
                <div style="height: 164px; overflow: hidden;" data-post-id="<?= $row['id'] ?>"><!-- TODO style prebaciti u css -->
                    <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                        <?php
                        $string = str_replace(array("\r\n", "\n", "\r"), "<br />", $row['post_content']);
                        $flag = preg_match('/<img.*?src[=]"([^"]+).*?\/>/', $row['post_content'], $match);
                        ?>
                        <script type="text/javascript">
                            var $div = $('<div><?= $string ?></div>');
                            var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                            $p.text($div.text());
                            $(".r-article-image[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[1] ?>)");
                            $(".r-article-image-front[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[1] ?>)");
                        </script>
                    </p>
                </div>
                <div class="read-more" onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'">
                    <p>прочитај више</p><!-- TODO i ovo popraviti lepo -->
                </div>
            </div><!-- end right-side -->
        </article>
    <?php endwhile; ?>
    <?php disconnect(); ?>
</div><!-- end right-regular-article -->