

function PayFormSubmit(btn) {
    var error = false;
    var $this = $(btn).closest('form');
    $this.find('input[type="text"]').each(function() {
        if($(this).val().length == 0) {
            $(this).addClass('bad');
            $(this).one('focus', function () {
                $(this).removeClass('bad');
            });
            error = true;
        } else if ($(this).attr('name') == 'amount' && isNaN(parseFloat($(this).val()))) {
            $(this).addClass('bad');
            $(this).one('focus', function () {
                $(this).removeClass('bad');
            });
            error = true;
        } else {
            $(this).removeClass('bad');
        }
    });
    if (!error)  {$this.submit();}
}
$(function () {
    //$('.s-online-pay-component input[name="phone"]').mask('+7 ( 999 ) 999 - 99 - 99');
});
