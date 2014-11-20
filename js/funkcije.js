/**
 * Created by Gaf on 07-Nov-14.
 */
$(document).ready(function () {

    /* Animacija navigacije */
    $(".navBar-link").hover(function () {
        $(this).children().first().children().first().animate({top: "0px"}, {duration: 200, queue: false});
    }, function () {
        $(this).children().first().children().first().animate({top: "-40px"}, {duration: 200, queue: false});
    });

    /* Border na navigaciji */
    var $nav_window = $(".navBar-window");
    $nav_window.first().css({"border-left": "1px solid white"});
    $nav_window.css({"border-right": "1px solid white"});


    /* Velicina main diva */
    var $height;
    $height = $(this).height();
    console.log($height);
    $("main").css({"height": $height - 300 + "px"});

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
	var testTimeout = 0;
	$(".navBar-link").first().on({
        mouseenter: function (){
            clearTimeout(testTimeout);
            testTimeout = setTimeout(function(){
            $("#categories").css("display", "block");
            $("#slide-down").animate({"height": "200px"} ,{duration: 300, queue: false}).delay(300).queue(function (next) {
            $("#categories").animate({"opacity": "1"});

            next();
			});
			$("#content").animate({"top": "200px"}, {duration: 300, queue: false});
            }, 50);
        },
        mouseleave: function () { //[3]
            clearTimeout(testTimeout);
			$("#categories").css("opacity", "0"); 

			$("#slide-down").animate(
                {"height": "0px"}, 
                {duration: 300, queue: false},
                function() {
                     $("#categories").css("display", "none");
                });
			$("#content").animate({"top": "0px"}, {duration: 300, queue: false});
            
        }
    });

});

function margin(count) {
    var margin = ($(document).width() - 300 - (count * 120)) / (count + 1);
    $(".categories").css("margin-left", margin);
}

function setComment(commentForm, postId) {
    var $cf = $(commentForm);
    var ime = $cf.find("#ime").val();
    var email = $cf.find("#email").val();
    var commentContent = $cf.find("#comment-content").val();

    Date.prototype.today = function () {
        return (this.getFullYear() + "-" + (((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) + "-" + ((this.getDate() < 10)?"0":"") + this.getDate());
    };
    Date.prototype.timeNow = function () {
        return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
    };

    var currentDate = new Date();
    currentDate = currentDate.today() + " " + currentDate.timeNow();

    $.post(
        "../ceo-post/comment_post.php",
        {author: ime, email: email, commentContent: commentContent, postId: postId, date: currentDate},
        function(data) {
            location.reload();
        }

    );
}


			
