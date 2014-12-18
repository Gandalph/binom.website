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
                    <div class="r-article-image"></div>
                    <div class="right-side">
                        <h1 class="caption" title="<?= $row['post_title'] ?>"><?= $row['post_title'] ?></h1>
                        <p class="article-info"><span style="font-family: mySymbols; font-size: 20px;">Y</span><?= $row['display_name'] ?> / <span style="font-family: mySymbols; font-size: 18px;">a</span><?= $row['date'] ?> /  <span style="font-family: mySymbols; font-size: 18px;">X</span><?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'a'; ?></p>
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
                                    $("div[data-post-id=" + <?= $row['id'] ?> + "]").parent().prev().css("background-image", "url(<?php if($flag) echo $match[1] ?>)");
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
        <div id="left-regular-article">
            <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="268" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
        </div>
    </div><!-- end regular-article-wrapper -->

<?php include("footer.php"); ?>