@extends('backend.layouts.main')

@section('title', 'Quản lý Sliders')
@section('body')

<section class="main--content">
    <div class="panel">
        <div class="records--list" data-title="Product Listing">
            <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                <div class="topbar">
                    <div class="toolbar">
                        Danh sách sliders
                        {{
                            Html::linkRoute(
                                'admin.slider.create',
                                '<i class="fa fa-plus mr-1"></i><strong>Thêm mới slide</strong>',
                                [],
                                [
                                    'class' => 'btn btn-sm btn-outline-primary btn-rounded ml-4'
                                ]
                            )
                        }}
                    </div>
                </div>

                @if ( $mediaModel->count() > 0 )

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
                                @foreach( $mediaModel as $key => $media )
                                    <tr role="row" class="{{ $key % 2 == 0 ? 'even' : 'odd' }}">
                                        <td>
                                            <a href="#" class="btn-link">#{{ $media->id }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn-link">
                                                <img
                                                    alt="{{ $media->alt }}"
                                                    src="{{ !empty($media->image) ? asset($media->image) : asset('backend/images/nophoto.png') }}"
                                                />
                                            </a>
                                        </td>
                                        <td> <a href="#" class="btn-link">{{ $media->name }}</a> </td>
                                        <td>
                                            @if (!empty($media->link))
                                                {{ Html::link($media->link, $media->link, [
                                                    'class' => 'btn-link'
                                                ]) }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{!! $media->statusConvert() !!}</td>
                                        <td>
                                            {{ $media->created_at->format('H:i:s d/m/Y') }}
                                        </td>
                                        <td class="text-right">
                                            {{
                                                Html::linkRoute(
                                                    'admin.slider.update', '<i class="fa fa-edit"></i>',
                                                     ['id' => $media->id],
                                                     [
                                                         'class' => 'btn btn-xs btn-rounded btn-primary'
                                                     ]
                                                )
                                            }}
                                            {{
                                                Html::linkRoute(
                                                    'admin.slider.delete', '<i class="fas fa-trash-alt"></i>',
                                                     ['id' => $media->id],
                                                     [
                                                         'class' => 'btn btn-xs btn-rounded btn-danger',
                                                         'data-method' => 'delete',
                                                         'data-confirm' => '<p>Bạn sắp xóa 1 mục. Điều này là không thể đảo ngược.</p><p>Bạn có chắc chắn muốn xóa?</p>'
                                                     ]
                                                )
                                            }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $mediaModel->links('vendor.pagination.dadmin-bootstrap-4') }}
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
