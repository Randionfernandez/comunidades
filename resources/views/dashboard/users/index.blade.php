@extends('layouts.dashboard')

@section('content')
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Email</td>
                <td>Name</td>
                <td>Surname 1</td>
                <td>Surname 2</td>
                <td>Nif</td>
                <td>Phone 1</td>
                <td>Phone 2</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname1}}</td>
                <td>{{$user->surname2}}</td>
                <td>{{$user->nif}}</td>
                <td>{{$user->phone1}}</td>
                <td>{{$user->phone2}}</td>
                <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('users.create')}}" class="btn btn-success">Add user</a>
    </div>
</div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection