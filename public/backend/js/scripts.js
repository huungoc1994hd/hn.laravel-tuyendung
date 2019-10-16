/* jshint esversion: 6 */
/* globals document: false */

$(document).ready(function () {
    'use strict';

    $("[data-upload='image']").filemanager('image');

    $(".bootstrap-tagsinput input").on('keypress', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

    // Switch
    $('[data-role="switch"]').bootstrapSwitch();

    // Tooltip
    $('[rel="tooltip"], [data-toggle="tooltip"]').tooltip();

    // Nestable menu
    $('.dd').nestable();

    var data = "";
    var oldData = window.JSON.stringify($(".dd").nestable('serialize'));

    $('#nestable-menu').nestable().on("change",(e) => {
        let list = e.length ? e : $(e.target);
        data = window.JSON.stringify(list.nestable('serialize'));

        if (data !== oldData) {
            $("#dd-save-order").fadeIn(200);
        } else {
            $("#dd-save-order").fadeOut(200);
        }
    });

    // Submit change order categories
    $(document).on('click', '#btn-save-order', function() {
        console.log(data);
        let page = new Page();
        page.loader(true);

        if ($("form#save-order-form").length == 0) {
            let urlAction = $(this).attr('href');
            let formHtml = `
                <form action="${urlAction}" method="POST" id="save-order-form" accept-charset="UTF-8" style="display: none;"></form>
            `;

            $(this).after(formHtml);
        }

        let methodType = 'put';
        let csrfToken = $("meta[name='csrf-token']").attr('content');

        let inputHtml = `
            <input type='hidden' name='_method' value='${methodType}' />
            <input type='hidden' name='_token' value='${csrfToken}' />
            <input type='hidden' name='data' value='${data}' />
        `;
        $("form#save-order-form").html(inputHtml).submit();

        return false;
    });

    // Selectize
    $("[data-role='select2']").select2();

    // Data rule max length
    $("[data-rule-maxlength]").each(function() {
        let maxLengthHtml = `<span class="maxlength">${$(this).data('rule-maxlength')}</span>`;
        $(this).after(maxLengthHtml);
    });

    $(document).on('keypress input blur focus', '[data-rule-maxlength]', function() {
        let maxLength = $(this).data('rule-maxlength');
        let trigger = $(this).next('.maxlength');

        let useLength = $(this).val().length;
        let restLength = maxLength - useLength;

        trigger.html(restLength);

        if (restLength <= 0) {
            return false;
        }
    });
});
