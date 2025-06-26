@extends('adminlte::page')

@section('title', 'Farm Details')

@section('content_header')
    <h1>Farm Details</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <tr><th>Farmer Name</th><td>{{ $farm->farmer_name }}</td></tr>
        <tr><th>Location</th><td>{{ $farm->location }}</td></tr>
        <tr><th>Region</th><td>{{ $farm->region }}</td></tr>
        <tr><th>Altitude</th><td>{{ $farm->altitude }}</td></tr>
        <tr><th>Farm Size</th><td>{{ $farm->farm_size }}</td></tr>
        <tr><th>Coordinates</th><td>{{ $farm->coordinates }}</td></tr>
    </table>

    <a href="{{ route('farms.edit', $farm->id) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('farms.index') }}" class="btn btn-secondary">Back to List</a>
@stop
