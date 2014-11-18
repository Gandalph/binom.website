/**
 * Created by Gaf on 07-Nov-14.
 */
$(document).ready(function () {

    /* Animacija navigacije */
    $(".navBar-link").hover(function () {
        $(this).children().first().children().first().animate({top: "0px"}, 200);
    }, function () {
        $(this).children().first().children().first().animate({top: "-40px"}, 200);
    });

    /* Border na navigaciji */
    var $nav_window = $(".navBar-window");
    $nav_window.first().css({"border-left": "1px solid white"});
    $nav_window.css({"border-right": "1px solid white"});


    /* Velicina main diva */
    var $height;
    $height = $(this).height();
    console.log($height);
    $("main").css({"height": $height - 400 + "px"});

    /* Fixed navigacioni bar */
    var fixed_navi = 0;
    $(document).on("scroll" ,function()
    {
        var $scroll = $(this).scrollTop();
        if($scroll > 301 && fixed_navi == 0) {
            fixed_navi = 1;
            $("#nav-wrapper").css("position","fixed").css("top","0").css("z-index","1");
            $("#slide-down").css("top", "70px");
        }
        else if($scroll < 301 && fixed_navi == 1){
            fixed_navi = 0;
            $("#nav-wrapper").css("position","static");
            $("#slide-down").css("top", "370px");
        }

    });


    /* Animacija za search bar */
    var indicate = 0;
    $("#search").click(function() {
        if(indicate == 0)
        {
            indicate = 1;
            $("#search-field").animate({left: "0px" },150,function(){
                $(this).focus();
            });
        }
        else if(indicate == 1)
        {
            indicate = 0;
            $("#search-field").animate({left: "200px" },150);
        }

    });
    $("#search-field").focusout(function(){
        $("#search-field").animate({left: "200px" },150,function()
        {
            indicate = 0;
            $(this).val("");
        });
    });

    /* Animacija scroll top */
    var slide_right = 0;
    $(document).on("scroll" ,function()
    {
        var $slide = $("#slide-top");
        var $scroll = $(this).scrollTop();
        if($scroll > 200 && slide_right == 0) {
            slide_right = 1;
            $slide.animate({right: "30px"});
        }
        else if($scroll < 200 && slide_right == 1){
            slide_right = 0;
            $slide.animate({right: "-50px"});
        }

    });
    $("#slide-top").click(function() {
        $("html, body").animate({scrollTop: $("html").position().top}, "easeInQuart");
    });


    /* Animacija za padajuci meni navBara */
    $(".navBar-link").first().mouseenter(function () {
        $("#slide-down").animate({"height": "200px"} ,{duration: 300, queue: false}).delay(300).queue(function (next) {
//             $("#categories").css("display", "block");
            $("#categories").animate({"opacity": "1"});

            next();
        });
        $("#content").animate({"top": "200px"}, 300);
    }).mouseleave(function () {
//         $("#categories").css("display","none");
        $("#categories").animate({"opacity": "0"});

        $("#slide-down").animate({"height": "0px"}, {duration: 300, queue: false});
        $("#content").animate({"top": "0px"}, 300);
    });

});

function f(p, text) {
    console.log(text + "****");
}


			