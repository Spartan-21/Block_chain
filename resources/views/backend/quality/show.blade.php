@extends('layouts.adminlte')

@section('title', 'View Quality Control Test')

@section('content_header')
    <h1>Quality Control Test #{{ $quality->id }}</h1>
    <a href="{{ route('quality.index') }}" class="btn btn-secondary mb-3">Back to List</a>
    <a href="{{ route('quality.edit', $quality->id) }}" class="btn btn-warning mb-3">Edit</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Batch ID:</strong> {{ $quality->batch_id }}</p>
            <p><strong>Test Date:</strong> {{ $quality->test_date->format('Y-m-d') }}</p>
            <p><strong>Tester Name:</strong> {{ $quality->tester_name }}</p>
            <p><strong>Result Summary:</strong></p>
            <p>{{ $quality->result_summary }}</p>
        </div>
    </div>
@endsection
