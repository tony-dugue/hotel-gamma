import 'owl.carousel/dist/assets/owl.carousel.min.css';
import 'owl.carousel/dist/assets/owl.theme.default.min.css';
require('bootstrap-datepicker/dist/css/bootstrap-datepicker3.css');
require('webpack-jquery-ui/css');

import './styles/vendor/vendor.scss';
import './styles/app/app.scss';

// require jQuery normally
const $ = require('jquery');
// create global $ and jQuery variables
global.$ = global.jQuery = $;

import 'bootstrap';
import ('owl.carousel');
require('webpack-jquery-ui');
require('bootstrap-datepicker');




(function($){
    'use strict';

    // ================= PRELOADER =================

    $(window).on('load', () => {
        $('#preloader').fadeOut('1000', () => {
            $(this).remove();
        });
    });


    // ================= OWL CAROUSEL (slider welcome) =================

    function owlCarousel() {

        // ======== Section Welcome ========

        var welcomeSlider=$('.welcome-slider');

        welcomeSlider.owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            smartSpeed:1000,
            nav:true
        })

        welcomeSlider.on('translate.owl.carousel', () => {
            var layer=$("[data-animation]");
            layer.each( () => {
                var anim_name=$(this).data('animation');
                $(this).removeClass('animated '+anim_name).css('opacity','0');
            });
        });

        $("[data-delay]").each( () => {
            var anim_del=$(this).data('delay');
            $(this).css('animation-delay',anim_del);
        });

        $("[data-duration]").each( () => {
            var anim_dur=$(this).data('duration');
            $(this).css('animation-duration',anim_dur);
        });

        welcomeSlider.on('translated.owl.carousel', () => {

            var layer=welcomeSlider.find('.owl-item.active').find("[data-animation]");

            layer.each( () => {
                var anim_name=$(this).data('animation');
                $(this).addClass('animated '+anim_name).css('opacity','1');
            });
        });

        function welcomeSlide() {
            $('.owl-item').removeClass('prev next');

            var currentSlide=$('.welcome-slider .owl-item.active');

            currentSlide.next('.owl-item').addClass('next');
            currentSlide.prev('.owl-item').addClass('prev');

            var nextSlideImg=$('.owl-item.next').find('.welcome-slider__slide').attr('data-img-url');
            var prevSlideImg=$('.owl-item.prev').find('.welcome-slider__slide').attr('data-img-url');

            $('.owl-nav .owl-prev').css({background:'url('+prevSlideImg+')'});
            $('.owl-nav .owl-next').css({background:'url('+nextSlideImg+')'});
        }

        welcomeSlide();

        welcomeSlider.on('translated.owl.carousel', () => welcomeSlide() );

        // ======== Section Rooms ========

        var roomSlides = $('.rooms-slides');

        roomSlides.owlCarousel(
            {
                items: 1,
                margin: 0,
                loop: true,
                autoplay: true,
                smartSpeed: 1500,
                nav: true,
                navText: [('<i class="fas fa-arrow-left"></i> Précédent'), ('Suivant <i class="fas fa-arrow-right"></i>')]
            }
        )

        roomSlides.on('translate.owl.carousel', () => {

            var layer = $("[data-animation]");

            layer.each( () => {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        $("[data-delay]").each( () => {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each( () => {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        roomSlides.on('translated.owl.carousel', () => {
            var layer = roomSlides.find('.owl-item.active').find("[data-animation]");
            layer.each( () => {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        // ======== Section Testimonials ========

        var testiThumbSlide = $('.testimonial-thumbnail');
        var testiSlides = $('.testimonial-slides');

        testiThumbSlide.owlCarousel({items: 1, margin: 0, loop: true, autoplay: true, smartSpeed: 500});
        testiSlides.owlCarousel({items: 1, margin: 0, loop: true, autoplay: true, smartSpeed: 1000});

        // ======== Section Projects ========

        var projectSlide = $('.projects-slides');

        projectSlide.owlCarousel({
            items: 5,
            margin: 0,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            dots: true,
            responsive: {0: {items: 1}, 768: {items: 2}, 992: {items: 3}, 1500: {items: 4}}
        });
    }

    // ======== Section Projects (animation) ========

    $(".project-slide").on("mouseenter", function() {
        $(".project-slide").removeClass("active");
        $(this).addClass("active");
    });

    // ======== Section Rooms (data range - jquery-ui) ========

    $('.slider-range-price').each(function () {
        var min = jQuery(this).data('min');
        var max = jQuery(this).data('max');
        var unit = jQuery(this).data('unit');
        var value_min = jQuery(this).data('value-min');
        var value_max = jQuery(this).data('value-max');
        var label_result = jQuery(this).data('label-result');

        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max], slide: function (event, ui) {
                var result = label_result + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.range-price').html(result);
            }
        });
    })

    // ======== Section Rooms (datepicker - Bootstrap-datepicker) ========

    $('.input-daterange').datepicker({
        format: "dd/mm/yy",
        multidate: true,
        keyboardNavigation: false,
        forceParse: false,
        daysOfWeekHighlighted: "0,1,2,3,4,5,6",
        todayHighlight: true
    });

    window.onload = ( () => {
        owlCarousel()
    })

})($);
