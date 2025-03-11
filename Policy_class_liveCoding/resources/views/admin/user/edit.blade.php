@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit User Role & Permissions</h2>
    
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- User Info --}}
        <div class="mb-4">
            <label for="name" class="form-label">User Name</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        {{-- Role Selection --}}
        <div class="mb-4">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" 
                       @selected($user->hasRole($role->name))>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Permissions Checkboxes --}}
        <div class="mb-4">
            <label class="form-label">Permissions</label>
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="permissions[]" 
                                   value="{{ $permission->name}}" 
                                   id="permission_{{ $permission->id }}"
                                   {{ in_array($permission->id, $userPermissions) ||$user->hasRole('admin') ? 'checked' : '' }}>
                                 <label class="form-check-label" for="permission_{{ $permission->id }}">
                                {{ ucfirst($permission->name) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
<script src="{{ asset('js/userEdit.js') }}"></script>

@endsection
