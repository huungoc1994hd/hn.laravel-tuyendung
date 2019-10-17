@extends('backend.layouts.main')

@section('title', 'Quản lý bài viết')
@section('body')

    <section class="main--content">
        <div class="panel">
            <div class="records--list">
                <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                    <div class="topbar">
                        <div class="toolbar col-md-5 pl-0">
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

                        <div class="col-md-7 pr-0">
                            <div class="navbar--search">
                                <form class="typeahead search" action="{{ route('admin.search') }}" data-validate="true" onsubmit="return false;">
                                    <input type="search" name="q" class="form-control search-input" placeholder="Tìm kiếm bài viết..." data-rule-required="true" data-msg-required=" " autocomplete="off">
                                    <button class="btn-link" onclick="return false;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
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
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-right">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="old-data">
                                    @foreach($postsModel as $item)
                                        <tr>
                                            <td>#{{ $item->id }}</td>
                                            <td>
                                                <img src="{{ asset($item->avatar->image ?? '') }}" alt="{{ $item->title }}" alt="{{ $item->title }}" />
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! $item->statusConvert() !!}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-right">
                                                {{
                                                    Html::linkRoute(
                                                        'admin.posts.update', '<i class="fa fa-edit"></i>',
                                                         ['id' => $item->id],
                                                         [
                                                             'class' => 'btn btn-xs btn-rounded btn-primary'
                                                         ]
                                                    )
                                                }}
                                                {{
                                                    Html::linkRoute(
                                                        'admin.posts.delete', '<i class="fas fa-trash-alt"></i>',
                                                         ['ids' => $item->id],
                                                         [
                                                             'class' => 'btn btn-xs btn-rounded btn-danger',
                                                             'data-method' => 'delete',
                                                             'data-confirm' => '<p>Bạn sắp xóa 1 bài viết. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>'
                                                         ]
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search-data" style="display: none"></tbody>
                            </table>
                        </div>

                        {{ $postsModel->links('vendor.pagination.dadmin-bootstrap-4') }}
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
