@extends('layouts.adminlte')

@section('title', 'Edit Quality Control Test')

@section('content_header')
    <h1>Edit Quality Control Test #{{ $quality->id }}</h1>
    <a href="{{ route('quality.index') }}" class="btn btn-secondary mb-3">Back to List</a>
@endsection

@section('content')
    <form action="{{ route('quality.update', $quality->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="batch_id">Batch</label>
            <select name="batch_id" id="batch_id" class="form-control" required>
                <option value="">Select Batch</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ (old('batch_id') ?? $quality->batch_id) == $batch->id ? 'selected' : '' }}>
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
            <input type="date" id="test_date" name="test_date" class="form-control" value="{{ old('test_date') ?? $quality->test_date->format('Y-m-d') }}" required>
            @error('test_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tester_name">Tester Name</label>
            <input type="text" id="tester_name" name="tester_name" class="form-control" value="{{ old('tester_name') ?? $quality->tester_name }}" required>
            @error('tester_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="result_summary">Result Summary</label>
            <textarea id="result_summary" name="result_summary" rows="4" class="form-control" required>{{ old('result_summary') ?? $quality->result_summary }}</textarea>
            @error('result_summary')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Test</button>
    </form>
@endsection
