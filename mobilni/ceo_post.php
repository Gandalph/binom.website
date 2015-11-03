<?php include("header.php") ?>

<div class="content">
	<div class="post">
	<?php if(isset($_GET['post_id'])): ?>
	<?php
        global $link;
        connect();

        $post = $_GET['post_id'];

        $sql = "select post_title, post_content, date(post_date), display_name "
             . "from wp_posts p join wp_users u on p.post_author = u.id "
             . "where post_status = 'publish' and post_type = 'post' and p.id = $post";

        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

        if(($row = mysqli_fetch_assoc($result)) != NULL): ?>
            <?php $author = $row['display_name']; ?>
            <h1 class="post-title-full"><?= $row['post_title'] ?></h1>
            <?php
                preg_match_all("/\bhttps:\/\/www.youtube.com\/watch\?v=(\w+)\b/", $row['post_content'], $out);
                $br_regexa = count($out[0]);
                $newphrase = str_replace(array("\n\r", "\n", "\r"), "<br />", $row['post_content']);
                for($i = 0 ; $i < $br_regexa; $i++)
                {
                    $tmp = "<iframe class=\"video-full\" src='https://www.youtube.com/embed/" . $out[1][$i] . "?autoplay=0&showinfo=0&controls=0'> </iframe>";
                    $newphrase = str_replace($out[0][$i], $tmp, $newphrase);
                }

            ?>


            <p class="post-full"><?= $newphrase ?></p>
        <?php endif; ?>
    <?php endif; disconnect(); ?>
	</div>
</div>
<?php include("footer.php") ?>
