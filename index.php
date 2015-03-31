<?php include("./baza/db.inc"); ?>
<?php include("header.php") ?>

    <div id="content-wrapper">
        <main id="content">
            <!--SLAJDER -->
            <script src="js/jssor.slider.mini.js"></script>
            <script>
            jQuery(document).ready(function ($) {
                var _SlideshowTransitions = [
						{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}
//                        {$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseOutJump,$Round:{$Top:1.5}},
//                        {$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
//                        {$Duration:400,$Delay:100,$Cols:10,$Clip:2,$Formation:$JssorSlideshowFormations$.$FormationStraight}
                        ];
                        var options = {

                            $ArrowNavigatorOptions: {    //[Optional] Options to specify and enable arrow navigator or not
                                $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                                $ChanceToShow: 1,  //[Required] 0 Never, 1 Mouse Over, 2 Always
                                $AutoCenter: 2  //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0

                            },

                            $AutoPlay: true,
                            $SlideshowOptions: {
                                    $Class: $JssorSlideshowRunner$,
                                    $Transitions: _SlideshowTransitions,
                                    $TransitionsOrder: 1,
                                    $ShowLink: true
                                    },


                             $ThumbnailNavigatorOptions: {
                                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                                }

                        };
            var jssor_slider1 = new $JssorSlider$('slider', options);
            });
            </script>
            <div id="slider" style="position: relative; top: -10px; left: -10px; width: 950px; height: 450px;"><!-- TODO ubaciti u css -->

                <!-- Slides Container -->
                <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 950px; height: 450px;"><!-- TODO ubaciti u css -->

                    <div><img u="image" src="slike/MajMesecMatematike.png" />
                        <div onclick="window.location = 'http://www.google.rs'" style="cursor: pointer ;width: 300px; height: 50px; background-color: #00A8EF; position: relative; top: 250px; opacity: 0.7; color: #ffffff; font-size: 25px; line-height: 50px; padding-left: 20px; font-family: ''myFont3' Neue', sans-serif;
                        font-family: 'Helvetica Neue', sans-serif; font-weight: bold;">Мај Месец Математике</div><!-- TODO lepo srediti u css -->
                    </div>
                    <div><img u="image" src="slike/startIT.jpg" />
                        <div onclick="window.location = 'http://www.google.rs'" style="cursor: pointer ;width: 300px; height: 50px; background-color: #A70201; position: relative; top: 250px; opacity: 0.7; color: #ffffff; font-size: 25px; line-height: 50px; padding-left: 20px;
                        font-family: 'Helvetica Neue', sans-serif; font-weight: bold;">Start It meetup</div><!-- TODO lepo srediti u css -->
                    </div>
                    <div><img u="image" src="slike/bubbleCup.png" />

                        <div onclick="window.location = 'http://www.google.rs'" style="cursor: pointer ;width: 300px; height: 50px; background-color: #A70201; position: relative; top: 250px; opacity: 0.7; color: #ffffff; font-size: 25px; line-height: 50px; padding-left: 20px;
                        font-family: 'Helvetica Neue', sans-serif; font-weight: bold;">Bubble cup</div><!-- TODO lepo srediti u css -->
                    </div>
                </div>

                <!-- Arrow Navigator Skin Begin -->
                <style type="text/css">

                    .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn
                    {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(ikonice/a13.png) no-repeat;
                        overflow:hidden;
                    }
                    .jssora03l { background-position: -3px -33px; }
                    .jssora03r { background-position: -63px -33px; }
                    .jssora03l:hover { background-position: -123px -33px; }
                    .jssora03r:hover { background-position: -183px -33px; }
                    .jssora03ldn { background-position: -243px -33px; }
                    .jssora03rdn { background-position: -303px -33px; }
                </style>
                <!-- Arrow Left -->
                <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
                </span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
                </span>


                            <!-- ThumbnailNavigator Skin Begin -->
                    <div u="thumbnavigator" class="jssort04" style="position: absolute; width: 600px;
                        height: 60px; right: 0px; bottom: 0px;">
                        <!-- Thumbnail Item Skin Begin -->
                        <style type="text/css">
                            /* jssor slider thumbnail navigator skin 04 css */
                            /*
                            .jssort04 .p            (normal)
                            .jssort04 .p:hover      (normal mouseover)
                            .jssort04 .pav          (active)
                            .jssort04 .pav:hover    (active mouseover)
                            .jssort04 .pdn          (mousedown)
                            */
                            .jssort04 .w, .jssort04 .pav:hover .w {
                                position: absolute;
                                width: 60px;
                                height: 30px;
                                border: #0099FF 1px solid;
                            }

                            * html .jssort04 .w {
                                width: /**/ 62px;
                                height: /**/ 32px;
                            }

                            .jssort04 .pdn .w, .jssort04 .pav .w {
                                border-style: solid;
                            }

                            .jssort04 .c {
                                width: 62px;
                                height: 32px;
                                filter: alpha(opacity=45);
                                opacity: .45;
                                transition: opacity .6s;
                                -moz-transition: opacity .6s;
                                -webkit-transition: opacity .6s;
                                -o-transition: opacity .6s;
                            }

                            .jssort04 .p:hover .c, .jssort04 .pav .c {
                                filter: alpha(opacity=0);
                                opacity: 0;
                            }

                            .jssort04 .p:hover .c {
                                transition: none;
                                -moz-transition: none;
                                -webkit-transition: none;
                                -o-transition: none;
                            }
                        </style>
                        <div u="slides" style="bottom: 25px; right: 30px;">
                            <div u="prototype" class="p" style="position: absolute; width: 62px; height: 32px; top: 0; left: 0;">
                                <div class="w">
                                    <div u="thumbnailtemplate" style="width: 100%; height: 100%; border: none; position: absolute; top: 0; left: 0;"></div>
                                </div>
                                <div class="c" style="position: absolute; background-color: #000; top: 0; left: 0">
                                </div>
                            </div>
                        </div>
                        <!-- Thumbnail Item Skin End -->
                    </div>

            </div><!-- end slider -->
            <?php

            global $link;

            connect();

            $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count, name "
                . "from wp_posts p join wp_users u on p.post_author = u.id "
                . "join wp_term_relationships wtr on wtr.object_id = p.id "
                . "join wp_term_taxonomy wtt on wtr.term_taxonomy_id = wtt.term_taxonomy_id "
                . "join wp_terms wt on wtt.term_id = wt.term_id "
                . "where post_status = 'publish' and post_type = 'post' and wtt.taxonomy = 'category' "
                . "order by post_date desc";

            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            $i = 0;

            ?>
            <div id="recent-article-title">
                <span> НАЈНОВИЈИ ЧЛАНЦИ </span>
            </div>
<!--            <div style="width:585px; height:5px; border-bottom: 2px solid #666; display: inline-block; "></div> <!--TODO PREBACI U CSS -->-->
            <div id="article-wrapper">
                <?php include("recent_article.php"); ?>
                <div id="regular-article-wrapper">
                    <?php mysqli_data_seek($result, 4); ?>
                    <?php include("left_regular_article.php"); ?>
                    <div id="right-regular-article">
                        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Бином/793414824064109" data-width="268" data-height="400" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
                        <div class="weather">
                            <a href="http://www.accuweather.com/sr/rs/belgrade/298198/weather-forecast/298198" class="aw-widget-legal">
                                <!--
                                By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
                                -->
                            </a><div id="awcc1427565057854" class="aw-widget-current"  data-locationkey="298198" data-unit="c" data-language="sr" data-useip="false" data-uid="awcc1427565057854"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
                        </div>
                    </div>
                </div><!-- end regular-article-wrapper -->
            </div><!-- end article-wrapper -->
 <?php include("footer.php"); ?>