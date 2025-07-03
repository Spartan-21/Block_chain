@extends('backend.partials.parent')

@section('page_title', 'Record Processing')

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
        <h3 class="card-title">Processing Details</h3>
    </div>

    <form action="{{ route('processings.store') }}" method="POST">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="processor_name">Processor Name</label>
                <input type="text" name="processor_name" id="processor_name" class="form-control"
                    value="{{ Auth::user()->firstname . ' ' . Auth::user()->surname }}" readonly required>
            </div>

            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                            Batch #{{ $batch->id }} ({{ $batch->status }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="output_quantity">Output Quantity (kg)</label>
                <input type="number" step="any" name="output_quantity" id="output_quantity" class="form-control"
                    value="{{ old('output_quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="processing_date">Processing Date</label>
                <input type="date" name="processing_date" id="processing_date" class="form-control"
                    value="{{ old('processing_date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes (optional)</label>
                <textarea name="notes" id="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Record Processing</button>
        </div>
    </form>
</div>
@stop
