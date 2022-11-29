$(".create_btn,.add_new button").click(function() {
    $(".popup_overlay,.popup_window").fadeIn();
});
$(".main_head h4 i,.popup_overlay").click(function() {
    $(".popup_overlay,.popup_window").fadeOut();
});

// view popup

$(".view_btn").click(function() {
    $(".popup_overlay_2,.popup_window_2").fadeIn();
});
$(".main_head h4 i,.popup_overlay_2").click(function() {
    $(".popup_overlay_2,.popup_window_2").fadeOut();
});
// inner menu

$(".btn-inner-menu").click(function() {
    $(".left_sidebar").slideToggle();
});
$(".Courier_sidebar").click(function() {
    $(".upper_sidebar").fadeIn();
});
$(".close_screen i").click(function() {
    $(".upper_sidebar").fadeOut();
});
$(".bars").click(function() {
    $(".main-sidebar-sticky").fadeIn();
});
$(".close_bar i").click(function() {
    $(".main-sidebar-sticky").fadeOut();
});



$(document).ready(function() {
    $('ul.tabs li').click(function() {
        var tab_id = $(this).attr('data-tab');
        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');
        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });
});