(function ($) {
    $.fn.projectsTabsSlider = function (options) {
        let defaults = {
                url: '/include/ajax/get_projects_slider.php',
                sections_links: '.tab_links .project_link'
            },
            settings = $.extend(defaults, options),

            initSlider = function ($block) {
                let $slider = $block.find('.project_slider .swiper-container');
                if ($slider.length) {
                    let projSwiper = new Swiper ( $slider, {
                        slidesPerView: 3,
                        autoHeight: true,
                        centeredSlides: true,
                        loop: true,
                        navigation: {
                            nextEl: $(this).find('.project_nav--next'),
                            prevEl: $(this).find('.project_nav--prev')
                        },
                        breakpoints: {
                            992: {
                                slidesPerView: 1
                            }
                        }
                    });
                }
            };

        return this.each(function () {
            let $block = $(this),
                $content_block = $block.find('.tab_items');

            initSlider($block);

            $block.on('click', settings.sections_links + ':not(.active)', function () {
                let $btn = $(this),
                    sectionId = $btn.data('section-id');

                $block.find(settings.sections_links + '.active').removeClass('active');
                $btn.addClass('active');

                if (!sectionId) return false;

                $.ajax({
                    url: settings.url,
                    method: "GET",
                    data: {section_id: sectionId}

                }).done(function ($html) {
                    $content_block.html($html);
                })
            });
        });
    }
})(jQuery);
