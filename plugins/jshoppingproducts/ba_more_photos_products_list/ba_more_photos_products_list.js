jQuery(function ($) {
    $('.ba_more_photos .more_photos_wrapper').owlCarousel({
        items: 1,
        loop: true,
        mouseDrag: true,
        touchDrag: true,
        nav: more_photos_show_arrows && more_photos_show_arrows > 0,
        dots: more_photos_show_dots && more_photos_show_dots > 0,
        autoplay: more_photos_change_type && more_photos_change_type === 2,
        autoplayTimeout: more_photos_change_delay ? more_photos_change_delay : 5000,
        smartSpeed: more_photos_change_speed ? more_photos_change_speed : 500,
        navText: [
            '<svg viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>',
            '<svg viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>'
        ]
    })

    if (more_photos_change_type && more_photos_change_type === 1) {
        let morePhotoInterval = null

        $(document)
            .on('mouseover', '.ba_more_photos .more_photos_wrapper', function (e) {
                if (morePhotoInterval) {
                    clearInterval(morePhotoInterval)
                }

                const btnNext = $(this).find('.owl-next')

                morePhotoInterval = setInterval(function() {
                    if (btnNext) {
                        btnNext.trigger('click')
                    }
                }, more_photos_change_delay ? more_photos_change_delay : 5000)
            })
            .on('mouseleave', '.ba_more_photos .more_photos_wrapper', function (e) {
                if (morePhotoInterval) {
                    clearInterval(morePhotoInterval)
                }
            })
    }

    if (more_photos_change_type && more_photos_return_default && (more_photos_change_type === 1 || more_photos_change_type === 3)) {
        $(document)
            .on('mouseleave', '.ba_more_photos .more_photos_wrapper', function (e) {
                const btnFirstPage = $(this).find('.owl-dots').children('button:eq(0)')

                if (btnFirstPage) {
                    btnFirstPage.trigger('click')
                }
            })
    }
})