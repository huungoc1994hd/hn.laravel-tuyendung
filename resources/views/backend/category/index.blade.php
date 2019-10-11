@extends('backend.layouts.main')

@section('title', 'Quản lý danh mục')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--list">
                <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                    <div class="topbar">
                        <div class="toolbar">
                            Danh sách danh mục
                            {{
                                Html::link(
                                    '#category-add-modal',
                                    '<i class="fa fa-plus mr-1"></i><strong>Thêm mới danh mục</strong>',
                                    [
                                        'class' => 'btn btn-sm btn-outline-primary btn-rounded ml-4',
                                        'data-toggle' => 'modal',
                                    ]
                                )
                            }}
                        </div>
                    </div>

                    <div class="dd" id="nestable-menu">
                        {!! Widget::category([
                            'template' => 'ol',
                            'categories' => $categories
                        ]) !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Add category modal --}}
    <div class="modal fade" id="category-add-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {{ Form::model($categoryModel, [
                        'route' => 'admin.category.create',
                        'data-validate' => 'true',
                        'method' => 'put'
                    ]) }}

                    @include('backend.category._field')

                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>

    @if ($errors->count())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#category-add-modal').modal('show');
                $('#category-add-modal #name').val('').focus();
            });
        </script>
    @endif

@endsection
