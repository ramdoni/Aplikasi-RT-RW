
$(document).ready(function() {
"use strict";


// *************
// Selectbox
// *************
// $('.filter select').selectbox();


$('select.styled').customSelect();


// *************
// Validate
// *************
// $('form').validate({
// 	onKeyup : true,
// 	eachValidField : function() {
// 		$(this).closest('div').removeClass('error').addClass('success');
// 	},
// 	eachInvalidField : function() {
// 		$(this).closest('div').removeClass('success').addClass('error');
// 	}
// });

// insert-attr
$('.insert-attr').attr('data-pattern', "^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@([a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$");


// *************
// Colorbox
// *************
$(".group1").colorbox({
	rel:'group1',
	className: 'hideElement',
	iframe:true,
	innerWidth:640,
	innerHeight:390,
});

$(".group2").colorbox({
	rel:'group2',
	title: false,
	width:"100%"
});

$(".group3").colorbox({
	rel:'group3',
	title: false,
	width:"100%"
});

$(".group5").colorbox({
	rel:'group1',
	className: 'hideElement',
	iframe:true,
	width: '100%',
	innerHeight:390,
});

// *************
// BxSlider
// *************
var bxSlider = $('.software_slider .form-bxslider').bxSlider({
	mode: 'fade',
	auto: true,
	pause: 10000,
	adaptiveHeight: true,
	pagerCustom: '#dafault_pager',
	onSliderLoad: function() {
		$('.form-bxslider li').each(function() {
			var setTimeoutID;
			if ( $(this).is(':visible') ) {
				setTimeoutID = setTimeout(function() {
					$('.fin_1').animate({ 'opacity': 1 }, 700);
				}, 400);
				setTimeoutID = setTimeout(function() {
					$('.fin_2').animate({ 'opacity': 1 }, 700);
				}, 800);
				setTimeoutID = setTimeout(function() {
					$('.fin_3').animate({ 'opacity': 1 }, 700);
				}, 1400);
			}
		});
	}
});

$('.xSlider').bxSlider({
	mode: 'fade',
	auto: true,
	pause: 10000,
	adaptiveHeight: true,
	onSliderLoad: function() {
		$('.form-bxslider li').each(function() {
			var setTimeoutID;
			if ( $(this).is(':visible') ) {
				setTimeoutID = setTimeout(function() {
					$('.fin_1').animate({ 'opacity': 1 }, 700);
				}, 400);
				setTimeoutID = setTimeout(function() {
					$('.fin_2').animate({ 'opacity': 1 }, 700);
				}, 800);
				setTimeoutID = setTimeout(function() {
					$('.fin_3').animate({ 'opacity': 1 }, 700);
				}, 1400);
			}
		});
	}
});



$('.aboutUs-slider').bxSlider({
	mode: 'horizontal',
	pause: 5000,
	autoHover: true,
	pager: false,
	auto: true
});

// *************
// Paralax
// *************

$('.dark-blue').waypoint(function() {
	setTimeout(function(){$('#animIt1').addClass('fadeOutRight')},0);
	setTimeout(function(){$('#animIt2').addClass('fadeOutRight')},600);
	setTimeout(function(){$('#animIt3').addClass('fadeOutRight')},1200);
	setTimeout(function(){$('#animIt4').addClass('fadeOutRight')},1800);
}, { offset: '80%' });

$('#trainings').waypoint(function() {
	setTimeout(function(){$('#trainings').addClass('fadeOutTop')},0);
}, { offset: '65%' });

$('#animIt5').waypoint(function() {
	setTimeout(function(){$('#animIt5').addClass('fadeOutBigLeft')},0);
	setTimeout(function(){$('#animIt6').addClass('fadeOutBigRight')},0);
}, { offset: '40%' });

$('#animIt7').waypoint(function() {
	setTimeout(function(){$('#animIt7').addClass('fadeOutBigLeft')},0);
	setTimeout(function(){$('#animIt8').addClass('fadeOutBigRight')},0);
}, { offset: '80%' });

$('#animIt9').waypoint(function() {
	setTimeout(function(){$('#animIt9').addClass('fadeOutBigLeft')},0);
	setTimeout(function(){$('#animIt10').addClass('fadeOutBigRight')},0);
}, { offset: '80%' });

$('#animIt11').waypoint(function() {
	setTimeout(function(){$('#animIt11').addClass('fadeOutRight')},0);
	setTimeout(function(){$('#animIt13').addClass('fadeOutBottom')},0);
	setTimeout(function(){$('#animIt12').addClass('fadeOutLeft')},0);
}, { offset: '80%' });

$('.animIt14').waypoint(function() {
	setTimeout(function(){$('.animIt14').addClass('fadeOutTop')},0);
	setTimeout(function(){$('.animIt15').addClass('fadeOutBottom')}, 600);
}, { offset: '80%' });

$('#partners').waypoint(function() {
	setTimeout(function(){$('#animIt16').addClass('fadeOutRight')},0);
	setTimeout(function(){$('#animIt17').addClass('fadeOutRight')},200);
	setTimeout(function(){$('#animIt18').addClass('fadeOutRight')},400);
	setTimeout(function(){$('#animIt19').addClass('fadeOutRight')},600);
	setTimeout(function(){$('#animIt20').addClass('fadeOutRight')},800);
}, { offset: '90%' });


// $('.bg-darkblue').parallax("50%", 0.4);





// devicePixelRatio
if (window.devicePixelRatio > 1.5) {
	var lowresImages = $('img');
	// lowresImages.each(function(i) {
	// 	var lowres = $(this).attr('src');
	// 	var highres = lowres.replace(".", "r.");
	// 	$(this).attr('src', highres);
	// });

	$('.dark-blue').waypoint(function() {
		setTimeout(function(){$('#animIt1').addClass('fadeOutRight')},0);
		setTimeout(function(){$('#animIt2').addClass('fadeOutRight')},200);
		setTimeout(function(){$('#animIt3').addClass('fadeOutRight')},600);
		setTimeout(function(){$('#animIt4').addClass('fadeOutRight')},1000);
	}, { offset: '100%' });

	$('#trainings').waypoint(function() {
		setTimeout(function(){$('#trainings').addClass('fadeOutTop')},0);
	}, { offset: '100%' });

	$('#animIt5').waypoint(function() {
		setTimeout(function(){$('#animIt5').addClass('fadeOutBigLeft')},0);
		setTimeout(function(){$('#animIt6').addClass('fadeOutBigRight')},0);
	}, { offset: '100%' });

	$('#animIt7').waypoint(function() {
		setTimeout(function(){$('#animIt7').addClass('fadeOutBigLeft')},0);
		setTimeout(function(){$('#animIt8').addClass('fadeOutBigRight')},0);
	}, { offset: '100%' });

	$('#animIt9').waypoint(function() {
		setTimeout(function(){$('#animIt9').addClass('fadeOutBigLeft')},0);
		setTimeout(function(){$('#animIt10').addClass('fadeOutBigRight')},0);
	}, { offset: '100%' });

	$('#animIt11').waypoint(function() {
		setTimeout(function(){$('#animIt11').addClass('fadeOutRight')},0);
		setTimeout(function(){$('#animIt13').addClass('fadeOutBottom')},0);
		setTimeout(function(){$('#animIt12').addClass('fadeOutLeft')},0);
	}, { offset: '100%' });

	$('.animIt14').waypoint(function() {
		setTimeout(function(){$('.animIt14').addClass('fadeOutTop')},0);
		setTimeout(function(){$('.animIt15').addClass('fadeOutBottom')}, 600);
	}, { offset: '100%' });

	$('#partners').waypoint(function() {
		setTimeout(function(){$('#animIt16').addClass('fadeOutRight')},0);
		setTimeout(function(){$('#animIt17').addClass('fadeOutRight')},200);
		setTimeout(function(){$('#animIt18').addClass('fadeOutRight')},400);
		setTimeout(function(){$('#animIt19').addClass('fadeOutRight')},600);
		setTimeout(function(){$('#animIt20').addClass('fadeOutRight')},800);
	}, { offset: '100%' });


}








});