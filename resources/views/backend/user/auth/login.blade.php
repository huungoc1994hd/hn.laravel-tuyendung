@extends('backend.user.auth.layouts.main')

@section('title', 'Đăng nhập hệ thống')
@section('body')

<div class="wrapper">
    <div class="m-account-w" data-bg-img="{{ asset('backend/images/wrapper-bg.jpg') }}">
        <div class="m-account">
            <div class="row no-gutters">
                <div class="col-md-6 offset-md-3">
                    <div class="m-account--form-w">
                        <div class="m-account--form">
                            <div class="logo">
                                <img src="{{ asset('backend/images/logo.png') }}" alt="Login">
                            </div>

                            {{ Form::open(['id' => 'login-form']) }}
                                <div class="form-group field-loginform-username required">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-user"></i>
                                        </div>

                                        {{ Form::text('username', old('username'), [
                                            'autofocus' => 'true',
                                            'placeholder' => 'Tên đăng nhập (*)',
                                            'class' => 'form-control'
                                        ]) }}
                                    </div>
                                    @if ($message = Session::get('loginError'))
                                        <p class="has-error text-danger">{{ $message->first('username') }}</p>
                                    @endif
                                </div>
                                <div class="form-group field-loginform-password required">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        {{ Form::password('password', [
                                            'placeholder' => 'Mật khẩu (*)',
                                            'autocomplete' => 'off',
                                            'class' => 'form-control'
                                        ]) }}
                                    </div>
                                    @if ($message = Session::get('loginError'))
                                        <p class="has-error text-danger">{{ $message->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="m-account--actions">
                                    {{ Form::button('Đăng nhập', [
                                        'class' => 'btn btn-rounded btn-info btn-block',
                                        'type' => 'submit'
                                    ]) }}
                                </div>

                                <div class="m-account--footer">
                                    <p>&copy; 2019 Huu Ngoc Developer</p>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
