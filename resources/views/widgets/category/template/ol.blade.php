{{------------------------------

Category widget template ol view

------------------------------}}

@if ($categories->count())
    <ol class="dd-list">
        @foreach($categories as $item)
            <li class="dd-item" data-id="{{ $item->id }}">
                <div class="dd-handle">
                    {{ $item->name }}
                </div>
                <label class="form-check" style="position: absolute;top: 8px;left: 15px">
                    <input type="checkbox" name="checkbox" value="{{ $item->id }}" class="form-check-input">
                    <span class="form-check-label"></span>
                </label>
                <div class="dd-actions">
                    @if ($item->children->count())
                        <button data-action="expand" type="button" class="btn btn-xs btn-rounded btn-primary"></button>
                        <button data-action="collapse" type="button" class="btn btn-xs btn-rounded btn-primary" style="display: none"></button>
                    @endif
                    <a href="" data-id="{{ $item->id }}" class="btn btn-xs btn-rounded btn-success" data-toggle="tooltip" title="Sửa"><i class="fa fa-edit"></i></a>
                    {{
                        Html::linkRoute(
                            'admin.category.delete',
                            '<i class="fas fa-trash-alt"></i>',
                            [
                                'id' => $item->id
                            ],
                            [
                                'class' => 'btn btn-xs btn-rounded btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Xóa',
                                'data-method' => 'delete',
                                'data-confirm' => '<p>Bạn sắp xóa 1 danh mục. Hành động này sẽ thực hiện xóa tất cả danh mục con của nó.</p><p>Bạn có chắc chắn muốn xóa?</p>'
                            ]
                        )
                    }}
                </div>

                @if ($item->children->count())
                    @include('widgets.category.template.ol', [
                        'categories' => $item->children
                    ])
                @endif
            </li>
        @endforeach
    </ol>
@endif
