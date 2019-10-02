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

    // Nestable menu
    $('#nestable-menu').on('click', function(e) {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    var data = "";
    $('#nestable-menu').nestable().on("change",(e) => {
        let list = e.length ? e : $(e.target);
        data = window.JSON.stringify(list.nestable('serialize'));
    });
});
