@extends('layout.master')
@section('content')

<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-home"></i>Dashboard <span>dashboard & statistics</span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div><!-- /.header-content -->
    <!--/ End page header -->

    <!-- Start body content -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat clearfix bg-facebook rounded">
                    <span class="mini-stat-icon"><i class="fa fa-facebook fg-facebook"></i></span>
                    <div class="mini-stat-info">
                        <span>5,762</span>
                        Facebook Like
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat clearfix bg-twitter rounded">
                    <span class="mini-stat-icon"><i class="fa fa-twitter fg-twitter"></i></span>
                    <div class="mini-stat-info">
                        <span>7,153</span>
                        Twitter Followers
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat clearfix bg-googleplus rounded">
                    <span class="mini-stat-icon"><i class="fa fa-google-plus fg-googleplus"></i></span>
                    <div class="mini-stat-info">
                        <span>793</span>
                        Google+ Posts
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat clearfix bg-bitbucket rounded">
                    <span class="mini-stat-icon"><i class="fa fa-bitbucket fg-bitbucket"></i></span>
                    <div class="mini-stat-info">
                        <span>8,932</span>
                        Repository
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
        <h3>Welcome Admin Panel</h3>
    </div><!-- /.body-content -->
    <!--/ End body content -->

    <!-- Start footer content -->
    @include('include._footer')
    <!--/ End footer content -->

</section><!-- /#page-content -->

@endsection