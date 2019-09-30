{!! Form::hidden('type', 'slider') !!}
<div class="form-group row required">
    {{ Form::label('name', 'Tiêu đề ảnh', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Form::text('name', null, [
            'data-rule-required' => 'true',
            'data-msg-required' => 'Vui lòng nhập tiêu đề ảnh'
        ]) }}
    </div>
</div>
<div class="form-group row required">
    {{ Form::label('image', 'Hình ảnh', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Widget::FileManager([
            'preview' => 'image-preview',
            'data-upload' => 'image',
            'name' => 'image',
            'browse' => 'Chọn ảnh...',
            'data-rule-required' => 'true',
            'data-msg-required' => 'Hình ảnh không được để trống',
            'value' => $mediaModel->image
        ]) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('alt', 'Alt', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Form::text('alt') }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('link', 'Link truy cập', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Form::text('link') }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('status', 'Trạng thái', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{
            Form::checkbox(
                'status',
                1,
                collect($mediaModel)->isEmpty() || $mediaModel->status == 1 ? true : false,
                [
                    'data-role' => 'switch',
                    'data-on-color' => 'primary',
                    'data-off-color' => 'danger',
                    'data-on-text' => 'Hiện',
                    'data-off-text' => 'Ẩn',
                    'data-size' => 'small'
                ]
            )
        }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('target', 'Mở liên kết trong 1 thẻ mới', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{
            Form::checkbox(
                'target',
                '_blank',
                collect($mediaModel)->isEmpty() || $mediaModel->target == '_blank' ? true : false,
                [
                    'data-role' => 'switch',
                    'data-on-color' => 'primary',
                    'data-off-color' => 'danger',
                    'data-size' => 'small'
                ]
            )
        }}
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-9 offset-md-3">
        {{ Form::submit('<i class="fa fa-save mr-2"></i>Lưu thay đổi', [
            'class' => 'btn btn-lg btn-success'
        ]) }}
    </div>
</div>
