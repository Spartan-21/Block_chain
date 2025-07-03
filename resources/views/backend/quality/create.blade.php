@extends('backend.partials.parent')

@section('page_title', 'Add Quality Control Test')

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

    <a href="{{ route('quality') }}" class="btn btn-secondary mb-3">Back to List</a>


<div class="card card-primary">
    <div class="card-body">
        <form action="{{ route('quality.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                            Batch #{{ $batch->id }} - {{ $batch->name ?? 'Unnamed' }}
                        </option>
                    @endforeach
                </select>
                @error('batch_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="test_date">Test Date</label>
                <input type="date" id="test_date" name="test_date" class="form-control" value="{{ old('test_date') ?? date('Y-m-d') }}" required>
                @error('test_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="tester_name">Tester Name</label>
                <input type="text" id="tester_name" name="tester_name" class="form-control" value="{{ Auth::user()->firstname . " " . Auth::user()->surname }}" readonly required>
                @error('tester_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="test_type">Test Type</label>
                <input type="text" id="test_type" name="test_type" class="form-control" value="{{ old('test_type') }}" required>
                @error('test_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="score">Test Score</label>
                <input type="number" id="score" name="score" class="form-control" value="{{ old('score') }}" required>
                @error('score')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="test_result">Result Summary</label>
                <textarea id="test_result" name="test_result" rows="4" class="form-control" required>{{ old('test_result') }}</textarea>
                @error('test_result')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Test</button>
        </form>
    </div>
@endsection
