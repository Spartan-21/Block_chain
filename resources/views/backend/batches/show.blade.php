@extends('backend.partials.parent')

@section('page_title', 'Batch Details')

@section('page_content')

@include('backend.partials.flash-messages')

    <table class="table table-bordered">
        <tr><th>Farmer Name</th><td>{{ $batch->farm->user->firstname . " " . $batch->farm->user->surname }}</td></tr>
        <tr><th>Coffee Type</th><td>{{ $batch->coffee_type }}</td></tr>
        <tr><th>Quantity</th><td>{{ $batch->quantity }}</td></tr>
        <tr><th>Processing Method</th><td>{{ $batch->processing_method }}</td></tr>
        <tr><th>Quality Grade</th><td>{{ $batch->quality_grade }}</td></tr>
        <tr><th>Moisture Content</th><td>{{ $batch->moisture_content }}</td></tr>
        <tr><th>Certifications</th><td>{{ $batch->certifications }}</td></tr>
    </table>

    <a href="{{ route('batches.edit', ['farm_id' => $batch->farm->id, 'batch' => $batch->id]) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('batches', ['farm_id' => $batch->farm->id]) }}" class="btn btn-secondary">Back to Batch List</a>
@stop
