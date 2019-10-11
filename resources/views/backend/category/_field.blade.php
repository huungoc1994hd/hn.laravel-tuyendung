<div class="form-group required row">
    {{ Form::label('name', 'Tên danh mục', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{ Form::text('name', null, [
            'placeholder' => 'Nhập tên danh mục vào đây',
            'class' => 'form-control',
            'data-rule-required' => 'true',
            'data-msg-required' => 'Vui lòng nhập tên danh mục'
        ]) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('parent_id', 'Danh mục cha', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{
            Form::select(
                'parent_id',
                $categoriesSelectData,
                0,
                [
                    'class' => 'form-control'
                ]
            )
        }}
    </div>
</div>

<div class="form-group required row">
    {{ Form::label('type', 'Phân loại', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{
            Form::select(
                'type',
                [
                    0 => 'Phân loại danh mục',
                    'post' => 'Bài viết',
                    'recruitment' => 'Tin tuyển dụng'
                ],
                0,
                [
                    'class' => 'form-control',
                    'data-rule-required' => 'true',
                    'data-msg-required' => 'Vui lòng chọn 1 giá trị từ danh sách'
                ],
                [
                    0 => [
                        'disabled' => 'disabled'
                    ]
                ]
            )
        }}
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
                collect($categoryModel)->isEmpty() || $categoryModel->status == 1 ? true : false,
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

<div class="form-group row mt-3">
    <div class="col-md-9 offset-md-3">
        {{ Form::button('<i class="fa fa-save mr-2"></i>Lưu thay đổi', [
            'class' => 'btn btn-lg btn-success',
            'type' => 'submit'
        ]) }}
    </div>
</div>
