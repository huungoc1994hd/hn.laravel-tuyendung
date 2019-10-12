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
    $('#nestable-menu').nestable().on("change",(e) => {
        let list = e.length ? e : $(e.target);
        data = window.JSON.stringify(list.nestable('serialize'));
    });
});
