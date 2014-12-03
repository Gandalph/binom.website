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
            <img src="slike/zaglavlje.jpg" alt="Binom" height="300" width=100%>
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
                <!--Search-->
                <form action="" method="get" id="form" onsubmit="return false">
                    <div style="display: inline-block; width: 200px; height: 50px; overflow: hidden; position: relative; top: 20px;">
                        <label><input type="text" id="search-field"/></label>
                    </div>
                    <input type="submit" name="submit" id="search" value=""/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>