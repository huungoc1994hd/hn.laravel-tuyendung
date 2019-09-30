@extends('backend.layouts.main')

@section('title', 'Quản trị hệ thống')
@section('body')

<section class="main--content">
    <div class="row gutter-20">
        <div class="col-md-4">
            <div class="panel">
                <div class="miniStats--panel text-white bg-blue">
                    <div class="miniStats--header" data-overlay="0.1">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#fff">5,6,9,4,9,5,3,5,9,15,3,2,2,3,9,11,9,7,20,9,7,6</p>
                        <p class="miniStats--label text-blue bg-white"> <i class="fa fa-level-up-alt"></i> <span>10%</span> </p>
                    </div>
                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-user text-white"></i>
                        <p class="miniStats--caption">Monthly</p>
                        <h3 class="miniStats--title h4 text-white">New Users</h3>
                        <p class="miniStats--num">13,450</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="miniStats--panel text-white bg-orange">
                    <div class="miniStats--header" data-overlay="0.1">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#fff">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>
                        <p class="miniStats--label text-orange bg-white"> <i class="fa fa-level-down-alt"></i> <span>10%</span> </p>
                    </div>
                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-ticket-alt text-white"></i>
                        <p class="miniStats--caption">Monthly</p>
                        <h3 class="miniStats--title h4 text-white">Tickets Answered</h3>
                        <p class="miniStats--num">450</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="miniStats--panel text-white bg-green">
                    <div class="miniStats--header" data-overlay="0.1">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#fff">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>
                        <p class="miniStats--label text-green bg-white"> <i class="fa fa-level-up-alt"></i> <span>10%</span> </p>
                    </div>
                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-rocket text-white"></i>
                        <p class="miniStats--caption">Monthly</p>
                        <h3 class="miniStats--title h4 text-white">Projects Launched</h3>
                        <p class="miniStats--num">3,130,300</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Progress</h3>
                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-ellipsis-v"></i> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">This Week</a></li>
                            <li><a href="#">Last Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-chart">
                    <div id="morrisLineChart01" class="chart--body line--chart style--1"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Monthly Traffic</h3>
                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-ellipsis-v"></i> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-chart">
                    <div id="morrisLineChart02" class="chart--body line--chart style--2"></div>
                    <div class="chart--stats style--3">
                        <ul class="nav">
                            <li>
                                <p data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#2bb3c0">0,5,9,7,12,15,12,5</p>
                                <p><span class="label">Total Visitors</span></p>
                                <p class="amount">12,202</p>
                            </li>
                            <li>
                                <p data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">0,15,12,5,5,9,7,12</p>
                                <p><span class="label">Total Sales</span></p>
                                <p class="amount">25,051</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="panel">
                <div class="weather--panel text-white bg-blue">
                    <div class="weather--title"> <i class="fa fa-map-marker-alt"></i> <span>Dhaka, Bangladesh</span> </div>
                    <div class="weather--info"> <i class="wi wi-rain-wind"></i> <span>33°C</span> </div>
                </div>
            </div>
            <div class="panel">
                <div class="weather--panel text-white bg-orange">
                    <div class="weather--title"> <i class="fa fa-map-marker-alt"></i> <span>Melbourne, Autoria</span> </div>
                    <div class="weather--info"> <i class="wi wi-hot"></i> <span>35°C</span> </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
