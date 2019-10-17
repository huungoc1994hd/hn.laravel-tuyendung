@extends('backend.layouts.main')

@section('title', 'Cập nhật danh mục')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">
                        <i class="fa fa-plus-circle"></i>
                        Cập nhật danh mục
                    </h6>
                    {{
                        Html::linkRoute(
                            'admin.category',
                            '<i class="fa fa-angle-double-left mr-2"></i>Quay lại danh sách',
                            [],
                            [
                                'class' => 'btn btn-sm btn-rounded btn-primary font-weight-bold'
                            ]
                        )
                    }}
                </div>

                {!! Form::model($categoryModel, [
                    'data-validate' => 'true',
                    'route' => ['admin.category.update', 'id' => $categoryModel->id],
                    'method' => 'put'
                ]) !!}
                @include('backend.category._field')
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
