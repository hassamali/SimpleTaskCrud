@extends('master.app')

@section('pagename')
    Create New User
@endsection

@section('content')

    @include('session.errors')

    <div class="col-md-6">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
        </div>
            <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email_address" value="{{ old('email_address') }}">
        </div>
        <div class="form-group">
            <label for="pwd">Marks:</label>
            <input type="number" class="form-control" name="marks" value="{{ old('marks') }}">
        </div>
        <div class="form-group">
        <label for="status">Status:</label>
            <select class="form-control" id="sel1" name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="profilePicture">Profile Picture</label>
            <input type="file" class="form-control-file" name="profile_picture">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>
@endsection