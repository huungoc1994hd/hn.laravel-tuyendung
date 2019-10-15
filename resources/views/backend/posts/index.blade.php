@extends('backend.layouts.main')

@section('title', 'Quản lý bài viết')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--list">
                <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                    <div class="topbar">
                        <div class="toolbar">
                            Danh sách bài viết
                            {{
                                Html::linkRoute(
                                    'admin.posts.create',
                                    '<i class="fa fa-plus mr-1"></i><strong>Thêm mới bài viết</strong>',
                                    [],
                                    [
                                        'class' => 'btn btn-sm btn-outline-primary btn-rounded ml-4'
                                    ]
                                )
                            }}
                        </div>
                    </div>

                    @if ( $postsModel->count() > 0 )

                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="recordsListView" class="dataTable no-footer p-0">
                                <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>URL</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-right">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

{{--                        {{ $mediaModel->links('vendor.pagination.dadmin-bootstrap-4') }}--}}
                    @else
                        <div class="empty">
                            Không tìm thấy bản ghi nào
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
