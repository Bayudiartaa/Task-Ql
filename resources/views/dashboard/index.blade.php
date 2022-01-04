@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa fa-book-open text-white fa-2x">
                </i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Posts</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa fa-tags text-white fa-2x">
                </i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fa fa-users text-white fa-2x">
                </i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
