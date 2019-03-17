'use strict';

(function ($) {
    $.validate({
        form : '#CrateNewListForm',
        modules : 'toggleDisabled',
    });


    var $form = $('#CrateNewListForm');
    var $publicTitle = $form.find('#public-title');
    $form.find('#public-title-checkbox').on('click', function (e) {
        $publicTitle.prop('disabled', e.target.checked);
    });

    var $emailBlock = $form.find('.InputFieldEditable-item');
    var $emailInput = $emailBlock.find('.EmailInput');

    $emailBlock.find('a').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        if ($emailInput.prop('disabled')) {
            $emailInput.prop('disabled', false).focus();
        } else {
            $emailInput.prop('disabled', 'disabled');
        }
    });


    var timeout = 0;
    var $submitBtn = $form.find('input[type=submit]').prop('disabled', 'disabled');
    $emailInput.on('keyup', function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            var postData =  {email: e.target.value};
            $.post('/validate', postData, function (res) {
                if (!res.valid) {
                    $submitBtn.prop('disabled', 'disabled');
                    $emailBlock.append('<div id="email-err" style="position:absolute;bottom:-20px;color:red;">' + res.msg +'</div>');
                } else if($form.attr('action').indexOf('edit') !== -1) {
                    $.post($form.attr('action'), postData);
                    $emailBlock.find('#email-err').remove();
                    $submitBtn.prop('disabled', false);
                }
            });
        }, 300);
    });

    $emailInput.trigger('keyup');

}(jQuery));
