<?php include("./baza/db.inc"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>- Časopis Binom -</title>
    <meta charset=utf-8 />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/article.css" />
    <script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="js/funkcije.js" ></script>
</head>
<body>
<div id="wrapper">

    <div id="slide-top">⇪</div>

    <header>
        <div id="logo"></div><!-- end logo -->
        <div id="nav-wrapper">
            <nav id="nav">
                <!--
                Treba da se doda slicica kao home dugme
                -->
                <ul class="navBar">
                    <li class="navBar-link">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>Vesti</span>
                                </div>
                                <div class="roll-down">
                                    <span>Vesti</span>
                                </div>
                            </div>
                        </div>
                        <!--padajuci meni-->
                        <div id="slide-down" class="dropdown">
							<!--kategorije vesti-->
							<div id="categories">
								<div id="categories-wrapper">
									<?php
										connect();
                                        
										$upit = 'SELECT distinct name FROM wp_terms';
										$result = mysqli_query($link, $upit);
										$count = mysqli_num_rows($result);
										for($i = 0; $i < $count; $i++)
										{
											$row = mysqli_fetch_assoc($result);
											echo "<div class='categories'>$row[name]</div>";
										}
										echo "<script>margin($count)</script>";
										
										
										disconnect();
									?>
										
								</div>
							</div>
                        
                        </div>
                    </li>
                    <li class="navBar-link">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>Galerija</span>
                                </div>
                                <div class="roll-down">
                                    <span>Galerija</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'arhiva.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>Arhiva</span>
                                </div>
                                <div class="roll-down">
                                    <span>Arhiva</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>O nama</span>
                                </div>
                                <div class="roll-down">
                                    <span>O nama</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form action="" method="get" id="form" onsubmit="return false">
                    <div style="display: inline-block; width: 200px; overflow: hidden; position: relative; top: 5px;">
                        <label><input type="text" id="search-field"/></label>
                    </div>
                    <input type="submit" name="submit" id="search" value=""/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>

    <main id="content">
        <div id="slider"></div><!-- end slider -->
        <?php

        global $link;

        connect();

        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "where post_status = 'publish' and post_type = 'post'";

        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

        $i = 0;

        ?>
        <div id="article-wrapper">

            <?php while(($row = mysqli_fetch_assoc($result)) && $i < 2): ?>
            <article class="recent-article" >
                <div class="article-image"></div>
                <h1 class="caption"><?php echo $row['post_title']; $i++; ?></h1>
                <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> / 0 komentara</p>
                <div style="height: 82px; overflow: hidden;"><!-- TODO popraviti ovo lepo -->
                    <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                        <?php $string = $row['post_content']; ?>
                        <script type="text/javascript">
                            $(function() {
                                var $div = $('<div><?= $string ?></div>');
                                var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                                $p.text($div.text());
                            })
                        </script>
                    </p>
                </div>
                <div class="read-more" onclick="window.location = 'ceo-post/index.php?post=<?= $row['id'] ?>'">
                    <p style="float: right; background: #f95625; color: #ffffff; padding: 2px 5px;">procitaj vise</p>
                </div>
            </article><!-- end recent-article -->
            <?php endwhile; ?>

            <div id="regular-article-wrapper">
                <div id="right-regular-article">
                    <?php mysqli_data_seek($result, 2); ?>
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
                            <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> / 0 komentara</p>
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
                            <div class="read-more" onclick="window.location = 'ceo-post/index.php?post=<?= $row['id'] ?>'">
                                <p style="float: right; background: #f95625; color: #ffffff; padding: 2px 5px;">procitaj vise</p><!-- TODO i ovo popraviti lepo -->
                            </div>
                        </div><!-- end right-side -->
                    </article>
                    <?php endwhile; ?>
                    <?php disconnect(); ?>
                </div><!-- end right-regular-article -->
                <div id="left-regular-article">

                </div>
            </div><!-- end regular-article-wrapper -->

        </div><!-- end article-wrapper -->
    </main>
    <footer></footer>
</div><!-- end wrapper -->
</body>
</html>
