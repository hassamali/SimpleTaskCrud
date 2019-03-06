@extends('master.app')

@section('pagename')
    Edit/Delete Users
@endsection

@section('content')

    @include('session.status')
    
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Status</th>
            <th>Picture</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email_address}}</td>
            @if($user->status == 'active')
                <td><p class="text-success">{{ ucfirst($user->status) }}</p></td>
            @else
                <td><p class="text-danger">{{ ucfirst($user->status) }}</p></td>
            @endif
            <td>
                <img class="rounded-circle" src="{{ Storage::disk('local')->url($user->profile_picture) }}" width="50">
            </td>
            <td>
                <a class="btn btn-sm btn-primary d-inline-block" href="{{ route('user.edit', $user->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <form class="d-inline-block" action="{{ route('user.destroy', $user->id) }} data-toggle="tooltip" data-placement="bottom" title="Delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection