/**
 * Redirect to submit form if it is not get method
 *
 * @class Redirect
 * @method formAction
 *
 *
 * @param methodType post | put | delete
 * @param action to redirect
 * @used SweetAlert Jquery Plugin
 * @return $formHtml prepend the body
 *
 * @author Huu Ngoc Developer
 * @date 18/09/2019
 *
 */

class Redirect extends Page {
    formAction(confirmMsg = null, methodType = 'post', action = '') {
        if (confirmMsg == null) {
            return this.formSubmit(methodType, action);
        }

        Swal.fire({
            type: 'error',
            title: 'Confirm',
            html: confirmMsg,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            preConfirm: () => {
                this.loader(true);
                this.formSubmit(methodType, action);
                return false;
            }
        });
    }

    formSubmit(methodType = 'post', action = '') {
        let _formOpen, _formBody, _formClose;
        let csrfToken = $("meta[name='csrf-token']").attr('content');
        let html;

        if (!csrfToken) {
            let csrfError = 'Đường dẫn mà bạn cố gắng truy cập không tồn tại hoặc đã hết hạn';
            Swal.fire({
                type: 'error',
                title: 'Error 419',
                text: csrfError,
            });

            return false;
        }

        let _foid = Math.random().toString(36).slice(-9) + '-' + methodType;

        _formOpen = `<form method="POST" action="${action}" id="${_foid}" accept-charset="UTF-8">`;
        _formBody = `
            <input type="text" name="_method" value="${methodType}" />
            <input type="text" name="_token" value="${csrfToken}" />
        `;
        _formClose = '</form>'

        html = _formOpen + _formBody + _formClose;
        if ($(`#${_foid}`).length == 0) {
            $('body').prepend(html);
        }
        $(`#${_foid}`).trigger('submit');
    }
}
