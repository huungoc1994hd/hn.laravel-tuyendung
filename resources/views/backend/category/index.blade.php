@extends('backend.layouts.main')

@section('title', 'Quản lý danh mục')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--list">
                <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                    <div class="topbar">
                        <div class="toolbar">
                            Danh sách sliders
                            <a href="http://hn.laravel-tuyendung/public/admin/slider/create" class="btn btn-sm btn-outline-primary btn-rounded ml-4"><i class="fa fa-plus mr-1"></i><strong>Thêm mới slide</strong></a>
                        </div>
                    </div>

                    <div class="dd" id="nestable-menu">
                        <input type="hidden" value="{{ route('admin.category.expand') }}" id="expandUrl" />
                        {!! Widget::category([
                            'template' => 'ol'
                        ]) !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
