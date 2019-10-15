<aside class="sidebar" data-trigger="scrollbar">
    <div class="sidebar--profile">
        <div class="profile--img">
            {!!
                Html::linkRoute(
                    'admin.user.profile',
                    Html::image('backend/images/no_avatar.jpg', 'Trang cá nhân', [
                        'class' => 'rounded-circle',
                    ])
                )
            !!}
        </div>
        <div class="profile--name">
            {!!
                Html::linkRoute(
                    'admin.user.profile',
                    !empty(Auth::user()->profile->display_name) ? Auth::user()->profile->display_name : Auth::user()->username,
                    [],
                    ['class' => 'btn-link']
                )
            !!}
        </div>
        <div class="profile--nav">
            {!!
                Html::ul([
                    Html::linkRoute('admin.user.profile', '<i class="fa fa-user"></i>', [], [
                        'class' => 'nav-link',
                        'title' => 'Trang cá nhân',
                        'data-toggle' => 'tooltip'
                    ]),
                    Html::link('', '<i class="fa fa-lock"></i>', [], [
                        'class' => 'nav-link',
                        'title' => 'Khóa màn hình',
                        'data-toggle' => 'tooltip'
                    ]),
                    Html::linkRoute('admin.logout', '<i class="fa fa-sign-out-alt"></i>', [], [
                        'class' => 'nav-link',
                        'title' => 'Đăng xuất',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post'
                    ])
                ], [
                    'class' => 'nav'
                ])
            !!}
        </div>
    </div>
    <div class="sidebar--nav">
        <ul>
            <li>
                <ul>
                    <li>
                        {!! Html::linkRoute('admin.home', '<i class="fa fa-home"></i><span>Dashboard</span>') !!}
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Quản trị Admin</a>
                {!! Html::ul([
                    Html::linkRoute('admin.option', '<i class="fa fa-cog"></i> <span>Cấu hình chung</span>'),
                    Html::linkRoute('admin.slider.index', '<i class="fa fa-images"></i> <span>Quản lý Sliders</span>'),
                    Html::linkRoute('admin.category', '<i class="fa fa-th"></i> <span>Quản lý danh mục</span>'),
                    Html::linkRoute('admin.posts', '<i class="fa fa-file-alt"></i> <span>Quản lý bài viết</span>'),
                    Html::link('', '<i class="fa fa-bullhorn"></i> <span>Quản lý tin tuyển dụng</span>'),
                    Html::link('', '<i class="fa fa-users"></i> <span>Quản lý thành viên</span>')
                ]) !!}
            </li>
        </ul>
    </div>
    <div class="sidebar--widgets">
        <div class="widget">
            <h3 class="h6 widget--title">Tóm tắt thông tin</h3>
            <div class="summary--widget">
                <div class="summary--item">
                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#2bb3c0">5,6,7,9,15,5,6,7,9,11,7,9,11,7,9,9,3,2</p>
                    <p class="summary--title">Daily Traffic</p>
                    <p class="summary--stats">307.512</p>
                </div>
                <div class="summary--item">
                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">2,3,7,7,9,11,9,7,9,11,9,7,5,4,9,7,5,4</p>
                    <p class="summary--title">Average Usage</p>
                    <p class="summary--stats">2,371,527</p>
                </div>
                <div class="summary--item">
                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#cccccc">5,6,7,9,15,5,6,7,9,11,7,9,11,7,9,9,3,2</p>
                    <p class="summary--title">Disk Usage</p>
                    <p class="summary--stats">37.5%</p>
                </div>
                <div class="summary--item">
                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">2,3,7,7,9,11,9,7,9,11,9,7,5,4,9,7,5,4</p>
                    <p class="summary--title">CPU Usage</p>
                    <p class="summary--stats">37.05-32</p>
                </div>
                <div class="summary--item">
                    <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#ff4040">5,6,7,9,15,5,6,7,9,11,7,9,11,7,9,9,3,2</p>
                    <p class="summary--title">Memory Usage</p>
                    <p class="summary--stats">37.05%</p>
                </div>
            </div>
        </div>
    </div>
</aside>
