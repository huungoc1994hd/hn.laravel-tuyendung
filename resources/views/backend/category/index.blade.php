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
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    Item 1
                                </div>
                                <label class="form-check">
                                    <input type="checkbox" name="checkbox" value="2" class="form-check-input">
                                    <span class="form-check-label"></span>
                                </label>
                                <div class="dd-actions">
                                    <a href="" data-id="65" class="btn btn-xs btn-rounded btn-success" data-toggle="tooltip" title="Sửa"><i class="fa fa-edit"></i></a>
                                    <a href="a" data-id="65" class="btn btn-xs btn-rounded btn-danger" data-toggle="tooltip" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </li>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">Item 2</div>
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                    <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                    <li class="dd-item" data-id="5">
                                        <div class="dd-handle">Item 5</div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                            <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                            <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                        </ol>
                                    </li>
                                    <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                    <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                                </ol>
                            </li>
                            <li class="dd-item" data-id="11">
                                <div class="dd-handle">Item 11</div>
                            </li>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle">Item 12</div>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection
