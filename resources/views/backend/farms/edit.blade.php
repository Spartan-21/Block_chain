@extends('backend.partials.parent')

@section('page_title', 'Edit Farm')

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
    <form action="{{ route('farms.update', ['farm_id' => $farm->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="farmer_name">Farmer Name</label>
                <input type="text" name="farmer_name" id="farmer_name" class="form-control" value="{{ Auth::user()->firstname . " " . Auth::user()->surname }}" readonly required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $farm->location) }}" required>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" name="region" id="region" class="form-control" value="{{ old('region', $farm->region) }}" required>
            </div>

            <div class="form-group">
                <label for="altitude">Altitude</label>
                <input type="number" step="any" name="altitude" id="altitude" class="form-control" value="{{ old('altitude', $farm->altitude) }}" required>
            </div>

            <div class="form-group">
                <label for="farm_size">Farm Size</label>
                <input type="number" step="any" name="farm_size" id="farm_size" class="form-control" value="{{ old('farm_size', $farm->farm_size) }}" required>
            </div>

            <div class="form-group">
                <label for="coordinates">Coordinates</label>
                <input type="text" name="coordinates" id="coordinates" class="form-control" value="{{ old('coordinates', $farm->coordinates) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Farm</button>
        </div>
    </form>
</div>
@stop
