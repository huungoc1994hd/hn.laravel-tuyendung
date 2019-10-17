<header class="navbar navbar-fixed">
    <div class="navbar--header">
        <a href="index.html" class="logo">
            <img src="{{ asset('backend/images/logo.png') }}" alt="{{ config('app.name') }}" />
        </a>
        <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar--nav ml-auto">
        <ul class="nav">
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="fa fa-bell"></i> <span class="badge text-white bg-blue">7</span> </a> </li>

            <li class="nav-item"> <a href="mailbox_inbox.html" class="nav-link"> <i class="fa fa-envelope"></i> <span class="badge text-white bg-blue">4</span> </a> </li>

            <li class="nav-item dropdown nav--user online">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <img src="{{ asset('backend/images/no_avatar.jpg') }}" alt="{{ Auth::user()->username }}" class="rounded-circle">
                    <span>
                        {{ !empty(Auth::user()->profile->display_name) ? Auth::user()->profile->display_name : Auth::user()->username }}
                    </span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu animated flipInX">
                    <li>
                        {!! Html::link('/admin/user/profile', '<i class="far fa-user"></i>Trang cá nhân') !!}
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        {!! Html::link('lock-screen.html', '<i class="fa fa-lock"></i>Khóa màn hình') !!}
                    </li>
                    <li>
                        {!! Html::linkRoute('admin.logout', '<i class="fa fa-power-off"></i>Đăng xuất', [], [
                            'data-method' => 'post'
                        ]) !!}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
