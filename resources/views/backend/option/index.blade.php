@extends('backend.layouts.main')

@section('title', 'Cấu hình hệ thống')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h3 class="h3 font-weight-bold">
                        <i class="fa fa-cog mr-2"></i>
                        Cấu hình hệ thống
                    </h3>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#basic-option" data-toggle="tab" class="nav-link active show">
                            Cơ bản
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact-info" data-toggle="tab" class="nav-link">
                            Thông tin liên hệ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#meta-seo" data-toggle="tab" class="nav-link">
                            SEO / Others
                        </a>
                    </li>
                </ul>

                {{ Form::model($optionModel, [
                    'method' => 'put',
                    'data-validate' => 'true',
                    'route' => 'admin.option',
                ]) }}
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="basic-option">

                            <div class="form-group field-option-web_title required">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('web_title', 'Tiêu đề website', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::text('web_title', old('web_title'), [
                                            'placeholder' => 'Nhập tên website vào đây',
                                            'data-rule-required' => 'true',
                                            'data-msg-required' => 'Vui lòng nhập tiêu đề website'
                                        ]) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4 required">
                                <span class="label-text col-md-3 col-form-label">
                                    {{ Form::label('logo', 'Logo', [
                                        'class' => 'control-label'
                                    ]) }}
                                </span>
                                <div class="col-md-9">
                                    {{ Widget::FileManager([
                                        'preview' => 'logo-preview',
                                        'data-upload' => 'image',
                                        'name' => 'logo',
                                        'browse' => 'Chọn ảnh...',
                                        'value' => $optionModel->logo,
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => 'Vui lòng chọn logo'
                                    ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">
                                    {{ Form::label('favicon', 'Favicon', [
                                        'class' => 'control-label'
                                    ]) }}
                                </span>
                                <div class="col-md-9">
                                    {{ Widget::FileManager([
                                        'preview' => 'favicon-preview',
                                        'data-upload' => 'image',
                                        'name' => 'favicon',
                                        'browse' => 'Chọn ảnh...',
                                        'value' => $optionModel->favicon
                                    ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-info">
                            <div class="form-group field-phone-phone required">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('phone', 'Hotline', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+84</span>
                                            </div>
                                            {{ Form::text('phone[phone]', null, [
                                                'placeholder' => 'Nhập hotline vào đây',
                                                'data-rule-required' => 'true',
                                                'data-msg-required' => 'Vui lòng nhập số điện thoại',
                                                'data-rule-rangelength' => '9,11',
                                                'data-msg-rangelength' => 'Vui lòng nhập 1 số điện thoại hợp lệ'
                                            ]) }}
                                        </div>
                                        {{ Form::label('phone[phone]', null, [
                                            'class' => 'error'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-email-email required">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('email', 'Email', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::text('email[email]', null, [
                                            'placeholder' => 'Nhập email vào đây',
                                            'data-rule-required' => 'true',
                                            'data-msg-required' => 'Vui lòng nhập email',
                                            'data-rule-email' => 'true',
                                            'data-msg-email' => 'Vui lòng nhập 1 địa chỉ email hợp lệ'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-map">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('map', 'Bản đồ', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::textarea('map', null, [
                                            'rows' => 4,
                                            'placeholder' => 'Chèn mã nhúng bản đồ'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-footer">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('footer', 'Nội dung liên hệ (footer)', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Widget::ckeditor([
                                            'name' => 'footer',
                                            'height' => 300,
                                            'type' => 'basic'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-copyright">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('copyright', 'Copyright', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::text('copyright', null, [
                                            'placeholder' => 'Nhập bản quyền trang web'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="meta-seo">
                            <div class="form-group field-option-keywords">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('keywords', 'Từ khóa', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::text('keywords', null, [
                                            'placeholder' => 'Nhập từ khóa rồi ấn Enter...',
                                            'data-role' => 'tagsinput',
                                            'onkeyup' => 'return false;'
                                       ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-fb_pixel">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('fb_pixel', 'Facebook Pixel', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::textarea('fb_pixel', null, [
                                            'rows' => 4,
                                            'placeholder' => 'Chèn mã nhúng Facebook Pixel'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-gg_analytics">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('gg_analytics', 'Google Analytics', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::textarea('gg_analytics', null, [
                                            'rows' => 4,
                                            'placeholder' => 'Chèn mã nhúng Google Analytics'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-option-gg_analytics">
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">
                                        {{ Form::label('cdn_url', 'Tích hợp Bizfly CDN', [
                                            'class' => 'control-label'
                                        ]) }}
                                    </span>
                                    <div class="col-md-9">
                                        {{ Form::text('cdn_url', null, [
                                            'placeholder' => 'URL Bizfly CDN'
                                        ]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-9 offset-md-3">
                                {{ Form::submit('<i class="fa fa-save mr-2"></i>Lưu thay đổi', [
                                    'class' => 'btn btn-lg btn-success'
                                ]) }}
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
