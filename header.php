<!DOCTYPE html>
<html>
<head>
    <title>Часопис Бином</title>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/article.css" />
    <link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js" ></script>
    <script>
        if (navigator.userAgent.toLowerCase().match('chrome'))
        {
            document.write('<link rel="stylesheet" type="text/css" href="css/chrome.css"/>');
        }
    </script>
    <script type="text/javascript" src="js/funkcije.js" ></script>
    <script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript" src="js/spin.min.js"></script>

</head>
<body>
<script type="text/javascript">
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    window.location = "/mobilni";
}
</script>

<div id="loadingDiv" style=" display:none; z-index:100; position:fixed; top: 0px; left: 0px; width:100%; height:100%; background-color: gray; opacity:0.7; " ></div>
<script>

</script>


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
        <div id="logo-window">
            <div id="logo-wrapper">
                <img class="header-image" src="slike/logo-left.jpg" alt="logo-left" height="300px" style="float:left;" >
                <div id="logo" onclick="window.location = 'index.php'">

                </div><!-- end logo -->
                <img class="header-image" src="slike/logo-right.jpg" alt="logo-right" height="300px">
            </div><!-- end logo-wrapper -->
        </div><!-- end logo-window -->
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
                                    <span><span class="prvo-slovo"></span>Почетна</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Почетна</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" >
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>Чланци</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Чланци</span>
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
                                    for($i = 0; $i < $count; $i++) {
                                        $row = mysqli_fetch_assoc($result);
                                        echo "<div class='categories' onclick=\"window.location='./search.php?kategorija=$row[name]'\">$row[name]</div>";
                                    }
                                    disconnect();
                                    ?>

                                </div>
                            </div>

                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'intervjui.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>Интервјуи</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Интервјуи</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'reportaze.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>Репортаже</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Репортаже</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'galerija.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>Галерија</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Галерија</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'arhiva.php'">
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>Архива</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>Архива</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navBar-link" onclick="window.location = 'onama.php'" >
                        <div class="navBar-window">
                            <div class="roll">
                                <div class="roll-up">
                                    <span><span class="prvo-slovo"></span>О нама</span>
                                </div>
                                <div class="roll-down">
                                    <span><span class="prvo-slovo"></span>О нама</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--Search-->
                <form action="search.php" method="get" id="form" onsubmit="return checkSearch()">
                    <div id="search-field-wrapper">
                        <input type="text" name="term" id="search-field"/>
                    </div>
                    <input type="submit" name="submit" id="search" value=""/>
                </form>
            </nav><!-- end nav -->
        </div><!-- end nav-wrapper -->
    </header>
