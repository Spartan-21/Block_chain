@extends('backend.partials.parent')

@section('page_title', 'Farm Details')

@section('page_content')

@include('backend.partials.flash-messages')

    <table class="table table-bordered">
        <tr><th>Farmer Name</th><td>{{ $farm->user->firstname . " " . $farm->user->surname }}</td></tr>
        <tr><th>Location</th><td>{{ $farm->location }}</td></tr>
        <tr><th>Region</th><td>{{ $farm->region }}</td></tr>
        <tr><th>Altitude</th><td>{{ $farm->altitude }}</td></tr>
        <tr><th>Farm Size</th><td>{{ $farm->farm_size }}</td></tr>
        <tr><th>Coordinates</th><td>{{ $farm->coordinates }}</td></tr>
    </table>

    <a href="{{ route('farms.edit', ['farm_id' => $farm->id]) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('farms') }}" class="btn btn-secondary">Back to Farm List</a>
@stop
