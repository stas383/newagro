$(document).ready(function () {
        //Анимация подменю
        $('.nav-sidebar li').on('click', function(){
            $('.nav-sidebar li').find("ul").stop().hide(400);
            $(this).find("ul").stop().toggle(400);
        });
});
