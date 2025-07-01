@extends('backend.partials.parent')

@section('page_title', 'Create Coffee Batch')

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
        <h3 class="card-title">Batch Details</h3>
    </div>

    <form method="POST" action="{{ route('batches.store', ['farm_id' => $farm->id]) }}">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label>Coffee Type</label>
                <select name="coffee_type" class="form-control" aria-placeholder="Select Cofee Type" required>
                    <option value="" disabled selected>Select Coffee Type</option>
                    @foreach($coffeeTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Quantity (kg)</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Processing Method</label>
                <select name="processing_method" class="form-control" required>
                    <option value="" disabled selected>Select Processing Method</option>
                    @foreach($processingMethods as $method)
                        <option value="{{ $method }}">{{ $method }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Quality Grade</label>
                <input type="text" name="quality_grade" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Moisture Content (%)</label>
                <input type="number" step="0.01" name="moisture_content" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Certifications (optional)</label>
                <input type="text" name="certifications" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Create Batch</button>
        </div>
    </form>
</div>

@stop
