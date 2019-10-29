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
        uncheckedAll();
        $(".delete-action").hide();

        let bodyHtml = `
            <tr data-id="${value.id}">
                <td>
                    <label class="form-check" style="margin-top: -13px;">
                        <input type="checkbox" name="checkbox" class="form-check-input" rel="select-one">
                        <span class="form-check-label"></span>
                    </label>
                </td>
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
                    <a href="posts/delete?ids=${value.id}" class="btn btn-xs btn-rounded btn-danger" data-method="delete" data-confirm="<p>Bạn sắp xóa 1 bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>"><i class="fas fa-trash-alt"></i></a>
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
            uncheckedAll();
            $(".delete-action").hide();

            let bodyHtml = '';

            data.map(function(value) {
                bodyHtml += `
                    <tr data-id="${value.id}">
                        <td>
                            <label class="form-check" style="margin-top: -13px;">
                                <input type="checkbox" class="form-check-input" rel="select-one">
                                <span class="form-check-label"></span>
                            </label>
                        </td>
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
                            <a href="posts/delete?ids=${value.id}" class="btn btn-xs btn-rounded btn-danger" data-method="delete" data-confirm="<p>Bạn sắp xóa 1 bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                `;
            });

            $("#search-data").html(bodyHtml).mark(value);
        });
    });

    // Checked count function
    var selectOneCheckedCount = function() {
        return $("#recordsListView tbody:not(:hidden) [rel='select-one']:checked").length;
    }
    var selectOneCount = function() {
        return $("#recordsListView tbody:not(:hidden) [rel='select-one']").length;
    }

    // Checked all function
    function checkedAll() {
        $("#recordsListView tbody:not(:hidden) [rel='select-one']").prop('checked', true);
        changeCheckedColor();
        return false;
    }

    // Unchecked all function
    function uncheckedAll() {
        $("[rel='select-one']").prop('checked', false);
        changeCheckedColor();
        return false;
    }

    // Change checked row color
    function changeCheckedColor() {
        $("#recordsListView tbody:not(:hidden) [rel='select-one']:checked").parents('tr').addClass('selected');
        $("#recordsListView tbody:not(:hidden) [rel='select-one']:not(':checked')").parents('tr').removeClass('selected');

        let sloc = selectOneCount();
        let slocc = selectOneCheckedCount();

        if (sloc == slocc) {
            $("[rel='select-all']").prop('checked', true);
        } else {
            $("[rel='select-all']").prop('checked', false);
        }

        $(".chk-length").html(slocc);
        if (slocc > 0) {
            $(".delete-action").fadeIn(300);
        } else {
            $(".delete-action").fadeOut(300);
        }

        let idArray = [];
        $("[rel='select-one']:checked").each(function() {
            let id = $(this).parents('tr').data('id');
            idArray.push(id);
        });

        let href = $('.delete-action a').attr('href').split("?")[0];
        href += "?ids=" + idArray.join(",");
        $('.delete-action a').attr('href', href);

        let confirm = `<p>Bạn sắp xóa ${slocc} bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>`;
        $('.delete-action a').attr('data-confirm', confirm);
    }


    // Checked all
    $(document).on('click', "a.checked-all", function() {
        checkedAll();
        $(this).parents('.dropdown-menu').removeClass('show');
        return false;
    });
    $(document).on('click', "[rel='select-all']", function() {
        if ($(this).is(":checked")) {
            checkedAll();
        } else {
            uncheckedAll();
        }
    });

    // Unchecked all
    $(document).on('click', "a.unchecked-all", function() {
        uncheckedAll();
        $(this).parents('.dropdown-menu').removeClass('show');
        return false;
    });

    $(document).on('click', "[rel='select-one']", function() {
        let slocc = selectOneCheckedCount();
        let sloc = selectOneCount();

        if (slocc == sloc) {
            $("[rel='select-all']").prop('checked', true);
        } else {
            $("[rel='select-all']").prop('checked', false);
        }

        changeCheckedColor();
    });

});
