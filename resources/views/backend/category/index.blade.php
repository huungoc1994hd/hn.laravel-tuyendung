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
                                Html::linkRoute(
                                    'admin.category.create',
                                    '<i class="fa fa-plus mr-1"></i><strong>Thêm mới danh mục</strong>',
                                    [],
                                    ['class' => 'btn btn-sm btn-outline-primary btn-rounded ml-4']
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

    @if ($errors->count())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#category-add-modal').modal('show');
                $('#category-add-modal #name').val('').focus();
            });
        </script>
    @endif

@endsection
