/****************************
 * Responsive DropDown Menu *
 * IE7 z-index fix          *
 ****************************/

$(function() {
    var zIndexNum = 1000;
    $('.rdd-menu > ul > li').each(function() {
        $(this).css('z-index', zIndexNum);
        zIndexNum -= 10;
    });
});