@extends('backend.layouts.main')

@section('title', 'Thêm mới bài viết')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">
                        <i class="fa fa-plus-circle"></i>
                        Thêm mới bài viết
                    </h6>
                    {{
                        Html::linkRoute(
                            'admin.posts',
                            '<i class="fa fa-angle-double-left mr-2"></i>Quay lại danh sách',
                            [],
                            [
                                'class' => 'btn btn-sm btn-rounded btn-primary font-weight-bold'
                            ]
                        )
                    }}
                </div>

                {!! Form::model($postsModel, [
                    'data-validate' => 'true',
                    'route' => 'admin.posts.create',
                    'method' => 'post'
                ]) !!}
                @include('backend.posts._field')
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
