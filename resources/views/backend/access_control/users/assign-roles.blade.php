@extends('backend.partials.parent')

@section('page_title', 'Assign Role to User Account')

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
        <h3 class="card-title">Role Details</h3>
    </div>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="name" id="username" class="form-control" value="{{ $user->firstname . " " . $user->surname }}" readonly required>
            </div>

            <div class="form-group">
                <label for="permissions">Roles</label>
                <select class="form-control" name="role_id" data-placeholder="Select a Role" @if($user->roles->first()->slug == 'admin') disabled @endif>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if($user->roles->first()->id == $role->id) selected disabled @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Change Role</button>
        </div>
    </form>
</div>
@endsection