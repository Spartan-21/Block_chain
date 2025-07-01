@extends('backend.partials.parent')

@section('page_title', 'Dashboard')

@section('page_content')
<div class="row">
    @permission('view.users')
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $users }}</h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    @endpermission
    @permission('view.farms')
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $farms }}</h3>

                <p>Farms</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    @endpermission
    @permission('view.batches')
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $batches }}</h3>

                <p>Batches</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    @endpermission
</div>
@endsection