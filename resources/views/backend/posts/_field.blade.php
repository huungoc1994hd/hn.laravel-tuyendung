
<div class="form-group required row">
    {{ Form::label('title', 'Tiêu đề bài viết', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Form::text('title', null, [
            'placeholder' => 'Nhập tiêu đề bài viết vào đây',
            'class' => 'form-control',
            'data-rule-required' => 'true',
            'data-msg-required' => 'Vui lòng nhập tiêu đề bài viết'
        ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('title_seo', 'Tiêu đề SEO', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Form::text('title_seo', null, [
            'placeholder' => 'Tiêu đề SEO không vượt quá 70 ký tự',
            'class' => 'form-control'
        ]) }}
    </div>
</div>

<div class="form-group required row">
    {{ Form::label('cate_id', 'Chọn danh mục', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {!! Widget::category([
            'template' => 'select',
            'name' => 'cate_id',
            'defaultValue' => $postsModel->cate_id ?? 0
        ]) !!}
    </div>
</div>

<div class="form-group required row">
    {{ Form::label('posts[avatar]', 'Ảnh đại diện', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Widget::FileManager([
            'preview' => 'avatar-preview',
            'data-upload' => 'image',
            'name' => 'posts[avatar]',
            'browse' => 'Chọn ảnh...',
            'value' => $postsModel->avatar
        ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('description', 'Mô tả ngắn', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Widget::ckeditor([
            'name' => 'description',
            'height' => 200,
            'type' => 'basic'
        ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('content', 'Nội dung bài viết', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Widget::ckeditor([
            'name' => 'content',
            'height' => 500,
        ]) }}
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
                (collect($postsModel)->isEmpty() || $postsModel->status == 1) ? true : false,
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
    {{ Form::label('tags', 'Tags', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Form::text('tags', null, [
            'placeholder' => 'Add a tag...',
            'data-role' => 'tagsinput',
            'onkeyup' => 'return false;'
       ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('keywords', 'Từ khóa', [
        'class' => 'label-text col-md-3 col-form-label control-label'
    ]) }}
    <div class="col-md-9">
        {{ Form::text('keywords', null, [
            'placeholder' => 'Nhập từ khóa rồi ấn Enter...',
            'data-role' => 'tagsinput',
            'onkeyup' => 'return false;'
       ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('order', 'Vị trí sắp xếp', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Form::number('order', $postsModel->order ?? 0, [
            'placeholder' => 'Nhập vị trí sắp xếp',
            'class' => 'form-control',
            'style' => 'width:100px;'
        ]) }}
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-md-9 offset-md-3">
        {{ Form::button('<i class="fa fa-save mr-2"></i>Lưu thay đổi', [
            'class' => 'btn btn-lg btn-success',
            'type' => 'submit'
        ]) }}
    </div>
</div>
