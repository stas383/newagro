/**
 * Created by Иван on 24.07.2017.
 */
$(document).ready(function () {
//////////// меню ///////////////
    $('.sidebar-menu > li').click(add_href);
    $('.sidebar-menu > li > ul > li').click(add_href_2);
    $('.sidebar-menu > li > ul > li > ul > li').click(add_href_3);

    $('#'+localStorage.getItem('main')).addClass('active');
    $('#'+localStorage.getItem('main_2')).addClass('active');
    $('#'+localStorage.getItem('main_3')).addClass('active');

    function add_href() {
        var id=$(this).attr('id');
        localStorage.setItem('main', id)
    }
    function add_href_2() {
        var id=$(this).attr('id');
        localStorage.setItem('main_2', id)
    }
    function add_href_3() {
        var id=$(this).attr('id');
        localStorage.setItem('main_3', id)
    }
//////////////////////////////////
});