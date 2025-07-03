@extends('backend.partials.parent')

@section('page_title', 'Edit Processing')

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
    <form action="{{ route('processings.update', ['id' => $processing->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="processor_name">Processor Name</label>
                <input type="text" name="processor_name" id="processor_name" class="form-control"
                    value="{{ Auth::user()->firstname . ' ' . Auth::user()->surname }}" readonly required>
            </div>

            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch->id }}"
                            {{ old('batch_id', $processing->batch_id) == $batch->id ? 'selected' : '' }}>
                            Batch #{{ $batch->id }} ({{ $batch->status }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="output_quantity">Output Quantity (kg)</label>
                <input type="number" step="any" name="output_quantity" id="output_quantity" class="form-control"
                    value="{{ old('output_quantity', $processing->output_quantity) }}" required>
            </div>

            <div class="form-group">
                <label for="processing_date">Processing Date</label>
                <input type="date" name="processing_date" id="processing_date" class="form-control"
                    value="{{ old('processing_date', $processing->processing_date) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="processing" {{ old('status', $processing->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ old('status', $processing->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ old('status', $processing->status) == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="notes">Notes (optional)</label>
                <textarea name="notes" id="notes" class="form-control" rows="3">{{ old('notes', $processing->notes) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Processing</button>
        </div>
    </form>
</div>
@stop
