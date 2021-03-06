var nav_categories_flag = false;

$(document).ready(function () {
	// navigacija za kategorije
	$(".nav-icon").on("click", function () {
		if(!nav_categories_flag) {
			$(".nav-categories").css({"left": "0"});
			nav_categories_flag = true;
			$(".nav-categories").focus();
			console.log("focused");
		}
		else {
			$(".nav-categories").css({"left": "-200px"});
			nav_categories_flag = false;
		}
	});

	// centrira trenutnu stranicu
	center_page_num();
	$(window).resize(function () {
		center_page_num();
	});
	
	// sakriva strelice za sledecu i predhodnu stranu
	$(".arrow-page").hide();
	var route = window.location.pathname.split("/")[2];
	if(route.match(/^index/) || route == "" || route.match(/^search/))
		$(".arrow-page").show();

	// pali gasi srelice za predhodnu ili sledcu stranicu
	var page_num = parseInt($(".page-num").first().text()),
		page_max = $(".page-num").first().data("page-max");

	if(page_num-1 < 1 || page_max == 0)
		$(".arrow-page").first().css({"visibility" : "hidden"});
	if((page_num+1) > page_max || page_max == 0)
		$(".arrow-page").last().css({"visibility" : "hidden"});

	$(".search-icon").on("click", function () {
		$(".nav-search").animate({
			top : 51,
			easing : "easeinout"

		});
		$(".search-icon").animate({
			top : 65,
			easing : "easeinout"
		});

		setTimeout(function () {
			$(".search-icon").hide();
			$(".search-icon-submit").show();
		}, 500);
	});

	$(".cancel").on("click", function () {
		$(".search-icon").show();
		$(".search-icon-submit").hide();

        $(".nav-search").animate({
            top : -22,
            easing: "easeinout"
        });
        $(".search-icon").animate({
            top : 0,
            easing : "easeinout"
        });
    });
    
    $(window).scroll(function () {
        $(".header-img").css({"top" : ($(window).scrollTop() / 2) + "px" });
    });


});

function center_page_num () {
	var pages = ($(".pages").width() - 20) / 2,
		prev  = $(".arrow-page").first().width();

	$(".page-num").css({"left" : (pages-prev-20) + "px"});
}

function checkSearch () {
	return $(".search-field").val() == "" ? false : true;
}
