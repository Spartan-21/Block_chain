@extends('backend.partials.parent')

@section('page_title', 'Processing Details')

@section('page_content')

@include('backend.partials.flash-messages')

<table class="table table-bordered">
    <tr>
        <th>Batch ID</th>
        <td>{{ $processing->batch->id ?? '-' }}</td>
    </tr>
    <tr>
        <th>Processor Name</th>
        <td>{{ $processing->processor->firstname . ' ' . $processing->processor->surname }}</td>
    </tr>
    <tr>
        <th>Output Quantity (kg)</th>
        <td>{{ $processing->output_quantity }}</td>
    </tr>
    <tr>
        <th>Processing Date</th>
        <td>{{ $processing->processing_date }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ ucfirst($processing->status) }}</td>
    </tr>
    <tr>
        <th>Notes</th>
        <td>{{ $processing->notes ?? '-' }}</td>
    </tr>
</table>

@permission('edit.processing')
<a href="{{ route('processings.edit', $processing->id) }}" class="btn btn-primary">Edit</a>
@endpermission
<a href="{{ route('processings.index') }}" class="btn btn-secondary">Back to Processing List</a>
@stop
