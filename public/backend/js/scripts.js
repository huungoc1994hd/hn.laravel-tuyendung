/* jshint esversion: 6 */
/* globals document: false */

$(document).ready(function () {
    'use strict';

    $('form button:submit').click(function() {
        let button = $(this);
        let form = button.parents('form');

        if (form.attr('data-validate') == 'true') {
            form.validate({
                submitHandler: function() {
                    buttonLoader(button);
                    return true;
                }
            });
        } else {
            buttonLoader(button);
        }
    });

    /* Action loader button */
    function buttonLoader(buttonElement) {
        let loader = buttonElement.find("i[class*='fa-']");
        if (loader.length == 0) {
            let loaderTag = "<i class='fa fa-spin fa-spinner mr-2'></i>";
            buttonElement.prepend(loaderTag);
        } else {
            buttonElement.find("i[class*='fa-']").attr('class', 'fa fa-spin fa-spinner mr-2');
        }
        buttonElement.prop('disabled', true);
    }

    /* Redirect link */
    $(document).on('click', 'a[data-method]', function(e) {
         let methodType = $(this).data('method');
         let confirmMsg = $(this).data('confirm');
         if (methodType == 'get') {
             return true;
         }

         e.preventDefault();
         let action = $(this).attr('href');
         let redirect = new Redirect();
         redirect.formAction(confirmMsg, methodType, action);
    });

    $("[data-upload='image']").filemanager('image');

    $(".bootstrap-tagsinput input").on('keypress', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

    // Switch
    $('[data-role="switch"]').bootstrapSwitch();
});
