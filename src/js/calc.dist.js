/*Calc start*/

(function( $ ) {
    $.fn.calculatorBlock = function() {
        var $ell = this;

        var _current_step = 1;

        var setStep = function(n) {
            $ell.data('step', n);
            $('html, body').animate({scrollTop:$ell.find('.step_indicator').offset().top}, 300);
            /*if (n > 4) {
                $ell.find('.calc__step_indicator').hide();
                $ell.find('.calc__header').hide();
            }*/

            $ell.find('.step_indicator .step_indicator_item').removeClass('active');
            $ell.find('.step_indicator .step_indicator_item').eq(n-1).addClass('active');
            $ell.find('.current_step').hide().removeClass('current_step');
            $ell.find('.step_'+n).fadeIn().addClass('current_step');
            $ell.find('.step_indicator .step_indicator_item').removeClass('submitted_s');
            for (var i=1; i<n; i++) {
                $ell.find('.step_indicator .step_indicator_item').eq(i-1).addClass('submitted_s');
            }
            _current_step = n;

        }

        var  animateElement = function(ell, animation) {
            $ell.find('.b-error').removeClass('b-error');
            ell.addClass('b-error');
            ell.addClass(animation + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass(animation + ' animated');
            });
        }


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

        $ell.find('.calc_submit_form').on('click', function() {
            $form.submit();
        });

        $form.on('submit-success', function (e) {
            $ell.find('.step_indicator').hide();
            $ell.find('.stepform_title').hide();
            var step = $ell.data('step');
            if (!step) step = 1;
            console.log(step+'--->');
            setStep(step+1);
        });

        $ell.find('.step_indicator .step_indicator_item').on('click', function() {
            var target = parseInt($(this).data('step-bullet'));
            if (target && target < _current_step) {
                setStep(target);
            }
        });

        $ell.find('.js-stepform-next').on('click', function() {
            var step = $ell.data('step');
            if (!step) step = 1;

            var error = false;
            var $current = $ell.find('.step_'+step+' .c_validate').each(function(block) {
                var $thisItem =  $(this);
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
                    })
                }

                // Показываем ошибку блока
                if (error) {
                    var $block_title = $thisItem.find('.title');
                    $('html, body').animate({scrollTop: $block_title.offset().top-50}, 300, function() {
                        animateElement($block_title, 'shake');
                    });

                    return false;
                }
            });

            $ell.trigger('validation_step_'+step);
            if (!error) {
                setStep(step+1);
            }
        });






    };
})(jQuery);

/*Calc end*/


