@extends('backend.layouts.main')

@section('title', 'Cập nhật slide')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">
                        <i class="fa fa-plus-circle"></i>
                        Cập nhật Slide
                    </h6>
                    {{
                        Html::linkRoute(
                            'admin.slider.index',
                            '<i class="fa fa-angle-double-left mr-2"></i>Quay lại danh sách',
                            [],
                            [
                                'class' => 'btn btn-sm btn-rounded btn-primary font-weight-bold'
                            ]
                        )
                    }}
                </div>

                {!! Form::model($mediaModel, [
                    'data-validate' => 'true',
                    'route' => ['admin.slider.update', 'id' => $mediaModel->id],
                    'method' => 'put'
                ]) !!}
                    @include('backend.slider._field')
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
