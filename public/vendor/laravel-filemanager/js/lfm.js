(function ($) {

    $.fn.filemanager = function (type, options) {
        type = type || 'file';

        this.on('click', function (e) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/public/laravel-filemanager';
            localStorage.setItem('target_input', $(this).data('input'));
            localStorage.setItem('target_preview', $(this).data('preview'));

            // $("#filemanager-modal .modal-body").html("<iframe src='"+route_prefix+"?type="+type+"' width='100%' height='550' style='border: 0;'></iframe>");
            // $("#filemanager-modal").modal('show');

            popupWindow(route_prefix + '?type=' + type, 'DAdmin - Trình quản lý tập tin', 1000, 600);

            window.SetUrl = function (url, file_path) {
                //set the value of the desired input to image url
                var target_input = $('#' + localStorage.getItem('target_input'));
                target_input.val(file_path).trigger('change');

                //set or change the preview image src
                var target_preview = $('#' + localStorage.getItem('target_preview'));
                target_preview.attr('src', url).trigger('change');
            };
            return false;
        });
    }

    // ======================
    // ==  Popup window  ==
    // ======================
    function popupWindow(url, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = 30;
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }

})(jQuery);
