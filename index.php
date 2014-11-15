<!DOCTYPE html>
<html>
<head>
    <title>- Časopis Binom -</title>
    <meta charset=utf-8 />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/article.css" />
    <script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="js/funkcije.js" ></script>
</head>
<body>
<div id="wrapper">
    <div id="slide-top" href="#top">⇪</div>
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
                    <li class="navBar-link">
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
                        <input type="text" id="search-field"/>
                    </div>
                    <input type="submit" name="submit" id="search" value="Pretrazi"/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>
    <main id="content">
        <div id="slider"></div><!-- end slider -->
        <?php
        include("./php/db.inc");

        connect();

        $sql = "select post_title, post_content, date(post_date) as date, display_name "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "where post_status = 'publish'";

        $result = mysqli_query($link, $sql);

        $i = 0;

        ?>
        <div id="article-wrapper">
            <!-- TODO ovo se popunjava preko php -->
            <?php while(($row = mysqli_fetch_assoc($result)) ): ?>
            <article class="recent-article" >
                <div class="article-image"></div>
                <h1 class="caption"><?php echo $row['post_title']; ?></h1>
                <p class="article-info"><?php echo $row['display_name'] . " / " . $row['date']; ?> / 0 komentara</p>
                <?php $string = $row["post_content"]; ?>
                <p class="piece-of-text" onload="f(this, <?php echo "\\\"" . $string . "\\\""; ?>)">
                </p>
            </article>
            <?php endwhile; ?>
            <?php $i = 0; disconnect(); ?>
<!--            <article class="recent-article" >-->
<!--                <div class="article-image"></div>-->
<!--                <h1 class="caption"></h1>-->
<!--                <p class="article-info">Petar Petrovic / 7.11.2014 / 0 komentara</p>-->
<!--                <p class="piece-of-text">Lorem ipsum dolor sitmet, consectetur adipiscing elit. Aenean lacinia bibeum nullased consectetur. Donec sed odio dui. Morbi leo risus, porta ac consectetur ac, ...</p>-->
<!--            </article>-->
            <div id="regular-article-wrapper">
                <div id="right-regular-article">
                    <article class="regular-article">
                        <div class="r-article-image"></div>
                        <div class="right-side">
                            <h1 class="caption"></h1>
                            <p class="article-info">Petar Petrovic / 7.11.2014 / 0 komentara</p>
                            <p class="piece-of-text">Lorem ipsum dolor sitmet, consectetur adipiscing elit. Aenean lacinia bibeum nullased consectetur. Donec sed odio dui. Morbi leo risus, porta ac consectetur ac, ...</p>
                        </div><!-- end right-side -->
                    </article>
                    <article class="regular-article">
                        <div class="r-article-image"></div>
                        <div class="right-side">
                            <h1 class="caption"></h1>
                            <p class="article-info">Petar Petrovic / 7.11.2014 / 0 komentara</p>
                            <p class="piece-of-text">Lorem ipsum dolor sitmet, consectetur adipiscing elit. Aenean lacinia bibeum nullased consectetur. Donec sed odio dui. Morbi leo risus, porta ac consectetur ac, ...</p>
                        </div><!-- end right-side -->
                    </article>
                </div><!-- end right-regular-article -->
                <div id="left-regular-article">

                </div>
            </div><!-- end regular-article-wrapper -->
        </div><!-- end recent-article-wrapper -->
    </main>
</div><!-- end wrapper -->
</body>
</html>
