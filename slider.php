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

</div>