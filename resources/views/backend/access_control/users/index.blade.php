@extends('backend.partials.parent')

@section('page_title', 'User Accounts')

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

    @if($users->isEmpty())
        <p>No users registered yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->firstname . " " . $user->surname }}</td>
                        <td>{{ $user->roles->first()->name }}</td>
                        <td>
                            @if($user->roles->first()->slug != "admin")
                            @permission('assign.roles.to.users')
                            <a href="{{ route('users.assign.roles', ['user_id' => $user->id]) }}" class="btn btn-primary btn-sm">Change Role</a>
                            @endpermission
                            @permission('delete.users')
                            <form action="{{ route('users.destroy', ['user_id' => $user->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this user?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endpermission
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection