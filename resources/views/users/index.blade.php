@extends('master.app')

@section('pagename')
    All Active Users
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
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email_address}}</td>
            <td><p class="text-success">{{ ucfirst($user->status) }}</p></td>
            <td>
                <img class="rounded-circle" src="{{ Storage::disk('local')->url($user->profile_picture) }}" width="50">
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection