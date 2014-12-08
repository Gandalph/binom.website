<!DOCTYPE html>
<html>
<head>
    <title>- Часопис Бином -</title>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/article.css" />
    <script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="js/funkcije.js" ></script>
</head>
<body>
<div id="wrapper">

    <div id="slide-top" title="Vrh"></div>

    <header>
        <div id="logo">
        </div><!-- end logo -->
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
                                    <span>Вести</span>
                                </div>
                                <div class="roll-down">
                                    <span>Вести</span>
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
                                    <span>Галерија</span>
                                </div>
                                <div class="roll-down">
                                    <span>Галерија</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'arhiva.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>Арихива</span>
                                </div>
                                <div class="roll-down">
                                    <span>Арихива</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span>О наме</span>
                                </div>
                                <div class="roll-down">
                                    <span>О нама</span>
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