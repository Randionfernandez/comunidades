@extends('layouts.dashboard')

@section('content')
<div class="card scroll-card">
    <div class="card-header">
        Update user
    </div>
    <div class="card-body pb-0">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @elseif(session()->get('success'))
        <div class="alert alert-success mb-0">
            {{ session()->get('success') }}
        </div><br />
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled />
            </div>
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
            </div>
            <div class="form-group">
                <label for="surname1">Surname 1:</label>
                <input type="text" class="form-control" name="surname1" value="{{ $user->surname1 }}" />
            </div>
            <div class="form-group">
                <label for="surname2">Surname 2:</label>
                <input type="text" class="form-control" name="surname2" value="{{ $user->surname2 }}" />
            </div>
            <div class="form-group">
                <label for="nif">Nif:</label>
                <input type="text" class="form-control" name="nif" value="{{ $user->nif }}" />
            </div>
            <div class="form-group">
                <label for="phone1">Phone 1:</label>
                <input type="tel" class="form-control" name="phone1" value="{{ $user->phone1 }}" />
            </div>
            <div class="form-group">
                <label for="phone2">Phone 2:</label>
                <input type="tel" class="form-control" name="phone2" value="{{ $user->phone2 }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update user</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection