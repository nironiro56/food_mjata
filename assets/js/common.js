'use strict';

$(document).on('click', '.js-showMore', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.closest('[data-parent]').attr('id');
    if (!id) id = $(this).parents('[id ^= comp_]').attr('id');

    BX.showWait();
    BX.ajax.post($(this).attr('data-href'), '', function (result) {
        var doc = new DOMParser().parseFromString(result, 'text/html'),
            content = doc.getElementById(id),
            $content = $(content);
        $('#' + id).find('[data-items]').append($content.find('[data-items]').html());
        //$this.closest('[data-parent]').find('[data-items]').append($content.find('[data-items]').html());
        if ($content.find('[data-pagination]').length) {
            $('#' + id).find('[data-pagination]').html($content.find('[data-pagination]').html());
        } else {
            $('#' + id).find('[data-pagination]').remove();
        }
        BX.closeWait();
    });
});
'use strict';

var SFunctions = {

    scrollToElement: function scrollToElement(ell) {
        var $ell = $(ell);
        if (!$(ell).length) return false;
        $("html, body").animate({ scrollTop: $ell.offset().top - 40 }, 300);
    },

    showYoutubeModal: function showYoutubeModal(id) {
        if (!id) return false;
        $.fancybox.open({
            src: 'https://www.youtube.com/embed/' + id + '?autoplay=1&amp;modestbranding=1&amp;showinfo=0&amp;rel=0',
            type: 'iframe'
            //afterShow: function () {}
        });
    }

};

$('body').on('click', '.show-youtube', function (e) {
    e.preventDefault();
    var id = $(this).data('video-id');
    SFunctions.showYoutubeModal(id);
});
'use strict';

(function ($) {
    $.fn.projectsTabsSlider = function (options) {
        var defaults = {
            url: '/include/ajax/get_projects_slider.php',
            sections_links: '.tab_links .project_link'
        },
            settings = $.extend(defaults, options),
            initSlider = function initSlider($block) {
            var $slider = $block.find('.project_slider .swiper-container');
            if ($slider.length) {
                var projSwiper = new Swiper($slider, {
                    slidesPerView: 3,
                    autoHeight: true,
                    centeredSlides: true,
                    loop: true,
                    navigation: {
                        nextEl: $slider.find('.project_nav--next'),
                        prevEl: $slider.find('.project_nav--prev')
                    },
                    breakpoints: {
                        992: {
                            slidesPerView: 1
                        }
                    }
                });
            }
        },
            showLoading = function showLoading($content_block) {
            $content_block.animate({ opacity: 0.3 }, 300);
        },
            hideLoading = function hideLoading($content_block) {
            $content_block.animate({ opacity: 1 }, 300);
        };

        return this.each(function () {
            var $block = $(this),
                $content_block = $block.find('.tab_items');

            initSlider($block);

            $block.on('click', settings.sections_links + ':not(.active)', function () {
                var $btn = $(this),
                    sectionId = $btn.data('section-id'),
                    $prev_btn = $block.find(settings.sections_links + '.active');

                $prev_btn.removeClass('active');
                $btn.addClass('active');

                if (!sectionId) return false;

                showLoading($content_block);

                $.ajax({
                    url: settings.url,
                    method: "GET",
                    data: { section_id: sectionId }

                }).done(function ($html) {
                    $content_block.html($html);
                    initSlider($block);
                    hideLoading($content_block);
                }).fail(function (jqXHR, textStatus) {
                    console.error('Error loading tab slider from ' + settings.url + ': ' + textStatus + ' ' + jqXHR.status);

                    hideLoading($content_block);
                    $btn.removeClass('active');
                    $prev_btn.addClass('active');
                });
            });
        });
    };
})(jQuery);
'use strict';

/*Calc start*/

(function ($) {
    $.fn.calculatorBlock = function () {
        var $ell = this;

        var _current_step = 1;

        var setStep = function setStep(n) {
            $ell.data('step', n);
            $('html, body').animate({ scrollTop: $ell.find('.step_indicator').offset().top }, 300);
            /*if (n > 4) {
                $ell.find('.calc__step_indicator').hide();
                $ell.find('.calc__header').hide();
            }*/

            $ell.find('.step_indicator .step_indicator_item').removeClass('active');
            $ell.find('.step_indicator .step_indicator_item').eq(n - 1).addClass('active');
            $ell.find('.current_step').removeClass('current_step');
            $ell.find('.step_' + n).addClass('current_step');
            $ell.find('.step_indicator .step_indicator_item').removeClass('submitted_s');
            for (var i = 1; i < n; i++) {
                $ell.find('.step_indicator .step_indicator_item').eq(i - 1).addClass('submitted_s');
            }
            _current_step = n;
        };

        var animateElement = function animateElement(ell, animation) {
            $ell.find('.b-error').removeClass('b-error');
            ell.addClass('b-error');
            ell.addClass(animation + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass(animation + ' animated');
            });
        };

        /* $ell.find('#slider_width').slider({
             range:'min',
             min:1, max:1000, value: 250,
             slide:function( event, ui ) {
                 $( "#slider_width_value" ).val( ui.value/100 );
             }});
         $ell.find('#slider_height').slider({
             range:'max',
             orientation: "vertical",
             min:1, max:1000, value: 250,
             slide:function( event, ui ) {
                 $( "#slider_height_value" ).val( (1000-ui.value)/100 );
             }});*/

        var $form = $ell.find('form');

        $ell.find('.calc_submit_form').on('click', function () {
            $form.submit();
        });

        $form.on('submit-success', function (e) {
            $ell.find('.step_indicator').hide();
            $ell.find('.stepform_title').hide();
            var step = $ell.data('step');
            if (!step) step = 1;
            console.log(step + '--->');
            setStep(step + 1);
        });

        $ell.find('.step_indicator .step_indicator_item').on('click', function () {
            var target = parseInt($(this).data('step-bullet'));
            if (target && target < _current_step) {
                setStep(target);
            }
        });

        $ell.find('.js-stepform-next').on('click', function () {
            var step = $ell.data('step');
            if (!step) step = 1;

            var error = false;
            var $current = $ell.find('.step_' + step + ' .c_validate').each(function (block) {
                var $thisItem = $(this);
                var checkboxValidate = $thisItem.hasClass('validate-checkbox');
                var inputValidate = $thisItem.hasClass('validate-input');

                //Валидация чекбоксов
                if (checkboxValidate && $(this).find('input[type="radio"]:checked').length == 0) {
                    error = true;
                }

                // Валидация инпутов
                if (inputValidate) {
                    $thisItem.find('input, select').each(function () {
                        var value = $(this).val();
                        if ($(this).val() == '' || $(this).val() == null) error = true;
                    });
                }

                // Показываем ошибку блока
                if (error) {
                    var $block_title = $thisItem.find('.title');
                    $('html, body').animate({ scrollTop: $block_title.offset().top - 50 }, 300, function () {
                        animateElement($block_title, 'shake');
                    });

                    return false;
                }
            });

            $ell.trigger('validation_step_' + step);
            if (!error) {
                setStep(step + 1);
            }
        });

        $ell.find('.stepform_techs_item .stepform_techs_img').on('click', function () {
            $(this).closest('.stepform_techs_item').find('label').click();
        });
    };
})(jQuery);

/*Calc end*/
'use strict';

console.log("INIT FORMS.JS");

/*** NEW FORMS *****/
// forms
function getFormValues($form) {
    var res = {};
    $form.find('input,textarea').each(function () {
        res[$(this).attr('name')] = $(this).val();
    });
    return res;
}

function disposeValidation($form) {
    $form.find('.bad').removeClass('bad');
}

function setValidation($form, res) {
    $.each(res, function (index, item) {
        $form.find('[name=' + item.name + ']').addClass('bad');
        if (item.name == 'user-consent') {
            $form.find('[name=' + item.name + ']').closest('.input_item').addClass('bad');
        }
    });
}

function initForm(form) {
    var $el = $(form);
    var meta = {
        method: $el.attr('method') || 'POST',
        hashtag: $el.data('hashtag'),
        endpoint: $el.data('endpoint'),
        popup: $el.data('popup')
    };

    $el.on('submit', function (e) {

        $el.find('button, input[type="submit"]').attr("disabled", true);
        e.preventDefault();
        disposeValidation($el);

        var data = {};
        var dataRaw = $el.serializeArray();

        data = dataRaw;

        var options = {
            url: '/include/ajax/call.php',
            type: 'POST',
            dataType: 'json',
            data: data
        };

        if ($el.find('input[type="file"]').length) {
            data = {};
            $.each(dataRaw, function (index, item) {
                data[item.name] = item.value;
            });
            var files = $el.find('input[type="file"]').get(0).files;
            var dataF = new FormData();
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                // Check the file type.
                /* if (!file.type.match('image.*')) {
                 continue;
                 }*/

                // Add the file to the request.
                dataF.append('files[]', file, file.name);
            }
            $.each(dataRaw, function (index, item) {
                dataF.append(item.name, item.value);
            });
            options.data = dataF;
            options.processData = false;
            options.contentType = false;
        }

        $.ajax($.extend(options, {
            error: function error() {
                $el.find('button, input[type="submit"]').attr("disabled", false);
                alert("Во время отправки формы произошла ошибка... Попробуйте еще раз, либо свяжитесь с нами по телефону");
                console.log('Error while submit form');
                console.log(arguments);
            },
            success: function success(res) {
                $el.find('button, input[type="submit"]').attr("disabled", false);
                if (res.errors) {
                    setValidation($el, res.fields);
                    $el.trigger('submit-error');
                } else {
                    if (meta.hashtag) {
                        window.location.hash = '#' + meta.hashtag;
                    }
                    if (meta.popup) {
                        closePopup();
                        setTimeout(function () {
                            showPopup(meta.popup);
                        }, 500);
                    }

                    $el.trigger('submit-success');
                }
            }
        })); //
    });

    $el.find('[data-role=submit]').on('click', function (e) {
        e.preventDefault();
        $el.trigger('submit');
    });
    $el.on('submit-success', function () {
        $el.find('textarea, input[type="text"], input[type="email"]').val('');
    });
}

function initForms() {
    $('form[data-ajax="true"]').each(function () {
        initForm(this);
    });
}

$('[data-role=submit-consultation]').on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $form = $this.closest('form');
    var action = $this.text();
    $form.find('input[name="action"]').val(action);
    $form.trigger('submit');
});
/*******************/

// popups
function showPopup(code) {
    console.log('show popup code: ' + code);
    $.fancybox.open({
        src: '#popup-' + code,
        type: 'inline',
        padding: 0,
        afterShow: function afterShow() {
            //$("a.fancybox-close").addClass('has-custom');

            maskPhone();
            //$('input[name="form_description"]').val(description);
        }
    });
}

function showAjaxPopup(url, params) {
    var href = url;
    if (params) {
        var query = $.param(params);
        href += '?' + query;
    }

    $.fancybox.open({
        src: href,
        type: 'ajax',
        padding: 0,
        afterShow: function afterShow() {
            maskPhone();
            initForm($('form.ajax-popup-form.no-init').removeClass('no-init'));
        }
    });
}

function closePopup() {
    $.fancybox.close();
}

// popups done

//base actions
function initBaseActions() {
    $('[data-showpopup]').on('click', function (e) {
        e.preventDefault();
        showPopup($(this).data('showpopup'));
    });

    /*$('[data-href]').on('click', function (e) {
        e.preventDefault();
        window.location.href = $(this).data('href');
    });*/
}

//base actions done

function maskPhone() {
    $('input[name="phone"]').inputmask('+7 (999) 999 - 99 - 99');
}

//$(function () {
maskPhone();
initBaseActions();
initForms();
//});
/* ***** */
'use strict';

function initVkWidget() {
    if (!$('#vk_groups').length) return;

    console.log('vk init start 1');
    var script = document.createElement('script');
    script.src = '//vk.com/js/api/openapi.js?121';
    script.async = true;
    script.onload = function () {
        var $ell = $('#vk_groups');
        var vk_height = $ell.data('height');
        var group_id = $ell.data('group-id');
        if (!group_id) group_id = 123886560;
        $ell.html('');
        console.log('VK ID - ' + group_id);
        VK.Widgets.Group("vk_groups", {
            mode: 0,
            width: "auto",
            height: vk_height /*, color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'*/
        }, group_id);
    };

    document.head.appendChild(script);
};

$(function () {
    initVkWidget();
});
'use strict';

document.addEventListener('DOMContentLoaded', function () {

	/**
  * Catalog Toggle 
  * header.html
  */
	$('#openCatalog').click(function (e) {
		e.preventDefault();

		$('div[data-catalog]').toggle();
	});

	/**
  * Swiper Mainframe
  * index.html карточка_кухни.html
  */
	if ($('.mainframe_slider').length) {
		$('.mainframe_slider').each(function () {
			var elem = $(this).children('.swiper-container');

			var mainframeSwiper = new Swiper(elem, {
				slidesPerView: 1,
				spaceBetween: 9,
				loop: true,
				watchOverflow: true,
				autoplay: {
					delay: 3000
				},
				on: {
					init: function init() {
						if ($(elem).parent('.mainframe_slider').has('.swiper-counter')) {
							$(elem).siblings('.swiper-counter').children('.counter-max').text('/' + (this.slides.length - 2));
							$(elem).siblings('.swiper-counter').children('.counter-curent').text('' + (this.realIndex + 1));
						}
					},
					slideChangeTransitionEnd: function slideChangeTransitionEnd() {
						if ($(elem).parent('.mainframe_slider').has('.swiper-counter')) {
							$(elem).siblings('.swiper-counter').children('.counter-curent').text('' + (this.realIndex + 1));
						}
					}
				}
			});
			elem.hover(function () {
				mainframeSwiper.autoplay.stop();
			}, function () {
				mainframeSwiper.autoplay.start();
			});
		});
	}

	/**
  * Swiper Manufacturer
  */
	if ($('.manufacturer_slider').length) {
		$('.manufacturer_slider').each(function () {
			var elem = $(this).children('.swiper-container');

			var swiper = new Swiper(elem, {
				slidesPerView: 5,
				loop: true,
				spaceBetween: 44,
				autoHeight: true,
				navigation: {
					nextEl: $(this).children('.manufacturer_nav--next'),
					prevEl: $(this).children('.manufacturer_nav--prev')
				}
			});
		});
	}

	/**
  * Swiper GoodSlider
  * index.html карточка_кухни.html
  */
	$('.good_slider').each(function () {
		var elem = $(this).children('.swiper-container'),
		    self = $(this);

		var swiper = new Swiper(elem, {
			slidesPerView: $(this).attr('data-slides') != undefined ? Number($(this).attr('data-slides')) : 3,
			spaceBetween: 30,
			loop: true,
			navigation: {
				nextEl: self.children('.good_slider_nav--next'),
				prevEl: self.children('.good_slider_nav--prev')
			},
			breakpoints: {
				992: {
					slidesPerView: 2,
					spaceBetween: 10,
					loop: false,
					navigation: false,
					scrollbar: {
						el: self.find('.swiper-scrollbar')
					}
				},
				768: {
					slidesPerView: 1,
					spaceBetween: 0,
					scrollbar: {
						el: self.find('.swiper-scrollbar')
					}
				}
			}
		});
	});

	/**
  * RadioBox KType
  * index.html
  */
	// Init
	if ($('.buildform_filter_type_item').length) {
		$('.buildform_filter_type_item').children('input[type="radio"]').each(function () {
			if ($(this).is(':checked')) $(this).parent('.buildform_filter_type_item').addClass('active');
		});
	}

	/**
  * NiceScroll ScrollBox
  * index.html карточка_кухни.html
  */
	if ($('.scroll_box').length) {
		$('.scroll_box').each(function () {
			var niceScroll = $(this).niceScroll({
				cursorcolor: '#006300',
				cursorwidth: '12px',
				cursorborder: 'none',
				cursorborderradius: '6px',
				autohidemode: false,
				background: 'transparent'
			});

			$(this).siblings('.scroll_nav--top').click(function () {
				niceScroll.doScrollBy(80);
			});
			$(this).siblings('.scroll_nav--bottom').click(function () {
				niceScroll.doScrollBy(-80);
			});
		});
	}

	/**
  * Tab
  * index.html
  */
	// Init
	/*if ( $('.tab_box').length ) {
 	$('.tab_box').each( function() {
 		let first = $(this).children('.tab_links').children('a[data-tab-link]').first().attr('data-tab-link')
 		
 		$(this)
 			.children('.tab_links')
 			.children('a[data-tab-link]')
 			.first()
 			.addClass('active')
 		$(this)
 			.children('.tab_items')
 			.children(`.tab_item[data-tab="${ first }"]`)
 			.addClass('active')
 	})
 }*/
	// Click Event
	/*$('.tab_links > a[data-tab-link]').click( function(e) {
 	e.preventDefault()
 		let linkName = $(this).attr('data-tab-link')
 		$(this)
 		.parent('.tab_links')
 		.children('a[data-tab-link]')
 		.removeClass('active')
 	$(this)
 		.addClass('active')
 		.add()
 		.closest('.tab_box')
 		.find(`.tab_item[data-tab]`)
 		.removeClass('active')
 		.map( function() {
 			if ( $(this).attr('data-tab') == linkName )
 				$(this).addClass('active')
 		})
 })*/

	/**
  * ReviewSlider Swiper
  * index.html
  */
	if ($('.reviewslider_box').length) {
		$('.reviewslider_box').each(function () {
			var elem = $(this).children('.swiper-container'),
			    self = $(this);

			var reviewSwiper = new Swiper(elem, {
				slidesPerView: 4,
				loop: true,
				spaceBetween: 33,
				navigation: {
					nextEl: $(this).find('.reviewslider_nav--next'),
					prevEl: $(this).find('.reviewslider_nav--prev')
				},
				breakpoints: {
					992: {
						slidesPerView: 3,
						scrollbar: {
							el: $(this).find('.swiper-scrollbar')
						}
					},
					768: { slidesPerView: 2 },
					540: { slidesPerView: 1 }
				}
			});
		});
	}

	/**
  * Minislider Swiper
  */
	if ($('.minislider').length) {
		$('.minislider_box').each(function () {
			var elem = $(this).children('.swiper-container');

			var miniSlider = new Swiper(elem, {
				slidesPerView: 1,
				loop: true,
				navigation: {
					nextEl: $(this).find('.minislider_nav--next'),
					prevEl: $(this).find('.minislider_nav--prev')
				}
			});
		});
	}

	/**
  * Cardy Swiper
  * карточка_кухни.html карточка_стол.html
  */
	if ($('.cardy_photo:not(.cardy_photo--thumbs)').length) {
		$('.cardy_photo:not(.cardy_photo--thumbs)').each(function () {
			var elem = $(this).children('.swiper-container'),
			    self = $(this);

			var cardySwiper = new Swiper(elem, {
				slidesPerView: 1,
				autoHeight: true,
				loop: true,
				pagination: {
					el: elem.children('.swiper-pagination'),
					clickable: true
				}
			});
		});
	}

	if ($('.cardy_photo--thumbs').length) {
		$('.cardy_photo--thumbs').each(function () {
			var elem = $(this).children('.swiper-container'),
			    self = $(this);

			var cardySwiper = new Swiper(elem, {
				slidesPerView: 1,
				autoHeight: true,
				on: {
					init: function init() {
						elem.updateSize();
					}
				},
				thumbs: {
					swiper: {
						el: self.find('.cardy_thumbs').children('.swiper-container'),
						slidesPerView: 4,
						direction: 'vertical',
						spaceBetween: 6,
						mousewheel: true,
						scrollbar: {
							el: self.find('.cardy_thumbs').find('.swiper-scrollbar')
						},
						breakpoints: {
							768: {
								freeMode: true,
								freeModeMomentumBounce: false,
								freeModeMomentum: false,
								direction: 'horizontal',
								spaceBetween: 24
							},
							540: { slidesPerView: 3 }
						}
					}
				}
			});
		});
	}

	/**
  * Filter DropDown Select
  */
	/*$('.filter_dropdown_link').click( function(e) {
 	e.preventDefault()
 	e.stopPropagation()
 		$(this).closest('.filter_dropdown')
 		.find('input[data-filter]')
 		.val( $(this).attr('data-filter-val') )
 })*/

	/**
  * Range Slider
  */
	/*if ( $('.filter_range_input').length ) {
 	$('.filter_range_input').each( function() {
 		let self = this
 			noUiSlider.create( self, {
 			start: [20000, 150000],
 			connect: true,
 			range: {
 				min: 20000,
 				max: 150000
 			},
 			step: 1000,
 			behaviour: 'tap-drag'
 		})
 		self.noUiSlider.on('slide', function() {
 			let val = self.noUiSlider.get()
 				$(self).siblings('.filter_range_vals').find('.filter_range_vals_min').text( val[0] )
 			$(self).siblings('.filter_range_vals').find('.filter_range_vals_max').text( val[1] )
 		})
 	})
 }*/

	/**
  * Mobile Menu Opener
  */
	$('#menuOpen').click(function () {
		$('body').css('overflow', 'hidden');
		$('.header_nav').css({
			'left': '0'
		});
	});
	$('#closeMenu').click(function () {
		$('body').css('overflow', 'auto');
		$('.header_nav').css({
			'left': '-100%'
		});
	});

	/**
  * Mobile Swiper FeaturesMini
  */
	$('.featuresmini').each(function () {
		if ($(window).width() <= 992) {
			var clone = $(this).children('.row').addClass('swiper-wrapper').clone();
			clone.children('div[class^="col"]').removeAttr('class').addClass('swiper-slide');

			$(this).children('.row').remove();
			$('<div class="row"><div class="col-xs-12"><div class="swiper-container"><div class="swiper-scrollbar">').appendTo($(this));
			clone.prependTo($(this).find('.swiper-container'));
			$(this).find('.row.swiper-wrapper').removeClass('row');

			var elem = $(this).find('.swiper-container');

			var swiper = new Swiper(elem, {
				slidesPerView: 4,
				autoHeight: true,
				scrollbar: {
					el: elem.children('.swiper-scrollbar')
				},
				breakpoints: {
					768: { slidesPerView: 3 },
					540: { slidesPerView: 1 }
				}
			});
		}
	});

	/**
  * Mobile Swiper Countertops
  */
	$('.countertop_items').each(function () {
		if ($(window).width() <= 768) {
			var clone = $(this).clone();
			clone.removeClass('countertop_items').addClass('swiper-wrapper').children('.countertop_box').addClass('swiper-slide');

			$('<div class="swiper-container"><div class="swiper-scrollbar">').insertBefore($(this));
			clone.appendTo($(this).siblings('.swiper-container'));

			var elem = $(this).siblings('.swiper-container');

			var swiper = new Swiper(elem, {
				slidesPerView: 1,
				scrollbar: {
					el: $(this).siblings('.swiper-container').children('.swiper-scrollbar')
				}
			});
			$(this).remove();
		}
	});

	/**
  * Mobile Swiper Manufacturer
  */
	$('.manufacturer_detector').each(function () {
		if ($(window).width() <= 992) {
			var clone = $(this).children('.manufacturer_box').clone();
			clone.removeClass('manufacturer_box').addClass('swiper-wrapper').children('.manufacturer_item').addClass('swiper-slide');

			$(this).children('.manufacturer_box').remove();
			$('<div class="swiper-container"><div class="swiper-scrollbar">').appendTo($(this));
			clone.appendTo($(this).find('.swiper-container'));

			var elem = $(this).find('.swiper-container');

			var swiper = new Swiper(elem, {
				slidesPerView: 4,
				spaceBetween: 34,
				scrollbar: {
					el: $(this).find('.swiper-scrollbar')
				},
				breakpoints: {
					768: { slidesPerView: 3 },
					540: { slidesPerView: 2 }
				}
			});
		}
	});

	initCalculator();

	$('.projects_tabs_slider').projectsTabsSlider();
});

function initCalculator() {
	var $calc = $('.calculator');
	if (!$calc.length) return;

	console.log('START CALC');
	$calc.calculatorBlock();

	// Init StepFor Parts
	if ($('[data-change-part]').length) {
		$('[data-change-part]').map(function () {
			if ($(this).is(':checked')) {
				var partName = $(this).attr('data-change-part');
				$(document).find('[data-part="' + partName + '"]').css('display', 'flex');
			}
		});
	}

	// Event
	$('.buildform_filter_type_item').click(function () {
		if ($(this).children('input').is(':not(:checked)')) {
			$(this).closest('.buildform_filter_type_items').children('.buildform_filter_type_item').removeClass('active').add().find('input[type="radio"]').prop('checked', false);

			$(this).addClass('active').add().children('input').prop('checked', true);
		}
		if ($(this).children('input[data-change-part]')) {
			var partName = $(this).children('input[data-change-part]').attr('data-change-part');

			$(document).find('[data-part]').hide().map(function () {
				if ($(this).attr('data-part') == partName) $(this).css('display', 'flex');
			});
		}
	});

	/*$calc.on('validation_step_1', function () {
 let $cur_type_checkbox = $calc.find('.block.step_1 .buildform_filter_type_items input[type="radio"]:checked'),
 cur_type = $cur_type_checkbox.data('change-part'),
 $size_block = $calc.find('.type_size_part');
   });
 */
}
//# sourceMappingURL=common.js.map
