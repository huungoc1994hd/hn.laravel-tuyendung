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

    var actionSearch = $(".typeahead.search").attr('action');
    var engine = new Bloodhound({
        remote: {
            url: actionSearch + '?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
    });

    $(".search-input").typeahead({
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        name: 'postsList',
        limit: 10,
        order: 'desc',
        display: 'title',
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả phù hợp.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<div class="list-group-item">' + data.title + '</div>'
            }
        }
    }).on('typeahead:select', function(ev, value) {
        let bodyHtml = `
            <tr>
                <td>#${value.id}</td>
                <td>
                    <img src="${value.avatar !== null ? value.avatar.image : ''}" alt="${value.title}" title="${value.title}" />
                </td>
                <td>${value.title}</td>
                <td>
                    <label class="label label-danger">Ẩn</label>
                </td>
                <td>${value.created_at}</td>
                <td class="text-right">
                    <a href="posts/update?id=${value.id}" class="btn btn-xs btn-rounded btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="posts/delete?id=${value.id}" class="btn btn-xs btn-rounded btn-danger" data-method="delete" data-confirm="<p>Bạn sắp xóa 1 bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        `;

        $("#search-data").html(bodyHtml).mark(value.title);
    }).on('keyup', function() {
        let value = $.trim($(this).val());

        if (value == '') {
            $("#search-data").html('').hide();
            $("#old-data").show();
            $(".dataTables_paginate").show();
            return false;
        }

        $("#search-data").show();
        $("#old-data").hide();
        $(".dataTables_paginate").hide();

        $.get(actionSearch, {q: value}, function(data) {
            let bodyHtml = '';

            data.map(function(value) {
                bodyHtml += `
                    <tr>
                        <td>#${value.id}</td>
                        <td>
                            <img src="${value.avatar !== null ? value.avatar.image : ''}" alt="${value.title}" title="${value.title}" />
                        </td>
                        <td>${value.title}</td>
                        <td>
                            <label class="label label-danger">Ẩn</label>
                        </td>
                        <td>${value.created_at}</td>
                        <td class="text-right">
                            <a href="posts/update?id=${value.id}" class="btn btn-xs btn-rounded btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="posts/delete?id=${value.id}" class="btn btn-xs btn-rounded btn-danger" data-method="delete" data-confirm="<p>Bạn sắp xóa 1 bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                `;
            });

            $("#search-data").html(bodyHtml).mark(value);
        });
    });


});
