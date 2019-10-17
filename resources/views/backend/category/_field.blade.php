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
        {!! Widget::category([
           'template' => 'select',
           'name' => 'parent_id',
           'defaultValue' => $categoryModel->parent_id ?? 0
       ]) !!}
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
                $categoryModel->type ?? 0,
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
    {{ Form::label('position', 'Vị trí hiển thị', [
        'class' => 'label-text col-lg-3 col-form-label control-label'
    ]) }}
    <div class="col-lg-9">
        {{
            Form::select(
                'position[]',
                [
                    1 => 'Menu chính',
                    2 => 'Trang chủ',
                    3 => 'Chân trang (Footer)'
                ],
                json_decode($categoryModel->position, true) ?? 1,
                [
                    'class' => 'form-control',
                    'data-role' => 'select2',
                    'multiple' => 'multiple',
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
                (!isset($categoryModel->status) || $categoryModel->status == 1) ? true : false,
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
