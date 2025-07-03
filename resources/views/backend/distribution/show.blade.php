@extends('backend.partials.parent')

@section('page_title', 'Distribution Details')

@section('page_content')
@include('backend.partials.flash-messages')

<table class="table table-bordered">
    <tr><th>Batch</th><td>{{ $distribution->batch->batch_code ?? 'Batch #'.$distribution->batch_id }}</td></tr>
    <tr><th>Destination</th><td>{{ $distribution->destination }}</td></tr>
    <tr><th>Expected Delivery Date</th><td>{{ $distribution->expected_delivery_date }}</td></tr>
    <tr><th>Transport Method</th><td>{{ $distribution->transport_method }}</td></tr>
    <tr><th>Tracking Number</th><td>{{ $distribution->tracking_number }}</td></tr>
</table>

@permission('edit.distribution')
<a href="{{ route('distributions.edit', ['distribution_id' => $distribution->id]) }}" class="btn btn-primary">Edit</a>
@endpermission
<a href="{{ route('distributions') }}" class="btn btn-secondary">Back to Distributions List</a>
@stop
