
var slideWidth;
var sliderTimer;

var text_slide_cur = 0;
function showtext_slide() {
	$('#text_slide' + (text_slide_cur + 1)).css({
		opacity : 0
	}).animate({
		opacity : 1.0,
		left : "0px"
	}, 1500);
	setTimeout(hidetext_slide, 6000);
}

function hidetext_slide() {
	$('#text_slide' + (text_slide_cur + 1)).css({
		opacity : 1
	}).animate({
		opacity : 0,
		left : "0px"
		
	}, 1500, function() {
		showtext_slide();
	});
	text_slide_cur = (text_slide_cur + 1) % 6;
}
var text_slide_cur_s = 0;
function showtext_slide_s() {
	$('#s_desk' + (text_slide_cur_s + 1)).css({
		opacity : 0
	}).animate({
		opacity : 1.0,
		left : "0px"
	}, 1500);
	$('#s_in' + (text_slide_cur_s + 1)).css({
		background : "rgba(250, 94, 79, 0.63)"
	});
	setTimeout(hidetext_slide_s, 6000); 
}

function hidetext_slide_s() {
	$('#s_in' + (text_slide_cur_s + 1)).css({
		background : "rgba(0, 0, 0, 0.51)"
	});
	$('#s_desk' + (text_slide_cur_s + 1)).css({		
	}).animate({
		opacity : 0,
		left : "0px"		
	}, 1500, function() {
		showtext_slide_s();
	});
	text_slide_cur_s = (text_slide_cur_s + 1) % 6;
}

$(document).ready(function () {
$("#users_phone").mask("+38(099) 99-99-999");
	$('.owl-carousel').owlCarousel({
		loop:true, //Зацикливаем слайдер
		margin:10, //Отступ от картино если выводите больше 1
		nav:false, //Отключил навигацию
		autoplay:true, //Автозапуск слайдера
		smartSpeed:2000, //Время движения слайда
		autoplayTimeout:6000, //Время смены слайда
		responsive:{ //Адаптация в зависимости от разрешения экрана
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	$('.navbar #lang').on('click', function (e) {
		$.ajax({
			type: 'post',
			url: 'system/language.php',
			data: {
				'lang': $(e.currentTarget).data('lang')
			},
			response: 'text',
			success: function (response, html) {
				window.location.reload();
			}
		});
	});
	$('#login').on('click',function () {
		$(".login_content #location").val('cab');
		$(".fon, .registration_content").css({
			"display" : "block"
		});
	});
	$('#join_us').on('click',function () {
		$(".login_content #location").val('cab');
		$(".fon, .registration_content").css({
			"display" : "block"
		});
	});
	$('#site_login').on('click',function () {
		$(".login_content #location").val('site');
		$(".fon, .login_content").css({
			"display" : "block"
		});
	});
	$('#reg').on('click',function () {
		$(".fon, .registration_content").css({
			"display" : "block"
		});
		$(".login_content").css({
			"display" : "none"
		});
	});
	$('.fon').on('click', function () {
		$(".fon, .login_content, .registration_content, .open_expert").css({
			"display" : "none"
		});
	});
	slideWidth = $('#testimonials').width();

});

$(function(){
	$('.slidewrapper').width($('.slidewrapper').children().size()*slideWidth);
	sliderTimer=setInterval(nextSlide,8000);
	$('#next_slide').click(function(){
		clearInterval(sliderTimer);
		nextSlide();
		sliderTimer=setInterval(nextSlide,8000);
	});
	$('#prev_slide').click(function(){
		clearInterval(sliderTimer);
		prevSlide();
		sliderTimer=setInterval(nextSlide,8000);
	});
});
function nextSlide(){
	var currentSlide=parseInt($('.slidewrapper').data('current'));
	currentSlide++;
	if(currentSlide>=$('.slidewrapper').children().size())
	{
		currentSlide=0;
	}
	$('.slidewrapper').animate({left: -currentSlide*slideWidth},900).data('current',currentSlide);
}
function prevSlide(){
	var currentSlide=parseInt($('.slidewrapper').data('current'));
	currentSlide--;
	if(currentSlide<0)
	{
		currentSlide=$('.slidewrapper').children().size()-1;
	}
	$('.slidewrapper').animate({left: -currentSlide*slideWidth},900).data('current',currentSlide);
}

/*$(document).ready(function() {
	var name = $('div#form #name').val(),
		lname = $('div#form #lname').val(),
		mail = $('div#form #mail').val(),
		phone = $('div#form #phone').val(),
		comment = $('div#form #comment').text();
	$('#add_contact').on('click',function () {
		$.ajax({
			type: 'post',
			url: 'admin/system/editable.php',
			data: {
				'name' : name,
				'lname' : lname,
				'mail' : mail,
				'phone' : phone,
				'comment' : comment
			},
			response: 'text',
			success: function (response, html) {
				$('div#form #message').text('Дякуємо! Ваша думка важлива для нас!');
				$('div#form #name').val('');
				$('div#form #lname').val('');
				$('div#form #mail').val('');
				$('div#form #phone').val('');
				$('div#form #comment').text('');
			}
		});
	});*/


	showtext_slide();
	showtext_slide_s();
	/*$('.top_menu, body').on('click', '#login', login);
	$('body').on('click', '.fon', login_close);*/
	function login() {
		$(".fon, .login_content").css({
			"display" : "block"
		});
	};
	function login_close() {
		$(".fon, .login_content, .registration_content, .open_expert").css({
			"display" : "none"
		});
	};
	$('.login_content').on('click', '#reg', registration);
	function registration() {
		$(".fon, .registration_content").css({
			"display" : "block"
		});
		$(".login_content").css({
			"display" : "none"
		});
	};
	$('.expert').on('click', 'img, h3', open_expert);
	function open_expert() {
		var id = $(this).attr("name");
		$(".fon, #"+id).css({
			"display" : "block"
		});
	};
	
	
	
	
	
	
	
	 $('a[href^="#"]').bind('click.smoothscroll',function (e) {
	 e.preventDefault();
	 
	var target = this.hash,
	 $target = $(target);
	 
	$('html, body').stop().animate({
	 'scrollTop': $target.offset().top-115
	 }, 500, 'swing', function () {
	 window.location.hash = target;
	 });
	 
	 

	 

});
 var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        autoplay: 1500,
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true,

        }
    });














