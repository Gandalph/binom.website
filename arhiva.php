<?php include("./baza/db.inc"); ?>
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

    <div id="slide-top">⇪</div>

    <header>
        <div id="logo"></div><!-- end logo -->
        <div id="nav-wrapper">
            <nav id="nav">
                <!--
                Treba da se doda slicica kao home dugme
                -->
                <ul class="navBar">
                    <li class="navBar-link" >
                        <div class="navBar-window" onclick="window.location = 'index.php'">
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
// 											echo "<script> console.log('$row[name]'); </script>";
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

    <main id="content" style="text-align: center;">
        <a href="arhiva/BINOM_2014.pdf"><img style="width: 400px;" class="pdf" alt="naslovna strana" src="./arhiva/naslovna.jpg" ?></a>
    </main>
</div><!-- end wrapper -->
</body>
</html>
