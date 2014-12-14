<!DOCTYPE html>
<html>
<head>
    <title>Часопис Бином</title>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/article.css" />
    <script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="js/funkcije.js" ></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/sr_RS/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper">

    <div id="slide-top" title="Vrh"></div>

    <header>
		<img class="header-image" src="slike/logo-left.jpg" alt="logo-left" height="300px" style="float:left;" > 
        <div id="logo">
        </div><!-- end logo -->
        <img class="header-image" src="slike/logo-right.jpg" alt="logo-right" height="300px" > 
        <div id="nav-wrapper">
            <nav id="nav">
                <!--
                Treba da se doda slicica kao home dugme
                -->
                <ul class="navBar">
                    <li class="navBar-link" onclick="window.location = 'index.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo">В</span>ести</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo">В</span>ести</span>
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

                                    global $link;

                                    $upit = 'select distinct name '
                                          . 'from wp_terms wt join wp_term_taxonomy wtt on wt.term_id = wtt.term_id '
                                          . 'where wtt.taxonomy = "category"';
                                    $result = mysqli_query($link, $upit);
                                    $count = mysqli_num_rows($result);
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $row = mysqli_fetch_assoc($result);
                                        echo "<div class='categories'>$row[name]</div>";
                                    }
                                    //echo "<script>margin($count)</script>";


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
                                    <span><span class="prvo-slovo">Г</span>алерија</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo">Г</span>алерија</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'arhiva.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo">А</span>рхива</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo">А</span>рхива</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo">О</span> нама</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo">О</span> нама</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--Search-->
                <form action="search.php" method="get" id="form" onsubmit="return checkSearch()">
                    <div style="display: inline-block; width: 200px; height: 50px; overflow: hidden; position: relative; top: 20px;">
                        <label><input type="text" name="term" id="search-field"/></label>
                    </div>
                    <input type="submit" name="submit" id="search" value=""/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>