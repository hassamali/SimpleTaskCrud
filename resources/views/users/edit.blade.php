@extends('master.app')

@section('pagename')
    Edit User
@endsection

@section('content')

    @include('session.errors')
    @include('session.status')

    <div class="col-md-6">
        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
        </div>
            <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email_address" value="{{ $user->email_address }}">
        </div>
        <div class="form-group">
            <label for="pwd">Marks:</label>
            <input type="number" class="form-control" name="marks" value="{{ $user->marks }}">
        </div>
        <div class="form-group">
        <label for="status">Status:</label>
            <select class="form-control" id="sel1" name="status">
                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="profilePicture">Profile Picture</label>
            <img class="rounded-circle" src="{{ Storage::disk('local')->url($user->profile_picture) }}" width="100">
            <input type="file" class="form-control-file" name="profile_picture">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>
@endsection