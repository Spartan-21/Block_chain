@extends('backend.partials.parent')

@section('page_title', 'Create Distribution')

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

<form action="{{ route('distributions.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="batch_id">Batch</label>
        <select name="batch_id" id="batch_id" class="form-control" required>
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}">{{ $batch->batch_code ?? 'Batch #'.$batch->id }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="destination">Destination</label>
        <input type="text" name="destination" id="destination" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="expected_delivery_date">Expected Delivery Date</label>
        <input type="date" name="expected_delivery_date" id="expected_delivery_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="transport_method">Transport Method</label>
        <input type="text" name="transport_method" id="transport_method" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tracking_number">Tracking Number</label>
        <input type="text" name="tracking_number" id="tracking_number" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save Distribution</button>
</form>
@stop
