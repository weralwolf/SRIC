$(document).ready(function() {
	$(window).scroll(function() {
		h_head = 227;
		h = $(window).scrollTop();
		w_head = 1000;
		w = $(window).width();
		scrLeft = $(window).scrollLeft();
		if (h >= h_head) {
			$(".fixed_col").addClass("fixed");
			if (w_head >= w) {
				$(".fixed_col").css({
					left : -scrLeft
				});
			}
			$(".fixed_row").addClass("fixed");
		} else {
			$(".fixed_row").removeClass("fixed");
			if (w_head >= w) {
				$(".fixed_col").css({
					left : 50 + "%"
				});
			}
			$(".fixed_col").removeClass("fixed");

		}
	});
});

$(document).ready(function() {

	w_head = 1000;
	w = $(window).width();
	if (w_head >= w) {
		$(".fixed_row").addClass("left_fixed");
		$(".fixed_col").addClass("left_fixed");
		$(".wrapper").addClass("minW");
	} else {
		$(".fixed_row").removeClass("left_fixed");
		$(".fixed_col").removeClass("left_fixed");
		$(".wrapper").removeClass("minW");
	}
});

$(document).ready(function() {
	$(window).resize(function() {
		w_head = 1000;
		w = $(window).width();
		if (w_head >= w) {
			$(".fixed_row").addClass("left_fixed");
			$(".fixed_col").addClass("left_fixed");
			$(".fixed_col").css({
				left : -scrLeft
			});
			$(".wrapper").addClass("minW");
		} else {
			$(".fixed_row").removeClass("left_fixed");
			$(".fixed_col").removeClass("left_fixed");
			$(".fixed_col").css({
				left : 50 + "%"
			});
			$(".wrapper").removeClass("minW");
		}
	});
});

$(document).ready(function() {
	$(".deadlines_head").toggle(function() {
		$(".deadlines").animate({
			right : "0"
		}, 1000).addClass("opened");
	}, function() {
		$(".deadlines").removeClass("opened").animate({
			right : "-199px"
		}, 1000);
	});
});

$(document).ready(function() {
	$(".toggle_button").text("показать");
	$(".toggle_button").toggle(function() {
		$(this).next(".sect_body").animate({
			height : "toggle"
		}, 1000);
		$(this).parent(".one_section").removeClass("closed");
		$(this).text("hide");
	}, function() {
		$(this).next(".sect_body").animate({
			height : "toggle"
		}, 1000);
		$(this).parent(".one_section").addClass("closed");
		$(this).text("show");
	});
});