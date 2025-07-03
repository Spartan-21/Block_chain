@extends('layouts.adminlte')

@section('title', 'Quality Control List')

@section('content_header')
    <h1>Quality Control Records</h1>
    <a href="{{ route('quality.create') }}" class="btn btn-primary mb-3">Add New Quality Test</a>
@endsection

@section('content')
    @if($qualityRecords->isEmpty())
        <p>No quality control records found.</p>
    @else
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Batch ID</th>
                <th>Test Date</th>
                <th>Tester</th>
                <th>Result Summary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qualityRecords as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->batch_id }}</td>
                <td>{{ $record->test_date->format('Y-m-d') }}</td>
                <td>{{ $record->tester_name }}</td>
                <td>{{ Str::limit($record->result_summary, 50) }}</td>
                <td>
                    <a href="{{ route('quality.show', $record->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('quality.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('quality.destroy', $record->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
