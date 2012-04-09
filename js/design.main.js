$(document).ready(function() {	
$(window).scroll(function()
{
	h_head = 227;
	h = $(window).scrollTop();
	if (h >= h_head)
	{
		$(".fixed_col").addClass("fixed");
		$(".fixed_row").addClass("fixed");
	
	}
	else
	{
		$(".fixed_row").removeClass("fixed");
		$(".fixed_col").removeClass("fixed");
	}
});
})

$(document).ready(function() {
$(".deadlines_head").toggle(
	function() {
		$(".deadlines").animate({right: "0"}, 1000).addClass("opened");
	},
	function() {
		$(".deadlines").removeClass("opened").animate({right: "-199px"}, 1000);
	}
);
})

$(document).ready(function() {
//$(".toggle_button").slice(0,1).text("скрыть");
//$(".toggle_button").slice(0,1).toggle(
//	function() {
//		$(this).next(".sect_body").animate({height: "toggle"}, 1000);
//		$(this).parent(".one_section").addClass("closed");
//		$(this).text("показать");
//	},
//	function() {
//		$(this).next(".sect_body").animate({height: "toggle"}, 1000);
//		$(this).parent(".one_section").removeClass("closed");
//		$(this).text("скрыть");
//	}
//);
$(".toggle_button").text("показать");
$(".toggle_button").toggle(
	function() {
		$(this).next(".sect_body").animate({height: "toggle"}, 1000);
		$(this).parent(".one_section").removeClass("closed");
		$(this).text("скрыть");
	},
	function() {
		$(this).next(".sect_body").animate({height: "toggle"}, 1000);
		$(this).parent(".one_section").addClass("closed");
		$(this).text("показать");
	}
);
})