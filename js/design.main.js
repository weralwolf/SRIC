$(document).ready(function() {
    $(window).scroll(function() {
        h_head = 227;
        h = $(window).scrollTop();
        if(h >= h_head) {
            $(".side_menu").addClass("fixed");
            $(".fixed_row").addClass("fixed");

        } else {
            $(".fixed_row").removeClass("fixed");
            $(".side_menu").removeClass("fixed");
        }
    });
})

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
})