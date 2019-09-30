@extends('backend.layouts.main')

@section('title', 'Trang cá nhân')
@section('body')

<section class="main--content">
    <div class="row gutter-20">
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-fluid rounded-circle" src="{{ asset('backend/images/no_avatar.jpg') }}" alt="User profile picture">
                    <h3 class="profile-username text-center">
                        {{ (!empty(Auth::user()->profile->display_name) ? Auth::user()->profile->display_name : Auth::user()->username) }}
                    </h3>

                    <p class="text-muted text-center">fdsf</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b>
                            <span class="float-right">
                                {{ Auth::user()->email }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Số điện thoại</b>
                            <span class="float-right">
                                {{ !empty(Auth::user()->phone->phone) ? Auth::user()->phone->phone : '' }}
                            </span>
                        </li>
                    </ul>

                    <a class="btn btn-block btn-danger btn-rounded mt-4 mb-3" href="/admin/user/auth/change-password">Đổi mật khẩu</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-tabs-line-top">
                    <li class="nav-item"> <a href="#activity" data-toggle="tab" class="nav-link active">Hoạt động của tôi</a> </li>
                    <li class="nav-item"> <a href="#update-profile" data-toggle="tab" class="nav-link">Cập nhật hồ sơ</a> </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="activity">
                        <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="5000">
                            <ul class="timeline" id="activities">
                                <!-- Time label -->
                                <li class="time-label">
                                 <span class="label label-danger">
                                    04 Thg 9 2019
                                 </span>
                                </li>
                                <li>
                                    <i class="fa fa-edit bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Bạn</a> đã giao quyền theo dõi cơ hội <a href="/crm/opportunity/view?id=50938">111111</a> cho <a href="/user/user/view?id=9">Trần Thị Hà Anh</a></h3>
                                        <span class="time"><i class="fa fa-clock-o"></i> Thứ tư lúc 16:32</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-edit bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Bạn</a> đã giao quyền theo dõi cơ hội <a href="/crm/opportunity/view?id=50938">111111</a> cho <a href="/user/user/view?id=9">Trần Thị Hà Anh</a></h3>
                                        <span class="time"><i class="fa fa-clock-o"></i> Thứ tư lúc 16:32</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-edit bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Bạn</a> đã giao quyền theo dõi cơ hội <a href="/crm/opportunity/view?id=50938">111111</a> cho <a href="/user/user/view?id=9">Trần Thị Hà Anh</a></h3>
                                        <span class="time"><i class="fa fa-clock-o"></i> Thứ tư lúc 16:32</span>
                                    </div>
                                </li>

                                <!-- Time label -->
                                <li class="time-label">
                                 <span class="label label-danger">
                                    04 Thg 9 2019
                                 </span>
                                </li>
                                <li>
                                    <i class="fa fa-edit bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Bạn</a> đã giao quyền theo dõi cơ hội <a href="/crm/opportunity/view?id=50938">111111</a> cho <a href="/user/user/view?id=9">Trần Thị Hà Anh</a></h3>
                                        <span class="time"><i class="fa fa-clock-o"></i> Thứ tư lúc 16:32</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-edit bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Bạn</a> đã giao quyền theo dõi cơ hội <a href="/crm/opportunity/view?id=50938">111111</a> cho <a href="/user/user/view?id=9">Trần Thị Hà Anh</a></h3>
                                        <span class="time"><i class="fa fa-clock-o"></i> Thứ tư lúc 16:32</span>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="update-profile">
                        {!! Form::model($userModel, [
                            'method' => 'put',
                            'route' => 'admin.user.profile',
                            'data-validate' => 'true',
                        ]) !!}

                            <div class="form-group field-userprofile-display_name required">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">
                                            {!! Form::label('profile[display_name]', 'Tên hiển thị', [
                                                'class' => 'control-label'
                                            ]) !!}
                                        </span>
                                        {!! Form::text('profile[display_name]', null, [
                                            'placeholder' => 'Nhập tên hiển thị vào đây...',
                                            'data-rule-required' => 'true',
                                            'data-msg-required' => 'Vui lòng nhập tên hiển thị',
                                            'data-rule-maxlength' => '20',
                                            'data-msg-maxlength' => 'Tên hiển thị không được vượt quá 20 kí tự'
                                        ]) !!}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group field-user-email required">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">
                                            {!! Form::label('email', 'Địa chỉ Email', [
                                                'class' => 'control-label'
                                            ]) !!}
                                        </span>
                                        {!! Form::text('email', null, [
                                            'placeholder' => 'Nhập email vào đây...',
                                            'data-rule-required' => 'true',
                                            'data-msg-required' => 'Vui lòng nhập email',
                                            'data-rule-email' => 'true',
                                            'data-msg-email' => 'Vui lòng nhập 1 địa chỉ email hợp lệ'
                                        ]) !!}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    <span class="label-text">
                                        {!! Form::label('phone[phone]', 'Số điện thoại', [
                                            'class' => 'control-label'
                                        ]) !!}
                                    </span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+84</span>
                                        </div>
                                        {!! Form::text('phone[phone]', null, [
                                            'placeholder' => 'Nhập số điện thoại vào đây...',
                                            'data-rule-rangelength' => '9,10',
                                            'data-msg-rangelength' => 'Vui lòng nhập 1 số điện thoại hợp lệ'
                                        ]) !!}
                                    </div>
                                    <label id="phone[phone]-error" class="error" for="phone[phone]"></label>
                                </label>
                            </div>

                            <div class="form-group field-userprofile-gender">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">
                                            {!! Form::label('profile[gender]', 'Giới tính', [
                                                'class' => 'control-label'
                                            ]) !!}
                                        </span>
                                        {!!
                                            Form::select('profile[gender]', [
                                                null => 'Chọn giới tính...',
                                                1 => 'Nam',
                                                2 => 'Nữ'
                                            ], null, [
                                                'class' => 'form-control'
                                            ], [
                                                null => [
                                                    'disabled' => 'disabled'
                                                ]
                                            ])
                                        !!}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group field-userprofile-address">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">
                                            {!!
                                                Form::label('address', 'Địa chỉ', ['class' => 'control-label'])
                                            !!}
                                        </span>
                                        {!!
                                            Form::text('profile[address]', null, [
                                                'placeholder' => 'Nhập địa chỉ vào đây...'
                                            ])
                                        !!}
                                    </label>
                                </div>
                            </div>

                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-rounded btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
