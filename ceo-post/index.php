<!DOCTYPE html>
<html>
<head>
    <title>- Časopis Binom -</title>
    <meta charset=utf-8 />
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../css/article.css" />
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="../js/funkcije.js" ></script>
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
                        <label><input type="text" id="search-field"/></label>
                    </div>
                    <input type="submit" name="submit" id="search" value="Pretrazi"/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>

    <main id="content">
        <?php
        include("../baza/db.inc");
        if(isset($_GET['post'])) {
            connect();
            global $link;

            $post = $_GET['post'];

            $sql = "select post_title, post_content, date(post_date), display_name "
                . "from wp_posts p join wp_users u on p.post_author = u.id "
                . "where post_status = 'publish' and post_type = 'post' and post_name = '$post'";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            if(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                <h1 class="post-title"><?= $row['post_title'] ?></h1>
                <p class="post"><?= $row['post_content'] ?></p>

        <?php endif;
        }
        ?>
    </main>

</div><!-- end wrapper -->
</body>
</html>