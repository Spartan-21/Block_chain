@extends('backend.partials.parent')

@section('page_title', 'Distributions List')

@section('page_content')
@include('backend.partials.flash-messages')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

@permission('create.distribution')
<a href="{{ route('distributions.create') }}" class="btn btn-success mb-3">Add New Distribution</a>
@endpermission

@if($distributions->isEmpty())
    <p>No distributions registered yet.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Batch</th>
            <th>Destination</th>
            <th>Expected Delivery</th>
            <th>Transport Method</th>
            <th>Tracking Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($distributions as $distribution)
        <tr>
            <td>{{ $distribution->batch->batch_code ?? 'Batch #'.$distribution->batch_id }}</td>
            <td>{{ $distribution->destination }}</td>
            <td>{{ $distribution->expected_delivery_date }}</td>
            <td>{{ $distribution->transport_method }}</td>
            <td>{{ $distribution->tracking_number }}</td>
            <td>
                <a href="{{ route('distributions.view', ['distribution_id' => $distribution->id]) }}" class="btn btn-info btn-sm">View</a>
                @permission('edit.distribution')
                <a href="{{ route('distributions.edit', ['distribution_id' => $distribution->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                @endpermission
                @permission('delete.distribution')
                <form action="{{ route('distributions.destroy', ['distribution_id' => $distribution->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this distribution?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endpermission
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@stop
