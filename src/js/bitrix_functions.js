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
    })
});