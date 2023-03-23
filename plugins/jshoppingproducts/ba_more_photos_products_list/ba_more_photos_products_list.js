jQuery(function ($) {
    $('.jshop .ba_more_photos.style_fade').each(function () {
        $(this).find('.more_photos_image').css('opacity', 0);
        $(this).find('.more_photos_image:first').css('opacity', 1);
    });

    $('.jshop .ba_more_photos.style_slide').each(function () {
        var wrapper_width = 100 * $(this).find('.more_photos_image').length;
        var image_width = 100 / $(this).find('.more_photos_image').length;
        $(this).find('.more_photos_wrapper').css('width', wrapper_width + '%');
        $(this).find('.more_photos_image').css('width', image_width + '%');
    });

    $('.jshop .ba_more_photos_dots').each(function () {
        $(this).find('.dot_link:first').addClass('active');
    });

    if (more_photos_change_type == 1) {
        var intervalTimer;

        $('.jshop .ba_more_photos.style_fade').hover(
            function () {
                var elem = $(this);
                setTimeout(function () {
                    morePhotosFade(elem, 'next', false);
                    intervalTimer = setInterval(function () {
                        morePhotosFade(elem, 'next', false);
                    }, more_photos_change_delay);
                }, 1);
            }, function () {
                clearInterval(intervalTimer);
            }
        );

        $('.jshop .ba_more_photos.style_slide').hover(
            function () {
                var elem = $(this);
                setTimeout(function () {
                    morePhotosSlide(elem, 'next', false);
                    intervalTimer = setInterval(function () {
                        morePhotosSlide(elem, 'next', false);
                    }, more_photos_change_delay);
                }, 1);
            }, function () {
                clearInterval(intervalTimer);
            }
        );
    }

    if (more_photos_change_type == 2) {
        $(document)
            .on('click', '.jshop .ba_more_photos.style_fade .more_photos_arrow_prev', function (e) {
                e.preventDefault();
                morePhotosFade($(this).parents('.ba_more_photos'), 'prev', false);
            })
            .on('click', '.jshop .ba_more_photos.style_fade .more_photos_arrow_next', function (e) {
                e.preventDefault();
                morePhotosFade($(this).parents('.ba_more_photos'), 'next', false);
            })
            .on('click', '.jshop .ba_more_photos.style_slide .more_photos_arrow_prev', function (e) {
                e.preventDefault();
                morePhotosSlide($(this).parents('.ba_more_photos'), 'prev', false);
            })
            .on('click', '.jshop .ba_more_photos.style_slide .more_photos_arrow_next', function (e) {
                e.preventDefault();
                morePhotosSlide($(this).parents('.ba_more_photos'), 'next', false);
            });
    }

    if (more_photos_change_type == 3) {
        $(document)
            .on('click', '.jshop .ba_more_photos_dots.style_fade .dot_link', function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    $(this).siblings('.dot_link').removeClass('active');
                    $(this).addClass('active');
                    var page = $(this).attr('data-page');
                    var current_element = $(this).parents('.ba_more_photos_dots').siblings('.ba_more_photos');
                    var next_element = $(this).parents('.ba_more_photos_dots').siblings('.ba_more_photos').find('.more_photos_image[data-page="' + page + '"]');
                    morePhotosFade(current_element, false, next_element);
                }
            })
            .on('click', '.jshop .ba_more_photos_dots.style_slide .dot_link', function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    $(this).siblings('.dot_link').removeClass('active');
                    $(this).addClass('active');
                    var page = $(this).attr('data-page');
                    var current_element = $(this).parents('.ba_more_photos_dots').siblings('.ba_more_photos');
                    var next_element = $(this).parents('.ba_more_photos_dots').siblings('.ba_more_photos').find('.more_photos_image[data-page="' + page + '"]');
                    morePhotosSlide(current_element, false, next_element);
                }
            });
    }

    if (more_photos_change_type == 4) {
        setInterval(function () {
            $('.jshop .ba_more_photos.style_fade').each(function () {
                morePhotosFade($(this), 'next', false);
            });

            $('.jshop .ba_more_photos.style_slide').each(function () {
                morePhotosSlide($(this), 'next', false);
            });
        }, more_photos_change_delay);
    }

    if ((more_photos_change_type == 1 || more_photos_change_type == 2) && more_photos_return_default == 1) {
        $('.jshop .ba_more_photos.style_fade').on('mouseleave', function () {
            var elem = $(this);
            var next_element = $(this).find('.more_photos_image:first-child');
            if (!next_element.hasClass('show')) {
                morePhotosFade(elem, false, next_element);
            }
        });

        $('.jshop .ba_more_photos.style_slide').on('mouseleave', function () {
            var elem = $(this);
            var next_element = $(this).find('.more_photos_image:first-child');
            if (!next_element.hasClass('show')) {
                morePhotosSlide(elem, false, next_element);
            }
        });
    }

    function morePhotosFade(elem, direction, nextElement) {
        var current;
        var next;
        if ($(elem).find('.more_photos_image').length > 1) {
            if ($(elem).find('.more_photos_image.show')) {
                current = $(elem).find('.more_photos_image.show');
            } else {
                current = $(elem).find('.more_photos_image:first');
            }

            if (direction == 'next') {
                next = current.next();
                if (!next.length) {
                    next = $(elem).find('.more_photos_image:first');
                }
            }

            if (direction == 'prev') {
                next = current.prev();
                if (!next.length) {
                    next = $(elem).find('.more_photos_image:last');
                }
            }

            if (nextElement) {
                next = nextElement;
            }

            next.css('opacity', 0)
                .addClass('show')
                .animate({opacity: 1.0}, 500);

            current.animate({opacity: 0.0}, 500)
                .removeClass('show');
        }
    }

    function morePhotosSlide(elem, direction, nextElement) {
        var current;
        var next;
        var image_width = 100 / $(elem).find('.more_photos_image').length;
        if ($(elem).find('.more_photos_image').length > 1) {
            if ($(elem).find('.more_photos_image.show')) {
                current = $(elem).find('.more_photos_image.show');
            } else {
                current = $(elem).find('.more_photos_image:first');
            }

            if (direction == 'next') {
                next = current.next();
                if (!next.length) {
                    next = $(elem).find('.more_photos_image:first');
                }
            }

            if (direction == 'prev') {
                next = current.prev();
                if (!next.length) {
                    next = $(elem).find('.more_photos_image:last');
                }
            }

            if (nextElement) {
                next = nextElement;
            }

            next.addClass('show');
            current.removeClass('show');
            var position_wrapper = -100 * next.index();
            $(elem).find('.more_photos_wrapper').animate({
                left: position_wrapper + '%'
            }, 500)
        }
    }
});