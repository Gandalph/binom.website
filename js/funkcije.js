/**
 * Created by Gaf on 07-Nov-14.
 */
$(document).ready(function () 
{
	
	/*brisemo one "ruzne" divove koje issuuova skripta sama generise*/
	/*morali smo da pozivamo kod za brisanje neki duzi vremenski period jer se njihova skripta asinhrono ucitava i ne znamo dak ce tacno biti ucitana*/
	var intervalId = setInterval( function()
	{
		$(".issuuembed.issuu-isrendered").children().children(":nth-child(2)").css("display","none");
    },500);
	/*prekidamo pozivanje koda za brisanje gore pomenutog diva*/
	setTimeout(function()
	{
		clearInterval(intervalId);
	},3000);
	
	/*Uvecanje slike clanaka */
	$(".recent-article").hover(function () {
        $(this).children().first().css("background-size","110%");
    }, function () {
        $(this).children().first().css("background-size","100%");
    });
    $(".regular-article").hover(function () {
        $(this).children().first().css("background-size","110%");
    }, function () {
        $(this).children().first().css("background-size","");
    });



    /* Animacija navigacije */
    $(".navBar-link").hover(function () {
        $(this).children().first().children().first().animate({top: "0px"}, {duration: 200, queue: false});
    }, function () {
        $(this).children().first().children().first().animate({top: "-40px"}, {duration: 200, queue: false});
    });

    /* Border na navigaciji */
    var $nav_window = $(".navBar-window");
    $nav_window.first().css({"border-left": "1px solid #003333"});
    $nav_window.css({"border-right": "1px solid #003333"});

    /* Margina last footer-div */
    $(".footer-div").last().css("margin", "0");
    

    /* Fixed navigacioni bar */
    var fixed_navi = 0;
    var $scroll = $(this).scrollTop();
    if($scroll > 301 && fixed_navi == 0) {
        fixed_navi = 1;
        $("#nav-wrapper").css("position","fixed").css("top","0").css("z-index","1");
        $("#slide-down").css("top", "70px");
		$("main").css("margin-top", "70px"); //ubaceno zato sto kad se zalepi gore naw-bar velicina celig maina se smanji za tih 70px

    }
    else if($scroll < 301 && fixed_navi == 1){
        fixed_navi = 0;
        $("#nav-wrapper").css("position","relative");
        $("#slide-down").css("top", "70px");
		$("main").css("margin-top", "0px"); //ubaceno zato sto kad se zalepi gore naw-bar velicina celig maina se smanji za tih 70px
    }

    $(document).on("scroll" ,function()
    {
        var $scroll = $(this).scrollTop();
        if($scroll > 301 && fixed_navi == 0) {
            fixed_navi = 1;
            $("#nav-wrapper").css("position","fixed").css("top","0").css("z-index","1");
            $("#nav-wrapper").css("transform","scaleY(0.9)").css("top", "-5px");
            $("#slide-down").css("top", "70px");
			$("main").css("margin-top", "70px"); //ubaceno zato sto kad se zalepi gore naw-bar velicina celig maina se smanji za tih 70px
        }
        else if($scroll < 301 && fixed_navi == 1){
            fixed_navi = 0;
            $("#nav-wrapper").css("transform", "scale(1.0)");
            $("#nav-wrapper").css("position","relative");
            $("#slide-down").css("top", "70px");
			$("main").css("margin-top", "0px"); //ubaceno zato sto kad se zalepi gore naw-bar velicina celig maina se smanji za tih 70px
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
	$(".navBar-link").first().next().on({
        mouseenter: function (){
            clearTimeout(testTimeout);
            testTimeout = setTimeout(function(){
            $("#categories").css("display", "block");
            $("#slide-down").animate({"height": "70px"} ,{duration: 300, queue: false}).delay(300).queue(function (next) {
            $("#categories").animate({"opacity": "1"});

            next();
			});
			//$("#content").animate({"top": "70px"}, {duration: 300, queue: false});
            }, 50);
        },
        mouseleave: function () { //[3]
            clearTimeout(testTimeout);
			$("#categories").css("opacity", "0").css("display", "none");

			$("#slide-down").animate(
                {"height": "0px"}, 
                {duration: 300, queue: false}
            );
        }
    });
	
	/*      menjanje recent-postova na neki vremenski period (10sec)      */
	var i;
	for(i = 2; i < 4; i++)
	{
		$(".recent-article:eq(" + i + ")").fadeOut();
	}
		var articlesId = setInterval("promeni()",10000);
	
	
	/* zaustavlja se menjanje recent articlesa kad je mish pozicioniran na neki od njih */
	$(".recent-article").on({
        mouseenter: function (){
			    clearInterval(articlesId);
			
        },
        mouseleave: function () {
			articlesId = setInterval("promeni()",10000);
        }
    });
	
	
	
	/*
	*       pozicioniranje sredisnjeg dela slike headera
	*/
	
	$("img:eq(0)").width( ($(window).width()- 950)/2 + "px" );
	if($(window).width() % 2 == 1 )
		$("img:eq(1)").width( ($(window).width()- 950)/2 - 0.5 + "px" );
	else
		$("img:eq(1)").width( ($(window).width()- 950)/2 + "px" );
	
	$(window).resize(function(){
		
		$("img:eq(0)").width( ($(window).width()- 950)/2 + "px" );
		$("img:eq(1)").width( ($(window).width()- 950)/2 + "px" );
		
		
		if($("header").height() > 500)
		{
			$("img:eq(1)").width( ($(window).width()- 950)/2 -0.5 + "px" );
		}
	});



    /* margin za post sa strane */
    var height = $(".post-title").height() + 15;
    $("#postovi-sa-strane").css("margin-top", height + "px");



    /* pomeranje logo slike sa scroll-om */
    $(document).on("scroll", function() {
        var move = $(this).scrollTop() / 2;
        $("#logo-wrapper").css("top", move);
    });


    $(".fancybox").fancybox({
        wrapCSS    : 'fancybox-custom',
        closeClick : true,

        openEffect : 'none',

        helpers : {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(10, 10, 10, 0.85)'
                }
            }
        }
    });
	
}); /***** end document.ready ******/


var i = 0;
function promeni()
{
    $(".recent-article:eq(" + i + ")").fadeOut(1000);
    $(".recent-article:eq(" + (i + 1) + ")").fadeOut(1000);
    i = (i + 2) % 4;
    $(".recent-article:eq(" + i + ")").delay(1000).fadeIn(1000);
    $(".recent-article:eq(" + (i + 1) + ")").delay(1000).fadeIn(1000);
};
	



function margin(count) {
    var margin = ($(document).width() - 300 - (count * 120)) / (count + 1);
    $(".categories").css("margin-left", margin);
}

function setComment(commentForm, postId) {
    var $cf = $(commentForm);
    var ime = $cf.find("#ime");
    var email = $cf.find("#email");
    var commentContent = $cf.find("#comment-content");

    Date.prototype.today = function () {
        return (this.getFullYear() + "-" + (((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) + "-" + ((this.getDate() < 10)?"0":"") + this.getDate());
    };
    Date.prototype.timeNow = function () {
        return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
    };

    var currentDate = new Date();
    currentDate = currentDate.today() + " " + currentDate.timeNow();

    $.post(
        "comment_post.php",
        {author: ime.val(), email: email.val(), commentContent: commentContent.val(), postId: postId, date: currentDate},
        function(data) {
            ime.val("");
            email.val("");
            commentContent.val("");
            location.reload();
        }
    );



	
}


/* Proverava da li je search prazan */
function checkSearch() {
    if($("#search-field").val() != "") {
        return true;
    }
else
    return false;
}

/* Uzima naziv taga iz objekta i poziva search.php stranicu */
function searchTag(tagDiv) {
    $tagDiv = $(tagDiv);

    window.location = './search.php?tag=' + $tagDiv.text();
}







