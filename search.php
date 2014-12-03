<?php include("baza/db.inc"); ?>
<?php include("header.php"); ?>

<main id="content">
<?php

global $link;
connect();
$terms = explode(" ", mysqli_real_escape_string($link, $_GET['term']));


$sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
    . "from wp_posts p join wp_users u on p.post_author = u.id "
    . "where post_status = 'publish' and post_type = 'post' and post_content like \"%$terms[0]%\" ";
for($i = 1; $i < count($terms); $i++) {
    $sql .= "or post_content like \"%$terms[$i]%\" ";
}

$result = mysqli_query($link, $sql) or die(mysqli_error($link));

?>
    <div id="regular-article-wrapper">
    <div id="right-regular-article">
        <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
            <article class="regular-article">
                <div class="r-article-image">
                    <?php
                    $slika = "slike/" . $row['post_name'] . ".jpg";
                    if(file_exists($slika)): ?>
                        <img alt="post-image" class="post-image" src="<?= $slika ?>">
                    <?php endif; ?>
                </div>
                <div class="right-side">
                    <h1 class="caption"><?= $row['post_title'] ?></h1>
                    <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> / <?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'а'; ?></p>
                    <div style="height: 205px; overflow: hidden;" data-post-id="<?= $row['id'] ?>">
                        <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                            <?php $string = $row['post_content']; ?>
                            <script type="text/javascript">
                                var $div = $('<div><?= $string ?></div>');
                                var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                                $p.text($div.text());
                            </script>
                        </p>
                    </div>
                    <div class="read-more" onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'">
                        <p style="float: right; background: #f95625; color: #ffffff; padding: 2px 5px;">прочитај више</p><!-- TODO i ovo popraviti lepo -->
                    </div>
                </div><!-- end right-side -->
            </article>
        <?php endwhile; ?>
        <?php disconnect(); ?>
    </div><!-- end right-regular-article -->

<?php include("footer.php"); ?>