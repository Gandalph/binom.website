<?php include("./baza/db.inc"); ?>
<?php include("header.php") ?>

    <main id="content">
		<!--SLAJDER -->
		<script src="js/jssor.slider.mini.js"></script>
		<script>
		jQuery(document).ready(function ($) {
			var _SlideshowTransitions = [
					{$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseOutJump,$Round:{$Top:1.5}},
					{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
					{$Duration:400,$Delay:100,$Cols:10,$Clip:2,$Formation:$JssorSlideshowFormations$.$FormationStraight}
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
				<div><img u="image" src="slike/Skyrim-Dragon-Flyby.jpg" />
                    <div onclick="window.location = 'http://www.google.rs'" style="cursor: pointer ;width: 200px; height: 30px; background-color: #008000; position: relative; top: 200px; left: 100px">GOOGLE</div>
                </div>
				<div><img u="image" src="slike/the-joker-head-hd-fondos-276740.jpg" /></div>
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

        $sql = "select p.id, post_title, post_content, date(post_date) as date, display_name, post_name, comment_count "
            . "from wp_posts p join wp_users u on p.post_author = u.id "
            . "where post_status = 'publish' and post_type = 'post'";

        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

        $i = 0;

        ?>
        <div id="article-wrapper">
<div style="height: 413px; overflow: hidden">
            <?php while(($row = mysqli_fetch_assoc($result)) && $i < 4): ?>
            <article class="recent-article" >
                <div class="article-image" data-post-id="<?= $row['id'] ?>"></div>
                <h1 class="caption" title="<?= $row['post_title'] ?>"><?php echo $row['post_title']; $i++; ?></h1>
                <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> /  <?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'a'; ?></p>
                <div style="height: 75px; overflow: hidden;"><!-- TODO style ubaciti u css -->
                    <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                        <?php
                            $string = str_replace(array("\r\n", "\n", "\r"), "<br />", $row['post_content']);
                            $flag = preg_match('/http[^"]+/', $row['post_content'], $match);
                        ?>
                        <script type="text/javascript">
                            $(function() {
                                var $div = $('<div><?= $string ?></div>');
                                var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                                $p.text($div.text());
                                $(".article-image[data-post-id=" + <?= $row['id'] ?> + "]").css("background-image", "url(<?php if($flag) echo $match[0]; else echo $flag ?>)");
                            })
                        </script>
                    </p>
                </div>
                <div class="read-more" onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'">
                    <p>прочитај више</p>
                </div>
            </article><!-- end recent-article -->
            <?php endwhile; ?>
</div>

            <div id="regular-article-wrapper">
                <div id="right-regular-article">
                    <?php mysqli_data_seek($result, 4); ?>
                    <?php while(($row = mysqli_fetch_assoc($result)) != NULL): ?>
                    <article class="regular-article">
                        <div class="r-article-image"></div>
                        <div class="right-side">
                            <h1 class="caption" title="<?= $row['post_title'] ?>"><?= $row['post_title'] ?></h1>
                            <p class="article-info"><?= $row['display_name'] ?> / <?= $row['date'] ?> / <?= $row['comment_count'] ?> коментар<?php if( $row['comment_count'] != 1 ) echo 'а'; ?></p>
                            <div style="height: 164px; overflow: hidden;" data-post-id="<?= $row['id'] ?>"><!-- TODO style prebaciti u css -->
                                <p class="piece-of-text" data-post-id="<?= $row['id'] ?>">
                                    <?php
                                        $string = str_replace(array("\r\n", "\n", "\r"), "<br />", $row['post_content']);
                                        $flag = preg_match('/http[^"]+/', $row['post_content'], $match);
                                    ?>
                                    <script type="text/javascript">
                                        var $div = $('<div><?= $string ?></div>');
                                        var $p = $("p[data-post-id=" + <?= $row['id'] ?> + "]");
                                        $p.text($div.text());
                                        $("div[data-post-id=" + <?= $row['id'] ?> + "]").parent().prev().css("background-image", "url(<?php if($flag) echo $match[0] ?>)");
                                    </script>
                                </p>
                            </div>
                            <div class="read-more" onclick="window.location = 'ceo_post.php?post=<?= $row['id'] ?>'">
                                <p>прочитај више</p><!-- TODO i ovo popraviti lepo -->
                            </div>
                        </div><!-- end right-side -->
                    </article>
                    <?php endwhile; ?>
                    <?php disconnect(); ?>
                </div><!-- end right-regular-article -->
                <div id="left-regular-article">
                    <div class="fb-like-box" data-href="https://www.facebook.com/mortalkombatbend" data-width="278" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
                </div>
            </div><!-- end regular-article-wrapper -->
        </div><!-- end article-wrapper -->
 <?php include("footer.php"); ?>