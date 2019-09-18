$(function () {
    var top = "10px, 50px";
    var bottom = "0px, -50px";
    var bottomLeft = "50px, -50px";
    var left = "50px, 0px";
    var right = "-50px, 0px";
    $(".banner-1").css({
        transform: 'translate(' + top + ')',
        opacity: 1
    });
    $(".banner-2").css({
        opacity: 1,
        transform: 'translate(' + top + ')'
    }, "slow");
    $(".banner-3").css({
        opacity: 1,
        transform: 'translate(50px, -30px)'
    });
    $(".banner-4").css({
        opacity: 1,
        transform: 'translate(50px, -120px)'
    }, "slow");
    $(".banner-5").animate({
        opacity: 1,
        left: "+=0px"
    });
    $(".banner-6").animate({
        opacity: 1,
        left: "+=0px"
    }, "slow");
    $(".banner-7").css({
        opacity: 1,
        transform: 'translate(' + bottom + ')'
    }, "slow");
    $(".banner-8").animate({
        opacity: 1,
        left: "+=0px"
    }, "slow");
    $(".banner-9").css({
        opacity: 1,
        transform: 'translate(' + bottom + ')'
    });
    $(".banner-10").css({
        opacity: 1,
        transform: 'translate(' + right + ')'
    }, "slow");
    $(".banner-11").css({
        opacity: 1,
        transform: 'translate(' + top + ')'
    }, "slow");
    $(".banner-12").animate({
        opacity: 1,
        left: "+=0px"
    }, "slow");
    $(".banner-left").animate({
        opacity: 1,
        left: "+=421px"
    });
    $(".banner-right").animate({
        opacity: 1,
        right: "+=380px"
    }, "slow");

});

var dayCode = new Date().getDay();
switch (dayCode) {
    case 0:
        console.log("Sunday");
        $("#day-banner").css("background", "url(images/menu-monday-banner.png)");
        $(".meal-details.sunday").css("background", "url(images/day-border.png)");
        $(".meal-details.sunday").css("background-repeat", "repeat-x");
        $(".meal-details.sunday").css("background-position", "bottom");
        break;
    case 1:
        console.log("Monday");
        $("#day-banner").css("background", "url(images/menu-monday-banner.png)");
        $(".meal-details.monday").css("background", "url(images/day-border.png)");
        $(".meal-details.monday").css("background-repeat", "repeat-x");
        $(".meal-details.monday").css("background-position", "bottom");
        break;
    case 2:
        console.log("Tuesday");
        $("#day-banner").css("background", "url(images/menu-tuesday-banner.png)");
        $(".meal-details.tuesday").css("background", "url(images/day-border.png)");
        $(".meal-details.tuesday").css("background-repeat", "repeat-x");
        $(".meal-details.tuesday").css("background-position", "bottom");
        break;
    case 3:
        console.log("Wednesday");
        $("#day-banner").css("background", "url(images/menu-wednesday-banner.png)");
        $(".meal-details.wednesday").css("background", "url(images/day-border.png)");
        $(".meal-details.wednesday").css("background-repeat", "repeat-x");
        $(".meal-details.wednesday").css("background-position", "bottom");
        break;
    case 4:
        console.log("Thursday");
        $("#day-banner").css("background", "url(images/menu-thursday-banner.png)");
        $(".meal-details.thursday").css("background", "url(images/day-border.png)");
        $(".meal-details.thursday").css("background-repeat", "repeat-x");
        $(".meal-details.thursday").css("background-position", "bottom");
        break;
    case 5:
        console.log("Friday");
        $("#day-banner").css("background", "url(images/menu-friday-banner.png)");
        $(".meal-details.friday").css("background", "url(images/day-border.png)");
        $(".meal-details.friday").css("background-repeat", "repeat-x");
        $(".meal-details.friday").css("background-position", "bottom");
        break;
    case 6:
        console.log("Saturday");
        $("#day-banner").css("background", "url(images/menu-monday-banner.png)");
        $(".meal-details.saturday").css("background", "url(images/day-border.png)");
        $(".meal-details.saturday").css("background-repeat", "repeat-x");
        $(".meal-details.saturday").css("background-position", "bottom");
        break;
}
