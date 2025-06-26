@extends('backend.partials.parent')

@section('page_title', 'Register Farm')

@section('page_content')
@include('backend.partials.flash-messages')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Farm Details</h3>
    </div>

    <form action="{{ route('farms.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="farmer_name">Farmer Name</label>
                <input type="text" name="farmer_name" id="farmer_name" class="form-control" value="{{ Auth::user()->firstname . " " . Auth::user()->surname }}" readonly required>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" name="region" id="region" class="form-control" value="{{ old('region') }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
            </div>

            <div class="form-group">
                <label for="altitude">Altitude (meters)</label>
                <input type="number" step="any" name="altitude" id="altitude" class="form-control" value="{{ old('altitude') }}" required>
            </div>

            <div class="form-group">
                <label for="farm_size">Farm Size (hectares)</label>
                <input type="number" step="any" name="farm_size" id="farm_size" class="form-control" value="{{ old('farm_size') }}" required>
            </div>

            <div class="form-group">
                <label for="coordinates">Coordinates (e.g., -6.8, 39.2)</label>
                <input type="text" name="coordinates" id="coordinates" class="form-control" value="{{ old('coordinates') }}" required>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Register Farm</button>
        </div>
    </form>
</div>

@stop
